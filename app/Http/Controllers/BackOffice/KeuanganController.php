<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Mc_Booking;
use App\Models\Mc_Company;
use App\Models\Mc_Invoice;
use App\Models\Mc_InvoiceDetail;
use App\Models\Mc_Location;
use App\Models\Mc_Overtime;
use App\Models\Mc_Pricing;
use App\Models\Mc_Spaces;
use App\Models\Mc_Userlog;
use App\Models\SysCodeSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KeuanganController extends Controller
{
    // INDEX INVOICE LAYANAN
    public function invoicelayananIndex(Request $request)
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
            $invoices = Mc_Invoice::select(
                'mc_invoices.invoice_id',
                'mc_invoices.v_code as code',
                'mc_invoices.fk_booking as booking_id',
                'mc_invoices.fk_memberpic as member_id',
                'mc_invoices.v_location as location',
                'mc_invoices.v_name as name',
                'mc_invoices.i_subtotal as subtotal',
                'mc_invoices.i_tax as tax',
                'mc_invoices.i_discount as discount',
                'mc_invoices.i_total as total',
                'mc_invoices.i_dp as dp',
                'mc_invoices.v_paymenttype as payment_type',
                'mc_invoices.b_hasdeposit as has_deposit',
                'mc_invoices.b_deposit as deposit_status',
                'mc_invoices.b_overtime as overtime_status',
                'mc_invoices.b_ispaid as paid_status',
                'mc_invoices.b_confirmed as confirmed_status',
                'mc_invoices.created_at as created_date',
                'mc_invoices.dt_due as due_date',
                'mc_invoices.dt_paid as paid_date',
                'mc_invoices.i_send as status_send',
                'mc_bookings.v_companyname as company_name'
            )
                ->join('mc_bookings', function ($join) {
                    $join->on('mc_invoices.fk_booking', '=', 'mc_bookings.booking_id')->where('mc_bookings.b_status', '=', 1);
                })
                ->leftJoin('mc_members', function ($join) {
                    $join->on('mc_invoices.fk_booking', '=', 'mc_members.fk_booking')->where('mc_members.b_status', '=', 1);
                })
                ->where('mc_invoices.b_status', '=', 1)
                ->where('mc_invoices.b_confirmed', '=', 0)
                ->where('mc_invoices.b_deposit', '=', 0)
                ->where('mc_invoices.b_overtime', '=', 0)
                ->orderBy('mc_invoices.invoice_id', 'desc')
                ->get();

            return DataTables::of($invoices)
                ->addIndexColumn()
                ->addColumn('code', function ($item) {
                    return ucfirst($item->code);
                })
                ->addColumn('created_date', function ($item) {
                    return $item->created_date;
                })
                ->addColumn('due_date', function ($item) {
                    return $item->due_date;
                })
                ->addColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->addColumn('total', function ($item) {
                    return $item->total;
                })
                ->addColumn('location', function ($item) {
                    $location = Mc_Location::where('v_code', $item->location)->first();
                    return $location->v_name ?? '-';
                })
                ->addColumn('status_send', function ($item) {
                    return $item->status_send != 0 ? '<div class="badge bg-success">Terkirim</div>' : '<div class="badge bg-danger">Belum Terkirim</div>';
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button id="detail-invoice" data-id="' . $item->invoice_id . '" title="Detail Invoice" class="btn btn-secondary btn-sm show-invoice me-2 m-1"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-invoice" data-id="' . $item->invoice_id . '" title="Edit Invoice" class="btn btn-primary btn-sm edit-invoice me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>';

                    if ($item->deposit_status != 1) {
                        $btn = $btn . '<button id="send-invoice" data-id="' . $item->invoice_id . '" title="Send Invoice" class="btn btn-warning btn-sm Send-invoice me-2 m-1"><i class="mdi mdi mdi-send"></i> Send</button>';
                    }

                    $btn = $btn . '<button id="print-invoice" data-id="' . $item->invoice_id . '" title="Print Invoice" class="btn btn-dark btn-sm print-invoice text-light m-1"><i class="mdi mdi-printer"></i> print</button>';

                    $btn = $btn . '<button id="delete-invoice" data-id="' . $item->invoice_id . '" title="Delete Invoice" class="btn btn-danger btn-sm delete-invoice text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['status_send', 'action'])
                ->make(true);
        }
        return view('backoffice.keuangan.invoice-layanan', compact('location', 'companies', 'spaces'));
    }

    // STORE AND UPDATE INVOICE LAYANAN
    public function invoicelayananStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'name'          => 'required',
            'phone'         => 'required',
            'email'         => 'required',
            'address'       => 'required',
            'due_date'      => 'required',
            'spaces.*'      => 'required',
            'qty.*'         => 'required',
            'unit_qty.*'    => 'required',
            'amount.*'      => 'required',
        ], [
            'title.required'        => 'Title harus di isi!',
            'name.required'         => 'Nama harus di isi!',
            'phone.required'        => 'No Telepon harus di isi!',
            'email.required'        => 'Email harus di isi!',
            'address.required'      => 'Alamat harus di isi!',
            'due_date.required'     => 'Waktu tenggar harus di isi!',
            'spaces.*.required'     => 'Layanan harus di isi!',
            'qty.*.required'        => 'Pax harus di isi!',
            'unit_qty.*.required'   => 'Periode harus di isi!',
            'amount.*.required'     => 'Harga harus di isi!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }


        // Deactivate old data
        Mc_InvoiceDetail::where('fk_invoice', $request->invoice_id)
            ->where('b_status', 1)
            ->update([
                'b_status'      => 0,
                'updated_at'    => now(),
                'deleted_at'    => now(),
                'v_updatedby'   => Auth::user()->user_id,
            ]);

        $subtotal = 0;

        // Assuming InvoiceDetail is the model for mc_invoicedetail table
        for ($i = 0; $i < count($request->spaces); $i++) {
            $before_discount = $request->qty[$i] * $request->amount[$i] * $request->unit_qty[$i];
            $after_discount = $before_discount - ($before_discount * $request->discount[$i] / 100);
            $subtotal += $after_discount;

            Mc_InvoiceDetail::create([
                'fk_invoice'    => $request->invoice_id,
                'v_spaces'      => $request->spaces[$i],
                'i_qty'         => $request->qty[$i],
                'i_unit'        => $request->unit_qty[$i],
                'v_unit'        => $request->unit[$i],
                'i_amount'      => $request->amount[$i],
                'i_discount'    => $request->discount[$i],
                'i_subtotal'    => $after_discount,
                'v_createdby'   => Auth::user()->user_id, // assuming you're using authentication
                'v_updatedby'   => Auth::user()->user_id, // assuming you're using authentication
                'v_deletedby'   => 0, // assuming you're using authentication
            ]);
        }

        $discount_header_nominal = $subtotal * ($request->inputdiscount / 100);
        $after_discount_header = $subtotal - $discount_header_nominal;
        $total = $after_discount_header - ($after_discount_header * $request->inputtax / 100);

        // Assuming Invoice is the model for mc_invoice table
        Mc_Invoice::where('invoice_id', $request->invoice_id)
            ->where('b_status', 1)
            ->update([
                'v_title'       => $request->title,
                'v_name'        => $request->name,
                'v_phone'       => $request->phone,
                'v_email'       => $request->email,
                'v_email2'      => $request->email2 ?? '-',
                'v_address'     => $request->address ?? '-',
                'i_subtotal'    => $subtotal,
                'i_discount'    => $request->inputdiscount,
                'i_tax'         => $request->inputtax,
                'i_total'       => $total,
                'i_dp'          => $request->dp,
                'dt_due'        => $request->due_date,
                'v_location'    => $request->location,
                'v_notes'       => $request->notes,
                'updated_at'    => now(),
                'v_updatedby'   => Auth::user()->user_id, // assuming you're using authentication
            ]);

        // CHECK INVOICE_ID IF NULL THAT WAS CREATE AND OTHERWISE
        if ($request->invoice_id) {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'edit-invoice',
                'v_description' => 'Memperbaharui Informasi Invoice ' . $request->invoice_id,
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

    // INVOICE LAYANAN EDIT
    public function invoicelayananEdit(Request $request)
    {
        $invoice = Mc_Invoice::select(
            'mc_invoices.invoice_id',
            'mc_invoices.v_code as code',
            'mc_invoices.fk_invoiceutama as fk_invoiceutama',
            'mc_invoices.fk_booking as booking_id',
            'mc_invoices.fk_memberpic as member_id',
            'mc_invoices.v_location as location',
            'mc_invoices.v_title as title',
            'mc_invoices.v_name as name',
            'mc_invoices.v_email as email',
            'mc_invoices.v_email2 as email2',
            'mc_invoices.v_email3 as email3',
            'mc_invoices.v_email4 as email4',
            'mc_invoices.v_email5 as email5',
            'mc_invoices.v_phone as phone',
            'mc_invoices.v_address as address',
            'mc_invoices.i_subtotal as subtotal',
            'mc_invoices.i_tax as tax',
            'mc_invoices.i_discount as discount',
            'mc_invoices.i_total as total',
            'mc_invoices.i_dp as dp',
            'mc_invoices.v_paymenttype as payment_type',
            'mc_invoices.v_proof as proof',
            'mc_invoices.b_renewal as renewal_status',
            'mc_invoices.b_hasdeposit as has_deposit',
            'mc_invoices.b_deposit as deposit_status',
            'mc_invoices.b_overtime as overtime_status',
            'mc_invoices.b_ispaid as paid_status',
            'mc_invoices.b_confirmed as confirmed_status',
            'mc_invoices.created_at as created_date',
            'mc_invoices.dt_due as due_date',
            'mc_invoices.dt_paid as paid_date',
            'mc_invoices.v_notes as notes',
            'mc_company.company_id'
        )
            ->leftJoin('mc_members', 'mc_invoices.fk_memberpic', '=', 'mc_members.member_id')
            ->leftJoin('mc_company', 'mc_members.fk_company', '=', 'mc_company.company_id')
            ->join('mc_bookings', function ($join) {
                $join->on('mc_invoices.fk_booking', '=', 'mc_bookings.booking_id')
                    ->where('mc_bookings.b_status', '=', 1);
            })
            ->where('mc_invoices.b_status', '=', 1)
            ->where('mc_invoices.invoice_id', '=', $request->invoice_id)
            ->where('mc_invoices.b_deposit', '=', 0)
            ->where('mc_invoices.b_overtime', '=', 0)
            ->first();

        // Check if the invoice exists
        $result = Mc_Invoice::select('mc_invoices.invoice_id', /* ... other fields ... */)
            ->where('mc_invoices.b_status', '=', 1)
            ->where('mc_invoices.invoice_id', '=', $request->invoice_id)
            ->where('mc_invoices.b_deposit', '=', 0)
            ->where('mc_invoices.b_overtime', '=', 0)
            ->first();

        if ($invoice) {
            $returnData["invoice"]["header"] = $invoice->toArray();
            $invoiceId = $invoice->invoice_id;

            // Get Invoice Deposit
            $depositResult = Mc_Invoice::select('mc_invoices.i_total as deposit')
                ->where('mc_invoices.b_status', '=', 1)
                ->where('mc_invoices.fk_invoiceutama', '=', $request->invoice_id)
                ->where('mc_invoices.b_deposit', '=', 0)
                ->where('mc_invoices.b_overtime', '=', 0)
                ->first();

            $returnData["invoice"]["header"]["deposit"] = $depositResult ? $depositResult->deposit : 0;

            // Get Invoice Detail
            $detailResult = Mc_InvoiceDetail::select('mc_invoice_details.invoicedetail_id', 'mc_invoice_details.v_spaces as spaces', 'mc_invoice_details.i_qty as qty', 'mc_invoice_details.i_unit as unit_qty', 'mc_invoice_details.v_unit as unit', 'mc_invoice_details.v_periode as periode', 'mc_invoice_details.i_amount as amount', 'mc_invoice_details.i_discount as discount', 'mc_invoice_details.i_subtotal as subtotal', 'mc_invoice_details.v_notes as notes')
                ->where('mc_invoice_details.b_status', '=', 1)
                ->where('mc_invoice_details.fk_invoice', '=', $invoiceId)
                ->get();

            $returnData["invoice"]["detail"] = $detailResult->toArray();
        }

        return response()->json([
            'invoice'           => $invoice,
            'invoice_id'        => $result,
            'invoice_detail'    => $returnData,
        ]);
    }

    // GET SPACES PRICE LIST
    public function getSpaces(Request $request)
    {
        $price = Mc_Pricing::where('v_spaces', $request->v_space)->first();

        return response()->json($price);
    }

    // INVOICE LAYANAN DESTROY
    public function invoicelayananDestroy(Request $request)
    {
        // UPDATE DATA ON MC BOOKING
        $invoice = Mc_Invoice::where('invoice_id', $request->invoice_id)->first();

        $invoice->update(['b_status' => 0]);

        // INSERT INTO USER LOG
        $userlog = Mc_Userlog::create([
            'fk_user'       => Auth::user()->user_id,
            'v_activity'    => 'delete-non-invoice-layanan',
            'v_description' => 'Menghapus informasi Invoice Layanan ' . $request->invoice_id,
            'v_createdby'   => Auth::user()->user_id,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // INVOICE LAYANAN SORTING
    public function invoicelayananSorting(Request $request)
    {
        // dd($request->all());
        $invoices = Mc_Invoice::select(
            'mc_invoices.invoice_id',
            'mc_invoices.v_code as code',
            'mc_invoices.fk_booking as booking_id',
            'mc_invoices.fk_memberpic as member_id',
            'mc_invoices.v_location as location',
            'mc_invoices.v_name as name',
            'mc_invoices.i_subtotal as subtotal',
            'mc_invoices.i_tax as tax',
            'mc_invoices.i_discount as discount',
            'mc_invoices.i_total as total',
            'mc_invoices.i_dp as dp',
            'mc_invoices.v_paymenttype as payment_type',
            'mc_invoices.b_hasdeposit as has_deposit',
            'mc_invoices.b_deposit as deposit_status',
            'mc_invoices.b_overtime as overtime_status',
            'mc_invoices.b_ispaid as paid_status',
            'mc_invoices.b_confirmed as confirmed_status',
            'mc_invoices.created_at as created_date',
            'mc_invoices.dt_due as due_date',
            'mc_invoices.dt_paid as paid_date',
            'mc_invoices.i_send as status_send',
            'mc_bookings.v_companyname as company_name'
        )
            ->join('mc_bookings', function ($join) {
                $join->on('mc_invoices.fk_booking', '=', 'mc_bookings.booking_id')->where('mc_bookings.b_status', '=', 1);
            })
            ->leftJoin('mc_members', function ($join) {
                $join->on('mc_invoices.fk_booking', '=', 'mc_members.fk_booking')->where('mc_members.b_status', '=', 1);
            })
            ->where('mc_invoices.b_status', '=', 1)
            ->where('mc_invoices.b_confirmed', '=', 0);

        // Add additional conditions based on your variables
        if (!empty($request->filter_location)) {
            $invoices->where('mc_invoices.v_location', '=', $request->filter_location);
        }

        if (!empty($request->filter_company)) {
            $invoices->where('mc_members.fk_company', '=', $request->filter_company);
        }

        if (!empty($request->startDate) && !empty($request->endDate)) {
            $endDateWithInterval = date('Y-m-d', strtotime($request->endDate . ' +1 day'));
            $invoices->whereBetween('mc_invoices.dt_due', [$request->startDate, $endDateWithInterval]);
        }

        $invoices = $invoices->orderBy('mc_invoices.invoice_id', 'desc')->get();

        $invoice = [];
        $index     = 1;
        foreach ($invoices as $item) {

            $location = Mc_Location::where('v_code', $item->location)->first();

            $action           = '<button id="detail-invoice" data-id="' . $item->invoice_id . '" title="Detail Invoice" class="btn btn-secondary btn-sm show-invoice me-2 m-1"><i class="mdi mdi-eye"></i> View</button>

            <button id="edit-invoice" data-id="' . $item->invoice_id . '" title="Edit Invoice" class="btn btn-primary btn-sm edit-invoice me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>';

            if ($item->deposit_status != 1) {
                $action .= '<button id="send-invoice" data-id="' . $item->invoice_id . '" title="Send Invoice" class="btn btn-warning btn-sm Send-invoice me-2 m-1"><i class="mdi mdi mdi-send"></i> Send</button>';
            }

            $action .= '<button id="print-invoice" data-id="' . $item->invoice_id . '" title="Print Invoice" class="btn btn-dark btn-sm print-invoice text-light m-1"><i class="mdi mdi-printer"></i> print</button>
            
            <button id="delete-invoice" data-id="' . $item->invoice_id . '" title="Delete Invoice" class="btn btn-danger btn-sm delete-invoice text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

            $invoice[] = [
                'DT_RowIndex'       => $index++, // Add DT_RowIndex as the index plus 1
                'invoice_id'        => $item->invoice_id,
                'code'              => $item->code,
                'created_date'      => $item->created_date,
                'due_date'          => $item->due_date,
                'name'              => $item->name,
                'total'             => $item->total,
                'location'          => $location->v_name ?? '-',
                'status_send'       => $item->status_send != 0 ? '<div class="badge bg-success">Terkirim</div>' : '<div class="badge bg-danger">Belum Terkirim</div>',
                'action'            => $action,
            ];
        }

        return DataTables::of($invoice)
            ->rawColumns(['status_send', 'action']) // Specify the columns containing HTML
            ->toJson();
    }

    // INDEX INVOICE DEPOSIT
    public function invoicedepositIndex(Request $request)
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

        $invoices = Mc_Invoice::select(
            'mc_invoices.invoice_id',
            'mc_invoices.v_code as code',
            'mc_invoices.fk_booking as booking_id',
            'mc_invoices.fk_memberpic as member_id',
            'mc_invoices.v_location as location',
            'mc_invoices.v_name as name',
            'mc_invoices.i_subtotal as subtotal',
            'mc_invoices.i_tax as tax',
            'mc_invoices.i_discount as discount',
            'mc_invoices.i_total as total',
            'mc_invoices.i_dp as dp',
            'mc_invoices.v_paymenttype as payment_type',
            'mc_invoices.b_hasdeposit as has_deposit',
            'mc_invoices.b_deposit as deposit_status',
            'mc_invoices.b_overtime as overtime_status',
            'mc_invoices.b_ispaid as paid_status',
            'mc_invoices.b_confirmed as confirmed_status',
            'mc_invoices.created_at as created_date',
            'mc_invoices.dt_due as due_date',
            'mc_invoices.dt_paid as paid_date',
            'mc_invoices.i_send as status_send',
            'mc_bookings.v_companyname as company_name'
        )
            ->join('mc_bookings', function ($join) {
                $join->on('mc_invoices.fk_booking', '=', 'mc_bookings.booking_id')->where('mc_bookings.b_status', '=', 1);
            })
            ->leftJoin('mc_members', function ($join) {
                $join->on('mc_invoices.fk_booking', '=', 'mc_members.fk_booking')->where('mc_members.b_status', '=', 1);
            })
            ->where('mc_invoices.b_status', '=', 1)
            ->where('mc_invoices.b_confirmed', '=', 0)
            ->where('mc_invoices.b_overtime', '=', 0)
            ->where('mc_invoices.b_deposit', '=', 0)
            ->orderBy('mc_invoices.invoice_id', 'desc')
            ->groupBy(
                'mc_invoices.invoice_id',
                'mc_invoices.v_code',
                'mc_invoices.fk_booking',
                'mc_invoices.fk_memberpic',
                'mc_invoices.v_location',
                'mc_invoices.v_name',
                'mc_invoices.i_subtotal',
                'mc_invoices.i_tax',
                'mc_invoices.i_discount',
                'mc_invoices.i_total',
                'mc_invoices.i_dp',
                'mc_invoices.v_paymenttype',
                'mc_invoices.b_hasdeposit',
                'mc_invoices.b_deposit',
                'mc_invoices.b_overtime',
                'mc_invoices.b_ispaid',
                'mc_invoices.b_confirmed',
                'mc_invoices.created_at',
                'mc_invoices.dt_due',
                'mc_invoices.dt_paid',
                'mc_invoices.i_send',
                'mc_bookings.v_companyname'
            )
            ->get();

        if ($request->ajax()) {
            $invoices = Mc_Invoice::select(
                'mc_invoices.invoice_id',
                'mc_invoices.v_code as code',
                'mc_invoices.fk_booking as booking_id',
                'mc_invoices.fk_memberpic as member_id',
                'mc_invoices.v_location as location',
                'mc_invoices.v_name as name',
                'mc_invoices.i_subtotal as subtotal',
                'mc_invoices.i_tax as tax',
                'mc_invoices.i_discount as discount',
                'mc_invoices.i_total as total',
                'mc_invoices.i_dp as dp',
                'mc_invoices.v_paymenttype as payment_type',
                'mc_invoices.b_hasdeposit as has_deposit',
                'mc_invoices.b_deposit as deposit_status',
                'mc_invoices.b_overtime as overtime_status',
                'mc_invoices.b_ispaid as paid_status',
                'mc_invoices.b_confirmed as confirmed_status',
                'mc_invoices.created_at as created_date',
                'mc_invoices.dt_due as due_date',
                'mc_invoices.dt_paid as paid_date',
                'mc_invoices.i_send as status_send',
                'mc_bookings.v_companyname as company_name'
            )
                ->join('mc_bookings', function ($join) {
                    $join->on('mc_invoices.fk_booking', '=', 'mc_bookings.booking_id')->where('mc_bookings.b_status', '=', 1);
                })
                ->leftJoin('mc_members', function ($join) {
                    $join->on('mc_invoices.fk_booking', '=', 'mc_members.fk_booking')->where('mc_members.b_status', '=', 1);
                })
                ->where('mc_invoices.b_status', '=', 1)
                ->where('mc_invoices.b_confirmed', '=', 0)
                ->where('mc_invoices.b_deposit', '=', 1)
                ->orderBy('mc_invoices.invoice_id', 'desc')
                ->get();

            return DataTables::of($invoices)
                ->addIndexColumn()
                ->addColumn('code', function ($item) {
                    return ucfirst($item->code);
                })
                ->addColumn('created_date', function ($item) {
                    return $item->created_date;
                })
                ->addColumn('due_date', function ($item) {
                    return $item->due_date;
                })
                ->addColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->addColumn('total', function ($item) {
                    return $item->total;
                })
                ->addColumn('location', function ($item) {
                    $location = Mc_Location::where('v_code', $item->location)->first();
                    return $location->v_name ?? '-';
                })
                ->addColumn('status_send', function ($item) {
                    return $item->status_send != 0 ? '<div class="badge bg-success">Terkirim</div>' : '<div class="badge bg-danger">Belum Terkirim</div>';
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button id="detail-invoice" data-id="' . $item->invoice_id . '" title="Detail Invoice" class="btn btn-secondary btn-sm show-invoice me-2 m-1"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-invoice" data-id="' . $item->invoice_id . '" title="Edit Invoice" class="btn btn-primary btn-sm edit-invoice me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>';

                    $btn = $btn . '<button id="send-invoice" data-id="' . $item->invoice_id . '" title="Send Invoice" class="btn btn-warning btn-sm Send-invoice me-2 m-1"><i class="mdi mdi mdi-send"></i> Send</button>';

                    $btn = $btn . '<button id="print-invoice" data-id="' . $item->invoice_id . '" title="Print Invoice" class="btn btn-dark btn-sm print-invoice text-light m-1"><i class="mdi mdi-printer"></i> print</button>';

                    $btn = $btn . '<button id="delete-invoice" data-id="' . $item->invoice_id . '" title="Delete Invoice" class="btn btn-danger btn-sm delete-invoice text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['status_send', 'action'])
                ->make(true);
        }
        return view('backoffice.keuangan.invoice-deposit', compact('location', 'companies', 'spaces', 'invoices'));
    }

    // STORE AND UPDATE INVOICE DEPOSIT
    public function invoicedepositStore(Request $request)
    {
        // dd($request->all());
        //define validation rules  
        $validator = Validator::make($request->all(), [
            // 'invoice'           => 'required',
            'amount_deposit'    => 'required',
        ], [
            'amount_deposit.required'   => 'Jumlah Deposit harus di isi!',
            // 'invoice.required'          => 'Code Invoice harus di isi!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->isEdit == 'edit') {
            // Update to Secondary Table (mc_invoice)
            Mc_Invoice::where('invoice_id', $request->invoice_id)
                ->where('b_status', 1)
                ->update([
                    'i_subtotal'    => $request->amount_deposit,
                    'i_total'       => $request->amount_deposit,
                    'updated_at'    => now(),
                    'v_updatedby'   => Auth::user()->user_id,
                ]);

            // Update to Secondary Detail Table (mc_invoicedetail)
            Mc_InvoiceDetail::where('fk_invoice', $request->invoice_id)
                ->where('b_status', 1)
                ->update([
                    'i_amount'      => $request->amount_deposit,
                    'i_subtotal'    => $request->amount_deposit,
                    'updated_at'    => now(),
                    'v_updatedby'   => Auth::user()->user_id,
                ]);
        } else {

            // Get Pricing
            $amount     = $request->amount_deposit;
            $spaces     = "deposit";
            $unit       = "x";
            $qty        = 1;
            $subtotal   = $qty * $amount;
            $tax        = 0;
            $total      = $subtotal + ($subtotal * $tax / 100);

            // Update to Secondary Table
            Mc_Invoice::where('invoice_id', $request->invoice)
                ->where('b_status', 1)
                ->update([
                    'b_hasdeposit'  => 1,
                    'updated_at'    => now(),
                    'v_updatedby'   => Auth::user()->user_id,
                ]);

            // Get Detail Invoice Utama
            $invoiceUtama = Mc_Invoice::select(
                'fk_booking as booking_id',
                'fk_memberpic as fk_member',
                'v_location as location',
                'v_title as title',
                'v_name as name',
                'v_email as email',
                'v_email2 as email2',
                'v_email3 as email3',
                'v_email4 as email4',
                'v_email5 as email5',
                'v_phone as phone',
                'v_paymenttype as paymenttype',
                'v_address as address',
                'dt_due as due_date',
                'v_notes as notes'
            )
                ->where('b_status', 1)
                ->where('invoice_id', $request->invoice)
                ->first();

            if ($invoiceUtama) {
                $lastInvoice    = Mc_Invoice::latest()->first();
                $lastI          = ($lastInvoice) ? $lastInvoice->invoice_id : 0;

                $newI       = $lastI + 1;

                // FORMAT CODE FOR INVOICE
                $sysI = SysCodeSetting::where('v_table', 'mc_invoice')->first();
                $invoiceCode    = $sysI->v_code . $sysI->v_separator . date($sysI->v_dateformat) . $sysI->v_separator . sprintf("%0{$sysI->i_digit}d", $newI);
                $sysI->update(['i_count' => $sysI->i_count + 1]);

                // Insert into Main Invoice Table
                $invoiceNew = Mc_Invoice::create([
                    'v_code'            => $invoiceCode,
                    'fk_invoiceutama'   => $request->invoice,
                    'fk_booking'        => $invoiceUtama->booking_id,
                    'fk_memberpic'      => $invoiceUtama->fk_member,
                    'v_location'        => $invoiceUtama->location,
                    'v_title'           => $invoiceUtama->title,
                    'v_name'            => $invoiceUtama->name,
                    'v_email'           => $invoiceUtama->email,
                    'v_email2'          => $invoiceUtama->email2,
                    'v_email3'          => $invoiceUtama->email3,
                    'v_email4'          => $invoiceUtama->email4,
                    'v_email5'          => $invoiceUtama->email5,
                    'v_phone'           => $invoiceUtama->phone,
                    'v_address'         => $invoiceUtama->address,
                    'i_subtotal'        => $subtotal,
                    'i_tax'             => $tax,
                    'i_total'           => $total,
                    'dt_due'            => $invoiceUtama->due_date,
                    'v_paymenttype'     => $invoiceUtama->paymenttype,
                    'v_proof'           => '-',
                    'b_deposit'         => 1,
                    'v_notes'           => $invoiceUtama->notes,
                    'v_createdby'       => Auth::user()->user_id,
                    'v_updatedby'       => Auth::user()->user_id,
                    'v_deletedby'       => 0,
                ]);

                $invoice_id = $invoiceUtama->invoice_id;

                // Insert to Secondary Table
                $invoiceUtama->i_subtotal = $subtotal;
                $invoiceUtama->i_tax = $tax;
                $invoiceUtama->i_total = $total;
                $invoiceUtama->b_deposit = 1;
                $invoiceUtama->v_createdby = Auth::user()->user_id;
                $invoiceUtama->v_updatedby = Auth::user()->user_id;
                $invoiceUtama->save();

                // Insert to Secondary Detail Table
                $invoiceDetail = new Mc_InvoiceDetail([
                    'fk_invoice'    => $invoiceNew->invoice_id,
                    'v_spaces'      => $spaces,
                    'i_qty'         => $qty,
                    'v_unit'        => $unit,
                    'i_amount'      => $amount,
                    'i_subtotal'    => $subtotal,
                    'v_createdby'   => Auth::user()->user_id,
                    'v_updatedby'   => Auth::user()->user_id,
                    'v_deletedby'   => 0,
                ]);

                $invoiceDetail->save();
            }
        }

        // CHECK INVOICE_ID IF NULL THAT WAS CREATE AND OTHERWISE
        if ($request->isEdit) {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'add-invoice',
                'v_description' => 'Mengubah Informasi Invoice Deposit ' . $request->invoice_id,
                'v_createdby'   => Auth::user()->user_id,
            ]);
        } else {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'add-invoice',
                'v_description' => 'Menambahkan Informasi Invoice Deposit ' . $request->invoice,
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

    // INVOICE DEPOSIT EDIT
    public function invoicedepositEdit(Request $request)
    {
        $result = DB::table('mc_invoices as a')
            ->select(
                'a.invoice_id',
                'a.v_code as code',
                'a.fk_invoiceutama as fk_invoiceutama',
                'a.fk_booking as booking_id',
                'a.fk_memberpic as member_id',
                'a.v_location as location',
                'a.v_title as title',
                'a.v_name as name',
                'a.v_email as email',
                'a.v_email2 as email2',
                'a.v_email3 as email3',
                'a.v_email4 as email4',
                'a.v_email5 as email5',
                'a.v_phone as phone',
                'a.v_address as address',
                'a.i_subtotal as subtotal',
                'a.i_tax as tax',
                'a.i_discount as discount',
                'a.i_total as total',
                'a.i_dp as dp',
                'a.v_paymenttype as payment_type',
                'a.v_proof as proof',
                'a.b_renewal as renewal_status',
                'a.b_hasdeposit as has_deposit',
                'a.b_deposit as deposit_status',
                'a.b_overtime as overtime_status',
                'a.b_ispaid as paid_status',
                'a.b_confirmed as confirmed_status',
                'a.created_at as created_date',
                'a.dt_due as due_date',
                'a.dt_paid as paid_date',
                'a.v_notes as notes',
                DB::raw('IFNULL(d.v_name, b.v_companyname) as company_name')
            )
            ->join('mc_bookings as b', function ($join) {
                $join->on('a.fk_booking', '=', 'b.booking_id')->where('b.b_status', '=', 1);
            })
            ->leftJoin('mc_members as c', function ($join) {
                $join->on('a.fk_memberpic', '=', 'c.member_id')->where('c.b_status', '=', 1);
            })
            ->leftJoin('mc_company as d', function ($join) {
                $join->on('c.fk_company', '=', 'd.company_id')->where('d.b_status', '=', 1);
            })
            ->where('a.b_status', '=', 1)
            ->where('a.invoice_id', '=', $request->invoice_id)
            ->where('a.b_deposit', '=', 1)
            ->first();

        return response()->json($result);
    }

    public function getInvoice(Request $request)
    {
        $result = DB::table('mc_invoices as a')
            ->select(
                'a.invoice_id',
                'a.v_code as code',
                'a.fk_invoiceutama as fk_invoiceutama',
                'a.fk_booking as booking_id',
                'a.fk_memberpic as member_id',
                'a.v_location as location',
                'a.v_title as title',
                'a.v_name as name',
                'a.v_email as email',
                'a.v_email2 as email2',
                'a.v_email3 as email3',
                'a.v_email4 as email4',
                'a.v_email5 as email5',
                'a.v_phone as phone',
                'a.v_address as address',
                'a.i_subtotal as subtotal',
                'a.i_tax as tax',
                'a.i_discount as discount',
                'a.i_total as total',
                'a.i_dp as dp',
                'a.v_paymenttype as payment_type',
                'a.v_proof as proof',
                'a.b_renewal as renewal_status',
                'a.b_hasdeposit as has_deposit',
                'a.b_deposit as deposit_status',
                'a.b_overtime as overtime_status',
                'a.b_ispaid as paid_status',
                'a.b_confirmed as confirmed_status',
                'a.created_at as created_date',
                'a.dt_due as due_date',
                'a.dt_paid as paid_date',
                'a.v_notes as notes',
                DB::raw('IFNULL(d.v_name, b.v_companyname) as company_name')
            )
            ->join('mc_bookings as b', function ($join) {
                $join->on('a.fk_booking', '=', 'b.booking_id')->where('b.b_status', '=', 1);
            })
            ->leftJoin('mc_members as c', function ($join) {
                $join->on('a.fk_memberpic', '=', 'c.member_id')->where('c.b_status', '=', 1);
            })
            ->leftJoin('mc_company as d', function ($join) {
                $join->on('c.fk_company', '=', 'd.company_id')->where('d.b_status', '=', 1);
            })
            ->where('a.b_status', '=', 1)
            ->where('a.invoice_id', '=', $request->invoice_id)
            ->where('a.b_deposit', '=', 0)
            ->first();

        return response()->json($result);
    }

    // INVOICE DEPOSIT DESTROY
    public function invoicedepositDestroy(Request $request)
    {
        // UPDATE DATA ON MC BOOKING
        $invoice = Mc_Invoice::where('invoice_id', $request->invoice_id)->first();

        $invoice->update(['b_status' => 0]);

        // INSERT INTO USER LOG
        $userlog = Mc_Userlog::create([
            'fk_user'       => Auth::user()->user_id,
            'v_activity'    => 'delete-non-invoice-deposit',
            'v_description' => 'Menghapus informasi Invoice deposit ' . $request->invoice_id,
            'v_createdby'   => Auth::user()->user_id,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // INVOICE DEPOSIT SORTING
    public function invoicedepositSorting(Request $request)
    {
        // dd($request->all());
        $invoices = Mc_Invoice::select(
            'mc_invoices.invoice_id',
            'mc_invoices.v_code as code',
            'mc_invoices.fk_booking as booking_id',
            'mc_invoices.fk_memberpic as member_id',
            'mc_invoices.v_location as location',
            'mc_invoices.v_name as name',
            'mc_invoices.i_subtotal as subtotal',
            'mc_invoices.i_tax as tax',
            'mc_invoices.i_discount as discount',
            'mc_invoices.i_total as total',
            'mc_invoices.i_dp as dp',
            'mc_invoices.v_paymenttype as payment_type',
            'mc_invoices.b_hasdeposit as has_deposit',
            'mc_invoices.b_deposit as deposit_status',
            'mc_invoices.b_overtime as overtime_status',
            'mc_invoices.b_ispaid as paid_status',
            'mc_invoices.b_confirmed as confirmed_status',
            'mc_invoices.created_at as created_date',
            'mc_invoices.dt_due as due_date',
            'mc_invoices.dt_paid as paid_date',
            'mc_invoices.i_send as status_send',
            'mc_bookings.v_companyname as company_name'
        )
            ->join('mc_bookings', function ($join) {
                $join->on('mc_invoices.fk_booking', '=', 'mc_bookings.booking_id')->where('mc_bookings.b_status', '=', 1);
            })
            ->leftJoin('mc_members', function ($join) {
                $join->on('mc_invoices.fk_booking', '=', 'mc_members.fk_booking')->where('mc_members.b_status', '=', 1);
            })
            ->where('mc_invoices.b_status', '=', 1)
            ->where('mc_invoices.b_confirmed', '=', 0)
            ->where('mc_invoices.b_deposit', '=', 1);

        // Add additional conditions based on your variables
        if (!empty($request->filter_location)) {
            $invoices->where('mc_invoices.v_location', '=', $request->filter_location);
        }

        if (!empty($request->filter_company)) {
            $invoices->where('mc_members.fk_company', '=', $request->filter_company);
        }

        if (!empty($request->startDate) && !empty($request->endDate)) {
            $endDateWithInterval = date('Y-m-d', strtotime($request->endDate . ' +1 day'));
            $invoices->whereBetween('mc_invoices.dt_due', [$request->startDate, $endDateWithInterval]);
        }

        $result = $invoices->orderBy('mc_invoices.invoice_id', 'desc')->get();

        $invoice = [];
        $index     = 1;
        foreach ($result as $item) {

            $location = Mc_Location::where('v_code', $item->location)->first();

            $action           = '<button id="detail-invoice" data-id="' . $item->invoice_id . '" title="Detail Invoice" class="btn btn-secondary btn-sm show-invoice me-2 m-1"><i class="mdi mdi-eye"></i> View</button>

            <button id="edit-invoice" data-id="' . $item->invoice_id . '" title="Edit Invoice" class="btn btn-primary btn-sm edit-invoice me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>
            
            <button id="send-invoice" data-id="' . $item->invoice_id . '" title="Send Invoice" class="btn btn-warning btn-sm Send-invoice me-2 m-1"><i class="mdi mdi mdi-send"></i> Send</button>
            
            <button id="print-invoice" data-id="' . $item->invoice_id . '" title="Print Invoice" class="btn btn-dark btn-sm print-invoice text-light m-1"><i class="mdi mdi-printer"></i> print</button>
            
            <button id="delete-invoice" data-id="' . $item->invoice_id . '" title="Delete Invoice" class="btn btn-danger btn-sm delete-invoice text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

            $invoice[] = [
                'DT_RowIndex'       => $index++, // Add DT_RowIndex as the index plus 1
                'invoice_id'        => $item->invoice_id,
                'code'              => $item->code,
                'created_date'      => $item->created_date,
                'due_date'          => $item->due_date,
                'name'              => $item->name,
                'total'             => $item->total,
                'location'          => $location->v_name ?? '-',
                'status_send'       => $item->status_send != 0 ? '<div class="badge bg-success">Terkirim</div>' : '<div class="badge bg-danger">Belum Terkirim</div>',
                'action'            => $action,
            ];
        }

        return DataTables::of($invoice)
            ->rawColumns(['status_send', 'action']) // Specify the columns containing HTML
            ->toJson();
    }

    // INDEX INVOICE OVERTIME
    public function invoiceovertimeIndex(Request $request)
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
            $invoices = Mc_Invoice::select(
                'mc_invoices.invoice_id',
                'mc_invoices.v_code as code',
                'mc_invoices.fk_booking as booking_id',
                'mc_invoices.fk_memberpic as member_id',
                'mc_invoices.v_location as location',
                'mc_invoices.v_name as name',
                'mc_invoices.i_subtotal as subtotal',
                'mc_invoices.i_tax as tax',
                'mc_invoices.i_discount as discount',
                'mc_invoices.i_total as total',
                'mc_invoices.i_dp as dp',
                'mc_invoices.v_paymenttype as payment_type',
                'mc_invoices.b_hasdeposit as has_deposit',
                'mc_invoices.b_deposit as deposit_status',
                'mc_invoices.b_overtime as overtime_status',
                'mc_invoices.b_ispaid as paid_status',
                'mc_invoices.b_confirmed as confirmed_status',
                'mc_invoices.created_at as created_date',
                'mc_invoices.dt_due as due_date',
                'mc_invoices.dt_paid as paid_date',
                'mc_invoices.i_send as status_send',
                'mc_bookings.v_companyname as company_name'
            )
                ->join('mc_bookings', 'mc_invoices.fk_booking', '=', 'mc_bookings.booking_id')
                ->leftJoin('mc_members', 'mc_invoices.fk_booking', '=', 'mc_members.fk_booking')
                ->where('mc_invoices.b_status', '=', 1)
                ->where('mc_invoices.b_confirmed', '=', 0)
                ->where('mc_invoices.b_overtime', '=', 1)
                ->distinct()->orderBy('mc_invoices.invoice_id', 'desc')->get();

            return DataTables::of($invoices)
                ->addIndexColumn()
                ->addColumn('code', function ($item) {
                    return ucfirst($item->code);
                })
                ->addColumn('created_date', function ($item) {
                    return $item->created_date;
                })
                ->addColumn('due_date', function ($item) {
                    return $item->due_date;
                })
                ->addColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->addColumn('total', function ($item) {
                    return $item->total;
                })
                ->addColumn('location', function ($item) {
                    $location = Mc_Location::where('v_code', $item->location)->first();
                    return $location->v_name ?? '-';
                })
                ->addColumn('status_send', function ($item) {
                    return $item->status_send != 0 ? '<div class="badge bg-success">Terkirim</div>' : '<div class="badge bg-danger">Belum Terkirim</div>';
                })
                ->addColumn('action', function ($item) {

                    $btn = '<button id="detail-invoice" data-id="' . $item->invoice_id . '" title="Detail Invoice" class="btn btn-secondary btn-sm show-invoice me-2 m-1"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-invoice" data-id="' . $item->invoice_id . '" title="Edit Invoice" class="btn btn-primary btn-sm edit-invoice me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>';

                    $btn = $btn . '<button id="send-invoice" data-id="' . $item->invoice_id . '" title="Send Invoice" class="btn btn-warning btn-sm Send-invoice me-2 m-1"><i class="mdi mdi mdi-send"></i> Send</button>';

                    $btn = $btn . '<button id="print-invoice" data-id="' . $item->invoice_id . '" title="Print Invoice" class="btn btn-dark btn-sm print-invoice text-light m-1"><i class="mdi mdi-printer"></i> print</button>';

                    $btn = $btn . '<button id="delete-invoice" data-id="' . $item->invoice_id . '" title="Delete Invoice" class="btn btn-danger btn-sm delete-invoice text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['status_send', 'action'])
                ->make(true);
        }
        return view('backoffice.keuangan.invoice-overtime', compact('location', 'companies', 'spaces'));
    }

    // STORE AND UPDATE INVOICE OVERTIME
    public function invoiceovertimeStore(Request $request)
    {
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'company_id' => 'required',
            'periode'    => 'required',
        ], [
            'periode.required'      => 'Periode harus di isi!',
            'company_id.required'   => 'Company harus di isi!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $company_id = $request->company_id;
        $periode = $request->periode; // replace this with the actual value

        $totalDays = DB::table('mc_overtime')
            ->where('b_status', 1)
            ->where('fk_company', $company_id)
            ->where(function ($query) {
                $query->where('b_invoiced', 0)
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('b_invoiced', 1)
                            ->whereIn('fk_invoice', function ($innerQuery) {
                                $innerQuery->select('invoice_id')
                                    ->from('mc_invoices')
                                    ->where('b_overtime', 1)
                                    ->where('b_confirmed', 0);
                            });
                    });
            })
            ->whereRaw("DATE_FORMAT(dt_overtime, '%Y-%m') = ?", [date('Y-m', strtotime($periode))])
            ->count();

        if ($totalDays < 1) {

        } else {

            // Get Pricing
            $amount = 100000;
            $spaces = "overtime";
            $unit = "x";
            $qty = $totalDays;
            $subtotal = $qty * $amount;
            $tax = 0;
            $total = $subtotal + ($subtotal * $tax / 100);

            $invoiceUtama = DB::table('mc_invoices as a')
                ->join('mc_members as b', function ($join) {
                    $join->on('a.fk_memberpic', '=', 'b.member_id')
                        ->where('b.b_status', 1);
                })
                ->join('mc_company as c', function ($join) {
                    $join->on('b.fk_company', '=', 'c.company_id')
                        ->where('c.b_status', 1);
                })
                ->where('a.b_status', 1)
                ->where('c.company_id', $company_id)
                ->where('a.b_ispaid', 1)
                ->where('a.b_confirmed', 1)
                ->where('a.b_deposit', 0)
                ->where('a.b_overtime', 0)
                ->orderBy('a.invoice_id', 'DESC')
                ->limit(1)
                ->select([
                    'a.invoice_id as id',
                    'a.fk_booking as booking_id',
                    'a.fk_memberpic as member_id',
                    'a.v_location as location',
                    'a.v_title as title',
                    'a.v_name as name',
                    'c.v_name as company_name',
                    'a.v_email as email',
                    'a.v_email2 as email2',
                    'a.v_email3 as email3',
                    'a.v_email4 as email4',
                    'a.v_email5 as email5',
                    'a.v_phone as phone',
                    'a.v_address as address',
                    'a.i_subtotal as subtotal',
                    'a.i_tax as tax',
                    'a.i_discount as discount',
                    'a.i_total as total',
                    'a.i_dp as dp',
                    'a.v_paymenttype as payment_type',
                    'a.v_proof as proof',
                    'a.b_hasdeposit as has_deposit',
                    'a.b_deposit as deposit_status',
                    'a.b_overtime as overtime_status',
                    'a.b_ispaid as paid_status',
                    'a.b_confirmed as confirmed_status',
                    'a.updated_at as created_date',
                    'a.dt_due as due_date',
                    'a.dt_paid as paid_date',
                    'a.v_notes as notes',
                ])
                ->first();

            if ($invoiceUtama) {
                $invoiceUtama = (array) $invoiceUtama;
            }

            // Insert to Secondary Table
            $dueDate = Carbon::now()->addDays(14)->format('Y-m-d');

            $lastInvoice    = Mc_Invoice::latest()->first();
            $lastI          = ($lastInvoice) ? $lastInvoice->invoice_id : 0;

            $newI           = $lastI + 1;

            // FORMAT CODE FOR INVOICE
            $sysI = SysCodeSetting::where('v_table', 'mc_invoice')->first();
            $invoiceCode    = $sysI->v_code . $sysI->v_separator . date($sysI->v_dateformat) . $sysI->v_separator . sprintf("%0{$sysI->i_digit}d", $newI);
            $sysI->update(['i_count' => $sysI->i_count + 1]);

            // FUNCTION GENERATE TOKEN
            function generateHexToken($length = 20)
            {
                // Generate random bytes and convert them to a hexadecimal string
                $randomBytes = bin2hex(random_bytes($length / 2));
                return $randomBytes;
            }

            // Example: Generate a token with a length of 40 characters
            $token = generateHexToken(40);

            $invoiceSecondaryId = DB::table('mc_invoices')->insertGetId([
                'v_code'            => $invoiceCode,
                'fk_invoiceutama'   => 0,
                'fk_booking'        => $invoiceUtama['booking_id'],
                'fk_memberpic'      => $invoiceUtama['member_id'],
                'v_location'        => $invoiceUtama['location'],
                'v_title'           => $invoiceUtama['title'],
                'v_name'            => $invoiceUtama['name'],
                'v_email'           => $invoiceUtama['email'],
                'v_email2'          => $invoiceUtama['email2'],
                'v_email3'          => $invoiceUtama['email3'],
                'v_email4'          => $invoiceUtama['email4'],
                'v_email5'          => $invoiceUtama['email5'],
                'v_phone'           => $invoiceUtama['phone'],
                'v_address'         => $invoiceUtama['address'],
                'i_subtotal'        => $subtotal,
                'i_tax'             => $tax,
                'i_total'           => $total,
                'v_token'           => $token,
                'v_paymenttype'     => '-',
                'v_proof'           => '-',
                'dt_due'            => $dueDate,
                'b_overtime'        => 1,
                'v_notes'           => $invoiceUtama['notes'],
                'created_at'        => now(),
                'v_createdby'       => Auth::user()->user_id,
                'v_deletedby'       => 0,
            ]);

            // Insert to Secondary Detail Table
            DB::table('mc_invoice_details')->insert([
                'fk_invoice'    => $invoiceSecondaryId,
                'v_spaces'      => $spaces,
                'i_qty'         => $qty,
                'v_unit'        => $unit,
                'v_periode'     => $periode,
                'i_amount'      => $amount,
                'i_subtotal'    => $subtotal,
                'v_createdby'   => Auth::user()->user_id,
                'v_updatedby'   => Auth::user()->user_id,
                'v_deletedby'   => 0,
            ]);

            // Update Status Invoiced
            DB::table('mc_overtime as a')
                ->where('a.b_status', 1)
                ->where(function ($query) use ($company_id, $periode) {
                    $query->where('a.b_invoiced', 0)
                        ->orWhere(function ($subQuery) {
                            $subQuery->where('a.b_invoiced', 1)
                                ->whereIn('a.fk_invoice', function ($innerQuery) {
                                    $innerQuery->select('invoice_id')
                                        ->from('mc_invoices')
                                        ->where('b_overtime', 1)
                                        ->where('b_confirmed', 0);
                                });
                        });
                })
                ->where('a.fk_company', $company_id)
                ->whereRaw("DATE_FORMAT(dt_overtime, '%Y-%m') = ?", [date('Y-m', strtotime($periode))])
                ->update([
                    'a.b_invoiced'  => 1,
                    'a.fk_invoice'  => $invoiceSecondaryId,
                    'a.updated_at'  => now(),
                    'a.v_updatedby' => Auth::user()->user_id,
                ]);
        }

        // CHECK INVOICE_ID IF NULL THAT WAS CREATE AND OTHERWISE
        if ($request->invoice) {
            // INSERT INTO USER LOG
            $userlog = Mc_Userlog::create([
                'fk_user'       => Auth::user()->user_id,
                'v_activity'    => 'add-invoice',
                'v_description' => 'Menambahkan Informasi Invoice Deposit ' . $request->invoice,
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

    // INVOICE DEPOSIT OVERTIME
    public function invoiceovertimeEdit(Request $request)
    {
        $result = DB::table('mc_invoices as a')
            ->select(
                'a.invoice_id',
                'a.v_code as code',
                'a.fk_invoiceutama as fk_invoiceutama',
                'a.fk_booking as booking_id',
                'a.fk_memberpic as member_id',
                'a.v_location as location',
                'a.v_title as title',
                'a.v_name as name',
                'a.v_email as email',
                'a.v_email2 as email2',
                'a.v_email3 as email3',
                'a.v_email4 as email4',
                'a.v_email5 as email5',
                'a.v_phone as phone',
                'a.v_address as address',
                'a.i_subtotal as subtotal',
                'a.i_tax as tax',
                'a.i_discount as discount',
                'a.i_total as total',
                'a.i_dp as dp',
                'a.v_paymenttype as payment_type',
                'a.v_proof as proof',
                'a.b_renewal as renewal_status',
                'a.b_hasdeposit as has_deposit',
                'a.b_deposit as deposit_status',
                'a.b_overtime as overtime_status',
                'a.b_ispaid as paid_status',
                'a.b_confirmed as confirmed_status',
                'a.created_at as created_date',
                'a.dt_due as due_date',
                'a.dt_paid as paid_date',
                'a.v_notes as notes',
                DB::raw('IFNULL(d.v_name, b.v_companyname) as company_name')
            )
            ->join('mc_bookings as b', function ($join) {
                $join->on('a.fk_booking', '=', 'b.booking_id')->where('b.b_status', '=', 1);
            })
            ->leftJoin('mc_members as c', function ($join) {
                $join->on('a.fk_memberpic', '=', 'c.member_id')->where('c.b_status', '=', 1);
            })
            ->leftJoin('mc_company as d', function ($join) {
                $join->on('c.fk_company', '=', 'd.company_id')->where('d.b_status', '=', 1);
            })
            ->where(
                'a.b_status',
                '=',
                1
            )
            ->where('a.invoice_id', '=', $request->invoice_id)
            ->where('a.b_deposit', '=', 0)
            ->first();

        return response()->json($result);
    }

    // INVOICE OVERTIME DESTROY
    public function invoiceovertimeDestroy(Request $request)
    {
    }

    // INVOICE OVERTIME SORTING
    public function invoiceovertimeSorting(Request $request)
    {
        $invoices = Mc_Invoice::select(
            'mc_invoices.invoice_id',
            'mc_invoices.v_code as code',
            'mc_invoices.fk_booking as booking_id',
            'mc_invoices.fk_memberpic as member_id',
            'mc_invoices.v_location as location',
            'mc_invoices.v_name as name',
            'mc_invoices.i_subtotal as subtotal',
            'mc_invoices.i_tax as tax',
            'mc_invoices.i_discount as discount',
            'mc_invoices.i_total as total',
            'mc_invoices.i_dp as dp',
            'mc_invoices.v_paymenttype as payment_type',
            'mc_invoices.b_hasdeposit as has_deposit',
            'mc_invoices.b_deposit as deposit_status',
            'mc_invoices.b_overtime as overtime_status',
            'mc_invoices.b_ispaid as paid_status',
            'mc_invoices.b_confirmed as confirmed_status',
            'mc_invoices.created_at as created_date',
            'mc_invoices.dt_due as due_date',
            'mc_invoices.dt_paid as paid_date',
            'mc_invoices.i_send as status_send',
            'mc_bookings.v_companyname as company_name'
        )
            ->join('mc_bookings', 'mc_invoices.fk_booking', '=', 'mc_bookings.booking_id')
            ->leftJoin('mc_members', 'mc_invoices.fk_booking', '=', 'mc_members.fk_booking')
            ->where('mc_invoices.b_status', '=', 1)
            ->where('mc_invoices.b_confirmed', '=', 0)
            ->where('mc_invoices.b_overtime', '=', 1);

        // Add additional conditions based on your variables
        if (!empty($request->filter_location)) {
            $invoices->where('mc_invoices.v_location', '=', $request->filter_location);
        }

        if (!empty($request->filter_company)) {
            $invoices->where('mc_members.fk_company', '=', $request->filter_company);
        }

        if (!empty($request->startDate) && !empty($request->endDate)) {
            $endDateWithInterval = date('Y-m-d', strtotime($request->endDate . ' +1 day'));
            $invoices->whereBetween('mc_invoices.dt_due', [$request->startDate, $endDateWithInterval]);
        }

        $result = $invoices->distinct()->orderBy('mc_invoices.invoice_id', 'desc')->get();

        $invoice = [];
        $index     = 1;
        foreach ($result as $item) {

            $location = Mc_Location::where('v_code', $item->location)->first();

            $action           = '<button id="detail-invoice" data-id="' . $item->invoice_id . '" title="Detail Invoice" class="btn btn-secondary btn-sm show-invoice me-2 m-1"><i class="mdi mdi-eye"></i> View</button>

            <button id="edit-invoice" data-id="' . $item->invoice_id . '" title="Edit Invoice" class="btn btn-primary btn-sm edit-invoice me-2 m-1"><i class="mdi mdi-pencil"></i> Edit</button>
            
            <button id="send-invoice" data-id="' . $item->invoice_id . '" title="Send Invoice" class="btn btn-warning btn-sm Send-invoice me-2 m-1"><i class="mdi mdi mdi-send"></i> Send</button>
            
            <button id="print-invoice" data-id="' . $item->invoice_id . '" title="Print Invoice" class="btn btn-dark btn-sm print-invoice text-light m-1"><i class="mdi mdi-printer"></i> print</button>
            
            <button id="delete-invoice" data-id="' . $item->invoice_id . '" title="Delete Invoice" class="btn btn-danger btn-sm delete-invoice text-light m-1"><i class="mdi mdi-delete"></i> Delete</button>';

            $invoice[] = [
                'DT_RowIndex'       => $index++, // Add DT_RowIndex as the index plus 1
                'invoice_id'        => $item->invoice_id,
                'code'              => $item->code,
                'created_date'      => $item->created_date,
                'due_date'          => $item->due_date,
                'name'              => $item->name,
                'total'             => $item->total,
                'location'          => $location->v_name ?? '-',
                'status_send'       => $item->status_send != 0 ? '<div class="badge bg-success">Terkirim</div>' : '<div class="badge bg-danger">Belum Terkirim</div>',
                'action'            => $action,
            ];
        }

        return DataTables::of($invoice)
            ->rawColumns(['status_send', 'action']) // Specify the columns containing HTML
            ->toJson();
    }
}
