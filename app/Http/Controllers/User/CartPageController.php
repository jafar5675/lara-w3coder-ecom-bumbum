<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function create(){
        return view('user.cart-page');
    }

    public function getAllCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts'    => $carts,
            'cartQty'  => $cartQty,
            'cartTotal'=> $cartTotal,

        ));
    }

    public function destroy($id){
          Cart::remove($id);
        return response()->json(['success'=>'Product Successfully Removed from Your Cart']);
    }
}