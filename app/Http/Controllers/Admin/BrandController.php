<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

    public function brandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'input English brand name',
            'brand_name_bn.required' => 'input Bangla brand name',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,110)->save('uploads/brand/'.$name_gen);
        $save_url = 'uploads/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_bn' => $request->brand_name_bn,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_bn' => str_replace(' ','-',$request->brand_name_bn),
            'brand_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Brand Upload Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($brand_id){
        $brand = Brand::findOrFail($brand_id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function brandUpdate(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('brand_image')){
           unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/brand/'.$name_gen);
            $save_url = 'uploads/brand/'.$name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ','-',$request->brand_name_bn),
                'brand_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'Brand Upload Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('brands')->with($notification);
        }else{
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ','-',$request->brand_name_bn),
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'Brand Update Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('brands')->with($notification);

        }
    }

    public function delete($brand_id){
        $brand = Brand::findOrFail($brand_id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrFail($brand_id)->delete();

        $notification=array(
            'message'=>'Brand Delete Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}