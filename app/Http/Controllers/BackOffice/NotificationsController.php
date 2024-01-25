<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Mc_Location;
use App\Models\Mc_Notification;
use App\Models\Mc_Spaces;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NotificationsController extends Controller
{
    // INDEX NOTIFICATIONS
    public function notificationsIndex(Request $request)
    {
        if ($request->ajax()) {

            $query = Mc_Notification::select('notification_id as id', 'v_subject as subject', 'v_location as location', 'v_spaces as spaces', 'v_description as description', 'created_at as date')
                ->where('b_status', 1)
                ->orderByDesc('created_at')
                ->get();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('subject', function ($item) {
                    return ucfirst($item->subject);
                })
                ->addColumn('location', function ($item) {
                    $location = Mc_Location::where('v_code', $item->location)->first();
                    return $location->v_name;
                })
                ->addColumn('spaces', function ($item) {
                    $spaces = Mc_Spaces::where('v_code', $item->spaces)->first();
                    return $spaces->v_name;
                })
                ->addColumn('created_at', function ($item) {
                    return $item->created_at;
                })
                ->addColumn('description', function ($item) {
                    return ucfirst($item->description);
                })
                ->make(true);
        }

        return view('backoffice.notifications');
    }


    // GET NOTIFICATIONS FOR NAVBAR
    public function navbarNotifications(Request $request)
    {
        $notifications = Mc_Notification::select(
            'notification_id as id',
            'v_subject as subject',
            'v_location as locations',
            'v_spaces as spaces',
            'v_description as description',
            'mc_notifications.created_at as date',
            'mc_spaces.v_name as space',
            'mc_locations.v_name as location'
        )
            ->where('mc_notifications.b_status', 1)
            ->join('mc_spaces', 'mc_notifications.v_spaces', '=', 'mc_spaces.v_code')
            ->join('mc_locations', 'mc_notifications.v_location', '=', 'mc_locations.v_code')
            ->orderByDesc('mc_notifications.created_at')
            ->limit(5)
            ->get();


        $rowCount = Mc_Notification::where('b_status', 1)
        ->where('b_isread', 0)
        ->count();

        return response()->json([
            'data'  => $notifications,
            'count' => $rowCount,
        ]);
    }
}
