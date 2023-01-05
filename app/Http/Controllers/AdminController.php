<?php

namespace App\Http\Controllers;

use id;
use App\Models\cart;
use App\Models\order;
use App\Models\product;
use App\Models\category;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //amdin start to handel his routes-----------                 
    public function categoryindex(){

        $d=category::all();

        return view ('admin.admin-category',compact('d'));
    }

// ---------category-controller----------//
    public function category(Request $request){
          
        category::create(['title'=>$request->title]);


        return  redirect()->back()->with('messege','category added successfully');
    }

// ----------------category--deleting----------------------------------
    public function catdeleting($id){
        
        category::find($id)->delete();
        return  redirect()->back();
    }

    //------{-----------product--controller---------}--------//
    public function showproduct(){
        $d=category::all();

        return view('admin.adminproduct',compact('d'));
    }

    // adding------products----
    public function addproduct(Request $request){

        if($request->product_image != null){
        $imagename=time().'.'.$request->product_image->getClientOriginalExtension();
        $request->product_image->move('productimage',$imagename);
        }

        product::create
        (
            [
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'product_image'=>$imagename,
            'category_id'=>$request->category_id
            ]
        );

        return redirect()->back();
       
    }


    public function products(){
       $d=product::all();
        return view ('admin.adminshowproduct',compact('d'));
    }

    public function deleteproduct($id){
        
        product::find($id)->delete();
        return  redirect()->back();
    }



    public function orders()
    {
        $order=order::all();
        return view('admin.admin_orders',compact('order'));
    }







    public function deleteorders($id)
    {
        $order=order::where('id',$id)->update([
            'delivery_statment'=>'delivered'
        ]);
        return redirect()->back();
    }


    public function sendmail($id)
    {
        $order =Order::findOrFail($id);
 
        // Ship the order...
 
        Mail::to($order->email)->send(new OrderShipped($order));

        return redirect()->back();
    }

    public function adminbody()
    {
        $mm= cart::all()->count();
        $orderr=order::all();
        $tota= 0 ;
        foreach($orderr as $order) {

         $p = $order->price;
         $tota = $tota + $p ;
        }
        $product=product::all()->count();
        $orders=order::all()->count();
        return view('admin.adminhome',compact('product','orders','tota','mm','orderr'));
    }


    public function ordershow(){
        if(Auth::id()){
            $mm=cart::all()->count();
            $id=Auth::user()->id;

            $order= order::where('user_id',$id)->get();

            return view ('e-commerce.order',compact('order','mm'));


        }else
        {

        return redirect('login');
        }
    }


    public function deleteorder($id)
    {
        $order=order::where('id',$id)->delete();
        return redirect()->back();
    }

}
