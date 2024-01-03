<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\SubsubCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function categoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_bn' => str_replace(' ','-',$request->category_name_bn),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Category Upload Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($cat_id){
        $category = Category::findOrFail($cat_id);
        return view('admin.category.edit', compact('category'));
    }

    public function categoryUpdate(Request $request){
        $cat_id = $request->id;

        Category::findOrFail($cat_id)->Update([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_bn' => str_replace(' ','-',$request->category_name_bn),
            'category_icon' => $request->category_icon,
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Category Update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('category')->with($notification);
    }

    public function delete($cat_id){
        Category::findOrFail($cat_id)->delete();

        $notification=array(
            'message'=>'Category Delete Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }


    // ===================== Subcategory ================
    public function subIndex(){
        $subcategories = Subcategory::latest()->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('admin.sub-category.index',compact('subcategories','categories'));
    }


    public function subCategoryStore(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
        ],
        [
            'category_id.required' => 'select any category',
        ]);

        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ','-',$request->subcategory_name_bn),
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Sub Category Upload Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // edit subcategory
    public function subEdit($subcat_id){
        $subcategory = Subcategory::findOrFail($subcat_id);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('admin.sub-category.edit',compact('subcategory','categories'));
    }

    public function subCategoryUpdate(Request $request){
      $subcat_id = $request->id;

      Subcategory::findOrFail($subcat_id)->Update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ','-',$request->subcategory_name_bn),
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Sub Category Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('sub-category')->with($notification);
    }

    public function subDelete($subcat_id){
        Subcategory::findOrFail($subcat_id)->delete();

        $notification=array(
            'message'=>'Sub-Category Delete Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //================= sub sub category ===============
    public function subSubIndex(Request $request){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategories = SubsubCategory::latest()->get();
        return view('admin.sub-sub-category.index',compact('categories','subsubcategories'));
    }

    // get sub category with ajax
    public function getSubCat($cat_id){
        $subcat = Subcategory::where('category_id',$cat_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }
    // store sub category with ajax
    public function subSubCategoryStore(Request $request){
        Subsubcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ','-',$request->subsubcategory_name_bn),
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Sub Sub Category Upload Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    // edit
    public function subSubEdit($subsubcat_id){
       $subsubcat = SubsubCategory::findOrFail($subsubcat_id);
       return view('admin.sub-sub-category.edit',compact('subsubcat'));
    }
    // update
    public function subSubCatUpdate(Request $request){
        $subsubcat_id = $request->id;

        SubsubCategory::findOrFail($subsubcat_id)->Update([

            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ','-',$request->subsubcategory_name_bn),
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Sub Sub Category Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('sub-sub-category')->with($notification);
    }
    // delete
    public function subSubDelete($subsubcat_id){
        Subsubcategory::findOrFail($subsubcat_id)->delete();

        $notification=array(
            'message'=>'sub Sub-Category Delete Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}