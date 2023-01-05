<!DOCTYPE html>
<html>
   <head>
      <base href="/public" >
     @include('e-commerce.commerce-css')
   </head>
   <body>
      <div class="hero_area">
         

         {{-- header --}}
         @include('e-commerce.header')
         <!-- slider section -->
         @include('e-commerce.slide-bar')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('e-commerce.section')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('e-commerce.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
     @include('e-commerce.product')
      <!-- end product section -->

      <!-- subscribe section -->
     @include('e-commerce.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('e-commerce.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('e-commerce.footer')
      <!-- footer end -->
      @include('e-commerce.e-commerce-js')
   </body>
</html>