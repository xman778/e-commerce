<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach($prod as $product)
          <div class="col-sm-6 col-md-4 col-lg-4">
            
             <div class="box">
               
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      {{$product->title}}
                      </a>
                      <form action="{{route('add_to_cart',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label>quantity</label>
                         <input type="text" name="quantity" autocomplete="off" required/>  
                        <button type="submit" class="option1" >add to cart</button>
                        </form>
                        
                   </div>
                </div>
                <div class="img-box">
                   <img src="productimage/{{$product->product_image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{$product->title}}
                   </h5>
                   <h5>
                     {{$product->description}}
                  </h5>
                   <h6>
                      {{$product->price}}
                   </h6>
                </div>
                
             </div>
           
         </div>
      @endforeach


      {!!$prod->withQueryString()->links('pagination::bootstrap-5')!!}
    </div>
 </section>