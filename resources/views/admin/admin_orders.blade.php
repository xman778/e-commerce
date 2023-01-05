<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.admin-css')
  </head>
  <body>
    <div class="container-scroller container-fluid " style="padding-top: 73px;">
      @include('admin.admin-sidebar')
      @include('admin.admin-dashboard')



      
    
        <table  class="table table-dark text-center">
            <thead>
              <tr>
                <th scope="col">name</th>
                <th scope="col">address</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">quantity</th>
                <th scope="col">product_title</th>
                <th scope="col">price</th>
                <th scope="col">payment_statment</th>
                <th scope="col">delivery_statment</th>
                <th scope="col">image</th>
                <th scope="col">status</th>
                <th scope="col">print</th>
                <th scope="col">send mail</th>
              </tr>
            </thead>   
              @foreach ($order as $product)                  
                <tbody class="text-center">
                <tr>                
                  <th>{{$product->name}}</th>
                  <th>{{$product->address}}</th>
                  <th>{{$product->email}}</th>
                  <th>{{$product->phone}}</th>
                  <th>{{$product->quantity}}</th>
                  <th>{{$product->product_title}}</th>
                  <th>{{$product->price}}</th>
                  <th>{{$product->payment_statment}}</th>
                  <th>{{$product->delivery_statment}}</th>
                  <th><img src="/productimage/{{$product->image}}"></th>
                  @if ($product->delivery_statment=='processing')
                  <th><a class="btn btn-warning" href="{{route('delete.order',$product->id)}}">delivered</a></th>
                  @else
                  <th style="-webkit-text-fill-color: rgb(20, 83, 23)">delivered</th>
                  @endif
                  <th><a class="btn btn-info" href="{{route('pdf',$product->id)}}">print PDF</a></th>
                  <th><a class="btn btn-primary" href="{{route('sendmail',$product->id)}}">send mail</a></th>
              </tr>
             @endforeach 
            </tbody>
        </table>
    </div>       


