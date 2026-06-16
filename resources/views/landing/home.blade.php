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
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo-petadunia.jpg') }}" alt="Peta Dunia Logo" class="logo-img">
            <span>Peta Dunia Cafe</span>
        </div>

        <nav id="nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="{{ url('/menu') }}">Menu</a></li>
                <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
            </ul>
        </nav>

        <div class="buttons">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary">Sign Up</a>
                @endif
            @endauth

            <div class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </div>

            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <main>
        <section class="hero">

            <div class="hero-text">

                <span class="hero-label">

                    🌎 GLOBAL FLAVORS • LOCAL HEART

                </span>

                <h1>

                    Taste The World,

                    <br>

                    One Bite At A Time

                </h1>

                <p>

                    Experience authentic cuisine from around the globe,
                    freshly prepared with premium ingredients and served
                    with unforgettable hospitality.

                </p>

                <div class="hero-rating">

                    <div class="stars">

                        ★★★★★

                    </div>

                    <span>

                        Trusted by 1000+ happy customers

                    </span>

                </div>

                <div class="hero-buttons">

                    <a href="{{ url('/menu') }}" class="btn btn-secondary">

                        <i class="fas fa-utensils"></i>

                        Order Now

                    </a>

                    @guest

                    <a href="{{ route('register') }}" class="member-float">

                        <i class="fas fa-crown"></i>

                        Become Member

                    </a>

                    @else

                    <a href="{{ url('/membership') }}" class="btn btn-tertiery">

                        <i class="fas fa-crown"></i>

                        My Membership

                    </a>

                    @endguest

                </div>

                <div class="hero-features">

                    <div>

                        <i class="fas fa-globe"></i>

                        25+ International Dishes

                    </div>

                    <div>

                        <i class="fas fa-award"></i>

                        Premium Quality

                    </div>

                    <div>

                        <i class="fas fa-clock"></i>

                        Fast Ordering

                    </div>

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

            </div>

        </section>

        <section class="stats-section">

            <div class="stat-card">

                <i class="fas fa-utensils"></i>

                <h2>1500+</h2>

                <p>Orders Served</p>

            </div>

            <div class="stat-card">

                <i class="fas fa-globe-asia"></i>

                <h2>25+</h2>

                <p>International Dishes</p>

            </div>

            <div class="stat-card">

                <i class="fas fa-users"></i>

                <h2>500+</h2>

                <p>Loyal Members</p>

            </div>

            <div class="stat-card">

                <i class="fas fa-star"></i>

                <h2>4.9</h2>

                <p>Customer Rating</p>

            </div>

        </section>

        <section class="why-section">

            <div class="section-title">

                <span>

                    WHY CHOOSE US

                </span>

                <h2>

                    More Than Just A Cafe

                </h2>

            </div>

            <div class="why-grid">

                <div class="why-card">

                    <i class="fas fa-earth-asia"></i>

                    <h3>

                        Global Cuisine

                    </h3>

                    <p>

                        Enjoy dishes inspired by countries around the world.

                    </p>

                </div>

                <div class="why-card">

                    <i class="fas fa-leaf"></i>

                    <h3>

                        Fresh Ingredients

                    </h3>

                    <p>

                        Carefully selected premium ingredients every day.

                    </p>

                </div>

                <div class="why-card">

                    <i class="fas fa-crown"></i>

                    <h3>

                        Membership Rewards

                    </h3>

                    <p>

                        Collect points and unlock exclusive discounts.

                    </p>

                </div>

                <div class="why-card">

                    <i class="fas fa-bolt"></i>

                    <h3>

                        Fast Ordering

                    </h3>

                    <p>

                        Order online in just a few clicks.

                    </p>

                </div>

            </div>

        </section>

        <section class="popular-section">

            <div class="section-title">

                <span>

                    OUR BEST SELLERS

                </span>

                <h2>

                    Customer Favourite Menu

                </h2>

                <p>

                    Discover the most loved dishes prepared by our chefs.

                </p>

            </div>

            <div class="popular-grid">

                @foreach($menus as $menu)

                <div class="popular-card">

                    <div class="popular-image">

                        <img src="{{ asset('images/'.$menu->image) }}">

                        <span class="best-tag">

                            🔥 Best Seller

                        </span>

                    </div>

                    <div class="popular-content">

                        <small>

                            {{ $menu->category }}

                        </small>

                        <h3>

                            {{ $menu->name }}

                        </h3>

                        <p>

                            {{ Str::limit($menu->description,80) }}

                        </p>

                        <div class="popular-bottom">

                            <h4>

                                RM {{ number_format($menu->price,2) }}

                            </h4>

                            <a href="{{ url('/add-to-cart/'.$menu->id) }}">

                                <i class="fas fa-cart-plus"></i>

                            </a>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

            <div class="menu-btn">

                <a href="{{ url('/menu') }}">

                    View Full Menu

                </a>

            </div>

        </section>

        <section class="membership-section">

            <div class="section-title">

                <span>

                    LOYALTY PROGRAM

                </span>

                <h2>

                    Become A Member & Enjoy Exclusive Rewards

                </h2>

                <p>

                    Join our loyalty programme and collect points every time you order.

                    Unlock higher membership levels and enjoy greater benefits.

                </p>

            </div>

            <div class="membership-grid">

                <div class="member-card bronze">

                    <div class="member-icon">

                        🥉

                    </div>

                    <h3>

                        Bronze

                    </h3>

                    <p>

                        Every new member starts here.

                    </p>

                    <ul>

                        <li>✔ Collect loyalty points</li>

                        <li>✔ Birthday reward</li>

                        <li>✔ Member-only updates</li>

                    </ul>

                </div>

                <div class="member-card silver">

                    <div class="member-icon">

                        🥈

                    </div>

                    <h3>

                        Silver

                    </h3>

                    <p>

                        Spend RM300 to unlock.

                    </p>

                    <ul>

                        <li>✔ Everything in Bronze</li>

                        <li>✔ 5% discount</li>

                        <li>✔ Faster reward redemption</li>

                    </ul>

                </div>

                <div class="member-card gold">

                    <div class="popular-badge">

                        MOST POPULAR

                    </div>

                    <div class="member-icon">

                        🥇

                    </div>

                    <h3>

                        Gold

                    </h3>

                    <p>

                        Spend RM800 to unlock.

                    </p>

                    <ul>

                        <li>✔ 10% discount</li>

                        <li>✔ Exclusive promotions</li>

                        <li>✔ Priority rewards</li>

                    </ul>

                </div>

                <div class="member-card platinum">

                    <div class="member-icon">

                        💎

                    </div>

                    <h3>

                        Platinum

                    </h3>

                    <p>

                        Spend RM1500 and become our VIP.

                    </p>

                    <ul>

                        <li>✔ 15% discount</li>

                        <li>✔ VIP promotions</li>

                        <li>✔ Premium member privileges</li>

                    </ul>

                </div>

            </div>

            @guest

            <div class="membership-button">

                <a href="{{ route('register') }}">

                    <i class="fas fa-crown"></i>

                    Join Membership Today

                </a>

            </div>

            @endguest

        </section>

        <section class="promo-section">

            <div class="promo-overlay"></div>

            <div class="promo-content">

                <span>

                    🔥 LIMITED TIME OFFER

                </span>

                <h2>

                    Enjoy Up To

                    <strong>15% OFF</strong>

                    For Gold & Platinum Members

                </h2>

                <p>

                    Collect loyalty points with every purchase and unlock
                    exclusive member discounts, birthday rewards and special
                    seasonal promotions.

                </p>

                <div class="promo-buttons">

                    <a href="{{ url('/menu') }}">

                        Order Now

                    </a>

                    @guest

                    <a href="{{ route('register') }}">

                        Join Membership

                    </a>

                    @else

                    <a href="{{ url('/membership') }}">

                        My Membership

                    </a>

                    @endguest

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

        <section class="instagram-banner">

            <i class="fab fa-instagram"></i>

            <h2>

                Follow Our Journey

            </h2>

            <p>

                @petaduniacafe

            </p>

        </section>

        <section class="contact-section">

            <div class="section-title">

                <span>

                    VISIT US

                </span>

                <h2>

                    We'd Love To Welcome You

                </h2>

                <p>

                    Enjoy international flavours in a warm and comfortable atmosphere.

                </p>

            </div>

            <div class="contact-wrapper">

                <div class="contact-info">

                    <div class="info-card">

                        <i class="fas fa-location-dot"></i>

                        <div>

                            <h3>

                                Address

                            </h3>

                            <p>

                                Peta Dunia Cafe<br>

                                Tanjung Malim, Perak

                            </p>

                        </div>

                    </div>

                    <div class="info-card">

                        <i class="fas fa-phone"></i>

                        <div>

                            <h3>

                                Contact

                            </h3>

                            <p>

                                +60 12-345 6789

                            </p>

                        </div>

                    </div>

                    <div class="info-card">

                        <i class="fas fa-envelope"></i>

                        <div>

                            <h3>

                                Email

                            </h3>

                            <p>

                                petaduniacafe@gmail.com

                            </p>

                        </div>

                    </div>

                    <div class="info-card">

                        <i class="fas fa-clock"></i>

                        <div>

                            <h3>

                                Opening Hours

                            </h3>

                            <p>

                                Monday - Sunday

                                <br>

                                9:00 AM - 11:00 PM

                            </p>

                        </div>

                    </div>

                </div>

                <div class="contact-map">

                    <iframe

                    src="https://www.google.com/maps/embed?pb="

                    loading="lazy"

                    allowfullscreen>

                    </iframe>

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