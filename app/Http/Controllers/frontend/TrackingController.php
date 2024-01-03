<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;

class TrackingController extends Controller
{
    public function orderTrackNow(Request $request){
        $order = Order::with('division','district','upzilla','user')->where('invoice_no',$request->invoice_no)->first();
        if ($order) {
            $orderItems = OrderItem::with('product')->where('order_id',$order->id)->orderBy('id','DESC')->get();
            return view('frontend.order-track',compact('order','orderItems'));
        }else{
            $notification = array(
                'message'=>'Order not Found',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
