<!DOCTYPE html>
<html>
   <head>

    @include('home.css')

    <style type="text/css">

    .center{
        margin: auto;
        width: 70%;
        padding: 30px;
        text-align: center;
    }
    table,th,td{
        border: 1px solid black;
    }
    .th_deg{
        padding: 10px;
        background-color: skyblue;
        font-size: 20px;
        font-weight: bold;
    }

    </style>

   </head>
   <body>

         <!-- header section strats -->

         @include('home.header')

         <!-- end header section -->


         <div class="center">

            <table>

                <tr>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Payment Status</th>
                    <th class="th_deg" >Delivery Status</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Cancel Order</th>
                </tr>

                @foreach ($order as $order)

                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img style="height: 150px;width:180px;" src="product/{{$order->image}}">
                    </td>
                    <td>
                        @if($order->delivery_status == 'processing')
                        <a onclick="return confirm('Are You sure to cancel this order!!!')" href="{{url('cancel_order',$order->id)}}" class="btn btn-danger">Cancel Order</a>

                        @else
                        <p style="color: blue">Not Allowed</p>

                        @endif
                    </td>
                </tr>
                @endforeach

            </table>

         </div>






      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
