<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    // USER INDEX
    public function userIndex(Request $request)
    {
        if ($request->ajax()) {
            $users   =   User::all();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('name', function ($item) {
                    return ucfirst($item->name);
                })
                ->addColumn('email', function ($item) {
                    return $item->email;
                })
                ->addColumn('role', function ($item) {
                    return ucfirst($item->role);
                })
                ->addColumn('status', function ($item) {
                    if ($item->status == 'aktif') {
                        $status = '<div class="badge bg-success">Aktif</div>';
                    } else {
                        $status = '<div class="badge bg-danger">Non-Aktif</div>';
                    }
                    return $status;
                })
                ->addColumn('action', function ($item) {

                    if ($item->status === 'aktif') {
                        $title  = 'Non-Aktifkan User';
                        $button = 'danger';
                        $icon   = 'eye-off';
                    } else {
                        $title  = 'Aktifkan User';
                        $button = 'success';
                        $icon   = 'eye';
                    }

                    $btn = '<button id="edit-user" data-id="' . $item->user_id . '" title="Edit User" class="btn btn-primary btn-icon btn-xs edit-user me-2"><i class="mdi mdi-pencil"></i></button>';

                    $btn = $btn . '<button id="delete-user" data-id="' . $item->user_id . '" title="' . $title . '" class="btn btn-' . $button . ' btn-icon btn-xs delete-jenis"><i class="mdi mdi-' . $icon . '"></i></button>';

                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('backoffice.masterdata.user-index');
    }

    // USER STORE
    public function userStore(Request $request)
    {
        //define validation rules  
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'role'      => 'required',
        ], [
            'name.required'     => 'Name Must be included!',
            'email.required'    => 'E-Mail Must be included!',
            'password.required' => 'Password Must be included!',
            'role.required'     => 'Role Must be included!',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $user = User::UpdateOrCreate(
            [
                'user_id'      => $request->user_id,
            ],
            [
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'role'          => $request->role,
                'createdby'     => Auth::user()->user_id,
                'updatedby'     => Auth::user()->user_id,
            ]
        );

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Your data has been saved successfully!',
        ]);
    }

    // EDIT USER
    public function userEdit(Request $request)
    {
        $user = User::where('user_id', $request->user_id)->first();
        return response()->json($user);
    }

    // NON-AKTIFKAN / AKTIFKAN USER
    public function userDestroy(Request $request)
    {
        $user = User::where('user_id', $request->user_id)->first();

        if ($user->status == 'aktif') {
            $user->update([
                'status' => 'non-aktif',
            ]);
        } else {
            $user->update([
                'status' => 'aktif',
            ]);
        }

        return response()->json(['status' => 'Data Updated Successfully!']);
    }
}
