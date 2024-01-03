<?php

namespace App\Http\Controllers\User;

use App\Models\ShipUpzilla;
use App\Models\ShipDistrict;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function getDistrictWithAjax($division_id){
       $ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
       return json_encode($ship);
    }
    public function getUpzillaWithAjax($district_id){
       $ship = ShipUpzilla::where('district_id',$district_id)->orderBy('upzilla_name','ASC')->get();
       return json_encode($ship);
    }

    public function storeCheckout(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['upzilla_id'] = $request->upzilla_id;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();
        $carts = Cart::content();

        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());

        }

        if ($request->payment_method == 'stripe') {
           return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif($request->payment_method == 'sslHost'){
            return view('frontend.payment.hostedPayment',compact('data','total_amount','carts'));
        }elseif($request->payment_method == 'sslEasy'){
            return view('frontend.payment.easyPayment',compact('data','total_amount','carts'));
        }else{
            return 'handcash';
        }
    }
}