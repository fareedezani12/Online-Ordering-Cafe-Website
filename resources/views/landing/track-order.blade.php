
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Dunia Cafe - Global Flavors, Local Heart</title>

    <!-- Font Awesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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

<style>
    .cart-btn,
    .profile-btn,
    .logout-btn{

    height:46px;

    padding:0 28px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:30px;

    font-weight:600;

    text-decoration:none;

    transition:.3s;

}

.track-hero{

padding:80px 20px;

display:flex;

justify-content:center;

align-items:center;

}

.track-card{

background:white;

width:900px;
max-width:95%;
padding:60px;

border-radius:30px;

box-shadow:0 20px 50px rgba(0,0,0,.08);

text-align:center;

}

.track-card h1{

font-size:48px;

color:#00573F;

margin-bottom:15px;

}

.track-card p{

font-size:18px;

color:#777;

margin-bottom:35px;

}

.track-form{

display:flex;

flex-direction:column;

gap:20px;

}

.track-form input{

padding:18px 25px;

border-radius:50px;

border:1px solid #ddd;

font-size:17px;

}

.track-form button{

padding:18px;

border:none;

border-radius:50px;

background:#F47920;

color:white;

font-size:18px;

font-weight:600;

cursor:pointer;

transition:.3s;

}

.track-form button:hover{

transform:translateY(-3px);

background:#df6815;

}

.tracking-progress{

display:flex;

align-items:center;

justify-content:center;

margin:40px 0;

gap:0;

}

.step{

display:flex;

flex-direction:column;

align-items:center;

width:120px;

position:relative;

}

.circle{

width:60px;

height:60px;

border-radius:50%;

background:#ddd;

display:flex;

align-items:center;

justify-content:center;

font-size:24px;

font-weight:bold;

transition:.3s;

}

.step p{

margin-top:10px;

font-size:15px;

font-weight:600;

color:#666;

}

.line{

height:4px;

width:80px;

background:#ddd;

margin:0 5px;

border-radius:10px;

}

.step.active .circle{

background:#F47920;

color:white;

}

.step.active p{

color:#F47920;

}

.line.active{

background:#F47920;

}

.track-result-card{

margin-top:40px;

padding:30px;

border-top:1px solid #eee;

text-align:left;

}

.track-item{

display:flex;

justify-content:space-between;

padding:12px 0;

border-bottom:1px solid #eee;

}

.track-result-card h2{

color:#00573F;

margin-bottom:20px;

}

.track-result-card h3{

margin-top:20px;

color:#F47920;

font-size:28px;

text-align:right;

}
</style>

<body>
<div class="container">
<header id="header">

    <div class="logo">

        <a href="{{ Auth::check() ? url('/customer') : url('/') }}">

            <img src="{{ asset('images/logo-petadunia.jpg') }}"
                 class="logo-img">

        </a>

        <span>

            Peta Dunia Cafe

        </span>

    </div>

    <nav>

        <ul>

            <li>

                <a href="{{ Auth::check() ? url('/customer') : url('/') }}">

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

            @guest

            <li>

                <a href="{{ url('/track-order') }}">

                    Track Order

                </a>

            </li>

            @endguest

            @auth

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

            @endauth

        </ul>

    </nav>

    <div class="header-right">

        @guest

        <a href="{{ url('/cart') }}"
           class="cart-btn">

            <i class="fas fa-shopping-cart"></i>

            Cart

        </a>

        <a href="{{ route('login') }}"
           class="profile-btn">

            Login

        </a>

        <a href="{{ route('register') }}"
           class="logout-btn">

            Register

        </a>

        @endguest

        @auth

        <a href="{{ url('/cart') }}"
           class="cart-btn">

            <i class="fas fa-shopping-cart"></i>

            Cart

        </a>

        <a href="{{ url('/customer/profile') }}"
           class="profile-btn">

            <i class="fas fa-user-circle"></i>

            {{ Auth::user()->name }}

        </a>

        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button class="logout-btn">

                Logout

            </button>

        </form>

        @endauth

    </div>

</header>

<section class="track-hero">

    <div class="track-card">

        <h1>

            📦 Track Your Order

        </h1>

        <p>

            Enter your Order Number and Phone Number to view the latest status.

        </p>

        <form action="{{ route('track.order.search') }}"
              method="POST"
              class="track-form">

            @csrf

            <input
            type="text"
            name="phone"
            placeholder="Enter Your Phone Number"
            required>

            <button type="submit">

            🔍 Track My Latest Order

            </button>

        </form>

        @if(request()->isMethod('post') && !$order)

        <div class="track-error">

        <i class="fas fa-circle-exclamation"></i>

        No order found for this phone number.

        </div>

        @endif

        @php

$waiting='Ready';

if($order){

    switch($order->status){

        case 'pending':

            $waiting='15 - 20 Minutes';

            break;

        case 'preparing':

            $waiting='5 - 10 Minutes';

            break;

        case 'completed':

            $waiting='Ready for Collection';

            break;

        case 'cancelled':

            $waiting='Cancelled';

            break;

    }

}

@endphp



@if($order)

<div class="tracking-progress">

<div class="step {{ in_array($order->status,['pending','preparing','completed']) ? 'active' : '' }}">

<div class="circle">

✓

</div>

<p>

Order Received

</p>

</div>

<div class="line {{ in_array($order->status,['preparing','completed']) ? 'active' : '' }}"></div>

<div class="step {{ in_array($order->status,['preparing','completed']) ? 'active' : '' }}">

<div class="circle">

🍳

</div>

<p>

Preparing

</p>

</div>

<div class="line {{ $order->status=='completed' ? 'active' : '' }}"></div>

<div class="step {{ $order->status=='completed' ? 'active' : '' }}">

<div class="circle">

🍽

</div>

<p>

Ready

</p>

</div>

</div>

<div class="track-result-card">

<h2>

Order #{{ $order->id }}

</h2>

<p>

<strong>Status:</strong>

{{ ucfirst($order->status) }}

</p>

<p>

<strong>Payment:</strong>

{{ ucfirst($order->payment_status) }}

</p>

<p>

<strong>Estimated Waiting Time:</strong>

{{ $waiting }}

</p>

<hr>

@foreach($order->items as $item)

<div class="track-item">

<span>

{{ $item->menu->name }}

× {{ $item->quantity }}

</span>

<span>

RM {{ number_format($item->price * $item->quantity,2) }}

</span>

</div>

@endforeach

<hr>

<h3>

Total

RM {{ number_format($order->total_price,2) }}

</h3>

</div>

@endif

    </div>

</section>

</section>
</div>
</body>
</html>
