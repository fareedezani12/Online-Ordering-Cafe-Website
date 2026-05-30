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
            <li><a href="{{ url('/') }}">Home</a></li>
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

        @php
        $cart = session('cart', []);
        $cartCount = 0;
        foreach($cart as $item){
            $cartCount += $item['quantity'];
        }
        @endphp

        <a href="{{ url('/cart') }}" class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count">
            {{ $cartCount }}
        </span>
        </a>

        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</header>

<!-- SLIDER SECTION (now same width and alignment as menu sections below) -->
<div class="slider">
    <div class="list">
        <div class="item"><img src="{{ asset('images/1.png') }}" alt="dish"></div>
        <div class="item active"><img src="{{ asset('images/2.png') }}" alt="dish"></div>
        <div class="item"><img src="{{ asset('images/3.png') }}" alt="dish"></div>
        <div class="item"><img src="{{ asset('images/6.png') }}" alt="dish"></div>
        <div class="item"><img src="{{ asset('images/5.png') }}" alt="dish"></div>
    </div>
    <div class="circle"></div>
    <div class="content">
        <div>EXPERIENCE</div>
        <div>CUISINE</div>
        <p style="font-size: 1em; margin: 12px 0; opacity: 0.8;">Discover the art of fine dining</p>
        <button onclick="window.location.href='#menu'">EXPLORE MENU</button>
    </div>
    <div class="arow">
        <button id="prev"><</button>
        <button id="next">❯</button>
    </div>
</div>

