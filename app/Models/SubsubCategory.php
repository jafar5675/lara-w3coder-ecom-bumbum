<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubsubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory','subcategory_id');
    }
    // public function subcategory(){
    //     return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    // }
}