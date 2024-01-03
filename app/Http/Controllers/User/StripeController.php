<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Coupon;
use App\Mail\orderMail;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;


class StripeController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
            if(Session::has('coupon')){
                $total_amount = Session::get('coupon')['total_amount'];
            }else{
                $total_amount = round(Cart::total());

            }

        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51NIvrQDAdPN7SCZapCdqMrqCqWyfattTCqgrHFP8mkTd4NYs7ZqNWZMycLB8CkDFroVk3BIqYKIGsy11WZdAc3H800t9X9GD8c');
        // $publishablr_key = 'pk_test_51NIvrQDAdPN7SCZaRYNeo4PwCNR6QWtrCoObEEiRn3aF6xvprs9QqEIA1kPNWlGBrUIhEWj4UA4U8gVJR8pKdUyI00Mkg14zdP';

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $total_amount * 100,
        'currency' => 'usd',
        'description' => 'Payment from Ecom Site',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);


        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upzilla_id' => $request->upzilla_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_no' => 'SPM'.mt_rand(100000000,999999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);
        // start send email
            $invoice = Order::findOrFail($order_id);

            $data = [
                'invoice_no' => $invoice->invoice_no,
                'amount' => $total_amount,
            ];

            Mail::to($request->email)->send(new orderMail($data));
        // end send email
            $carts = Cart::content();
            foreach ($carts as $cart) {
                OrderItem::insert([
                    'order_id' => $order_id,
                    'product_id' => $cart->id,
                    'color' => $cart->options->color,
                    'size' => $cart->options->size,
                    'qty' => $cart->qty,
                    'price' => $cart->price,
                    'created_at' => Carbon::now(),
                ]);
            }
            // product stock decrement
            foreach ($carts as $pro) {
                Product::where('id',$pro->id)->decrement('product_qty',$pro->qty);
            }

            if(Session::has('coupon')){
                Session::forget('coupon');
            }

            Cart::destroy();

            $notification=array(
                'message' => 'Your Order place Success',
                'alert-type'=>'success'
            );
            return Redirect()->route('user.dashboard')->with($notification);
    }
}