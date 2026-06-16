<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>My Orders</title>

<link rel="stylesheet" href="{{ asset('css/customer.css') }}">
<link rel="stylesheet" href="{{ asset('css/orders.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

<section class="orders-hero">

<h1>

My Orders

</h1>

<p>

Track every delicious journey from our kitchen to your table.

</p>

</section>

<div class="orders-list">

@forelse($orders as $order)

<div class="order-card-modern">

<div class="order-header">

<div>

<small>

ORDER ID

</small>

<h2>

#{{ $order->id }}

</h2>

</div>

<div>

<h2>

RM {{ number_format($order->total_price,2) }}

</h2>

</div>

</div>

<div class="order-progress">

<div class="progress-line">

<div class="progress-active

@if($order->status=='pending')

pending

@elseif($order->status=='preparing')

preparing

@else

completed

@endif

">

</div>

</div>

@php

$waiting='Ready';

switch($order->status){

case 'pending':

$waiting='15 Minutes';

break;

case 'preparing':

$waiting='8 Minutes';

break;

case 'completed':

$waiting='Ready For Collection';

break;

case 'cancelled':

$waiting='Cancelled';

break;

}

@endphp

<div class="progress-text">

<span>

Received

</span>

<span>

Preparing

</span>

<span>

Completed

</span>

<p>

⏱ Waiting Time:

<strong>

{{ $waiting }}

</strong>

</p>

</div>

</div>

<div class="order-footer">

<div>

<strong>

Payment

</strong>

<br>

{{ ucfirst($order->payment_status) }}

</div>

<div>

<strong>

Status

</strong>

<br>

{{ ucfirst($order->status) }}

</div>

<div>

<a href="/receipt/{{ $order->id }}/view">

View Receipt

</a>

</div>

</div>

</div>

@empty

<div class="empty-card">

<i class="fas fa-box-open"></i>

<h2>

No Orders Yet

</h2>

<p>

Start exploring our international menu today.

</p>

<a href="/menu">

Browse Menu

</a>

</div>

@endforelse

</div>
<footer class="footer">
        <div class="footer-container">

            <div class="footer-section">
                <div class="logo">
                    <img src="{{ asset('images/logo-petadunia.jpg') }}" alt="Peta Dunia Logo" class="logo-img">
                    <span>Peta Dunia Cafe</span>
                </div>
                <p>
                    Bringing flavors from around the world to your table.
                    Taste global cuisine with a local heart.
                </p>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="{{ url('/menu') }}">Menu</a></li>
                    <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> Kuala Lumpur, Malaysia</p>
                <p><i class="fas fa-phone"></i> +60 12-345 6789</p>
                <p><i class="fas fa-envelope"></i> petaduniacafe@gmail.com</p>
            </div>

            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Peta Dunia Cafe. All Rights Reserved. Developed By Muhammad Fareed bin Ezani</p>
        </div>
    </footer>
</div>

</body>

</html>