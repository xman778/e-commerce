<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.admin-css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.admin-sidebar')
      <!-- partial -->
      @include('admin.admin-dashboard')
        @include('admin.admin-body')
          <!-- content-wrapper ends -->

          @include('admin.admin-footer')
          <!-- partial:partials/_footer.html -->
        @include('admin.admin-js')  
  </body>
</html>