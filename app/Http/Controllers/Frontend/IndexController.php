<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
    return view('frontend.index');
    }

    public function UserLogout()
    {

    Auth::logout();
    return redirect()->route('login');

    }

    public function UserProfile()
    {

    $id = Auth::User()->id;
    $user = User::find($id);

    return view('frontend.profile.user_profile',[
    'user' => $user
    ]);

    }

    public function UserProfileStore(Request $request)
    {

     $data = User::find(Auth::user()->id);
     $data->name = $request->name;
     $data->email = $request->email;
     $data->phone = $request->phone;

     if($request->file('profile_photo_path')){
        $file = $request->file('profile_photo_path');
        @unlink(public_path('upload/user_images'.$data->profile_photo_path));
        $file_name = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/user_images'),$file_name);
        $data['profile_photo_path'] = $file_name;
     }
     $data->save();

     $notification = array([
     'message' => 'User Profile Updated Successfully',
     'alert-type' => 'success'
     ]);
     return redirect()->route('dashboard')->with($notification);

    }

    public function UserChangePassword()
    {
     return view('frontend.profile.change_password');
    }
}
