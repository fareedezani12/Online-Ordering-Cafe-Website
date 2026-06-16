<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Rewards</title>

    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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

    <div class="buttons">

        <a href="{{ url('/menu') }}"
           class="btn btn-secondary">

            <i class="fas fa-utensils"></i>

            Browse Menu

        </a>

        <a href="{{ url('/cart') }}"
           class="btn btn-primary">

            <i class="fas fa-cart-shopping"></i>

            Cart

        </a>

    </div>

</header>

<body>

<div class="container">

<div class="section-title">

<span>

🎁 MEMBER REWARDS

</span>

<h1>

Redeem Your Points

</h1>

<p>

Use your loyalty points to enjoy exclusive rewards.

</p>

</div>

<div class="reward-grid">

<div class="reward-item">

<div class="reward-icon">

☕

</div>

<h2>

Free Coffee

</h2>

<p>

100 Points

</p>

<button>

Redeem

</button>

</div>

<div class="reward-item">

<div class="reward-icon">

🍰

</div>

<h2>

Free Cake

</h2>

<p>

250 Points

</p>

<button>

Redeem

</button>

</div>

<div class="reward-item">

<div class="reward-icon">

🥪

</div>

<h2>

Free Sandwich

</h2>

<p>

500 Points

</p>

<button>

Redeem

</button>

</div>

<div class="reward-item">

<div class="reward-icon">

🎫

</div>

<h2>

15% Voucher

</h2>

<p>

700 Points

</p>

<button>

Redeem

</button>

</div>

</div>

</div>

</body>

</html>