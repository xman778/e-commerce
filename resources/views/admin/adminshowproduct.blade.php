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
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">price</th>
                <th scope="col">quantity</th>
                <th scope="col">image</th>
                <th scope="col">operation</th>
              </tr>
            </thead>   
              @foreach ($d as $product)                  
                <tbody class="text-center">
                <tr>                
                  <th>{{$product->title}}</th>
                  <th>{{$product->description}}</th>
                  <th>{{$product->price}}</th>
                  <th>{{$product->quantity}}</th>
                  <th><img src="/productimage/{{$product->product_image}}"></th>
                  <th><a class="btn btn-danger" href="{{route('deleteproduct',$product->id)}}">delete</a></th>
              </tr>
             @endforeach 
            </tbody>
        </table>
    </div>       


