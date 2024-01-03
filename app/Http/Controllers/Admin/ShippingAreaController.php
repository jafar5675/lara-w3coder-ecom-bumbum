<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\ShipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipUpzilla;

class ShippingAreaController extends Controller
{
    // =====================create division===================
    public function createDivision(){
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('admin.ship-division.create',compact('divisions'));
    }

    public function storeDivision(Request $request){
        $request->validate([
            'division_name' => 'required'
         ]);

         ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
         ]);
         $notification = array(
            'message' => 'Division Added Success',
            'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
    }

      // edit
      public function edit($division_id){
        $division = ShipDivision::findOrFail($division_id);
        return view('admin.ship-division.edit',compact('division'));
    }

    // update
    public function update(Request $request){
        $division_id = $request->id;

        $request->validate([
            'division_name' => 'required',
         ]);

         ShipDivision::findOrFail($division_id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now(),
         ]);
         $notification = array(
            'message' => 'Update division Success',
            'alert-type' => 'success'
         );
         return Redirect()->route('division')->with($notification);
    }

    // destroy
    public function destroy($coupon_id){
        ShipDivision::findOrFail($coupon_id)->delete();
        $notification = array(
            'message' => 'Division Delete Success',
            'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
    }

    // ======================== create District===================
    public function createDistrict(){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::with('division')->orderBy('id','DESC')->get();
          return view('admin.ship-district.create',compact('districts','divisions'));
    }

    public function storeDistrict(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
         ],[
            'division_id.required' => 'select division'
         ]);

         ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
         ]);
         $notification = array(
            'message' => 'District Added Success',
            'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
    }
     // edit
     public function districtEdit($district_id){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($district_id);
        return view('admin.ship-district.edit',compact('divisions','district'));
    }

    // update
    public function districtUpdate(Request $request){
        $district_id = $request->id;

        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
         ]);

         ShipDistrict::findOrFail($district_id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
         ]);
         $notification = array(
            'message' => 'Update district Success',
            'alert-type' => 'success'
         );
         return Redirect()->route('district')->with($notification);
    }

    // destroy
    public function districtDestroy($district_id){
        ShipDistrict::findOrFail($district_id)->delete();
        $notification = array(
            'message' => 'District Delete Success',
            'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
    }
    // ======================== create Upzilla===================
    public function createUpzilla(){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('id','DESC')->get();
        $upzillas = ShipUpzilla::with('division','district')->orderBy('id','DESC')->get();
        return view('admin.ship-upzilla.create',compact('divisions','districts','upzillas'));
    }
    // ajax
    public function getDistrictAjax($division_id){
        $ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($ship);
}

    public function storeUpzilla(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'upzilla_name' => 'required',
         ],[
            'division_id.required' => 'select division'
         ]);

         ShipUpzilla::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upzilla_name' => $request->upzilla_name,
            'created_at' => Carbon::now(),
         ]);
         $notification = array(
            'message' => 'Upzilla Added Success',
            'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
    }
     // edit
     public function upzillaEdit($upzilla_id){
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $upzilla = ShipUpzilla::findOrFail($upzilla_id);
        return view('admin.ship-upzilla.edit',compact('divisions','upzilla'));
    }
    // update
    public function upzillaUpdate(Request $request){
        $upzilla_id = $request->id;

        $request->validate([
            'upzilla_name' => 'required',
         ]);

         ShipUpzilla::findOrFail($upzilla_id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upzilla_name' => $request->upzilla_name,
            'updated_at' => Carbon::now(),
         ]);
         $notification = array(
            'message' => 'Update Upzilla Success',
            'alert-type' => 'success'
         );
         return Redirect()->route('upzilla')->with($notification);
    }

    // destroy
    public function upzillaDestroy($upzilla_id){
        ShipUpzilla::findOrFail($upzilla_id)->delete();
        $notification = array(
            'message' => 'Upzilla Delete Success',
            'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
    }
}
