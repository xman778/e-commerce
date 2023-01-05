<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use Stripe\Charge;
use App\Models\cart;
use App\Models\User;
use App\Models\order;
use App\Models\product;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    public function home(){
        
        if(Auth::id()){
        $mm=cart::all()->count();
        $prod=product::paginate(3);
        return view ('home-page',compact('prod','mm'));
        }else{
            $mm=0;
            $prod=product::paginate(3);
            return view ('home-page',compact('prod','mm'));
        }
        

    }


    public function redierct(){

        $type= Auth::user()->user_type;
        $mm= cart::all()->count();
       
        $prod=product::paginate(3);
        
        if($type == '1')
        {

            $orderr=order::all();

            $product=product::all()->count();
           

            $orders=order::all()->count();

            $tota= 0 ;
           foreach($orderr as $order) {

            $p = $order->price;
            $tota = $tota + $p ;

           }


            




            return view ('admin.adminhome',compact('orderr','product','orders','tota','mm'));
        }
        else
        {
            return view ('home-page',compact('prod','mm'));
        }
    }



// --------------add-----to-cart--------------------------------
    public function addtocart(Request $request , $id){
        
        if(Auth::id())
        {
            $user=Auth::user();
            $product=product::find($id);
        cart::create
        (
            [
                'name'=>$user->name,
                'address'=>$user->name,
                'quantity'=>$request->quantity,
                'product_id'=>$product->id,
                'product_title'=>$product->title,
                'image'=>$product->product_image,
                'email'=>$user->email,
                'price'=>$product->price,
                'address'=>$user->address,
                'phone'=>$user->phone,
                'user_id'=>$user->id,
            ]
        );


        return redirect()->back();
       
            
        }else
        {
            return redirect('login');
        }
        
       
    }


 // show prodct in cart------------------

    public function showcart(){

        if(Auth::id()){
            $mm= cart::all()->count();
            $id= Auth::user()->id;

            $cart=cart::where('user_id','=',$id)->get();

            return view ('e-commerce.showcart',compact('cart','mm'));
        }
        else
        {

        return redirect('login');
        }

    }

// -------------deleting card product------



public function deletecartproduct($id)
{

    cart::find($id)->delete();

    return redirect()->back();
}





public function cashdelivery(){

    $user=Auth::user();
    $userid=$user->id;
    $data=cart::where('User_id','=',$userid)->get();
    
    foreach($data as $data)
    {
        
    order::create
    ([
                'name'=>$data->name,
                'address'=>$data->address,
                'quantity'=>$data->quantity,
                'image'=>$data->image,
                'product_id'=>$data->id,
                'product_title'=>$data->product_title,
                'email'=>$data->email,
                'address'=>$data->address,
                'phone'=>$data->phone,
                'price'=>$data->price,
                'User_id'=>$user->id,
                'payment_statment'=>'cash on delivery',
                'delivery_statment'=>'processing',

    ]);
    }
    
    cart::where('user_id','=',$userid)->delete();
    return redirect()->back();
}

public function stripe($totalprice)
{
return view('e-commerce.stripe',compact('totalprice')) ;
}


public function stripePost(Request $request,$totalprice)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from tutsmake.com."
    ]);

    Session::flash('success', 'Payment successful!');

    $user=Auth::user();
    $userid=$user->id;
    $data=cart::where('User_id','=',$userid)->get();
    
    foreach($data as $data)
    {
        
    order::create
    ([
                'name'=>$data->name,
                'address'=>$data->address,
                'quantity'=>$data->quantity,
                'image'=>$data->image,
                'product_id'=>$data->id,
                'product_title'=>$data->product_title,
                'email'=>$data->email,
                'address'=>$data->address,
                'phone'=>$data->phone,
                'price'=>$data->price,
                'User_id'=>$user->id,
                'payment_statment'=>'paid',
                'delivery_statment'=>'processing',

    ]);
    }
    
    cart::where('user_id','=',$userid)->delete();
       
    return back();
}

public function generatePDF($id)
{
    $users = User::get();
    $pro =order::where('id',$id)->get();
    $pdf = PDF::loadView('e-commerce.pdfview',compact('pro'));
 
    return $pdf->download('order_details.pdfview');
}

}