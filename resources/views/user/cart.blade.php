<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Dunia Cafe - Global Flavors, Local Heart</title>

    <!-- Font Awesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/staff.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

<div class="container">
    <header id="header">

        <div class="logo">

            <img src="{{ asset('images/logo-petadunia.jpg') }}"
                class="logo-img">

            <span>

                Peta Dunia Cafe

            </span>

        </div>

        <nav>

            <ul>

                <li>

                    <a href="{{ url('/customer') }}">

                        Home

                    </a>

                </li>

                <li>

                    <a href="{{ url('/menu') }}">

                        Menu

                    </a>

                </li>

                <li>

                    <a href="{{ url('/gallery') }}">

                        Gallery

                    </a>

                </li>

                <li>

                    <a href="{{ url('/membership') }}">

                        Membership

                    </a>

                </li>

                <li>

                    <a href="{{ url('/my-orders') }}">

                        My Orders

                    </a>

                </li>

            </ul>

        </nav>

        <div class="header-right">

            <a href="{{ url('/cart') }}" class="cart-btn">

                <i class="fas fa-shopping-cart"></i>

                Cart

            </a>

            <a href="{{ url('/customer/profile') }}" class="profile-btn">

                <i class="fas fa-user-circle"></i>

                {{ Auth::user()->name }}

            </a>

            <form action="{{ route('logout') }}"
                method="POST">

                @csrf

                <button type="submit"
                        class="logout-btn">

                    Logout

                </button>

            </form>

        </div>

    </header>

    <section class="cart-hero">

    <span>

        🛒 MY CART

    </span>

    <h1>

        Shopping Cart

    </h1>

    <p>

        Review your selected dishes before proceeding to checkout.

    </p>

    @if(count($cart)==0)

<div class="empty-cart">

<h1>

🛒

</h1>

<h2>

Your cart is empty

</h2>

<p>

Discover delicious dishes and start your order.

</p>

<a href="{{ url('/menu') }}">

Browse Menu

</a>

</div>

@else

<!-- cart layout -->

@endif

</section>

@php
    $total = 0;
@endphp

<div class="cart-layout">

    <div class="cart-left">

        @foreach($cart as $item)

        @php

        $total += $item['price']*$item['quantity'];

        @endphp

        <div class="cart-card">

        <img src="{{ asset('images/'.$item['image']) }}">

        <div class="cart-info">

        <h2>

        {{ $item['name'] }}

        </h2>

        <p>

        RM {{ number_format($item['price'],2) }}

        </p>

        <span>

        Quantity :

        {{ $item['quantity'] }}

        </span>

        </div>

        <div class="cart-action">

        <h3>

        RM {{ number_format($item['price']*$item['quantity'],2) }}

        </h3>

        <a href="{{ url('/remove-cart/'.$loop->index) }}">

        Remove

        </a>

        </div>

        </div>

        @endforeach

    </div>
</div>
<div class="cart-right">

<h2>

Order Summary

</h2>

<div>

<span>

Subtotal

</span>

<span>

RM {{ number_format($total,2) }}

</span>

</div>

<hr>

<div class="grand-total">

<span>

Total

</span>

<span>

RM {{ number_format($total,2) }}

</span>

</div>

<a href="{{ url('/menu') }}"

class="continue-btn">

Continue Shopping

</a>

<a href="{{ url('/checkout') }}"

class="checkout-btn">

Proceed To Checkout

</a>

</div>

</div>
</div>
</body>
</html>