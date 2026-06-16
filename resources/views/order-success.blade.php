<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Order Successful</title>

<link rel="stylesheet"
      href="{{ asset('css/success.css') }}">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

<div class="success-container">

<div class="success-card">

<div class="success-icon">

<i class="fas fa-check-circle"></i>

</div>

<h1>

Order Successfully Placed!

</h1>

<p>

Thank you for choosing

<b>Peta Dunia Cafe</b>.

Your order has been received and is now being prepared.

</p>

<div class="order-info">

<div>

<strong>

Order ID

</strong>

<br>

#{{ $order->id }}

</div>

<div>

<strong>

Dining

</strong>

<br>

{{ ucfirst(str_replace('_',' ',$order->order_type)) }}

</div>

<div>

<strong>

Payment

</strong>

<br>

{{ strtoupper($order->payment_method) }}

</div>

</div>

<div class="estimate">

⏱ Estimated Preparation Time

<br>

<strong>

10 - 15 Minutes

</strong>

</div>

<div class="success-buttons">

<a href="{{ url('/receipt/'.$order->id.'/view') }}">

View Receipt

</a>

<a href="{{ url('/my-orders') }}">

Track Order

</a>

</div>

</div>

</div>

</body>

</html>