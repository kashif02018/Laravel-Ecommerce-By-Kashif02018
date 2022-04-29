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
class OrderController extends Controller
{
   
    public function storeSession(Request $request){
        // dd($request->all());
        // Session::forget('cart');
       $cart =  Session::get('cart');
    //    dd($request->product_id,$cart);
       if(isset($cart)){
        //    dd('exist');
            $item_id = (int)$request->product_id;
            if(array_key_exists($item_id, $cart)){
                $itemDetail = $cart[$item_id];
                $newQty = ((int) $itemDetail['quantity'] + $request->quantity);
                unset($cart[$item_id]);
                $newItemDetail =['product_id'=>$item_id,'quantity'=>$newQty,'price'=>$request->price]; 
                // dd($newItemDetail);
                $cart[$item_id] =  $newItemDetail;
                Session::put('cart',$cart);
            }else{
        
                $cart[$request->product_id] =  $request->except(['_token']);
                Session::put('cart',$cart);
            }

       }else{
        //    dd('not exist');
            $cart =[];
            $cart[$request->product_id] =$request->except(['_token']);
            Session::put('cart',$cart);
       }
        return redirect()->back();
    }

    public function viewCart(Request $request){
        $cart = Session::get('cart');
        if(!($cart)){
            $cart = [];
        }
        return view('website.cart',compact('cart'));
    }


    function placeOrder(Request $request){
            $cart = Session::get('cart');
            $totalItems = count($cart);
            $grandTotal = $this->getCartTotal();
            // dd($totalItems);


            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->password =Hash::make($request->password);

            if($user->save()){
                $orderMaster = new OrderMater();
                $orderMaster->user_id = $user->id;
                $orderMaster->total_item = $totalItems;
                $orderMaster->grand_total = $grandTotal;
                if($orderMaster->save()){
                    $cart = Session::get('cart');
                    foreach($cart as $item){
                        $orderDetail = new orderDetail();
                        $orderDetail->order_id = $orderMaster->id;
                        $orderDetail->product_id = $item['product_id'];
                        $orderDetail->product_qty = $item['quantity'];
                        $orderDetail->sub_total = $item['quantity'] * $item['price'];
                        $orderDetail->save();

                    }


                }

                $cart = Session::get('cart');
               
            }
            Session::forget('cart');

            dd('Order placed! Thanks for shoping.');
    }


    function getCartTotal(){
        $cart = Session::get('cart');
        $total = 0;
        foreach($cart as $key=>$item){
            $total += $item['quantity'] * $item['price'];
        }

        return $total;
    }

    function orderIndex(){
        $data = OrderMater::with('details','user')->get();
        // dd($data);
        $total = OrderMater::count();
        $pending = OrderMater::whereNotIn('status',['Recieved'])->whereNotIn('status',['Cancelled'])->count();
        $delivered = OrderMater::where('status','Recieved')->count();
        $cancelled = OrderMater::where('status','Cancelled')->count();

        $stats = [$total,$pending,$delivered,$cancelled];

        return view('admin.orders.index',compact('data','stats'));
    }

    function orderView($id){
        $data = OrderMater::where('id',$id)->with('details','user')->first();
        // dd($data);
        return view('admin.orders.view',compact('data'));

    }

    function manageOrderStatus(Request $request){

            $order = OrderMater::where('id',$request->orderID)->first();
            $order->status = $request->action;
            $order->save();
            $message = "Order status has been changed to ". $request->action;


            // sending notification to the customer

            return $message;
    }

   
}
