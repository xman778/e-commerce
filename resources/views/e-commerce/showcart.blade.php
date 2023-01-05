<!DOCTYPE html>
<html>
   <head>
     @include('e-commerce.commerce-css')
   </head>
   <body>
      <div class="hero_area">
         

         {{-- header --}}
         @include('e-commerce.header')
         <!-- slider section -->
   
               


         <!-- end slider section -->
      

      


      <!-- subscribe section -->
     @include('e-commerce.subscribe')
      <!-- end subscribe section -->
      
      
     
      
      <table class="table table-blue text-center">
        <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">address</th>
            <th scope="col">quantity</th>
            <th scope="col">product_title</th>
            <th scope="col">email</th>
            <th scope="col">address</th>
            <th scope="col">phone</th>
            <th scope="col">price</th>
            <th scope="col">image</th>
            <th scope="col">operation</th>
        </tr>
        </thead>  
        <?php $totalprice=0;    ?> 
        @foreach ($cart as $product)                 
            <tbody class="text-center">
            <tr>                
            <th>{{$product->name}}</th>
            <th>{{$product->address}}</th>
            <th>{{$product->quantity}}</th>
            <th>{{$product->product_title}}</th>
            <th>{{$product->email}}</th>
            <th>{{$product->address}}</th>
            <th>{{$product->phone}}</th>
            <th>{{$product->price}}</th>
            <th><img src="/productimage/{{$product->image}}"></th>
            <th><a class="btn btn-danger" href="{{route('deletecartproduct',$product->id)}}">remove product</a></th>
        </tr>
        <?php $totalprice=$totalprice + $product->price  ?>
        @endforeach 
        </tbody>
    </table>
    

    <div class="container">
      <div class="container">
        <h2 class="btn btn-primary">total price : {{$totalprice}}</h2>
      </div>
      
    @if ($totalprice !== 0)
    <a class="btn btn-success" href="{{route('cash.delivery')}}">cash on delivery</a>
    <a class="btn btn-success" href="{{route('stripe',$totalprice)}}">pay using card</a>       
    @else
    <h2 style="text-align: center ; color:brown" >there is no product that has been chosen</h2> 
    @endif  
  
    

    
    
    </div>















    
</div> 
      <!-- footer start -->
      @include('e-commerce.footer')
      <!-- footer end -->
      @include('e-commerce.e-commerce-js')
   </body>
</html>