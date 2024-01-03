<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    //create
    public function create(){
        $reviews = ProductReview::with('user','product')->latest()->get();
        return view('admin.review.create',compact('reviews'));
    }

    // delete
    public function destroy($review_id){
        ProductReview::findOrFail($review_id)->delete();

        $notification=array(
            'message'=>'Review Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // approve review
    public function approveNow($review_id){
        ProductReview::findOrFail($review_id)->update([
            'status' => 'approve',
        ]);
        $notification=array(
            'message'=>'Review Approve Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}