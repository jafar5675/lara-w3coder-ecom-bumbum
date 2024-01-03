<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    // Profile
    public function profile(){
        return view('admin.profile.index');
    }

    ///updata info

    public function updateInfo(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        User::findOrFail(Auth::id())->update([
              'name' => $request->name,
              'email' => $request->email,
              'phone' => $request->phone,
              'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message'=>'your profile updated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function updateImage(){
        return view('admin.profile.chnange-image');
    }

    public function imageStore(Request $request){
        $old_image = $request->old_image;

        if(User::findOrFail(Auth::id())->image == 'frontend/media/avatar.PNG'){
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);
            $notification = array(
                'message'=>'Your Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);
            $notification = array(
                'message'=>'Your Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function changePass(){
        return view('admin.profile.password');
    }

    public function changePassStore(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $db_pass = Auth::user()->password;
        $current_password = $request->old_password;
        $newpass = $request->new_password;
        $confirmpass = $request->password_confirmation;

        if(Hash::check($current_password,$db_pass)){
              if($newpass === $confirmpass){
               User::findOrFail(Auth::id())->update([
                'password' => Hash::make($newpass)
               ]);
               Auth::logout();
               $notification=array(
                'message' => 'Your Password Change Success. Now Login With New Password',
                'alert-type' => 'success'
            );
        return Redirect()->route('login')->with($notification);
              }else{
                $notification=array(
                    'message' => 'New Password And Confirm Password Not the Same',
                    'alert-type' => 'error'
                );
            return Redirect()->back()->with($notification);
              }
        }else{
            $notification=array(
                'message' => 'Old Password Not Match',
                'alert-type' => 'error'
            );
        return Redirect()->back()->with($notification);
        }
    }
    // all users
    public function allUsers(){
        $users = User::where('role_id','!=',1)->orderBy('id','ASC')->get();
        return view('admin.users.index',compact('users'));
    }

    // bannde user
    public function banned($user_id){
        User::findOrFail($user_id)->update(['isban' => 1]);
        $notification=array(
            'message' => 'User is Banned.',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
    // unbannde user
    public function unBanned($user_id){
        User::findOrFail($user_id)->update(['isban' => 0]);
        $notification=array(
            'message' => 'User is Unbanned.',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}