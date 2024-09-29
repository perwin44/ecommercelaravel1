{{-- $logopath=public_path('product');
$logoData=base64_encode(file_get_contents($logoPath));
$logoBase64='data:product/svg+xml;base64' . $logoData; --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Order Details</h1>
   Customer Name:<h3> {{$order->name}}</h3>
   Customer Email:<h3> {{$order->email}}</h3>
   Customer Phone:<h3> {{$order->phone}}</h3>
   Customer Address:<h3> {{$order->address}}</h3>
   Customer Id:<h3> {{$order->user_id}}</h3>

   Product Name:<h3> {{$order->product_title}}</h3>
   Product Price:<h3> {{$order->price}}</h3>
   Product Quantity:<h3> {{$order->quantity}}</h3>
   Payment Status:<h3> {{$order->payment_status}}</h3>
   Product Id:<h3> {{$order->product_id}}</h3>

   <br><br>
   <img height="250px" width="450px" src="data:product/jpg;base64,{{base64_encode(file_get_contents(public_path('/product/1727121999.jpg')))}}">


</body>
</html>
