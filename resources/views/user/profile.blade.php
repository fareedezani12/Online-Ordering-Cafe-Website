<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Profile</title>

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

<section class="profile-hero">

<div class="profile-avatar">

<i class="fas fa-user"></i>

</div>

<div>

<h1>

{{ Auth::user()->name }}

</h1>

<p>

{{ Auth::user()->email }}

</p>

@if($membership)

<span class="member-badge">

👑 {{ $membership->membership_level }} Member

</span>

@endif

</div>

</section>

<div class="profile-grid">

<div class="profile-card">

<h2>

Personal Information

</h2>

<form action="{{ route('profile.update') }}" method="POST">

@csrf

@method('PATCH')

<label>

Full Name

</label>

<input type="text"

name="name"

value="{{ Auth::user()->name }}">

<label>

Email

</label>

<input type="email"

name="email"

value="{{ Auth::user()->email }}">

<button type="submit">

Update Profile

</button>

</form>

</div>

<div class="account-card">

<h2>

Account Summary

</h2>

<div class="summary-item">

<span>Total Points</span>

<strong>

{{ $membership->points ?? 0 }}

</strong>

</div>

<div class="summary-item">

<span>Membership</span>

<strong>

{{ $membership->membership_level ?? 'Bronze' }}

</strong>

</div>

<div class="summary-item">

<span>Total Spending</span>

<strong>

RM {{ number_format($membership->total_spending ?? 0,2) }}

</strong>

</div>

<div class="summary-item">

<span>Total Orders</span>

<strong>

{{ $ordersCount }}

</strong>

</div>

</div>

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