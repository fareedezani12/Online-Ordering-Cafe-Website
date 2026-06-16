<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Checkout</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

<div class="container">

<header>

    <div class="logo">

        <img src="{{ asset('images/logo-petadunia.jpg') }}"
             class="logo-img">

        <span>

            Peta Dunia Cafe

        </span>

    </div>

</header>

<section class="checkout-hero">

    <span>

        💳 CHECKOUT

    </span>

    <h1>

        Complete Your Order

    </h1>

    <p>

        You're just one step away from enjoying delicious international cuisine.

    </p>

</section>

<div class="checkout-progress">

    <div>

        ✅ Cart

    </div>

    <div class="active">

        💳 Checkout

    </div>

    <div>

        📦 Order

    </div>

    <div>

        🧾 Receipt

    </div>

</div>

<form action="{{ url('/place-order') }}"
      method="POST">

@csrf

<div class="checkout-layout">

<div class="checkout-left">

@guest

<h2>

Guest Information

</h2>

<input type="text"
       name="guest_name"
       placeholder="Your Name"
       required>

<input type="text"
       name="guest_phone"
       placeholder="Phone Number"
       required>

@endguest

@auth

<div class="member-box">

    <h2>

        👋 Welcome,

        {{ auth()->user()->name }}

    </h2>

    <p>

        Reward points will be credited after your purchase.

    </p>

</div>

@endauth

<h2>

Dining Option

</h2>

<div class="option-grid">

<label class="option-card">

<input type="radio"
       name="order_type"
       value="dine_in"
       checked>

🍽

<h3>

Dine In

</h3>

<p>

Enjoy your meal at our cafe.

</p>

</label>

<label class="option-card">

<input type="radio"
       name="order_type"
       value="takeaway">

🥡

<h3>

Take Away

</h3>

<p>

Pack and enjoy anywhere.

</p>

</label>

</div>

<h2>

Payment Method

</h2>

<div class="option-grid">

<label class="option-card">

<input type="radio"
       name="payment_method"
       value="cash"
       checked>

💵

<h3>

Cash

</h3>

</label>

<label class="option-card">

<input type="radio"
       name="payment_method"
       value="fpx">

🏦

<h3>

FPX

</h3>

</label>

<label class="option-card">

<input type="radio"
       name="payment_method"
       value="ewallet">

📱

<h3>

E-Wallet

</h3>

</label>

</div>

<h2>

Special Request

</h2>

<textarea name="remark"
          rows="4"
          placeholder="Example: No spicy, less sugar, extra sauce..."></textarea>

</div>

<div class="checkout-right">

<h2>

Order Summary

</h2>

@php

$total=0;

$cart=session('cart',[]);

@endphp

@foreach($cart as $item)

@php

$total+=$item['price']*$item['quantity'];

@endphp

<div class="summary-row">

<span>

{{ $item['name'] }}

x{{ $item['quantity'] }}

</span>

<span>

RM {{ number_format($item['price']*$item['quantity'],2) }}

</span>

</div>

@endforeach

<hr>

<div class="summary-row">

<span>

Subtotal

</span>

<span>

RM {{ number_format($total,2) }}

</span>

</div>

<div class="summary-row">

<span>

SST (6%)

</span>

<span>

RM {{ number_format($total,2) }}

</span>

</div>

<hr>

<div class="summary-row total">

<span>

Total

</span>

<span>

RM {{ number_format($total,2) }}

</span>

</div>

<a href="{{ url('/cart') }}"
   class="back-btn">

Back To Cart

</a>

<button type="submit"
        class="checkout-btn">

Place Order

</button>

</div>

</div>

</form>

</div>

</body>

</html>