<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{

    public function Index()
    {
        return view('admin.admin_login');
    }

    public function Dashboard()
    {
        return view('admin.index');
    }

    public function Login(Request $request)
    {

        $check = $request->all();
        if (Auth::guard('admin')->attempt([
            'email' => $check['email'],
            'password' => $check['password']
        ])) {
            return redirect()->route('admin.dashboard')->with('success', 'Admin Login Successfully');
        } else {
            return back()->with('error', 'Invalid Email And Password');
        }

    }

    public function Logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error', 'Admin Logout Successfully');

    }

    public function AdminRegister()
    {
        return view('admin.admin_register');
    }

    public function AdminRegisterCreate(Request $request)
    {
        $register = new Admin();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->save();

        return redirect()->route('login_form')->with('error', 'Admin Created Successfully');
    }


}
