<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.admin-css')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.admin-sidebar')
      @include('admin.admin-dashboard')



      <div class="container">
             <form class="card-body cardbody-color p-lg-5" action="{{route('add.category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                  <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                    width="200px" alt="profile">
                </div>
    
                <div class="mb-3">
                  <input type="text" class="form-control"  name="title" aria-describedby="nk name"
                    placeholder="category title">
       
                  </div>
                  <div class="">
                    <button style=" padding:10px;background:teal;color:white; " type="submit"
                    >add</button>
                  </div>                
              </form>
        <table class="table table-dark text-center">
            <thead>
              <tr>
                <th scope="col">title</th>
                <th scope="col">operation</th>
              </tr>
            </thead>   
              @foreach ($d as $category)                  
                <tbody class="text-center">
                <tr>                
                  <th>{{$category->title}}</th>
                  <th><a class="btn btn-danger" href="{{route('delete.category',$category->id)}}">delete</a></th>
              </tr>
             @endforeach 
            </tbody>
        </table>
    </div>       













      


         






        @include('admin.admin-js')  
  </body>
</html>