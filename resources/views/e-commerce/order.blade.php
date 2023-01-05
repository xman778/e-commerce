<!DOCTYPE html>
<html>
   <head>
     @include('e-commerce.commerce-css')
   </head>
   <body>
      <div class="hero_area">
         
        <div class="container-scroller container-fluid " style="padding-top: 73px;">
         {{-- header --}}
         @include('e-commerce.header')
         <!-- slider section -->
   
               


         <!-- end slider section -->
      

      


      <!-- subscribe section -->
     @include('e-commerce.subscribe')
      <!-- end subscribe section -->
      
      
     
      
      <table class="table table-dark text-center">
        <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">quantity</th>
            <th scope="col">product_title</th>
            <th scope="col">address</th>
            <th scope="col">phone</th>
            <th scope="col">price</th>
            <th scope="col">image</th>
            <th scope="col">order statu</th>
            <th scope="col">operation</th>
        </tr>
        </thead>  
        <?php $totalprice=0;    ?> 
        @foreach ($order as $product)                 
            <tbody class="text-center">
            <tr>                
            <th>{{$product->name}}</th>
            <th>{{$product->quantity}}</th>
            <th>{{$product->product_title}}</th>
            <th>{{$product->address}}</th>
            <th>{{$product->phone}}</th>
            <th>{{$product->price}}</th>
            <th><img src="/productimage/{{$product->image}}"  style="  width: 400px;height: auto; width: 300px;height: auto;"></th>
            <th>{{$product->delivery_statment}}</th>
            <th><a class="btn btn-danger" href="{{route('deleteorder',$product->id)}}">cancle order</a></th>
        </tr>
        <?php $totalprice=$totalprice + $product->price  ?>
        @endforeach 
        </tbody>
    </table>
    

    <div class="container">
      <div class="container">
        <h2 class="btn btn-primary">total price : {{$totalprice}}</h2>
      </div>
      


    
    
    </div>















    
</div> 
      <!-- footer start -->
      @include('e-commerce.footer')
      <!-- footer end -->
      @include('e-commerce.e-commerce-js')
   </body>
</html>