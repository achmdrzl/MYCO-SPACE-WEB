<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Mail\BookingMail;
use App\Mail\PartnershipMail;
use App\Models\Booking;
use App\Models\Mc_Booking;
use App\Models\Mc_Notification;
use App\Models\Notification;
use App\Models\SysCodeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FrontOfficeController extends Controller
{

    // USER BOOKING STORE
    public function addBooking(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'preference'            => 'required',
            'spaces'                => 'required',
            'location'              => 'required',
            'people'                => 'required',
            'date_start'            => 'required',
            'name'                  => 'required',
            'email'                 => 'required',
            'phone'                 => 'required',
            'notes_lead_booking'    => 'required',
        ], [
            'preference.required'           => 'Preferensi harus di isi!',
            'location.required'             => 'Lokasi harus di isi!',
            'spaces.required'               => 'Spaces harus di isi!',
            'people.required'               => 'Jumlah tim harus di isi!',
            'date_start.required'           => 'Tanggal Mulai harus di isi!',
            'name.required'                 => 'Nama harus di isi!',
            'email.required'                => 'Email harus di isi!',
            'phone.required'                => 'No Telepon harus di isi!',
            'notes_lead_booking.required'   => 'Catatan harus di isi!',
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
        $sys->update(['i_count' => $sys->i_count + 1]);

        // INSERT INTO MC_BOOKING TABLE
        $booking = Mc_Booking::updateOrCreate([
            'booking_id'            => $request->booking_id,
        ], [
            'v_code'                => $bookingCode,
            // 'v_city'                => $request->city === null ? '-' : $request->city,
            'v_city'                => 'surabaya',
            'v_occupation'          => $request->occupation,
            'v_preference'          => $request->preference,
            'v_location'            => $request->location,
            'v_spaces'              => $request->spaces,
            'v_people'              => $request->people,
            'dt_start'              => $request->date_start,
            'dt_tour'               => $request->date_tour,
            'v_name'                => $request->name,
            'v_companyname'         => $request->company_name === null ? '-' : $request->company_name,
            'v_email'               => $request->email,
            'v_phone'               => $request->phone,
            'v_notesleadbooking'    => $request->notes_lead_booking === null ? null : $request->notes_lead_booking,
            'v_notesleadstatus'     => $request->notes_lead_status === null ? '-' : $request->notes_lead_status,
            'b_membershipstatus'    => 0,
            'b_leadstatus'          => 0,
            'v_createdby'           => 0,
            // 'dt_updated'            => null,
            // 'dt_deleted'            => null,
        ]);

        // INSERT INTO MC_NOTIFICATION
        $notification = Mc_Notification::create([
            'fk_booking'    => $booking->booking_id,
            'fk_memberpic'  => 0,
            'v_subject'     => 'Booking baru',
            'v_location'    => $request->location,
            'v_spaces'      => $request->spaces,
            'v_description' => 'Ada booking baru dari ' . $request->name,
            'v_createdby'   => 0,
            // 'dt_updated'    => null,
            // 'dt_deleted'    => null,
        ]);

        // SEND MAIL
        $details = [
            'name'          => $request->name,
            'email'         => $request->email,
            'myco_type'     => $request->location === 'indragiri' ? 'MyCo' : 'MyCo X',
            'location'      => $request->location,
            'people'        => $request->people,
            'phone'         => $request->phone,
            'company_name'  => $request->company_name === null ? '-' : $request->company_name,
            'date_start'    => date('d-M-Y', strtotime($request->date_start)),
            'date_tour'     => $request->date_tour === null ? '-' : date('d-M-Y', strtotime($request->date_tour)),
            'message'       => $request->notes_lead_booking === null ? '-' : $request->notes_lead_booking,
        ];

        // CHOOSE ADMIN EMAIL ADDRESS
        $loc = $request->location;
        if ($loc === 'indragiri') {
            $bccName      = 'Admin Indragiri - MyCo';
            $bccEmail     = 'indragiri@my-co.space';
        } else if ($loc === 'cw-tower') {
            $bccName      = 'Admin CW Tower - MyCo X';
            $bccEmail     = 'cw.tower@my-co.space';
        } else if ($loc === 'trilium-tower') {
            $bccName      = 'Admin Trilium - MyCo X';
            $bccEmail     = 'trillium.tower@my-co.space';
        }
        // SEND TO PRIMARY ADMIN
        $bccName2      = 'Admin - MyCo';
        $bccEmail2     = 'admin@my-co.space';

        $emailAddress = $request->email;


        //return response
        // return response()->json([
        //     'success' => true,
        //     'status'  => 200,
        //     'message' => 'Booking berhasil terkirim!',
        // ]);

        // Mail::to($emailAddress)->send(new BookingMail($details, $bccEmail, $bccName, $bccEmail2, $bccName2));

        //return response
        $response = [
            'success' => true,
            'status'  => 200,
            'message' => 'Booking berhasil terkirim!',
        ];

        // Send email
        Mail::to($emailAddress)->send(new BookingMail($details, $bccEmail, $bccName,
            $bccEmail2,
            $bccName2
        ));

        return response()->json($response);

    }

    // PARTNETSHIP STORE
    public function partnershipStore(Request $request)
    {
        // dd($request->all());

        //define validation rules  
        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'email'                 => 'required',
            'phone_number'          => 'required',
            'company'               => 'required',
            'proposal'              => 'mimes:pdf,doc,docx|max:15240', // Max 15 MB
        ], [
            'name.required'                 => 'Nama harus di isi!',
            'email.required'                => 'Email harus di isi!',
            'phone_number.required'         => 'No Telepon harus di isi!',
            'company.required'              => 'Nama Perusahaan harus di isi!',
            'proposal.mimes'                => 'Format file harus berjenis .pdf, .doc atau .docx!',
            'proposal.max'                  => 'Max ukuran file 15 MB!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $proposal = $request->file('proposal') ?? null;

        // Send email and check if it was sent successfully
        try {
            if ($proposal && $proposal->isValid()) {
    
                $proposal       = $request->file('proposal');
                $nameProposal   = 'proposal-' . rand(1, 100000) . '.' . $proposal->getClientOriginalExtension();
    
                // Store the original image
                $path = Storage::putFileAs('public/uploads/proposal', $proposal, $nameProposal);
    
                // Insert Into Order Payment
    
            } else {
                // Insert Into Order Payment
    
            }
    
            // SEND MAIL
            $details = [
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone_number,
                'company'       => $request->company === null ? '-' : $request->company,
                'message'       => $request->notes_partnership === null ? '-' : $request->notes_partnership,
            ];
    
            // SEND TO PRIMARY ADMIN
            $bccName      = 'Admin - MyCo';
            $bccEmail     = 'admin@my-co.space';
    
            $emailAddress = $request->email;
            $pathFile     = $proposal ? storage_path('app/public/uploads/proposal/' . $nameProposal) : null;
    
            // Mail::to($emailAddress)->send(new PartnershipMail($details, $bccEmail, $bccName, $pathFile));
            Mail::to($emailAddress)->send(new PartnershipMail($details, $bccEmail, $bccName, $pathFile));
            // If you reached this point, the email was sent successfully

            //return response
            return response()->json([
                'success' => true,
                'status'  => 200,
                'message' => 'Proposal berhasil terkirim!',
            ]);

        } catch (\Exception $e) {
            // Handle the exception (e.g., log it)
            // You might also want to notify the user about the failure
            return response()->json(['error' => 'Failed to send the email. Please try again.'], 500);
        }
    }

    public function index()
    {
        return view('frontoffice.homepage');
    }

    // SPACES FUNCTIONS
    public function indragiriIndex()
    {
        return view('frontoffice.locations.myco-indragiri');
    }

    public function cwIndex()
    {
        return view('frontoffice.locations.myco-cw');
    }

    public function satoriaIndex()
    {
        return view('frontoffice.locations.myco-satoria');
    }

    public function triliumIndex()
    {
        return view('frontoffice.locations.myco-trilium');
    }

    // OFFICE FUNCTIONS
    public function privateOffice()
    {
        return view('frontoffice.offices.private-office');
    }

    public function manageOffice()
    {
        return view('frontoffice.offices.manage-office');
    }

    public function virtualOffice()
    {
        return view('frontoffice.offices.virtual-office');
    }

    public function meetingRoom()
    {
        return view('frontoffice.offices.meeting-room');
    }

    // COWORKING AREAS FUNCTIONS
    public function hotDesk()
    {
        return view('frontoffice.coworking.hot-desk');
    }

    public function dedicatedDesk()
    {
        return view('frontoffice.coworking.dedicated-desk');
    }

    // BLOG FUNCTIONS
    public function blogIndex()
    {
        return view('frontoffice.blog.blog');
    }

    // BLOG A
    public function blogDetailA()
    {
        return view('frontoffice.blog.blog-detail-a');
    }

    // CONTACT FUNCTION
    public function contanctIndex()
    {
        return view('frontoffice.company.contact');
    }

    // ABOUT FUNCTION
    public function aboutIndex()
    {
        return view('frontoffice.company.about-us');
    }

    // LOGIN
    public function login2()
    {
        return view('auth.login2');
    }


    // EVENT SPACES
    public function eventIndex()
    {
        return view('frontoffice.spaces.event-space');
    }

    public function podcastIndex()
    {
        return view('frontoffice.spaces.podcast-room');
    }

    public function studioIndex()
    {
        return view('frontoffice.spaces.studio-room');
    }

    // PARTNERSHIP
    public function partnershipIndex()
    {
        return view('frontoffice.partnership');
    }
}
