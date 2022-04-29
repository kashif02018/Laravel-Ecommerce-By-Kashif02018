<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Products;
class ProductController extends Controller
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
        $user = Auth::user();
        $data = Products::with('user_name')->get();
        return view('admin.products.index',compact('user','data')); 
    }
// create fuction
    public function create()
    {   
        $user = Auth::user();
        return view('admin.products.create',compact('user'));
    }

    // store view 
    function store(Request $request){
        $user = Auth::user();
        $request['created_by'] = $user->id;
        $request['updated_by'] = $user->id;
        Products::create($request->all());
        return redirect('/products'); 
    }


     // product edit view 
     function edit($id){
        $user = Auth::user();

        $product  = Products::where('id',$id)->first();
        return view('admin.products.edit',compact('user','product'));
    }


      // store view 
      function update(Request $request){
        //   dd($request->all());
        $user = Auth::user();
        $request['created_by'] = $user->id;
        $request['updated_by'] = $user->id;
        
        $item = Products::where('id',$request->id)->first();
        $editImage = new HomeController();
        if($request->image){        
            $path =  $editImage->manageImage($request, $item->getTable(), 'product-images');
            if(file_exists($item->image))
            unlink($item->image);
        }else{
            $path = $item->image;
        }
        $data = [
            'name'=>$request->name,
            'short_description'=>$request->show_description,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'image'=>$path
        ];
       
        $item->update($data);
        return redirect('/products'); 
    }

   
}
