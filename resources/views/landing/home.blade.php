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

</head>
<body>

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
                <h1>Taste the World,<br>One Bite at a Time</h1>
                <p>Explore authentic flavors from every corner of the globe. From Asian street food to European classics, our dishes are crafted with passion and the finest ingredients.</p>
                <button class="btn btn-tertiery">Explore Our Menu</button>
                <button class="btn btn-secondary"><i class="fas fa-phone"></i> Book a Table</button>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/food-landing-01.png') }}" alt="Global Cuisine Selection" id="heroImage">
            </div>
        </section>

        <section class="popular-dishes">
            <h2>Popular In The Cafe</h2>
            <div class="dishes">
                 @foreach($menus as $menu)
                <div class="dish">
                    <img src="{{ asset('images/' . $menu->image) }}"alt="{{ $menu->name }}">
                    <h3>{{ $menu->name }}</h3>
                    <p>{{ $menu->description }}</p>
                    <span class="price">RM {{ $menu->price }}</span>
                    <button class="add-to-cart" data-name="Nasi Goreng" data-price="45.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </section>

        <section class="popular-dishes">
            <h2>Popular In The Cafe</h2>
            <div class="dishes">
                 @foreach($menus as $menu)
                <div class="dish">
                    <img src="{{ asset('images/' . $menu->image) }}"alt="{{ $menu->name }}">
                    <h3>{{ $menu->name }}</h3>
                    <p>{{ $menu->description }}</p>
                    <span class="price">RM {{ $menu->price }}</span>
                    <button class="add-to-cart" data-name="Nasi Goreng" data-price="45.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </section>

        <section class="popular-dishes">
            <h2>Popular In The Cafe</h2>
            <div class="dishes">
                 @foreach($menus as $menu)
                <div class="dish">
                    <img src="{{ asset('images/' . $menu->image) }}"alt="{{ $menu->name }}">
                    <h3>{{ $menu->name }}</h3>
                    <p>{{ $menu->description }}</p>
                    <span class="price">RM {{ $menu->price }}</span>
                    <button class="add-to-cart" data-name="Nasi Goreng" data-price="45.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </section>
    </main>

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
        <p>&copy; {{ date('Y') }} Peta Dunia Cafe. All Rights Reserved.</p>
    </div>
</footer>
</div>

<script>
    const heroImage = document.getElementById('heroImage');
    const dishes = document.querySelectorAll('.dish');
    const cartCount = document.querySelector('.cart-count');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');

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