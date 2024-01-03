<?php

namespace App\Http\Controllers\User;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function create(){

        return view('user.wishlist-page');
    }
    public function readAllProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function wishlistRemove($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success'=>'Successfully Removed from Your Wishlist']);
     }
}
