<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    // for bangla language
    public function bangla(){
        session()->get('language');
        session()->forget('language');
         Session::put('language','bangla');
         return redirect()->back();
    }

    // for english language
    public function english(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }

}