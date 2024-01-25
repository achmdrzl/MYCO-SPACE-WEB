<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Mc_Company;
use App\Models\Mc_Location;
use App\Models\Mc_Member;
use App\Models\Mc_Quota;
use App\Models\Mc_Userlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SettingsController extends Controller
{
    // QUOTA MEMBER DATA INDEX
    public function quotaMemberIndex(Request $request)
    {
        $location   = Mc_Location::where('b_status', 1)->get();

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
            $query = Mc_Quota::select(
                'mc_quotas.fk_company',
                'mc_company.v_name'
            )
                ->join('mc_company', 'mc_quotas.fk_company', '=', 'mc_company.company_id')
                ->where('mc_quotas.b_status', '=', 1)
                ->groupBy('mc_quotas.fk_company', 'mc_company.v_name') // Include mc_company.v_name in GROUP BY
                ->get();


            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('company_name', function ($item) {
                    return ucfirst($item->v_name);
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button id="detail-quota" data-id="' . $item->fk_company . '" title="Detail Quota" class="btn btn-secondary btn-sm show-quota me-2 m-1"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-quota" data-id="' . $item->fk_company . '" title="Edit Quota" class="btn btn-primary btn-sm edit-quota me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>';

                    $btn = $btn . '<button id="delete-quota" data-id="' . $item->fk_company . '" title="Delete Quota" class="btn btn-danger btn-sm delete-quota text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backoffice.settings.quota-member', compact('companies', 'location'));
    }

    // QUOTA MEMBER FASILITAS DATA UPDATE OR STORE
    public function quotaMemberStore(Request $request)
    {
        // dd($request->all());    
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'company_id'    => 'required',
            'member_id'     => 'required',
            'v_location'    => 'required',
            'i_quota.*'     => 'required'
        ], [
            'overtime_date.required' => 'Overtime Date harus di isi!',
            'v_location.required'    => 'Location harus di isi!',
            'member_id.required'     => 'Nama Member harus di isi!',
            'company_id.required'    => 'Nama Perusahaan harus di isi!',
            'i_quota.*.required'     => 'Kuota harus di isi!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // INSERT INTO QUOTA MEMBER TABLE
        foreach ($request->i_quota as $index => $quotaValue) {
            $data = [
                // 'member_id'     => $request->member_id,
                // 'v_location'    => $request->v_location,
                'fk_company'    => $request->company[$index],
                'fk_spaces'     => $request->fkSpaces[$index],
                'i_quota'       => $quotaValue,
                'v_createdby'   => Auth::user()->user_id,
                'v_updatedby'   => Auth::user()->user_id,
                'v_deletedby'   => 0,
                // Add other fields here as needed
            ];

            // Use updateOrCreate to update or create the record
            Mc_Quota::updateOrCreate(
                [
                    'fk_company' => $data['fk_company'],
                    'fk_spaces'  => $data['fk_spaces']
                    // Add other unique identifiers here
                ],
                $data
            );
        }

        // CHECK QUOTA MEMBER ID IF NULL THAT WAS CREATE AND OTHERWISE
        if ($request->company_id) {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'edit-quota-member',
                'v_description' => 'Memperbaharui Informasi Quota Member ' . $request->name,
                'v_createdby'   => Auth::user()->user_id,
            ]);
        } else {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'add-quota-member',
                'v_description' => 'Menambahkan Informasi Quota Member ' . $request->name,
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

    // QUOTA MEMBER FASILITAS DATA EDIT 
    public function quotaMemberEdit(Request $request)
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
            ->orderBy('company_id', 'DESC')
            ->where('mc_company.company_id', $request->company_id)
            ->first();

        // Check if Data Exists
        $memberQuotaDetail = Mc_Quota::select(
            'mc_quotas.quota_id',
            'mc_quotas.fk_company as company',
            'mc_quotas.fk_spaces as fkSpaces',
            'mc_quotas.i_quota as quota'
        )
        ->where('mc_quotas.b_status', 1)
        ->where('mc_quotas.fk_company', $request->company_id)
        ->get();

        $memberQuotaCompany = Mc_Company::select(
            'mc_company.company_id',
            'mc_company.v_name'
        )
        ->where('mc_company.b_status', 1)
        ->where('company_id', $request->company_id)
        ->first();

        $returnData["member_quota_company"] = $memberQuotaCompany;

        $memberQuotaPic = Mc_Member::select(
            'mc_members.member_id',
            'mc_members.v_name as name',
            'mc_members.v_location as location'
        )
        ->where('mc_members.b_status', 1)
        ->where('mc_members.b_picstatus', 1)
        ->where('mc_members.fk_company', $request->company_id)
        ->first();

        // Assume $titles is an array with corresponding titles
        $titles = [
            'Meeting Room | Hourly (jam)',
            'Print/Scan/Copy Color (10 pcs)',
            // Add more titles if needed
        ];

        foreach ($memberQuotaDetail as $index => &$item) {
            // Assign the title based on the index
            $item['title'] = isset($titles[$index]) ? $titles[$index] : 'Default Title';
        }

        $returnData["member_quota_detail"] = $memberQuotaDetail;

        $returnData["member_quota_pic"] = $memberQuotaPic;

        return response()->json([
            'companies' => $companies,
            'data'      => $returnData,
        ]);
    }

    // QUOTA MEMBER FASILITAS DELETE
    public function quotaMemberDestroy(Request $request)
    {
        // UPDATE DATA ON MC QUOTA
        Mc_Quota::where('fk_company', $request->company_id)->update(['b_status' => 0]);

        // INSERT INTO USER LOG
        $userlog = Mc_Userlog::create([
            'fk_user'       => Auth::user()->user_id,
            'v_activity'    => 'delete-quota',
            'v_description' => 'Menghapus informasi quota ' . $request->company_id,
            'v_createdby'   => Auth::user()->user_id,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // QUOTA MEMBER FASILITAS DATA FILTER
    public function quotaMemberSorting(Request $request)
    {
    }
}
