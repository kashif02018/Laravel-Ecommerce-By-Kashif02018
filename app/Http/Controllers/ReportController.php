<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\OrderMater;
use App\Models\OrderDetail;
use App\Models\Products;
use Session;
use DB;
use Hash;
class ReportController extends Controller
{

    function allCustomers(){
        $data = User::all();
        // dd($data);

        return view('admin.reports.customers',compact('data'));
    }
    
    function saleReport(){
        $data = OrderMater::with('details','user')->where('status','Recieved')->get();
        $totalAmount = OrderMater::where('status','Recieved')->sum('grand_total');

        // dd($totalAmount);

        return view('admin.reports.sales',compact('data','totalAmount'));
    }


    function topItems(){
     
        $data = OrderDetail::with('item')->select('product_id')->groupBy('product_id')->get();
        // dd($data);

        
        return view('admin.reports.topItems',compact('data'));
    }
}
