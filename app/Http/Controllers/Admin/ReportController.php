<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class ReportController extends Controller
{
    public function index(){
         return view('admin.report.index');
    }
    // report by date
    public function searchByDate(Request $request){
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $orders = Order::where('order_date',$formatDate)->latest()->get();
        return view('admin.report.reports',compact('orders'));

    }
    // report by month
    public function searchByMonth(Request $request){
        $orders = Order::where('order_month',$request->month_name)->where('order_year',$request->year_name)->latest()->get();
        return view('admin.report.reports',compact('orders'));

    }
    // report by year
    public function searchByYear(Request $request){
        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('admin.report.reports',compact('orders'));

    }
}