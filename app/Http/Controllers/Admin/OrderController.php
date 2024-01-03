<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class OrderController extends Controller
{
    //pending orders
    public function pendingOrder(){
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('admin.orders.pending',compact('orders'));
    }
    // order view
    public function viewOrder($order_id){
        $order = Order::with('division','district','upzilla','user')->where('id',$order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('admin.orders.view-order',compact('order','orderItems'));
    }
    // confirm order
    public function confirmedOrder(){
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('admin.orders.confirm',compact('orders'));
    }
    // processing order
    public function processingOrder(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('admin.orders.processing',compact('orders'));
    }
    // picked order
    public function pickedOrder(){
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('admin.orders.picked',compact('orders'));
    }
    // shipped order
    public function shippedOrder(){
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('admin.orders.shipped',compact('orders'));
    }
    // delivered order
    public function deliveredOrder(){
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('admin.orders.delivered',compact('orders'));
    }
    // cancel order
    public function cancelOrder(){
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('admin.orders.cancel',compact('orders'));
    }
    // pending to confirm
    public function pendingToConfirm($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'confirm',
            'confirmed_date' => Carbon::now()
        ]);
        $notification = array(
            'message'=>'Order Confirm Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('confirmed-orders')->with($notification);
    }
    // pending to cancel
    public function pendingToCancel($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'cancel',
            'cancel_date' => Carbon::now()
        ]);
        $notification = array(
            'message'=>'Order Cancel Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('pending-orders')->with($notification);
    }
    //  confirm to process
    public function confirmToProcess($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'processing',
            'processing_date' => Carbon::now()
        ]);
        $notification = array(
            'message'=>'Order Processing Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('processing-orders')->with($notification);
    }
    //  process to picked
    public function processToPicked($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'picked',
            'picked_date' => Carbon::now()
        ]);
        $notification = array(
            'message'=>'Order Picked Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('picked-orders')->with($notification);
    }
    // picked to shipped
    public function pickedToShipped($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'shipped',
            'shipped_date' => Carbon::now()
        ]);
        $notification = array(
            'message'=>'Order Shipped Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('shipped-orders')->with($notification);
    }
    // shipped to delivery
    public function shippedToDelivery($order_id){
        Order::findOrFail($order_id)->update([
            'status' => 'delivered',
            'delivered_date' => Carbon::now()
        ]);
        $notification = array(
            'message'=>'Order Delivery Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('delivered-orders')->with($notification);
    }

    // download invoice
    public function downloadInvoice($order_id){
        $order = Order::with('division','district','upzilla','user')->where('id',$order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        // return view('user.order.invoice',compact('order','orderItems'));
        $pdf = Pdf::loadView('admin.orders.invoice',compact('order','orderItems'));
        return $pdf->download('invoice.pdf');
    }
}