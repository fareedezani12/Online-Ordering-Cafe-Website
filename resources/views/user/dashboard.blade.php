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
<body>
<div id="loader">

    <img src="{{ asset('images/logo-petadunia.jpg') }}">

    <h2>

        Peta Dunia Cafe

    </h2>

</div>
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

    <main>
        <section class="customer-hero">

            <div class="hero-text">

                <span class="hero-badge">

                    👋 WELCOME BACK

                </span>

                <h1>

                    Hello,

                    {{ Auth::user()->name }}

                </h1>

                <h2>

                    Taste The World Again

                </h2>

                <p>

                    Your favourite international dishes are waiting for you.
                    Continue collecting reward points and unlock exclusive member benefits.

                </p>

                <div class="hero-buttons">

                    <a href="{{ url('/menu') }}"
                    class="hero-btn primary">

                        🍽 Order Now

                    </a>

                    <a href="{{ url('/my-orders') }}"
                    class="hero-btn secondary">

                        📦 Track Order

                    </a>

                </div>

            </div>

            <div class="hero-image">

                <!-- Floating Card 1 -->

                <div class="floating-card card1">

                    ⭐ 4.9 Rating

                </div>

                <!-- Floating Card 2 -->

                <div class="floating-card card2">

                    🔥 Best Seller

                </div>

                <!-- Floating Card 3 -->

                <div class="floating-card card3">

                    👨‍🍳 Fresh Daily

                </div>

                <!-- YOUR EXISTING ROTATING IMAGE -->

                <img
                    src="{{ asset('images/food-landing-01.png') }}"
                    id="heroImage"
                    alt="Food">

                <div class="floating-member card1">

                    👑

                    {{ $membership->membership_level ?? 'Bronze' }}

                </div>

                <div class="floating-member card2">

                    ⭐

                    {{ $membership->points ?? 0 }}

                    Points

                </div>

                @if($recentOrders->where('status','!=','completed')->count())

                <div class="floating-member card3">

                    📦 Active Order

                </div>

                @endif

            </div>

        </section>

        <section class="popular-section">

            <div class="section-title">

                <span>

                    🔥 POPULAR THIS WEEK

                </span>

                <h2>

                    Customer Favourite Dishes

                </h2>

            </div>

            <div class="popular-grid">

                @foreach($recommendMenus as $menu)

                <div class="popular-card">

                    <img src="{{ asset('images/'.$menu->image) }}">

                    <div class="popular-info">

                        <small>

                            {{ $menu->category }}

                        </small>

                        <h3>

                            {{ $menu->name }}

                        </h3>

                        <p>

                            RM {{ number_format($menu->price,2) }}

                        </p>

                        <a href="{{ url('/add-to-cart/'.$menu->id) }}">

                            Add To Cart

                        </a>

                    </div>

                </div>

                @endforeach

            </div>

            <div class="view-menu-btn">

                <a href="{{ url('/menu') }}">

                    View Full Menu →

                </a>

            </div>

        </section>

        <section class="journey-section">

            <div class="journey-left">

            <h5>

            👑 MY MEMBERSHIP

            </h5>

            <h2>

            {{ $membership->membership_level ?? 'Bronze' }}

            Member

            </h2>

            <p>

            You have collected

            <strong>

            {{ number_format($membership->points ?? 0) }}

            points

            </strong>

            and enjoyed exclusive member benefits.

            </p>

            @php

            $level=$membership->membership_level ?? 'Bronze';

            $target=300;

            $next='Silver';

            if($level=='Silver'){

            $target=800;

            $next='Gold';

            }

            elseif($level=='Gold'){

            $target=1500;

            $next='Platinum';

            }

            elseif($level=='Platinum'){

            $target=$membership->total_spending;

            $next='Maximum';

            }

            $progress=$target>0?min(100,($membership->total_spending/$target)*100):100;

            @endphp

            <div class="progress">

            <div class="progress-fill"

            style="width:{{ $progress }}%">

            </div>

            </div>

            <p>

            Spend

            <b>

            RM {{ number_format(max(0,$target-$membership->total_spending),2) }}

            </b>

            more to become

            <b>

            {{ $next }}

            </b>

            Member.

            </p>

            <a href="{{ url('/membership') }}"

            class="journey-btn">

            View Membership

            </a>

            </div>

            <div class="journey-right">

            @if($recentOrders->where('status','!=','completed')->count())

            @php

            $order=$recentOrders->first();

            @endphp

            <h5>

            📦 CURRENT ORDER

            </h5>

            <h2>

            #{{ $order->id }}

            </h2>

            <p>

            Status :

            <b>

            {{ ucfirst($order->status) }}

            </b>

            </p>

            <div class="progress">

            @if($order->status=='pending')

            <div class="progress-fill"

            style="width:30%">

            </div>

            @elseif($order->status=='preparing')

            <div class="progress-fill"

            style="width:65%">

            </div>

            @else

            <div class="progress-fill"

            style="width:100%">

            </div>

            @endif

            </div>

            <a href="{{ url('/my-orders') }}"

            class="journey-btn">

            Track Order

            </a>

            @else

            <h5>

            🍽 READY FOR YOUR NEXT MEAL?

            </h5>

            <h2>

            No Active Orders

            </h2>

            <p>

            Discover our latest international dishes today.

            </p>

            <a href="{{ url('/menu') }}"

            class="journey-btn">

            Browse Menu

            </a>

            @endif

            </div>

        </section>

        <section class="order-again-section">

            <div class="section-title">

                <span>

                    ❤️ ORDER AGAIN

                </span>

                <h2>

                    Your Favourite Picks

                </h2>

                <p>

                    Reorder your favourite meals with one click.

                </p>

            </div>

            <div class="order-again-grid">

                @foreach($recommendMenus as $menu)

                <div class="again-card">

                    <img src="{{ asset('images/'.$menu->image) }}">

                    <div class="again-content">

                        <small>

                            {{ $menu->category }}

                        </small>

                        <h3>

                            {{ $menu->name }}

                        </h3>

                        <p>

                            RM {{ number_format($menu->price,2) }}

                        </p>

                        <a href="{{ url('/add-to-cart/'.$menu->id) }}">

                            <i class="fas fa-plus"></i>

                            Add To Cart

                        </a>

                    </div>

                </div>

                @endforeach

            </div>

        </section>

        @if($promotion)

        <section class="promo-banner">

            <div class="promo-content">

                <span>

                    🔥 LIMITED TIME OFFER

                </span>

                <h1>

                    {{ $promotion->title }}

                </h1>

                <p>

                    {{ $promotion->description }}

                </p>

                <a href="{{ url('/menu') }}">

                    Order Now →

                </a>

            </div>

            <div class="promo-image">

                🎉

            </div>

        </section>

        @endif

        <section class="gallery-section">

            <div class="section-title">

                <span>

                    GALLERY

                </span>

                <h2>

                    Discover Our Atmosphere

                </h2>

                <p>

                    Every meal tells a story. Experience the flavours,
                    ambience and moments that make Peta Dunia Cafe special.

                </p>

            </div>

            <div class="gallery-grid">

                <div class="gallery-item large">

                    <img src="{{ asset('images/gallery-01.jpg') }}">

                    <div class="gallery-overlay">

                        <i class="fas fa-expand"></i>

                    </div>

                </div>

                <div class="gallery-item">

                    <img src="{{ asset('images/gallery-02.jpg') }}">

                    <div class="gallery-overlay">

                        <i class="fas fa-expand"></i>

                    </div>

                </div>

                <div class="gallery-item">

                    <img src="{{ asset('images/gallery-03.jpg') }}">

                    <div class="gallery-overlay">

                        <i class="fas fa-expand"></i>

                    </div>

                </div>

                <div class="gallery-item wide">

                    <img src="{{ asset('images/gallery-04.jpg') }}">

                    <div class="gallery-overlay">

                        <i class="fas fa-expand"></i>

                    </div>

                </div>

                <div class="gallery-item">

                    <img src="{{ asset('images/gallery-01.jpg') }}">

                    <div class="gallery-overlay">

                        <i class="fas fa-expand"></i>

                    </div>

                </div>

                <div class="gallery-item">

                    <img src="{{ asset('images/gallery-01.jpg') }}">

                    <div class="gallery-overlay">

                        <i class="fas fa-expand"></i>

                    </div>

                </div>

            </div>

        </section>

        <section class="testimonial-section">

            <div class="section-title">

                <span>

                    CUSTOMER REVIEWS

                </span>

                <h2>

                    Loved By Thousands

                </h2>

            </div>

            <div class="testimonial-slider">

                <div class="testimonial-track">

                    <div class="testimonial-card">

                        <div class="stars">

                            ★★★★★

                        </div>

                        <p>

                            "The best cafe in Tanjung Malim.
                            Beautiful ambience and delicious food."

                        </p>

                        <h4>

                            Ahmad Firdaus

                        </h4>

                        <small>

                            Gold Member

                        </small>

                    </div>

                    <div class="testimonial-card">

                        <div class="stars">

                            ★★★★★

                        </div>

                        <p>

                            "The membership rewards are amazing.
                            I always redeem free drinks."

                        </p>

                        <h4>

                            Sarah Lee

                        </h4>

                        <small>

                            Platinum Member

                        </small>

                    </div>

                    <div class="testimonial-card">

                        <div class="stars">

                            ★★★★★

                        </div>

                        <p>

                            "Very fast online ordering and the UI
                            is very easy to use."

                        </p>

                        <h4>

                            Jason Tan

                        </h4>

                        <small>

                            Silver Member

                        </small>

                    </div>

                    <!-- Duplicate -->

                    <div class="testimonial-card">

                        <div class="stars">

                            ★★★★★

                        </div>

                        <p>

                            "The best cafe in Tanjung Malim.
                            Beautiful ambience and delicious food."

                        </p>

                        <h4>

                            Ahmad Firdaus

                        </h4>

                        <small>

                            Gold Member

                        </small>

                    </div>

                    <div class="testimonial-card">

                        <div class="stars">

                            ★★★★★

                        </div>

                        <p>

                            "The membership rewards are amazing."

                        </p>

                        <h4>

                            Sarah Lee

                        </h4>

                        <small>

                            Platinum Member

                        </small>

                    </div>

                </div>

            </div>

        </section>

    </main>

    <a href="{{ url('/menu') }}" class="floating-order">

    <i class="fas fa-utensils"></i>

    Order Now

    </a>
