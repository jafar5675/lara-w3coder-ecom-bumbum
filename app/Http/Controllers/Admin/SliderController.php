<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function sliderStore(Request $request){
        $request->validate([
            'image' =>'required',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('uploads/sliders/'.$name_gen);
        $save_url = 'uploads/sliders/'.$name_gen;


        Slider::insert([
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'description_en' => $request->description_en,
            'description_bn' => $request->description_bn,
            'image' => $save_url,
            'created_at'=>Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Slider Added Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function sliderUpdate(Request $request){
        $request->validate([
            'image' =>'required',
        ]);
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('image')){
           unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,110)->save('uploads/sliders/'.$name_gen);
            $save_url = 'uploads/sliders/'.$name_gen;

            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_bn' => $request->title_bn,
                'description_en' => strtolower(str_replace(' ','-',$request->description_en)),
                'description_bn' => str_replace(' ','-',$request->description_bn),
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'Slider Upload Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('sliders')->with($notification);
        }else{
            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_bn' => $request->title_bn,
                'description_en' => strtolower(str_replace(' ','-',$request->description_en)),
                'description_bn' => str_replace(' ','-',$request->description_bn),
                'created_at' => Carbon::now(),
            ]);

            $notification=array(
                'message'=>'Slider Update Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('sliders')->with($notification);

        }
    }

    ////////////////  delete /////

    public function destroy($id){
        $oldImg = Slider::findOrFail($id);
        unlink($oldImg->image);
        Slider::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Slider Image Deleted Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    ///////////// slider active / inactive //////////

    public function inactive($id){
      Slider::findOrFail($id)->update(['status'=>0]);
      $notification=array(
        'message'=>'Slider Inactivated',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);
    }
    public function active($id){
        Slider::findOrFail($id)->update(['status'=>1]);

        $notification=array(
          'message'=>'Slider activated',
          'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }
}