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
                <a href="{{ url('/my-orders') }}">
    My Orders
</a>
                <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
            </ul>
        </nav>

        <div class="buttons">
            @auth
        <div class="user-dropdown">
            <button class="user-btn" id="userBtn">
                <i class="fas fa-user-circle"></i>
                {{ Auth::user()->name }}
                <i class="fas fa-chevron-down"></i>
            </button>

            <div class="dropdown-menu" id="dropdownMenu">
                <a href="{{ route('profile.edit') }}">
                    <i class="fas fa-user-edit"></i>
                    Edit Profile
                </a>

                <a href="{{ url('/dashboard') }}">
                    <i class="fas fa-gauge"></i>
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-right-from-bracket"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
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
                <div class="dish" data-img="{{ asset('images/food-landing-01.png') }}">
                    <img src="{{ asset('images/food-landing-01.png') }}" alt="Nasi Goreng">
                    <h3>Nasi Goreng</h3>
                    <p>Indonesian fried rice with chicken, shrimp, and egg</p>
                    <span class="price">RM 45.00</span>
                    <button class="add-to-cart" data-name="Nasi Goreng" data-price="45.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="dish" data-img="{{ asset('images/food-landing-01.png') }}">
                    <img src="{{ asset('images/food-landing-01.png') }}" alt="Pad Thai">
                    <h3>Pad Thai</h3>
                    <p>Stir-fried rice noodles with tofu, bean sprouts, and peanut</p>
                    <span class="price">RM 55.00</span>
                    <button class="add-to-cart" data-name="Pad Thai" data-price="55.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="dish" data-img="{{ asset('images/food-landing-01.png') }}">
                    <img src="{{ asset('images/food-landing-01.png') }}" alt="Pizza Margherita">
                    <h3>Pizza Margherita</h3>
                    <p>Classic Italian pizza with fresh mozzarella and basil</p>
                    <span class="price">RM 85.00</span>
                    <button class="add-to-cart" data-name="Pizza Margherita" data-price="85.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="dish" data-img="{{ asset('images/food-landing-01.png') }}">
                    <img src="{{ asset('images/food-landing-01.png') }}" alt="Classic Cheeseburger">
                    <h3>Classic Cheeseburger</h3>
                    <p>American-style beef patty with cheddar and fries</p>
                    <span class="price">RM 65.00</span>
                    <button class="add-to-cart" data-name="Classic Cheeseburger" data-price="65.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </section>

        <section class="popular-dishes">
            <h2>Shop Picture</h2>
            <div class="dishes">
                <div class="dish" data-img="{{ asset('food-landing-01.png') }}">
                    <img src="{{ asset('food-landing-01.png') }}" alt="Nasi Goreng">
                    <h3>Nasi Goreng</h3>
                    <p>Indonesian fried rice with chicken, shrimp, and egg</p>
                    <span class="price">RM 45.00</span>
                    <button class="add-to-cart" data-name="Nasi Goreng" data-price="45.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="dish" data-img="{{ asset('food-landing-01.png') }}">
                    <img src="{{ asset('food-landing-01.png') }}" alt="Pad Thai">
                    <h3>Pad Thai</h3>
                    <p>Stir-fried rice noodles with tofu, bean sprouts, and peanut</p>
                    <span class="price">RM 55.00</span>
                    <button class="add-to-cart" data-name="Pad Thai" data-price="55.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="dish" data-img="{{ asset('food-landing-01.png') }}">
                    <img src="{{ asset('food-landing-01.png') }}" alt="Pizza Margherita">
                    <h3>Pizza Margherita</h3>
                    <p>Classic Italian pizza with fresh mozzarella and basil</p>
                    <span class="price">RM 85.00</span>
                    <button class="add-to-cart" data-name="Pizza Margherita" data-price="85.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="dish" data-img="{{ asset('food-landing-01.png') }}">
                    <img src="{{ asset('food-landing-01.png') }}" alt="Classic Cheeseburger">
                    <h3>Classic Cheeseburger</h3>
                    <p>American-style beef patty with cheddar and fries</p>
                    <span class="price">RM 65.00</span>
                    <button class="add-to-cart" data-name="Classic Cheeseburger" data-price="65.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </section>

        <section class="popular-dishes">
            <h2>Our Location</h2>
            <div class="dishes">
                <div class="dish" data-img="{{ asset('food-landing-01.png') }}">
                    <img src="{{ asset('food-landing-01.png') }}" alt="Nasi Goreng">
                    <h3>Nasi Goreng</h3>
                    <p>Indonesian fried rice with chicken, shrimp, and egg</p>
                    <span class="price">RM 45.00</span>
                    <button class="add-to-cart" data-name="Nasi Goreng" data-price="45.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="dish" data-img="{{ asset('food-landing-01.png') }}">
                    <img src="{{ asset('food-landing-01.png') }}" alt="Pad Thai">
                    <h3>Pad Thai</h3>
                    <p>Stir-fried rice noodles with tofu, bean sprouts, and peanut</p>
                    <span class="price">RM 55.00</span>
                    <button class="add-to-cart" data-name="Pad Thai" data-price="55.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="dish" data-img="{{ asset('food-landing-01.png') }}">
                    <img src="{{ asset('food-landing-01.png') }}" alt="Pizza Margherita">
                    <h3>Pizza Margherita</h3>
                    <p>Classic Italian pizza with fresh mozzarella and basil</p>
                    <span class="price">RM 85.00</span>
                    <button class="add-to-cart" data-name="Pizza Margherita" data-price="85.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="dish" data-img="{{ asset('food-landing-01.png') }}">
                    <img src="{{ asset('food-landing-01.png') }}" alt="Classic Cheeseburger">
                    <h3>Classic Cheeseburger</h3>
                    <p>American-style beef patty with cheddar and fries</p>
                    <span class="price">RM 65.00</span>
                    <button class="add-to-cart" data-name="Classic Cheeseburger" data-price="65.00">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
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

    const userBtn = document.getElementById('userBtn');
const dropdownMenu = document.getElementById('dropdownMenu');

if (userBtn) {
    userBtn.addEventListener('click', () => {
        dropdownMenu.classList.toggle('active');
    });

    window.addEventListener('click', (e) => {
        if (!e.target.closest('.user-dropdown')) {
            dropdownMenu.classList.remove('active');
        }
    });
}
</script>

</body>
</html>