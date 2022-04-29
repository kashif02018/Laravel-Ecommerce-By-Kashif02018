<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\OrderMater;
use App\Models\OrderDetail;
use App\Models\Products;
use Session;
use Hash;
class ReportController extends Controller
{

    function allCustomers(){
        $data = OrderMater::with('user')->get();
        // dd($data);

        return view('admin.reports.customers',compact('data'));
    }
    
    function saleReport(){
        $data = OrderMater::with('details','user')->get();
        // dd($data);
        $total = OrderMater::count();
        $pending = OrderMater::whereNotIn('status',['Recieved'])->whereNotIn('status',['Cancelled'])->count();
        $delivered = OrderMater::where('status','Recieved')->count();
        $cancelled = OrderMater::where('status','Cancelled')->count();

        $stats = [$total,$pending,$delivered,$cancelled];

        return view('admin.reports.sales',compact('data','stats'));
    }


    function topItems(){
        $data = OrderMater::with('details','user')->get();
        // dd($data);
        $total = OrderMater::count();
        $pending = OrderMater::whereNotIn('status',['Recieved'])->whereNotIn('status',['Cancelled'])->count();
        $delivered = OrderMater::where('status','Recieved')->count();
        $cancelled = OrderMater::where('status','Cancelled')->count();

        $stats = [$total,$pending,$delivered,$cancelled];

        return view('admin.reports.topItems',compact('data','stats'));
    }
}
