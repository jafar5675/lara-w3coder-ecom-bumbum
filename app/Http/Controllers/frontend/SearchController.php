<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //search product
    public function searchProducts(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $products = Product::where("product_name_en","LIKE","%".$request->search."%")
                            ->orWhere("product_name_bn","LIKE","%".$request->search."%")
                            ->orWhere("product_tags_en","LIKE","%".$request->search."%")
                            ->orWhere("product_tags_bn","LIKE","%".$request->search."%")
                            ->orWhere("short_descp_en","LIKE","%".$request->search."%")
                            ->orWhere("short_descp_bn","LIKE","%".$request->search."%")
                            ->paginate(5);

                            return view('frontend.search-result',compact('products'));
    }

    // find products
    public function findProducts(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $products = Product::where("product_name_en","LIKE","%".$request->search."%")
                            ->orWhere("product_name_bn","LIKE","%".$request->search."%")
                            ->orWhere("product_tags_en","LIKE","%".$request->search."%")
                            ->orWhere("product_tags_bn","LIKE","%".$request->search."%")
                            ->orWhere("short_descp_en","LIKE","%".$request->search."%")
                            ->orWhere("short_descp_bn","LIKE","%".$request->search."%")
                            ->take(5)->get();

                            return view('frontend.search-product',compact('products'));
    }
}