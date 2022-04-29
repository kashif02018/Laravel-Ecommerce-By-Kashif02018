<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Products;

class FrontEndController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = Products::all();
        return view('website.welcome',compact('data'));
    }

    function productView(Request $request,$id){
           
        $item = Products::where('id',$id)->first();
        return view('website.product-detail',compact('item'));
    }
   
}