<main id="menu">
    <!-- Popular Dishes -->
    <section class="popular-dishes">
        <h2>Popular In The Cafe</h2>
        <div class="dishes">
        @foreach($menus as $menu)
        <div class="dish">
            <img src="{{ asset('images/' . $menu->image) }}"alt="{{ $menu->name }}">
            <h3>{{ $menu->name }}</h3>
            <p>{{ $menu->description }}</p>
            <span class="price">
                RM {{ number_format($menu->price, 2) }}
            </span>
            <a href="{{ url('/add-to-cart/'.$menu->id) }}" class="add-to-cart"><i class="fas fa-plus"></i></a>
        </div>
        @endforeach
        </div>
    </section>

    <!-- Drinks -->
    <section class="popular-dishes">
        <h2>Drinks</h2>
                <div class="dishes">
        @foreach($menus as $menu)
        <div class="dish">
            <img src="{{ asset('images/' . $menu->image) }}"alt="{{ $menu->name }}">
            <h3>{{ $menu->name }}</h3>
            <p>{{ $menu->description }}</p>
            <span class="price">
                RM {{ number_format($menu->price, 2) }}
            </span>
            <a href="{{ url('/add-to-cart/'.$menu->id) }}" class="add-to-cart"><i class="fas fa-plus"></i></a>
        </div>
        @endforeach
        </div>
    </section>

    <!-- Food -->
    <section class="popular-dishes">
                <div class="dishes">
        @foreach($menus as $menu)
        <div class="dish">
            <img src="{{ asset('images/' . $menu->image) }}"alt="{{ $menu->name }}">
            <h3>{{ $menu->name }}</h3>
            <p>{{ $menu->description }}</p>
            <span class="price">
                RM {{ number_format($menu->price, 2) }}
            </span>
            <a href="{{ url('/add-to-cart/'.$menu->id) }}" class="add-to-cart"><i class="fas fa-plus"></i></a>
        </div>
        @endforeach
        </div>
    </section>

    <!-- All Menu -->
    <section class="popular-dishes">
        <h2>All Menu</h2>
                <div class="dishes">
        @foreach($menus as $menu)
        <div class="dish">
            <img src="{{ asset('images/' . $menu->image) }}"alt="{{ $menu->name }}">
            <h3>{{ $menu->name }}</h3>
            <p>{{ $menu->description }}</p>
            <span class="price">
                RM {{ number_format($menu->price, 2) }}
            </span>
            <a href="{{ url('/add-to-cart/'.$menu->id) }}" class="add-to-cart"><i class="fas fa-plus"></i></a>
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

    renderDishes('popularDishes', menuData.popular);
    renderDishes('drinksDishes', menuData.drinks);
    renderDishes('foodDishes', menuData.food);
    renderDishes('allMenuDishes', [...menuData.popular, ...menuData.drinks, ...menuData.food]);

    // ---------- SHOPPING CART ----------
    let cart = [];
    const cartCountSpan = document.querySelector('.cart-count');

    function updateCartCount() {
        cartCountSpan.textContent = cart.length;
    }

    function showToast(message) {
        let toast = document.createElement('div');
        toast.textContent = message;
        toast.style.position = 'fixed';
        toast.style.bottom = '30px';
        toast.style.right = '30px';
        toast.style.backgroundColor = 'var(--green)';
        toast.style.color = '#fff';
        toast.style.padding = '12px 24px';
        toast.style.borderRadius = '40px';
        toast.style.zIndex = '999';
        toast.style.fontWeight = '500';
        toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.2)';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 2000);
    }

    document.body.addEventListener('click', (e) => {
        const btn = e.target.closest('.add-to-cart');
        if (btn) {
            e.stopPropagation();
            const name = btn.getAttribute('data-name');
            const price = parseFloat(btn.getAttribute('data-price'));
            cart.push({ name, price });
            updateCartCount();
            showToast(`🍽️ ${name} added to cart`);
        }
    });

    // Cart icon click alert (optional)
    document.querySelector('.cart-icon').addEventListener('click', () => {
        if (cart.length === 0) {
            showToast("Your cart is empty");
        } else {
            let total = cart.reduce((sum, i) => sum + i.price, 0);
            showToast(`🛒 ${cart.length} items · RM ${total.toFixed(2)}`);
        }
    });

    // ---------- SLIDER LOGIC (fully preserved and functional) ----------
    let circle = document.querySelector('.circle');
    let slider = document.querySelector('.slider');
    let list = document.querySelector('.list');
    let prev = document.getElementById('prev');
    let next = document.getElementById('next');
    let items = document.querySelectorAll('.list .item');
    let count = items.length;
    let active = 1;
    let leftTransform = 0;
    let width_item = items[active]?.offsetWidth || 300;

    function runCarousel() {
        if (!items.length) return;
        prev.style.display = (active == 0) ? 'none' : 'flex';
        next.style.display = (active == count - 1) ? 'none' : 'flex';
        let old_active = document.querySelector('.item.active');
        if (old_active) old_active.classList.remove('active');
        items[active].classList.add('active');
        leftTransform = width_item * (active - 1) * -1;
        list.style.transform = `translateX(${leftTransform}px)`;
    }

    next.onclick = () => {
        if (active < count - 1) active++;
        runCarousel();
    };
    prev.onclick = () => {
        if (active > 0) active--;
        runCarousel();
    };

    // Set rotating text on circle
    let textCircle = "DELICIOUS FOOD • FRESH INGREDIENTS • AUTHENTIC TASTE • CULINARY EXCELLENCE • FOODIE PARADISE".split('');
    circle.innerHTML = '';
    textCircle.forEach((value, key) => {
        let newSpan = document.createElement("span");
        newSpan.innerText = value;
        let rotateThisSpan = (360 / textCircle.length) * (key + 1);
        newSpan.style.setProperty('--rotate', rotateThisSpan + 'deg');
        circle.appendChild(newSpan);
    });

    // Recalculate width on resize for responsiveness
    window.addEventListener('resize', () => {
        if (items[active]) {
            width_item = items[active].offsetWidth;
            runCarousel();
        }
    });

    runCarousel();

    // ---------- HAMBURGER MENU ----------
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');
    hamburger.addEventListener('click', () => {
        nav.classList.toggle('active');
    });
</script>
</body>
</html>