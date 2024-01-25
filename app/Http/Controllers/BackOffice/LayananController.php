<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Mc_Booking;
use App\Models\Mc_Company;
use App\Models\Mc_Invoice;
use App\Models\Mc_InvoiceDetail;
use App\Models\Mc_Location;
use App\Models\Mc_Member;
use App\Models\Mc_Overtime;
use App\Models\Mc_Pricing;
use App\Models\Mc_Quota;
use App\Models\Mc_Spaces;
use App\Models\Mc_Userlog;
use App\Models\SysCodeSetting;
use Carbon\Carbon;
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

                    $btn = '<button id="detail-booking" data-id="' . $item->booking_id . '" title="Detail Booking" class="btn btn-secondary btn-sm show-booking me-2 m-2"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-booking" data-id="' . $item->booking_id . '" title="Edit Booking" class="btn btn-primary btn-sm edit-booking me-2 m-2"><i class="mdi mdi-pencil"></i> Edit</button>';

                    $btn = $btn . '<button id="delete-booking" data-id="' . $item->booking_id . '" title="Delete Booking" class="btn btn-danger btn-sm delete-booking text-light m-2"><i class="mdi mdi-delete"></i> Delete</button>';

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
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'company_name'          => 'required',
            'phone'                 => 'required',
            'email'                 => 'required',
            'occupation'            => 'required',
            'date_start'            => 'required',
            // 'date_tour'             => 'required',
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
            // 'date_tour.required'            => 'Tanggal Tour harus di isi!',
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

        // GET LAST ID TO CREATE CODE
        $lastBooking    = Mc_Booking::latest()->first();
        $lastB          = ($lastBooking) ? $lastBooking->booking_id : 0;

        $lastMember     = Mc_Member::latest()->first();
        $lastM          = ($lastMember) ? $lastMember->member_id : 0;

        $lastInvoice    = Mc_Invoice::latest()->first();
        $lastI          = ($lastInvoice) ? $lastInvoice->invoice_id : 0;

        // Increment the last ID to get a new ID
        $newB       = $lastB + 1;
        $newM       = $lastM + 1;
        $newI       = $lastI + 1;

        // GET SYSTEM SETTING FOR UNIQUR CODE EACH TABLE
        // FORMAT CODE FOR BOOKING
        $sysB = SysCodeSetting::where('v_table', 'mc_booking')->first();
        $bookingCode    = $sysB->v_code . $sysB->v_separator . date($sysB->v_dateformat) . $sysB->v_separator . sprintf("%0{$sysB->i_digit}d", $newB);
        $sysB->update(['i_count' => $sysB->i_count + 1]);

        // FORMAT CODE FOR MEMBER
        $sysM = SysCodeSetting::where('v_table', 'mc_member')->first();
        $memberCode     = $sysM->v_code . $sysM->v_separator . date($sysM->v_dateformat) . $sysM->v_separator . sprintf("%0{$sysM->i_digit}d", $newM);
        $sysM->update(['i_count' => $sysM->i_count + 1]);

        // FORMAT CODE FOR INVOICE
        $sysI = SysCodeSetting::where('v_table', 'mc_invoice')->first();
        $invoiceCode    = $sysI->v_code . $sysI->v_separator . date($sysI->v_dateformat) . $sysI->v_separator . sprintf("%0{$sysI->i_digit}d", $newI);
        $sysI->update(['i_count' => $sysI->i_count + 1]);


        // CHECK IF EDIT
        if ($request->booking_id) {
            // GET THE SAME CODE
            $oldCodeB           = Mc_Booking::find($request->booking_id);
            $bookingCode        = $oldCodeB->v_code;

            $oldCodeB           = Mc_Invoice::where('fk_booking', $request->booking_id)->first();
            if ($oldCodeB) {
                $invoiceCode    = $oldCodeB->v_code;
            }

            $oldCodeM           = Mc_Member::where('fk_booking', $request->booking_id)->first();
            if ($oldCodeM) {
                $memberCode     = $oldCodeM->v_code;
            }
        }

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
            'v_updatedby'           => Auth::user()->user_id,
        ]);

        // CHECK LEAD STATUS IF STATUS == INVOICE || PAID
        $fk_member  = 0;
        $address    = "";

        // INSERT INTO MEMBER
        if ($request->lead_status == 2) { // IF STATUS == INVOICE

            $paid_status = 0;
            $payment_type = "";
            $proof = "";
            $invoice_date = now()->toDateString(); // Current date
            $due_date = now()->addDays(14)->toDateString(); // 14 days from now
            $paid_date = null;
        } else if ($request->lead_status == 5) { // IF STATUS == PAID

            // Fetch the member
            $member = Mc_Member::where('fk_booking', $request->booking_id)
                ->where('b_status', 1)
                ->first();

            // Member data
            $memberData = [
                'v_code'                => $memberCode,
                'fk_booking'            => $request->booking_id,
                'fk_company'            => 0,
                'v_name'                => $request->name,
                'v_email'               => $request->email,
                'v_email2'              => null,
                'v_phone'               => $request->phone,
                'v_location'            => $request->location,
                'v_spaces'              => $request->spaces,
                'v_people'              => $request->people,
                'v_idnumber'            => null,
                'v_address'             => null,
                'v_city'                => $request->city,
                'v_zipcode'             => null,
                'dt_birthdate'          => null,
                'v_picture'             => null,
                'b_membershipstatus'    => $request->membership_status,
                'v_accesscard'          => null,
                'dt_start'              => $request->date_start,
                'v_room'                => null,
                'v_notes'               => null,
                'dt_lastpaid'           => now(),
                'b_picstatus'           => 1,
                'b_paidstatus'          => 1,
                'v_createdby'           => Auth::user()->user_id,
                'v_updatedby'           => Auth::user()->user_id,
                'v_deletedby'           => 0,
            ];

            // Update or create member
            $member = Mc_Member::updateOrCreate(
                ['fk_booking' => $request->booking_id, 'b_status' => 1],
                $memberData
            );

            $fk_member = $member->getKey(); // Retrieve the inserted or updated member ID

            // if ($member) {
            //     // Member found, update
            //     $member->update([
            //         'v_email'               => $request->email,
            //         'v_name'                => $request->name,
            //         'v_phone'               => $request->phone,
            //         'v_location'            => $request->location,
            //         'v_spaces'              => $request->spaces,
            //         'v_city'                => $request->city,
            //         'b_picstatus'           => 1,
            //         'b_membershipstatus'    => $request->membership_status,
            //         'dt_start'              => $request->date_start,
            //         'dt_lastpaid'           => now(),
            //         'b_paidstatus'          => 1,
            //         'v_updatedby'           => Auth::user()->user_id,
            //     ]);
            // } else {

            //     // Member not found, insert
            //     $member = Mc_Member::create([
            //             'v_code'                => $memberCode,
            //             'fk_booking'            => $request->booking_id,
            //             'v_name'                => $request->name,
            //             'v_email'               => $request->email,
            //             'v_phone'               => $request->phone,
            //             'v_location'            => $request->location,
            //             'v_spaces'              => $request->spaces,
            //             'v_city'                => $request->city,
            //             'b_picstatus'           => 1,
            //             'b_membershipstatus'    => $request->membership_status,
            //             'dt_start'              => $request->date_start,
            //             'dt_lastpaid'           => now(),
            //             'b_paidstatus'          => 1,
            //             'v_createdby'           => Auth::user()->user_id,
            //         ]);

            //     $fk_member = $member->getKey(); // Retrieve the inserted member ID
            // }

            $paid_status = 1;
            $payment_type = "";
            $proof = "";
            $invoice_date = now()->toDateString();
            $due_date = now()->addDays(14)->toDateString();
            $paid_date = now()->toDateString();
        }

        // INSERT INTO INVOICE
        if ($request->lead_status == 2 || $request->lead_status == 5) {
            // Get Pricing
            $pricingData = Mc_Pricing::where('b_status', 1)
                ->where('v_location', $request->location)
                ->where('v_spaces', $request->spaces)
                ->first();

            if ($pricingData) {
                $amount     = $pricingData->i_amount;
                $unit       = $pricingData->v_unit;
            }

            $qty = 1;
            $subtotal = $qty * $amount;
            $tax = 0;
            $total = $subtotal + ($subtotal * $tax / 100);

            // Check if invoice created
            $invoice = Mc_Invoice::where('b_status', 1)
                ->where('fk_booking', $request->booking_id)
                ->where('b_ispaid', 0)
                ->first();

            // FUNCTION GENERATE TOKEN
            function generateHexToken($length = 20)
            {
                // Generate random bytes and convert them to a hexadecimal string
                $randomBytes = bin2hex(random_bytes($length / 2));
                return $randomBytes;
            }

            // Example: Generate a token with a length of 40 characters
            $token = generateHexToken(40);

            // Insert or Update to Secondary Table
            $invoice = Mc_Invoice::updateOrCreate(
                [
                    'b_status'      => 1,
                    'fk_booking'    => $request->booking_id,
                    'b_ispaid'      => 0,
                ],
                [
                    'v_code'            => $invoiceCode,
                    'fk_invoiceutama'   => 0,
                    'fk_booking'        => $request->booking_id,
                    'fk_memberpic'      => $fk_member,
                    'v_location'        => $request->location,
                    'v_name'            => $request->name,
                    'v_email'           => $request->email,
                    'v_phone'           => $request->phone,
                    'v_address'         => $address,
                    'i_subtotal'        => $subtotal,
                    'i_tax'             => $tax,
                    'i_total'           => $total,
                    'b_ispaid'          => $paid_status,
                    'v_paymenttype'     => $payment_type,
                    'v_proof'           => $proof,
                    'dt_due'            => $due_date,
                    'dt_paid'           => $paid_date,
                    'v_token'           => $token,
                    'v_createdby'       => Auth::user()->user_id,
                    'v_updatedby'       => Auth::user()->user_id,
                    'v_deletedby'       => Auth::user()->user_id,
                ]
            );

            // Insert or Update to Secondary Detail Table
            $invoice->details()->updateOrCreate(
                [
                    'fk_invoice' => $invoice->invoice_id,
                ],
                [
                    'v_spaces' => $request->spaces,
                    'i_qty' => $qty,
                    'v_unit' => $unit,
                    'i_amount' => $amount,
                    'i_subtotal' => $subtotal,
                    'v_createdby' => Auth::user()->user_id,
                    'v_updatedby' => 0,
                    'v_deletedby' => 0,
                ]
            );

            // if ($invoice) {
            //     $invoice_id = $invoice->invoice_id;

            //     // Update to Secondary Table
            //     $invoice->update([
            //         'v_code'        => $invoiceCode,
            //         'fk_memberpic'  => $fk_member,
            //         'v_location'    => $request->location,
            //         'v_address'     => $address,
            //         'i_subtotal'    => $subtotal,
            //         'i_tax'         => $tax,
            //         'i_total'       => $total,
            //         'v_updatedby'   => Auth::user()->user_id,
            //     ]);

            //     // Update to Secondary Detail Table
            //     $invoice->details()->update([
            //         'v_spaces'      => $request->spaces,
            //         'i_qty'         => $qty,
            //         'v_unit'        => $unit,
            //         'i_amount'      => $amount,
            //         'i_subtotal'    => $subtotal,
            //         'v_updatedby'   => Auth::user()->user_id,
            //     ]);

            // }else{

            //     // FUNCTION GENERATE TOKEN
            //     function generateHexToken($length = 20)
            //     {
            //         // Generate random bytes and convert them to a hexadecimal string
            //         $randomBytes = bin2hex(random_bytes($length / 2));
            //         return $randomBytes;
            //     }

            //     // Example: Generate a token with a length of 40 characters
            //     $token = generateHexToken(40);

            //     // Insert to Secondary Table
            //     $invoice = Mc_Invoice::create([
            //         'v_code'            => 'a',
            //         'fk_invoiceutama'   => 0,
            //         'fk_booking'        => $request->booking_id,
            //         'fk_memberpic'      => $fk_member,
            //         'v_location'        => $request->location,
            //         'v_name'            => $request->name,
            //         'v_email'           => $request->email,
            //         'v_phone'           => $request->phone,
            //         'v_address'         => $address,
            //         'i_subtotal'        => $subtotal,
            //         'i_tax'             => $tax,
            //         'i_total'           => $total,
            //         'b_ispaid'          => $paid_status,
            //         'v_paymenttype'     => $payment_type,
            //         'v_proof'           => $proof,
            //         'dt_due'            => $due_date,
            //         'dt_paid'           => $paid_date,
            //         'v_token'           => $token,
            //         'v_createdby'       => Auth::user()->user_id,
            //         'v_updatedby'       => 0,
            //         'v_deletedby'       => 0,
            //     ]);


            //     // Insert to Secondary Detail Table
            //     $invoiceDetail = Mc_InvoiceDetail::create([
            //         'fk_invoice'         => $invoice->invoice_id,
            //         'v_spaces'           => $request->spaces,
            //         'i_qty'              => $qty,
            //         'v_unit'             => $unit,
            //         'i_amount'           => $amount,
            //         'i_subtotal'         => $subtotal,
            //         'v_createdby'        => Auth::user()->user_id,
            //         'v_updatedby'        => 0,
            //         'v_deletedby'        => 0,
            //     ]);
            // }
        }


        // CHECK BOOKING_ID IF NULL THAT WAS CREATE AND OTHERWISE
        if ($request->booking_id) {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'edit-booking',
                'v_description' => 'Memperbaharui Informasi Booking ' . $request->name,
                'v_createdby'   => Auth::user()->user_id,
            ]);
        } else {
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

        // INSERT INTO USER LOG
        $userlog = Mc_Userlog::create([
            'fk_user'       => Auth::user()->user_id,
            'v_activity'    => 'delete-booking',
            'v_description' => 'Mengakses detail informasi booking ' . $request->name,
            'v_createdby'   => Auth::user()->user_id,
        ]);

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

    // BOOKING DATA INDEX
    public function overtimeIndex(Request $request)
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
            $query = Mc_Overtime::select(
                'mc_overtime.overtime_id',
                'mc_overtime.v_code as code',
                'mc_overtime.dt_overtime as overtime_date',
                'mc_overtime.tm_start as start_time',
                'mc_overtime.tm_end as end_time',
                'mc_overtime.b_invoiced as status_invoice',
                'mc_overtime.fk_invoice as invoice_id',
                'mc_overtime.v_notes as notes',
                'mc_company.company_id as company_id',
                'mc_company.v_name as company_name',
                'mc_members.member_id as member_id',
                'mc_members.v_name as member_name',
                'mc_members.v_location as location'
            )
                ->join('mc_company', 'mc_overtime.fk_company', '=', 'mc_company.company_id')
                ->join('mc_members', 'mc_overtime.fk_memberpic', '=', 'mc_members.member_id')
                ->where('mc_overtime.b_status', '=', 1)
                ->where(function ($query) {
                    $query->where('mc_overtime.b_invoiced', '=', 0)
                        ->orWhere(function ($query) {
                            $query->where('mc_overtime.b_invoiced', '=', 1)
                                ->whereIn('mc_overtime.fk_invoice', function ($subquery) {
                                    $subquery->select('invoice_id')
                                        ->from('mc_invoices')
                                        ->where('b_overtime', '=', 1)
                                        ->where('b_confirmed', '=', 0);
                                });
                        });
                })->orderBy('mc_overtime.overtime_id', 'DESC')->get();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('company_name', function ($item) {
                    return ucfirst($item->company_name);
                })
                ->addColumn('member_name', function ($item) {
                    return $item->member_name ?? '-';
                })
                ->addColumn('location', function ($item) {
                    $location = Mc_Location::where('v_code', $item->location)->first();
                    return ucfirst($location->v_name);
                })
                ->addColumn('overtime_date', function ($item) {
                    return $item->overtime_date;
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button id="detail-overtime" data-id="' . $item->overtime_id . '" title="Detail Overtime" class="btn btn-secondary btn-sm show-overtime me-2 m-1"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-overtime" data-id="' . $item->overtime_id . '" title="Edit Overtime" class="btn btn-primary btn-sm edit-overtime me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>';

                    $btn = $btn . '<button id="delete-overtime" data-id="' . $item->overtime_id . '" title="Delete Overtime" class="btn btn-danger btn-sm delete-overtime text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backoffice.layanan.overtime', compact('location', 'spaces', 'companies'));
    }

    // OVERTIME DATA UPDATE OR STORE
    public function overtimeStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'company_name'  => 'required',
            'member_id'     => 'required',
            'v_location'    => 'required',
            'overtime_date' => 'required',
            'start_time'    => 'required',
            'end_time'      => 'required|after:start_time',
        ], [
            'start_time.required'    => 'Start Time harus di isi!',
            'end_time.required'      => 'End Time harus di isi!',
            'end_time.after'         => 'End Time harus melebihi Start Time!',
            'overtime_date.required' => 'Overtime Date harus di isi!',
            'v_location.required'    => 'Location harus di isi!',
            'member_id.required'     => 'Nama Member harus di isi!',
            'company_name.required'  => 'Nama Perusahaan harus di isi!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // GET SYSTEM SETTING FOR UNIQUR CODE EACH TABLE
        $sys = SysCodeSetting::where('v_table', 'mc_overtime')->first();

        // GET LAST ID
        $lastOvertime = Mc_Overtime::latest()->first();
        $lastId = ($lastOvertime) ? $lastOvertime->overtime_id : 0;

        // Increment the last ID to get a new ID
        $newId = $lastId + 1;

        // Format Code
        $overtimeCode = $sys->v_code . $sys->v_separator . date($sys->v_dateformat) . $sys->v_separator . sprintf("%0{$sys->i_digit}d", $newId);
        $sys->update(['i_count' => $sys->i_count + 1]);

        // CHECK IF THAT ACTION WAS EDIT
        if ($request->overtime_id) {
            $last = Mc_Overtime::find($request->overtime_id);
            $overtimeCode = $last->v_code;
        }

        $overtime = Mc_Overtime::updateOrCreate([
            'overtime_id'   => $request->overtime_id,
        ], [
            'v_code'        => $overtimeCode,
            'fk_company'    => $request->company_name,
            'fk_memberpic'  => $request->member_id,
            'dt_overtime'   => $request->overtime_date,
            'tm_start'      => $request->start_time,
            'tm_end'        => $request->end_time,
            'b_invoiced'    => 0,
            'fk_invoice'    => 0,
            'v_notes'       => $request->notes ?? '-',
            'v_createdby'   => Auth::user()->user_id,
            'v_updatedby'   => Auth::user()->user_id,
        ]);


        // CHECK OVERTIME_ID IF NULL THAT WAS CREATE AND OTHERWISE
        if ($request->overtime_id) {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'edit-overtime',
                'v_description' => 'Memperbaharui Informasi Overtime ' . $request->member_name,
                'v_createdby'   => Auth::user()->user_id,
            ]);
        } else {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'add-overtime',
                'v_description' => 'Menambahkan Informasi Overtime ' . $request->member_name,
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

    // OVERTIME DATA EDIT 
    public function overtimeEdit(Request $request)
    {
        $query = Mc_Overtime::select(
            'mc_overtime.overtime_id',
            'mc_overtime.v_code as code',
            'mc_overtime.dt_overtime as overtime_date',
            'mc_overtime.tm_start as start_time',
            'mc_overtime.tm_end as end_time',
            'mc_overtime.b_invoiced as status_invoice',
            'mc_overtime.fk_invoice as invoice_id',
            'mc_overtime.v_notes as notes',
            'mc_company.company_id as company_id',
            'mc_company.v_name as company_name',
            'mc_members.member_id as member_id',
            'mc_members.v_name as member_name',
            'mc_members.v_location as location'
        )
            ->join('mc_company', 'mc_overtime.fk_company', '=', 'mc_company.company_id')
            ->join('mc_members', 'mc_overtime.fk_memberpic', '=', 'mc_members.member_id')
            ->where('mc_overtime.b_status', '=', 1)
            ->where(function ($query) {
                $query->where('mc_overtime.b_invoiced', '=', 0)
                    ->orWhere(function ($query) {
                        $query->where('mc_overtime.b_invoiced', '=', 1)
                            ->whereIn('mc_overtime.fk_invoice', function ($subquery) {
                                $subquery->select('invoice_id')
                                    ->from('mc_invoices')
                                    ->where('b_overtime', '=', 1)
                                    ->where('b_confirmed', '=', 0);
                            });
                    });
            })->orderBy('mc_overtime.overtime_id', 'DESC')
            ->where('mc_overtime.overtime_id', $request->overtime_id)
            ->first();

        return response()->json($query);
    }

    // GET COMPANY AND PIC NAME
    public function getCompany(Request $request)
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

    // OVERTIME DELETE
    public function overtimeDestroy(Request $request)
    {
        // UPDATE DATA ON MC OVERTIME
        $overtime = Mc_Overtime::find($request->overtime_id);

        $overtime->update(['deleted_at' => now(), 'b_status' => 0]);

        // INSERT INTO USER LOG
        $userlog = Mc_Userlog::create([
            'fk_user'       => Auth::user()->user_id,
            'v_activity'    => 'delete-overtime',
            'v_description' => 'Menghapus informasi overtime ' . $request->overtime_id,
            'v_createdby'   => Auth::user()->user_id,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // OVERTIME DATA FILTER
    public function overtimeSorting(Request $request)
    {
        $overtimes = Mc_Overtime::select(
            'mc_overtime.overtime_id',
            'mc_overtime.v_code as code',
            'mc_overtime.dt_overtime as overtime_date',
            'mc_overtime.tm_start as start_time',
            'mc_overtime.tm_end as end_time',
            'mc_overtime.b_invoiced as status_invoice',
            'mc_overtime.fk_invoice as invoice_id',
            'mc_overtime.v_notes as notes',
            'mc_company.company_id as company_id',
            'mc_company.v_name as company_name',
            'mc_members.member_id as member_id',
            'mc_members.v_name as member_name',
            'mc_members.v_location as location'
        )
            ->join('mc_company', 'mc_overtime.fk_company', '=', 'mc_company.company_id')
            ->join('mc_members', 'mc_overtime.fk_memberpic', '=', 'mc_members.member_id')
            ->where('mc_overtime.b_status', '=', 1)
            ->where(function ($query) {
                $query->where('mc_overtime.b_invoiced', '=', 0)
                    ->orWhere(function ($query) {
                        $query->where('mc_overtime.b_invoiced', '=', 1)
                            ->whereIn('mc_overtime.fk_invoice', function ($subquery) {
                                $subquery->select('invoice_id')
                                    ->from('mc_invoices')
                                    ->where('b_overtime', '=', 1)
                                    ->where('b_confirmed', '=', 0);
                            });
                    });
            });


        // Add additional conditions based on your variables
        if (!empty($request->filter_location)) {
            $overtimes->where('mc_members.v_location', '=', $request->filter_location);
        }

        if (!empty($request->filter_company)) {
            $overtimes->where('mc_overtime.fk_company', '=', $request->filter_company);
        }

        if (!empty($request->filter_period)) {
            $yearMonth = explode('-', $request->filter_period);
            if (count($yearMonth) === 2) {
                $year = $yearMonth[0];
                $month = $yearMonth[1];

                $overtimes->whereYear('mc_overtime.dt_overtime', '=', $year)
                    ->whereMonth('mc_overtime.dt_overtime', '=', $month);
            }
        }

        // Execute the query
        $results = $overtimes->orderBy('mc_overtime.overtime_id', 'DESC')->get();

        $overtime  = [];
        $index     = 1;
        foreach ($results as $item) {

            $location = Mc_Location::where('v_code', $item->location)->first();

            $action           = '<button id="detail-overtime" data-id="' . $item->overtime_id . '" title="Detail Overtime" class="btn btn-secondary btn-sm show-overtime me-2 m-1"><i class="mdi mdi-eye"></i> View</button>

            <button id="edit-overtime" data-id="' . $item->overtime_id . '" title="Edit Overtime" class="btn btn-primary btn-sm edit-overtime me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>
            
            <button id="delete-overtime" data-id="' . $item->overtime_id . '" title="Delete Overtime" class="btn btn-danger btn-sm delete-overtime text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

            $overtime[] = [
                'DT_RowIndex'       => $index++, // Add DT_RowIndex as the index plus 1
                'overtime_id'       => $item->overtime_id,
                'company_name'      => $item->company_name,
                'member_name'       => $item->member_name,
                'member_name'       => $item->member_name,
                'location'          => ucfirst($location->v_name),
                'overtime_date'     => $item->overtime_date,
                'action'            => $action,
            ];
        }

        return DataTables::of($overtime)
            ->rawColumns(['action']) // Specify the columns containing HTML
            ->toJson();
    }


    // BOOKING DATA INDEX
    public function bookingFasilitasIndex(Request $request)
    {
        $location   = Mc_Location::where('b_status', 1)->get();
        $spaces     = Mc_Spaces::where('b_status', 1)->get();


        return view('backoffice.layanan.booking-layanan', compact('location', 'spaces'));
    }

    // BOOKING FASILITAS DATA UPDATE OR STORE
    public function bookingFasilitasStore(Request $request)
    {
    }

    // BOOKING FASILITAS DATA EDIT 
    public function bookingFasilitasEdit(Request $request)
    {
    }

    // BOOKING FASILITAS DELETE
    public function bookingFasilitasDestroy(Request $request)
    {
    }

    // BOOKING FASILITAS DATA FILTER
    public function bookingFasilitasSorting(Request $request)
    {
    }
}
