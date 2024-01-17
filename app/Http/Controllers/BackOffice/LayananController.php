<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Mc_Booking;
use App\Models\Mc_Location;
use App\Models\Mc_Spaces;
use App\Models\Mc_Userlog;
use App\Models\SysCodeSetting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LayananController extends Controller
{
    // BOOKING DATA INDEX
    public function bookingLayananIndex(Request $request)
    {
        $location   = Mc_Location::where('b_status', 1)->get();
        $spaces     = Mc_Spaces::where('b_status', 1)->get();

        if ($request->ajax()) {
            $bookings = Mc_Booking::with(['location', 'space'])
                ->select([
                    'mc_bookings.booking_id',
                    'mc_bookings.v_city as city',
                    'mc_bookings.v_location',
                    'mc_bookings.v_spaces',
                    'mc_bookings.v_people as people',
                    'mc_bookings.dt_start as date_start',
                    'mc_bookings.v_name as name',
                    'mc_bookings.b_leadstatus as lead_status',
                    'mc_bookings.b_membershipstatus as membership_status',
                    'mc_members.fk_booking as fk_booking',
                    'mc_members.b_status as status',
                    'mc_bookings.created_at as date_created',
                ])
                ->leftJoin('mc_members', function ($join) {
                    $join->on('mc_bookings.booking_id', '=', 'mc_members.fk_booking')
                        ->where('mc_members.b_status', '=', 1)
                        ->where('mc_members.b_picstatus', '=', 1);
                })
                ->where('mc_bookings.b_status', '=', 1)
                ->whereNotIn('mc_bookings.booking_id', function ($query) {
                    $query->select('fk_booking')
                        ->from('mc_members')
                        ->where('b_status', '=', 1)
                        ->groupBy('fk_booking');
                })
                ->orderByDesc('mc_bookings.booking_id')
                ->orderByDesc('mc_bookings.created_at')
                ->orderBy('mc_bookings.b_leadstatus')
                ->get();

            return DataTables::of($bookings)
                ->addIndexColumn()
                ->addColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->addColumn('location', function ($item) {
                    return $item->location->v_name ?? '-';
                })
                ->addColumn('spaces', function ($item) {
                    return $item->space->v_name ?? '-';
                })
                ->addColumn('date_created', function ($item) {
                    return $item->date_created;
                })
                ->addColumn('date_start', function ($item) {
                    return $item->date_start;
                })
                ->addColumn('lead_status', function ($item) {
                    if ($item->lead_status == 0) {
                        $status = '<div class="badge" style="background-color:#495867;">Booking</div>';
                    } elseif ($item->lead_status == 1) {
                        $status = '<div class="badge" style="background-color:#F27441;">Follow Up</div>';
                    } elseif ($item->lead_status == 2) {
                        $status = '<div class="badge" style="background-color:#C2A04F;">Invoice</div>';
                    } elseif ($item->lead_status == 3) {
                        $status = '<div class="badge bg-danger">Cancel</div>';
                    } elseif ($item->lead_status == 4) {
                        $status = '<div class="badge bg-info">Deal</div>';
                    } elseif ($item->lead_status == 5) {
                        $status = '<div class="badge" style="background-color:#49A462;">Paid</div>';
                    } elseif ($item->lead_status == 6) {
                        $status = '<div class="badge bg-light">Agreement</div>';
                    } else {
                        $status = '<div class="badge bg-light">House Rules</div>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button id="detail-booking" data-id="' . $item->booking_id . '" title="Detail Booking" class="btn btn-secondary btn-sm show-booking me-2"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-booking" data-id="' . $item->booking_id . '" title="Edit Booking" class="btn btn-primary btn-sm edit-booking me-2"><i class="mdi mdi-pencil"></i> Edit</button>';

                    $btn = $btn . '<button id="delete-booking" data-id="' . $item->booking_id . '" title="Delete Booking" class="btn btn-danger btn-sm delete-booking text-light"><i class="mdi mdi-delete"></i> Delete</button>';

                    // $btn = '<button id="detail-booking" data-id="' . $item->id . '" title="Detail Booking" class="btn btn-sm detail-booking me-2"  style="background-color:#DBDCEE;"><i class="mdi mdi-eye"></i> View</button>';

                    // $btn = $btn . '<button id="edit-booking" data-id="' . $item->id . '" title="Edit Booking" class="btn btn-sm edit-booking me-2"  style="background-color:#B5B9DC;"><i class="mdi mdi-pencil"></i> Edit</button>';

                    // $btn = $btn . '<button id="delete-booking" data-id="' . $item->id . '" title="Delete Booking" class="btn btn-sm delete-booking text-light" style="background-color:#828BC4;"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['lead_status', 'action'])
                ->make(true);
        }
        return view('backoffice.layanan.booking-layanan', compact('location', 'spaces'));
    }

    // BOOKING DATA UPDATE OR STORE
    public function bookingStore(Request $request)
    {
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'company_name'          => 'required',
            'phone'                 => 'required',
            'email'                 => 'required',
            'occupation'            => 'required',
            'date_start'            => 'required',
            'date_tour'             => 'required',
            'preference'            => 'required',
            'location'              => 'required',
            'spaces'                => 'required',
            'people'                => 'required',
            'city'                  => 'required',
            'membership_status'     => 'required',
            'lead_status'           => 'required',
        ], [
            'name.required'                 => 'Nama harus di isi!',
            'company_name.required'         => 'Nama Perusahaan harus di isi!',
            'phone.required'                => 'No Telepon harus di isi!',
            'email.required'                => 'Email harus di isi!',
            'occupation.required'           => 'Pekerjaan harus di isi!',
            'date_start.required'           => 'Tanggal Mulai harus di isi!',
            'date_tour.required'            => 'Tanggal Tour harus di isi!',
            'preference.required'           => 'Preferensi harus di isi!',
            'location.required'             => 'Lokasi harus di isi!',
            'spaces.required'               => 'Spaces harus di isi!',
            'people.required'               => 'People harus di isi!',
            'city.required'                 => 'Kota harus di isi!',
            'membership_status.required'    => 'Membership Status harus di isi!',
            'lead_status.required'          => 'Status harus di isi!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // GET SYSTEM SETTING FOR UNIQUR CODE EACH TABLE
        $sys = SysCodeSetting::where('v_table', 'mc_booking')->first();

        // GET LAST ID
        $lastBooking = Mc_Booking::latest()->first();
        $lastId = ($lastBooking) ? $lastBooking->booking_id : 0;

        // Increment the last ID to get a new ID
        $newId = $lastId + 1;

        // Format Code
        $bookingCode = $sys->v_code . $sys->v_separator . date($sys->v_dateformat) . $sys->v_separator . sprintf("%0{$sys->i_digit}d", $newId);
        // $sys->update(['i_count' => $sys->i_count + 1]);

        // INSERT INTO MC_BOOKING TABLE
        $booking = Mc_Booking::updateOrCreate([
            'booking_id'            => $request->booking_id,
        ], [
            'v_code'                => $bookingCode,
            'v_city'                => $request->city,
            'v_occupation'          => $request->occupation,
            'v_preference'          => $request->preference,
            'v_location'            => $request->location,
            'v_spaces'              => $request->spaces,
            'v_people'              => $request->people,
            'dt_start'              => $request->date_start,
            'dt_tour'               => $request->date_tour,
            'v_name'                => $request->name,
            'v_companyname'         => $request->company_name,
            'v_email'               => $request->email,
            'v_phone'               => $request->phone,
            'v_notesleadbooking'    => $request->notes_lead_booking === null ? '-' : $request->notes_lead_booking,
            'b_leadstatus'          => $request->lead_status,
            'v_notesleadstatus'     => $request->notes_lead_status === null ? '-' : $request->notes_lead_status,
            'b_membershipstatus'    => $request->membership_status,
            'v_createdby'           => Auth::user()->user_id,
        ]);

        // INSERT INTO INVOICE
        

        // CHECK BOOKING_ID IF NULL THAT WAS CREATE AND OTHERWISE
        if($request->booking_id){
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'edit-booking',
                'v_description' => 'Memperbaharui Informasi Booking ' . $request->name,
                'v_createdby'   => Auth::user()->user_id,
            ]);

        }else{
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'add-booking',
                'v_description' => 'Menambahkan Informasi Booking ' . $request->name,
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

    // BOOKING DATA EDIT 
    public function bookingEdit(Request $request)
    {
        $booking = Mc_Booking::select([
            'booking_id as id',
            'v_city as city',
            'v_occupation as occupation',
            'v_preference as preference',
            'v_location as location',
            'v_spaces as spaces',
            'v_people as people',
            'dt_start as date_start',
            'dt_tour as date_tour',
            'v_name as name',
            'v_companyname as company_name',
            'v_email as email',
            'v_phone as phone',
            'v_notesleadbooking as notes_lead_booking',
            'v_notesleadstatus as notes_lead_status',
            'b_leadstatus as lead_status',
            'b_membershipstatus as membership_status',
        ])->where('booking_id', $request->booking_id)->first();

        return response()->json($booking);
    }

    // BOOKING DELETE
    public function bookingDestroy(Request $request)
    {
        // UPDATE DATA ON MC BOOKING
        $booking = Mc_Booking::where('booking_id', $request->booking_id)->first();

        $booking->update(['b_status' => 0]);

        // UPDATE DATA ON MC INVOICE
        // if ($bookingData["leadstatus"] == 2) {
        //     // Update to Invoice Table
        //     $query = "	UPDATE mc_invoice a SET
        // 				a.b_status = 0,
        // 				a.dt_deleted = now(),
        // 				a.v_deletedby = :userLogin
        // 			WHERE 
        // 				a.fk_booking = :delete_id
        // 			AND
        // 				a.b_ispaid = 0";
        //     $stmt = $conn->prepare($query);
        //     $stmt->bindParam(":delete_id", $delete_id);
        //     $stmt->bindParam(":userLogin", $userLogin);
        //     $stmt->execute();
        // }

        // INSERT INTO USER LOG
        $userlog = Mc_Userlog::create([
            'fk_user'       => Auth::user()->user_id,
            'v_activity'    => 'delete-booking',
            'v_description' => 'Menghapus informasi booking ' . $request->name,
            'v_createdby'   => Auth::user()->user_id,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // BOOKING DATA FILTER
    public function sortingBooking(Request $request)
    {
        $bookings = Mc_Booking::with(['location', 'space'])
            ->select([
                'mc_bookings.booking_id',
                'mc_bookings.v_city as city',
                'mc_bookings.v_location',
                'mc_bookings.v_spaces',
                'mc_bookings.v_people as people',
                'mc_bookings.dt_start as date_start',
                'mc_bookings.v_name as name',
                'mc_bookings.b_leadstatus as lead_status',
                'mc_bookings.b_membershipstatus as membership_status',
                'mc_members.fk_booking as fk_booking',
                'mc_members.b_status as status',
                'mc_bookings.created_at as date_created',
            ])
            ->leftJoin('mc_members', function ($join) {
                $join->on('mc_bookings.booking_id', '=', 'mc_members.fk_booking')
                    ->where('mc_members.b_status', '=', 1)
                    ->where('mc_members.b_picstatus', '=', 1);
            })
            ->where('mc_bookings.b_status', '=', 1)
            ->whereNotIn('mc_bookings.booking_id', function ($query) {
                $query->select('fk_booking')
                    ->from('mc_members')
                    ->where('b_status', '=', 1)
                    ->groupBy('fk_booking');
            });

        // Add additional conditions based on your variables
        if (!empty($request->filter_location)) {
            $bookings->where('mc_bookings.v_location', '=', $request->filter_location);
        }

        if (!empty($request->filter_spaces)) {
            $bookings->where('mc_bookings.v_spaces', '=', $request->filter_spaces);
        }

        if (!empty($request->startDate) && !empty($request->endDate)) {
            $bookings->whereBetween('mc_bookings.created_at', [$request->startDate, $request->endDate]);
        }

        // Add the order by clauses
        $bookings->orderByDesc('mc_bookings.booking_id')
            ->orderByDesc('mc_bookings.created_at')
            ->orderBy('mc_bookings.b_leadstatus');

        // Execute the query
        $results = $bookings->get();

        $booking = [];
        $index     = 1;
        foreach ($results as $item) {

            if ($item->lead_status == 0) {
                $status = '<div class="badge" style="background-color:#495867;">Booking</div>';
            } elseif ($item->lead_status == 1) {
                $status = '<div class="badge" style="background-color:#F27441;">Follow Up</div>';
            } elseif ($item->lead_status == 2) {
                $status = '<div class="badge" style="background-color:#C2A04F;">Invoice</div>';
            } elseif ($item->lead_status == 3) {
                $status = '<div class="badge bg-danger">Cancel</div>';
            } elseif ($item->lead_status == 4) {
                $status = '<div class="badge bg-info">Deal</div>';
            } elseif ($item->lead_status == 5) {
                $status = '<div class="badge" style="background-color:#49A462;">Paid</div>';
            } elseif ($item->lead_status == 6) {
                $status = '<div class="badge bg-light">Agreement</div>';
            } else {
                $status = '<div class="badge bg-light">House Rules</div>';
            }

            $action           = '<button id="detail-booking" data-id="' . $item->booking_id . '" title="Detail Booking" class="btn btn-secondary btn-sm show-booking me-2"><i class="mdi mdi-eye"></i> View</button>

            <button id="edit-booking" data-id="' . $item->booking_id . '" title="Edit Booking" class="btn btn-primary btn-sm edit-booking me-2"><i class="mdi mdi-pencil"></i> Edit</button>
            
            <button id="delete-booking" data-id="' . $item->booking_id . '" title="Delete Booking" class="btn btn-danger btn-sm delete-booking text-light"><i class="mdi mdi-delete"></i> Delete</button>';

            $booking[] = [
                'DT_RowIndex'       => $index++, // Add DT_RowIndex as the index plus 1
                'booking_id'        => $item->booking_id,
                'name'              => $item->name,
                'location'          => $item->location->v_name ?? '-',
                'spaces'            => $item->space->v_name ?? '-',
                'date_created'      => $item->date_created,
                'date_start'        => $item->date_start,
                'lead_status'       => $status,
                'action'            => $action,
            ];
        }

        return DataTables::of($booking)
            ->rawColumns(['lead_status', 'action']) // Specify the columns containing HTML
            ->toJson();
    }
}