<section class="cta-section">

    <h2>

        Ready To Explore Global Flavours?

    </h2>

    <p>

        Order today and start collecting loyalty points.

    </p>

    <div>

        <a href="{{ url('/menu') }}">

            Order Now

        </a>

        @guest

        <a href="{{ route('register') }}">

            Join Membership

        </a>

        @endguest

    </div>

</section>
    <!-- Footer -->
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

<button id="topBtn">

<i class="fas fa-arrow-up"></i>

</button>

<script>
    const heroImage = document.getElementById('heroImage');
    const dishes = document.querySelectorAll('.dish');
    const cartCount = document.querySelector('.cart-count');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');

    const topBtn=document.getElementById("topBtn");

    window.onload=function(){

    setTimeout(function(){

    document.getElementById("loader").style.opacity="0";

    document.getElementById("loader").style.visibility="hidden";

    },1200);

    }

    window.onscroll=function(){

    if(document.documentElement.scrollTop>500){

    topBtn.style.display="block";

    }

    else{

    topBtn.style.display="none";

    }

    }

    topBtn.onclick=function(){

    window.scrollTo({

    top:0,

    behavior:"smooth"

    });

    }

    let cart = [];

    window.addEventListener('load', () => {
        heroImage.classList.add('spin');
    });

    dishes.forEach(dish => {
        dish.addEventListener('click', (e) => {
            if (e.target.closest('.add-to-cart')) return;
            const newImageSrc = dish.getAttribute('data-img');
            heroImage.classList.remove('spin');
            heroImage.src = newImageSrc;
            void heroImage.offsetWidth;
            heroImage.classList.add('spin');
        });
    });

    addToCartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.stopPropagation();
            const name = button.getAttribute('data-name');
            const price = parseFloat(button.getAttribute('data-price'));
            cart.push({ name, price });
            updateCartCount();
        });
    });

    function updateCartCount() {
        cartCount.textContent = cart.length;
    }

    hamburger.addEventListener('click', () => {
        nav.classList.toggle('active');
    });

</script>

</body>
</html>