<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')

    <style type="text/css">

        .div_center{
            text-align: center;
            padding-top: 40px;

        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;

        }
        .input_color{
            color: #000;
        }
        .center{
            margin: auto;
            width: 60%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
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



            <h2 class="h2_font">Add Category</h2>

            <form action="{{url('add_category')}}" method="Post">
                @csrf

                <input class="input_color" type="text" name="name" placeholder="Write category name">

                <input type="submit" class="btn btn-primary" name="submit" value="Add Category">

            </form>

        </div>

        <table class="center" >

            <tr>
                <td>Category Name</td>
                <td>Action</td>
            </tr>

            @foreach ($data as $data)

            <tr>
                <td>{{$data->category_name}}</td>
                <td>
                    <a onclick="return confirm('Are You Sure to delete this?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach

        </table>





        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @include('admin.script')

  </body>
</html>
