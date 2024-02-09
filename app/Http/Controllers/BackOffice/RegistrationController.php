<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Mc_Company;
use App\Models\Mc_Location;
use App\Models\Mc_Member;
use App\Models\Mc_Spaces;
use App\Models\Mc_Userlog;
use App\Models\SysCodeSetting;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RegistrationController extends Controller
{
    // FUNC COMPANY INDEX
    public function companyIndex(Request $request)
    {
        $location   = Mc_Location::where('b_status', 1)->get();

        if ($request->ajax()) {
            $companies = Mc_Company::select(
                'mc_company.company_id',
                'mc_company.v_code as code',
                'mc_company.v_name as name',
                'mc_company.v_email as email',
                'mc_company.v_phone as phone',
                'mc_company.v_address as address',
                'mc_company.v_city as city',
                'mc_company.v_zipcode as zipCode',
                'mc_company.v_picture as picture',
                'mc_company.v_notes as notes',
                'mc_company.v_npwp as npwp',
                'mc_members.member_id as member_id',
                'mc_members.v_name as pic_name',
                'mc_members.v_location'
            )
                ->leftJoin('mc_members', 'mc_company.company_id', '=', 'mc_members.fk_company')
                ->where('mc_members.b_picstatus', 1)
                ->where('mc_members.b_status', 1)
                ->where('mc_company.b_status', 1)
                ->orderBy('company_id', 'DESC')
                ->get();

            return DataTables::of($companies)
                ->addIndexColumn()
                ->addColumn('code', function ($item) {
                    return ucfirst($item->code);
                })
                ->addColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->addColumn('pic_name', function ($item) {
                    return ucfirst($item->pic_name) ?? '-';
                })
                ->addColumn('phone', function ($item) {
                    return $item->phone;
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button id="detail-company" data-id="' . $item->company_id . '" title="Detail Company" class="btn btn-secondary btn-sm show-company me-2 m-1"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-company" data-id="' . $item->company_id . '" title="Edit Company" class="btn btn-primary btn-sm edit-company me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>';

                    $btn = $btn . '<button id="delete-company" data-id="' . $item->company_id . '" title="Delete Company" class="btn btn-danger btn-sm delete-company text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backoffice.registrasi.company', compact('location'));
    }

    // FUNC COMPANY CREATE OR UPDATE
    public function companyStore(Request $request)
    {
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'city'      => 'required',
            'address'   => 'required',
            'zipcode'   => 'required',
            'npwp'      => 'required',
        ], [
            'name.required'     => 'Nama Perusahaan harus di isi!',
            'phone.required'    => 'No Telepon harus di isi!',
            'email.required'    => 'Email harus di isi!',
            'city.required'     => 'Kota harus di isi!',
            'address.required'  => 'Alamat harus di isi!',
            'zipcode.required'  => 'Kode Pos harus di isi!',
            'npwp.required'     => 'No. NPWP harus di isi!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // GET SYSTEM SETTING FOR UNIQUR CODE EACH TABLE
        $sys = SysCodeSetting::where('v_table', 'mc_company')->first();

        // GET LAST ID
        $lastCompany = Mc_Company::latest()->first();
        $lastId = ($lastCompany) ? $lastCompany->company_id : 0;

        // Increment the last ID to get a new ID
        $newId = $lastId + 1;

        // Format Code
        $companyCode = $sys->v_code . $sys->v_separator . date($sys->v_dateformat) . $sys->v_separator . sprintf("%0{$sys->i_digit}d", $newId);
        $sys->update(['i_count' => $sys->i_count + 1]);

        // CHECK IF THAT ACTION WAS EDIT
        if ($request->company_id) {
            $last = Mc_Company::find($request->company_id);
            $companyCode = $last->v_code;
        }

        // INSERT INTO COMPANY TABLE
        $company = Mc_Company::updateOrCreate([
            'company_id'    => $request->company_id,
        ], [
            'v_code'        => $companyCode,
            'v_name'        => $request->name,
            'v_email'       => $request->email,
            'v_phone'       => $request->phone,
            'v_address'     => $request->address,
            'v_city'        => $request->city,
            'v_zipcode'     => $request->zipcode,
            'v_notes'       => $request->notes ?? '-',
            'v_npwp'        => $request->npwp,
            'v_picture'     => '-',
            'v_createdby'   => Auth::user()->user_id,
            'v_updatedby'   => Auth::user()->user_id,
            'v_deletedby'   => 0,
        ]);

        // CHECK COMPANY ID IF NULL THAT WAS CREATE AND OTHERWISE
        if ($request->company_id) {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'edit-company',
                'v_description' => 'Memperbaharui Informasi Perusahaan ' . $request->name,
                'v_createdby'   => Auth::user()->user_id,
            ]);
        } else {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'add-company',
                'v_description' => 'Menambahkan Informasi Perusahaan ' . $request->name,
                'v_createdby'   => Auth::user()->user_id,
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // FUNC EDIT COMPANY
    public function companyEdit(Request $request)
    {
        $companies = Mc_Company::select(
            'mc_company.company_id',
            'mc_company.v_code as code',
            'mc_company.v_name as name',
            'mc_company.v_email as email',
            'mc_company.v_phone as phone',
            'mc_company.v_address as address',
            'mc_company.v_city as city',
            'mc_company.v_zipcode as zipCode',
            'mc_company.v_picture as picture',
            'mc_company.v_notes as notes',
            'mc_company.v_npwp as npwp',
            'mc_members.member_id as member_id',
            'mc_members.v_name as pic_name',
            'mc_members.v_location'
        )
            ->leftJoin('mc_members', 'mc_company.company_id', '=', 'mc_members.fk_company')
            ->where('mc_members.b_picstatus', 1)
            ->where('mc_members.b_status', 1)
            ->where('mc_company.b_status', 1)
            ->where('mc_company.company_id', $request->company_id)
            ->first();

        $userlog = Mc_Userlog::create([
            'fk_user'       => Auth::user()->user_id,
            'v_activity'    => 'show-company',
            'v_description' => 'Mengakses detail Informasi Perusahaan ' . $request->name,
            'v_createdby'   => Auth::user()->user_id,
        ]);

        return response()->json($companies);
    }

    // FUNC DELETE COMPANY
    public function companyDestroy(Request $request)
    {
        // UPDATE DATA ON MC BOOKING
        $booking = Mc_Company::where('company_id', $request->company_id)->first();

        $booking->update(['b_status' => 0]);

        // INSERT INTO USER LOG
        $userlog = Mc_Userlog::create([
            'fk_user'       => Auth::user()->user_id,
            'v_activity'    => 'delete-company',
            'v_description' => 'Menghapus informasi company ' . $request->name,
            'v_createdby'   => Auth::user()->user_id,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // FUNC SORTING COMPANY
    public function companySorting(Request $request)
    {
        $companies = Mc_Company::select(
            'mc_company.company_id',
            'mc_company.v_code as code',
            'mc_company.v_name as name',
            'mc_company.v_email as email',
            'mc_company.v_phone as phone',
            'mc_company.v_address as address',
            'mc_company.v_city as city',
            'mc_company.v_zipcode as zipCode',
            'mc_company.v_picture as picture',
            'mc_company.v_notes as notes',
            'mc_company.v_npwp as npwp',
            'mc_members.member_id as member_id',
            'mc_members.v_name as pic_name',
            'mc_members.v_location'
        )
            ->leftJoin('mc_members', 'mc_company.company_id', '=', 'mc_members.fk_company')
            ->where('mc_members.b_picstatus', 1)
            ->where('mc_members.b_status', 1)
            ->where('mc_company.b_status', 1)
            ->orderBy('company_id', 'DESC');

        // Add additional conditions based on your variables
        if (!empty($request->filter_location)) {
            $companies->where('mc_members.v_location', '=', $request->filter_location);
        }

        // Execute the query
        $results = $companies->get();

        $booking = [];
        $index     = 1;
        foreach ($results as $item) {

            $action           = '<button id="detail-company" data-id="' . $item->company_id . '" title="Detail Company" class="btn btn-secondary btn-sm show-company me-2"><i class="mdi mdi-eye"></i> View</button>

            <button id="edit-company" data-id="' . $item->company_id . '" title="Edit Company" class="btn btn-primary btn-sm edit-company me-2"><i class="mdi mdi-pencil"></i> Edit</button>
            
            <button id="delete-company" data-id="' . $item->company_id . '" title="Delete Company" class="btn btn-danger btn-sm delete-company text-light"><i class="mdi mdi-delete"></i> Delete</button>';

            $booking[] = [
                'DT_RowIndex'       => $index++, // Add DT_RowIndex as the index plus 1
                'company_id'        => $item->company_id,
                'code'              => $item->code,
                'name'              => $item->name,
                'pic_name'          => $item->pic_name ?? '-',
                'phone'             => $item->phone,
                'action'            => $action,
            ];
        }

        return DataTables::of($booking)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }

    // FUNC MEMBER INDEX
    public function memberIndex(Request $request)
    {
        $location   = Mc_Location::where('b_status', 1)->get();
        $spaces     = Mc_Spaces::where('b_status', 1)->get();
        $companies = Mc_Company::select(
            'mc_company.company_id',
            'mc_company.v_code as code',
            'mc_company.v_name as name',
            'mc_company.v_email as email',
            'mc_company.v_phone as phone',
            'mc_company.v_address as address',
            'mc_company.v_city as city',
            'mc_company.v_zipcode as zipCode',
            'mc_company.v_picture as picture',
            'mc_company.v_notes as notes',
            'mc_company.v_npwp as npwp',
            'mc_members.member_id as member_id',
            'mc_members.v_name as pic_name',
            'mc_members.v_location'
        )
            ->leftJoin('mc_members', 'mc_company.company_id', '=', 'mc_members.fk_company')
            ->where('mc_members.b_picstatus', 1)
            ->where('mc_members.b_status', 1)
            ->where('mc_company.b_status', 1)
            ->orderBy('company_id', 'DESC')
            ->get();

        if ($request->ajax()) {
            $members = Mc_Member::select([
                'mc_members.member_id',
                'mc_members.v_email as email',
                'mc_members.v_name as name',
                'mc_members.v_location as location',
                'mc_members.v_city as city',
                'mc_members.v_spaces as spaces',
                'mc_members.v_phone as phone',
                'mc_members.v_idnumber as idnumber',
                'mc_members.v_address as address',
                'mc_members.i_people as people',
                'mc_members.dt_start as date_start',
                'mc_members.dt_end as date_end',
                'mc_members.v_room as room',
                'mc_members.b_picstatus as pic_status',
                'mc_members.b_agreement as agreement',
                'mc_members.b_houserules as house_rules',
                'b.company_id as company_id',
                'b.v_name as company_name',
            ])
                ->leftJoin('mc_company as b', 'mc_members.fk_company', '=', 'b.company_id')
                ->where('mc_members.b_status', 1)
                ->where('mc_members.b_membershipstatus', 1)
                ->orderBy('mc_members.member_id')
                ->orderByDesc('pic_status')
                ->get();

            return DataTables::of($members)
                ->addIndexColumn()
                ->editColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->editColumn('company_name', function ($item) {
                    return ucfirst($item->company_name);
                })
                ->addColumn('location', function ($item) {
                    $location = Mc_Location::where('v_code', $item->location)->first();
                    return ucfirst($location->v_name);
                })
                ->addColumn('spaces', function ($item) {
                    $spaces = Mc_Spaces::where('v_code', $item->spaces)->first();
                    return ucfirst($spaces->v_name);
                })
                ->addColumn('pic_status', function ($item) {
                    if ($item->pic_status == 1) {
                        $status = "<i class='mdi mdi-account-check btn-md' style='color:green; font-size:20px;'></i>";
                    } else {
                        $status = "<i class='mdi mdi-account-off icon-danger' style='color:red; font-size:20px;'></i>";
                    }


                    return $status;
                })
                ->addColumn('room', function ($item) {
                    return $item->room;
                })
                ->addColumn('status', function ($item) {
                    // function dateDifference($date_1, $date_2, $differenceFormat = '%a')
                    // {
                    //     $datetime1 = new DateTime($date_1);
                    //     $datetime2 = new DateTime($date_2);

                    //     $interval = date_diff($datetime1, $datetime2);

                    //     return $interval->format($differenceFormat);
                    // }

                    // switch (true) {
                    //     case ($item->date_end < date("Y-m-d")):
                    //         $status = "Dormant";
                    //         break;
                    //     case ((dateDifference($item->date_end, date("Y-m-d"), "%a") >= 0) && (dateDifference($item->date_end, date("Y-m-d"), "%a") <= 14)):
                    //         $status = "Renewal";
                    //         break;
                    //     case ($item->date_end >= date("Y-m-d")):
                    //         $status = "Aktif";
                    //         break;
                    //     default:
                    //         $status = "Unknown";
                    //         break;
                    // }

                    // GET STATUS MEMBER
                    $datetime1 = new DateTime($item->date_end);
                    $datetime2 = new DateTime(date("Y-m-d"));
                    $interval = $datetime1->diff($datetime2);

                    // CONDITION DEPENDS ON STATUS MEMBER

                    if ($item->date_end < date("Y-m-d")) {
                        $status = '<div class="badge bg-danger">Dormant</div>';;
                    } elseif ($interval->days <= 14) {
                        $status = '<div class="badge bg-warning">Renewal</div>';
                    } else {
                        $status = ($item->date_end >= date("Y-m-d")) ? '<div class="badge bg-success">Aktif</div>' : "Unknown";
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {

                    // GET STATUS MEMBER
                    $datetime1 = new DateTime($item->date_end);
                    $datetime2 = new DateTime(date("Y-m-d"));
                    $interval = $datetime1->diff($datetime2);

                    if (
                        $item->date_end < date("Y-m-d")
                    ) {
                        $status = "Dormant";
                    } elseif ($interval->days <= 14) {
                        $status = "Renewal";
                    } else {
                        $status = ($item->date_end >= date("Y-m-d")) ? "Aktif" : "Unknown";
                    }

                    // DEFINE BUTTON
                    $btn = '<button id="detail-company" data-id="' . $item->member_id . '" title="Detail Company" class="btn btn-secondary btn-sm show-company me-2 m-1"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-company" data-id="' . $item->member_id . '" title="Edit Company" class="btn btn-primary btn-sm edit-company me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>';

                    // ADDED BUTTON DEPENDS ON STATUS
                    if ($status == "Dormant" && $item->pic_status == 1) {

                        $btn = $btn . '<button id="edit-company" data-id="' . $item->member_id . '" title="Edit Company" class="btn btn-warning btn-sm edit-company me-2 m-1"><i class="mdi mdi-cash"></i> Renewal</button>';
                    } else if ($status == "Aktif" && $item->pic_status == 1) {

                        $btn = $btn . '<button id="edit-company" data-id="' . $item->member_id . '" title="Edit Company" class="btn btn-success btn-sm edit-company me-2 m-1"><i class="mdi mdi-cash"></i> Subs</button>';
                    }

                    $btn = $btn . '<button id="delete-company" data-id="' . $item->member_id . '" title="Delete Company" class="btn btn-danger btn-sm delete-company m-1 text-light"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['status', 'pic_status', 'action'])
                ->make(true);
        }

        return view('backoffice.registrasi.member', compact('location', 'spaces', 'companies'));
    }

    // FUNC MEMBER CREATE OR UPDATE
    public function memberStore(Request $request)
    {
    }

    // FUNC EDIT MEMBER
    public function memberEdit(Request $request)
    {
        $result = Mc_Member::select(
            'mc_members.member_id',
            'mc_members.v_email as email',
            'mc_members.v_email2 as email2',
            'mc_members.v_name as name',
            'mc_members.v_location as location',
            'mc_members.v_city as city',
            'mc_members.v_spaces as spaces',
            'mc_members.v_phone as phone',
            'mc_members.v_idnumber as idnumber',
            'mc_members.v_address as address',
            'mc_members.i_people as people',
            'mc_members.dt_start as date_start',
            'mc_members.dt_end as date_end',
            'mc_members.v_room as room',
            'mc_members.b_picstatus as pic_status',
            'mc_members.b_agreement as agreement',
            'mc_members.b_houserules as house_rules',
            'mc_company.company_id',
            'mc_company.v_name as company_name'
        )
            ->leftJoin('mc_company', 'mc_members.fk_company', '=', 'mc_company.company_id')
            ->where('mc_members.member_id', '=', $request->member_id)
            ->where('mc_members.b_membershipstatus', '=', 1)
            ->first();

        return response()->json($result);
    }

    // FUNC DELETE MEMBER
    public function memberDestroy(Request $request)
    {
    }

    // FUNC SORTING MEMBER
    public function memberSorting(Request $request)
    {
    }

    // FUNC MEMBER INDEX
    public function non_memberIndex(Request $request)
    {
        $location   = Mc_Location::where('b_status', 1)->get();
        $spaces     = Mc_Spaces::where('b_status', 1)->get();
        $companies = Mc_Company::select(
            'mc_company.company_id',
            'mc_company.v_code as code',
            'mc_company.v_name as name',
            'mc_company.v_email as email',
            'mc_company.v_phone as phone',
            'mc_company.v_address as address',
            'mc_company.v_city as city',
            'mc_company.v_zipcode as zipCode',
            'mc_company.v_picture as picture',
            'mc_company.v_notes as notes',
            'mc_company.v_npwp as npwp',
            'mc_members.member_id as member_id',
            'mc_members.v_name as pic_name',
            'mc_members.v_location'
        )
            ->leftJoin('mc_members', 'mc_company.company_id', '=', 'mc_members.fk_company')
            ->where('mc_members.b_picstatus', 1)
            ->where('mc_members.b_status', 1)
            ->where('mc_company.b_status', 1)
            ->orderBy('company_id', 'DESC')
            ->get();

        if ($request->ajax()) {
            $members = Mc_Member::select([
                'mc_members.member_id',
                'mc_members.v_email as email',
                'mc_members.v_name as name',
                'mc_members.v_location as location',
                'mc_members.v_city as city',
                'mc_members.v_spaces as spaces',
                'mc_members.v_phone as phone',
                'mc_members.v_idnumber as idnumber',
                'mc_members.v_address as address',
                'mc_members.i_people as people',
                'mc_members.dt_start as date_start',
                'mc_members.dt_end as date_end',
                'mc_members.v_room as room',
                'mc_members.b_picstatus as pic_status',
                'mc_members.b_agreement as agreement',
                'mc_members.b_houserules as house_rules',
                'b.company_id as company_id',
                'b.v_name as company_name',
            ])
                ->leftJoin('mc_company as b', 'mc_members.fk_company', '=', 'b.company_id')
                ->where('mc_members.b_status', 1)
                ->where('mc_members.b_membershipstatus', 2)
                ->orderByDesc('mc_members.member_id')
                ->get();

            return DataTables::of($members)
                ->addIndexColumn()
                ->editColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->addColumn('location', function ($item) {
                    $location = Mc_Location::where('v_code', $item->location)->first();
                    return ucfirst($location->v_name);
                })
                ->addColumn('spaces', function ($item) {
                    $spaces = Mc_Spaces::where('v_code', $item->spaces)->first();
                    return ucfirst($spaces->v_name);
                })
                ->addColumn('action', function ($item) {

                    // DEFINE BUTTON
                    $btn = '<button id="detail-nonmember" data-id="' . $item->member_id . '" title="Detail Non Member" class="btn btn-secondary btn-sm show-nonmember me-2 m-1"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-nonmember" data-id="' . $item->member_id . '" title="Edit Non Member" class="btn btn-primary btn-sm edit-nonmember me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>';

                    $btn = $btn . '<button id="delete-nonmember" data-id="' . $item->member_id . '" title="Delete Non Member" class="btn btn-danger btn-sm delete-nonmember m-1 text-light"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['status', 'pic_status', 'action'])
                ->make(true);
        }

        return view('backoffice.registrasi.non-member', compact('location', 'spaces', 'companies'));
    }

    // FUNC MEMBER CREATE OR UPDATE
    public function non_memberStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'phone'         => 'required',
            'email'         => 'required',
            'spaces'        => 'required',
            'location'      => 'required',
            'city'          => 'required',
            'date_start'    => 'required',
        ], [
            'name.required'         => 'Nama Perusahaan harus di isi!',
            'phone.required'        => 'No Telepon harus di isi!',
            'email.required'        => 'Email harus di isi!',
            'spaces.required'       => 'Jenis Ruangan harus di isi!',
            'location.required'     => 'Lokasi harus di isi!',
            'city.required'         => 'Kota harus di isi!',
            'date_start.required'   => 'Tanggal Mulai harus di isi!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Member data
        $memberData = [
            'v_name'                => $request->name,
            'v_email'               => $request->email,
            'v_email2'              => null,
            'v_phone'               => $request->phone,
            'v_location'            => $request->location,
            'v_spaces'              => $request->spaces,
            'v_people'              => $request->people ?? null,
            'v_idnumber'            => $request->idnumber ?? null,
            'v_address'             => $request->address ?? null,
            'v_city'                => $request->city,
            'v_zipcode'             => $request->zipcode ?? null,
            'dt_birthdate'          => $request->birthdate ?? null,
            'v_picture'             => $request->picture ?? null,
            'b_membershipstatus'    => 2,
            'v_accesscard'          => $request->accesscard ?? null,
            'dt_start'              => $request->date_start,
            'v_updatedby'           => Auth::user()->user_id,
            'v_deletedby'           => 0,
        ];

        // Update or create member
        $member = Mc_Member::updateOrCreate(
            ['member_id' => $request->member_id, 'b_status' => 1],
            $memberData
        );

        // CHECK MEMBER ID IF NULL THAT WAS CREATE AND OTHERWISE
        if ($request->member_id) {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'edit-non-member',
                'v_description' => 'Memperbaharui Informasi Non Member ' . $request->name,
                'v_createdby'   => Auth::user()->user_id,
            ]);
        } else {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'add-non-member',
                'v_description' => 'Menambahkan Informasi Non Member ' . $request->name,
                'v_createdby'   => Auth::user()->user_id,
            ]);
        }

        //return response
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // FUNC EDIT MEMBER
    public function non_memberEdit(Request $request)
    {
        $result = Mc_Member::select(
            'mc_members.member_id',
            'mc_members.v_email as email',
            'mc_members.v_email2 as email2',
            'mc_members.v_name as name',
            'mc_members.v_location as location',
            'mc_members.v_city as city',
            'mc_members.v_spaces as spaces',
            'mc_members.v_phone as phone',
            'mc_members.v_idnumber as idnumber',
            'mc_members.v_address as address',
            'mc_members.i_people as people',
            'mc_members.dt_start as date_start',
            'mc_members.dt_end as date_end',
            'mc_members.v_room as room',
            'mc_members.b_picstatus as pic_status',
            'mc_members.b_agreement as agreement',
            'mc_members.b_houserules as house_rules',
            'mc_company.company_id',
            'mc_company.v_name as company_name'
        )
            ->leftJoin('mc_company', 'mc_members.fk_company', '=', 'mc_company.company_id')
            ->where('mc_members.member_id', '=', $request->member_id)
            ->where('mc_members.b_membershipstatus', '=', 2)
            ->first();

        return response()->json($result);
    }

    // FUNC DELETE MEMBER
    public function non_memberDestroy(Request $request)
    {
        // UPDATE DATA ON MC BOOKING
        $member = Mc_Member::where('member_id', $request->member_id)->first();

        $member->update(['b_status' => 0]);

        // INSERT INTO USER LOG
        $userlog = Mc_Userlog::create([
            'fk_user'       => Auth::user()->user_id,
            'v_activity'    => 'delete-non-member',
            'v_description' => 'Menghapus informasi Non-Member ' . $request->member_id,
            'v_createdby'   => Auth::user()->user_id,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // FUNC SORTING MEMBER
    public function non_memberSorting(Request $request)
    {
        $members = Mc_Member::select([
            'mc_members.member_id',
            'mc_members.v_email as email',
            'mc_members.v_name as name',
            'mc_members.v_location as location',
            'mc_members.v_city as city',
            'mc_members.v_spaces as spaces',
            'mc_members.v_phone as phone',
            'mc_members.v_idnumber as idnumber',
            'mc_members.v_address as address',
            'mc_members.i_people as people',
            'mc_members.dt_start as date_start',
            'mc_members.dt_end as date_end',
            'mc_members.v_room as room',
            'mc_members.b_picstatus as pic_status',
            'mc_members.b_agreement as agreement',
            'mc_members.b_houserules as house_rules',
            'b.company_id as company_id',
            'b.v_name as company_name',
        ])
            ->leftJoin('mc_company as b', 'mc_members.fk_company', '=', 'b.company_id')
            ->where('mc_members.b_status', 1)
            ->where('mc_members.b_membershipstatus', 2)
            ->orderByDesc('mc_members.member_id');

        // Add additional conditions based on your variables
        if (!empty($request->filter_location)) {
            $members->where('mc_members.v_location', '=', $request->filter_location);
        }

        if (!empty($request->filter_spaces)) {
            $members->where('mc_members.v_spaces', '=', $request->filter_spaces);
        }

        // Execute the query
        $results = $members->get();

        $member = [];
        $index     = 1;
        foreach ($results as $item) {

            $location = Mc_Location::where('v_code', $item->location)->first();
            $spaces = Mc_Spaces::where('v_code', $item->spaces)->first();

            $action           = '<button id="detail-nonmember" data-id="' . $item->member_id . '" title="Detail Non Member" class="btn btn-secondary btn-sm show-nonmember me-2 m-1"><i class="mdi mdi-eye"></i> View</button>

            <button id="edit-nonmember" data-id="' . $item->member_id . '" title="Edit Non Member" class="btn btn-primary btn-sm edit-nonmember me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>
            
            <button id="delete-nonmember" data-id="' . $item->member_id . '" title="Delete Non Member" class="btn btn-danger btn-sm delete-nonmember m-1 text-light"><i class="mdi mdi-delete"></i> Delete</button>';

            $member[] = [
                'DT_RowIndex'       => $index++, // Add DT_RowIndex as the index plus 1
                'company_id'        => $item->company_id,
                'name'              => $item->name,
                'location'          => $location->v_name,
                'spaces'            => $spaces->v_name,
                'action'            => $action,
            ];
        }

        return DataTables::of($member)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }
}
