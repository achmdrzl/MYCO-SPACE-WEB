<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LayananController extends Controller
{
    public function bookingLayanan(Request $request)
    {
        if ($request->ajax()) {
            $bookings = DB::table('mc_bookings as a')
                ->select([
                    'a.booking_id as id',
                    'a.v_city as city',
                    'a.v_location as location',
                    'a.v_spaces as spaces',
                    'a.v_people as people',
                    'a.dt_start as date_start',
                    'a.v_name as name',
                    'a.b_leadstatus as lead_status',
                    'a.b_membershipstatus as membership_status',
                    'b.fk_booking as fk_booking',
                    'b.b_status as status',
                    'a.created_at as date_created',
                ])
                ->leftJoin('mc_members as b', function ($join) {
                    $join->on('a.booking_id', '=', 'b.fk_booking')
                        ->where('b.b_status', '=', 1)
                        ->where('b.b_picstatus', '=', 1);
                })
                ->where('a.b_status', '=', 1)
                ->whereNotIn('a.booking_id', function ($query) {
                    $query->select('c.fk_booking')
                        ->from('mc_members as c')
                        ->where('c.b_status', '=', 1)
                        ->groupBy('c.fk_booking');
                })
                ->orderByDesc('a.booking_id')
                ->orderByDesc('a.created_at')
                ->orderBy('a.b_leadstatus')
                ->get();

            return DataTables::of($bookings)
                ->addIndexColumn()
                ->addColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->addColumn('location', function ($item) {
                    if ($item->location === 'trilium-tower') {
                        $location = 'Trilium Tower';
                    } else if ($item->location === 'satoria-tower') {
                        $location = 'Satoria Tower';
                    } else if ($item->location === 'cw-tower') {
                        $location = 'CW Tower';
                    } else {
                        $location = 'Indragiri';
                    }
                    return $location;
                })
                ->addColumn('spaces', function ($item) {
                    return ucfirst($item->spaces);
                })
                ->addColumn('date_created', function ($item) {
                    return date('d M Y', strtotime($item->date_created));
                })
                ->addColumn('date_start', function ($item) {
                    return date('d M Y', strtotime($item->date_start));
                })
                ->addColumn('lead_status', function ($item) {
                    if ($item->lead_status == 0) {
                        $status = '<div class="badge" style="background-color:#495867;">Booking</div>';
                    } elseif ($item->lead_status == 1) {
                        $status = '<div class="badge" style="background-color:#F27441;">Follow Up</div>';
                    } elseif ($item->lead_status == 2) {
                        $status = '<div class="badge" style="background-color:#C2A04F;">Penawaran</div>';
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

                    $btn = '<button id="detail-booking" data-id="' . $item->id . '" title="Detail Booking" class="btn btn-sm detail-booking me-2"  style="background-color:#DBDCEE;"><i class="mdi mdi-eye"></i> View</button>';

                    $btn = $btn . '<button id="edit-booking" data-id="' . $item->id . '" title="Edit Booking" class="btn btn-sm edit-booking me-2"  style="background-color:#B5B9DC;"><i class="mdi mdi-pencil"></i> Edit</button>';

                    $btn = $btn . '<button id="delete-booking" data-id="' . $item->id . '" title="Delete Booking" class="btn btn-sm delete-booking text-light" style="background-color:#828BC4;"><i class="mdi mdi-delete"></i> Delete</button>';

                    return $btn;
                })
                ->rawColumns(['lead_status', 'action'])
                ->make(true);
        }
        return view('backoffice.layanan.booking-layanan');
    }

    public function bookingDetail(Request $request)
    {

    }
}
