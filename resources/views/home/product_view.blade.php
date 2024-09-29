<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">




          <div>

            <form action="{{url('search_product')}}" method="get">
                @csrf

                <input style="width: 500px;" type="text" name="search" placeholder="Search for Something">
                <input type="submit" value="search">

            </form>

          </div>

       </div>

       @if(session()->has('message'))

       <div class="alert alert-success">

           <button type="button" class="close" aria-hidden="true" data-dismiss="alert">x</button>

           {{session()->get('message')}}

       </div>

       @endif

       <div class="row">

        @foreach ($product as $products)

          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_details',$products->id)}}" class="option1">
                      Product Details
                      </a>

                      <form action="{{url('add_cart',$products->id)}}" method="Post">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <input style="width: 100px;" type="number" name="quantity" value="1" min="1">
                            </div>


                            <div class="col-md-4">
                                <input type="submit" value="Add To Cart">
                            </div>

                        </div>

                      </form>

                   </div>
                </div>
                <div class="img-box">
                   <img src="/product/{{$products->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                    {{$products->title}}
                   </h5>

                   @if($products->discount_price!=null)
                   <h6 style="color: red">
                    Discount Price
                    <br>
                    ${{$products->discount_price}}
                   </h6>

                   <h6 style="text-decoration: line-through;color:blue">
                    Price
                    <br>
                    ${{$products->price}}
                   </h6>

                   @else

                   <h6 style="color: blue">
                    Price
                    <br>
                    ${{$products->price}}
                   </h6>

                   @endif



                </div>
             </div>
          </div>
          @endforeach

          <span style="padding-top: 20px;">
          {{-- {!! $product->appends(Request::all())->links() !!} --}}
          {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}

        </span>

          {{-- <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p2.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $80
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p3.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $68
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p4.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $70
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p5.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $75
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p6.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $58
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p7.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $80
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p8.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p9.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p10.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p11.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p12.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div> --}}
       </div>
       {{-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div> --}}
    </div>
 </section>
