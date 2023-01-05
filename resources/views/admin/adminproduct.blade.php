<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.admin-css')
  </head>
  <body>
    <div class="container-scroller container-fluid " style="padding-top: 73px;">
      @include('admin.admin-sidebar')

      @include('admin.admin-dashboard')



      <div class="container">
             <form class="card-body cardbody-color p-lg-5" action="{{route('add.product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                  <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                    width="200px" alt="profile">
                </div>
    
                <div class="mb-3">
                  <input type="text" class="form-control"  name="title" required aria-describedby="nk name"
                    placeholder="product title">
       
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control"  name="description" required aria-describedby="description "
                      placeholder=" description">
         
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control"  name="price" required aria-describedby="nk price"
                          placeholder=" price">
             
                        </div>
                        <div class="mb-3">
                            <input type="integer" class="form-control"  name="quantity" aria-describedby="nk quantity"
                              placeholder=" quantity">
                 
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control"  name="product_image" required aria-describedby="nk product_image"
                                  >
                     
                                </div>
                                <div class="mb-3">
                                   <span class="text-danger"> plz pick the section number </span>
                                    @foreach($d as $category)
                                    
                                    <option>{{$category->id}}:{{$category->title}}</option>
                                    @endforeach
                                    <select required type="text" class="form-control"  name="category_id" aria-describedby="nk name">
                                      
                                    @foreach($d as $category)
                                            
                                             <option >{{$category->id}}</option>
                                     @endforeach
                                    </select>
                         
        
                  <div class="">
                    <button style=" padding:10px;background:teal;color:white; " type="submit"
                    >add</button>
                  </div>                
              </form>
      </div>      
    </div>       

