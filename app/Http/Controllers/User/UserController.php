<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){
        return view('user.home');
    }

    public function updateData(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'updated_at' => Carbon::now(),
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

    public function imagePage(){
        return view('user.change-image');
    }

    public function updateImage(Request $request){
        $old_image = $request->old_image;

        if(User::findOrFail(Auth::id())->image == 'frontend/media/fl7.jpg'){
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

    public function updatePassPage(){
        return view('user.password');
    }

    public function storePassword(Request $request){
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
// ===========================Orders===========================
// create
        public function orderCreate(){
                $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
                return view('user.order.orders',compact('orders'));
            }
// return order show
        public function returnOrder(){
                $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',Null)->orderBy('id','DESC')->get();
                return view('user.order.return-order',compact('orders'));
            }

             // cancel order
        public function cancelOrder(){
            $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
            return view('user.order.cancel-order',compact('orders'));
        }

        // view order
        public function orderView($order_id){
            $order = Order::with('division','district','upzilla','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
            $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
            return view('user.order.view-order',compact('order','orderItems'));
        }

        // invoice download
        public function invoiceDownload($order_id){
            $order = Order::with('division','district','upzilla','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
            $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
            // return view('user.order.invoice',compact('order','orderItems'));
            $pdf = Pdf::loadView('user.order.invoice',compact('order','orderItems'));
            return $pdf->download('invoice.pdf');
        }

        // return order
        public function returnOrderSubmit(Request $request){
             $id = $request->id;
             Order::findOrFail($id)->update([
                'return_date' => Carbon::now()->format('d F Y'),
                'return_reason' => $request->return_reason,
             ]);
             $notification = array(
                'message' => 'Return Request Send Success',
                'alert-type' => 'success'
             );
             return  Redirect()->route('my-orders')->with($notification);
        }



}