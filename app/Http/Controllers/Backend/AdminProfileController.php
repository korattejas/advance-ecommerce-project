<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile', [
            'adminData' => $adminData
        ]);
    }

    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', [
            'editData' => $editData
        ]);
    }

    public function AdminProfileUpdate(Request $request)
    {

        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            unlink(public_path('upload/admin_images' . $data->profile_photo_path));
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $file_name);
            $data['profile_photo_path'] = $file_name;
        }
        $data->save();

        $notification = array([
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        ]);
        return redirect()->route('admin.profile')->with($notification);

    }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function AdminPasswordUpdate(Request $request)
    {
        $validate = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.login');
        } else {
            return redirect()->back();
        }

    }
}
