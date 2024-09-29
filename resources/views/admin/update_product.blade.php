<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">

@include('admin.css')

<style type="text/css">

    .div_center{
        text-align: center;
        padding-top: 100px;
        /* margin-bottom: 10000px; */

    }
    .font_size{
        font-size: 40px;
        color: white;
        padding-bottom: 40px;
    }
    .text_color{
        color: black;
        padding-bottom: 20px;
    }
    label{
        display: inline-block;
        width: 200px;
    }
    .div_design{
        padding-bottom: 15px;
    }
    .img{
        height: 100;
        width: 100;
    }

</style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
     @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">


                @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" aria-hidden="true" data-dismiss="alert">x</button>

                    {{session()->get('message')}}

                </div>

                @endif

                <div class="div_center">

                    <h1 class="font_size">Update Product</h1>


                    <form action="{{url('/update_product_confirm',$product->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf

                    <div class="div_design">
                    <label>Product Title:</label>
                    <input class="text_color" type="text" name="title" placeholder="Write a title" required="" value="{{$product->title}}">
                    </div>

                    <div class="div_design">
                        <label>Product Description:</label>
                        <input class="text_color" type="text" name="description" placeholder="Write a description" required="" value="{{$product->description}}" >
                        </div>


                    <div class="div_design">
                        <label>Product Price:</label>
                        <input class="text_color" type="number" name="price" placeholder="Write a price" required="" value="{{$product->price}}">
                    </div>

                    <div class="div_design">
                        <label>Discount Price:</label>
                        <input class="text_color" type="number" name="discount_price" placeholder="Write a discount price" value="{{$product->discount_price}}">
                    </div>

                    <div class="div_design">
                        <label>Product Quantity:</label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required="" value="{{$product->quantity}}">
                    </div>

                    <div class="div_design">
                        <label>Product Category:</label>
                        <select class="text_color" name="category" required="" >
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                            @foreach ($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <label>Current Product Image Here:</label>
                        <img style="margin:auto;height: 100;" class="img" src="/product/{{$product->image}}">
                    </div>

                    <div class="div_design">
                        <label>Change Product Image Here:</label>
                        <input class="text_color"  type="file" name="image" >
                    </div>

                    <div class="div_design" >

                        <input value="Update Product" class="btn btn-primary" type="submit" >
                    </div>

                    </form>

                </div>












        </div>
        </div>

    <!-- container-scroller -->
 @include('admin.script')
  </body>
</html>
