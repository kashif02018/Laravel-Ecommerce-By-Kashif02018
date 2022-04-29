<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class HomeController extends Controller
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
        return view('admin.dashboard');
    }
// profile fuction
    public function profile()
    {   
        $user = Auth::user();
        return view('admin.profile',compact('user'));
    }

    // profile edit view 
    function edit_profile(){
        $user = Auth::user();
        return view('admin.profile-edit',compact('user')); 
    }


    function update_profile(Request $request,$id){
    
            // dd($request->all());
           
            $user = User::where('id',$id)->first();
            // dd($user->image);
            $path =  $this->manageImage($request, $user->getTable(), $user->getTable());
            // dd($path);
            unlink($user->image);
            $user->name = $request->name;
            $user->image =$path;
            $user->save();
            return redirect('profile');

    }


    // manage image upload / update

    function manageImage($request, $entity, $public_path){

        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $image_name = time().'.'.$request->image->extension();
        $request->image->move(public_path($public_path),$image_name);
        $path = $public_path."/".$image_name;

        return  $path;
    }

   
}
