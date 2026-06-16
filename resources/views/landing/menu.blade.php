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

            {{ Auth::check() ? Auth::user()->name : 'Guest' }}

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

    <section class="menu-header">

        <h1>

            Explore International Flavours

        </h1>

        <p>

            From aromatic coffee to delicious main courses and desserts,
            every dish is prepared with passion and premium ingredients.

        </p>

    </section>

    <section class="menu-filter">

        <form>

        <input

        type="text"

        name="search"

        placeholder="Search your favourite food..."

        value="{{ request('search') }}">

        <button>

        Search

        </button>

        </form>

        <div class="category-filter">

        <a href="/menu">

        All

        </a>

        <a href="/menu?category=Main">

        Main

        </a>

        <a href="/menu?category=Drink">

        Drinks

        </a>

        <a href="/menu?category=Dessert">

        Dessert

        </a>

        <a href="/menu?category=Coffee">

        Coffee

        </a>

        </div>

    </section>

    <section class="menu-grid">

    @foreach($menus as $menu)

    <div class="menu-card">

    @if($loop->first)

    <span class="best-badge">

        🔥 Best Seller

    </span>

    @endif

    <img src="{{ asset('images/'.$menu->image) }}">

    <div class="menu-content">

        <small>

            {{ $menu->category }}

        </small>

        <h3>

            {{ $menu->name }}

        </h3>

        <p>

            {{ Str::limit($menu->description,70) }}

        </p>

        <div class="bottom-row">

            <h2>

                RM {{ number_format($menu->price,2) }}

            </h2>

            <a href="{{ url('/add-to-cart/'.$menu->id) }}">

                <i class="fas fa-cart-plus"></i>

            </a>

        </div>

    </div>

</div>

@endforeach

</section>

@if($menus->count()==0)

<div class="empty-menu">

    🍽

    <h2>

        No Menu Found

    </h2>

    <p>

        Try searching with another keyword.

    </p>

</div>

@endif

<section class="menu-cta">

    <h1>

        Hungry?

    </h1>

    <p>

        Explore more delicious dishes and enjoy an unforgettable dining experience.

    </p>

    <a href="{{ url('/cart') }}">

        🛒 View Cart

    </a>

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
            <p>&copy; {{ date('Y') }} Peta Dunia Cafe. All Rights Reserved.</p>
        </div>
    </footer>
</div>

<script>

    document.addEventListener('DOMContentLoaded',function(){

        // ================= CART =================

        let cart=[];

        const cartCountSpan=document.querySelector('.cart-count');

        function updateCartCount(){

            if(cartCountSpan){

                cartCountSpan.textContent=cart.length;

            }

        }

        function showToast(message){

            let toast=document.createElement('div');

            toast.innerText=message;

            toast.style.position='fixed';

            toast.style.bottom='30px';

            toast.style.right='30px';

            toast.style.background='#00573F';

            toast.style.color='#fff';

            toast.style.padding='15px 25px';

            toast.style.borderRadius='40px';

            toast.style.zIndex='9999';

            toast.style.fontWeight='600';

            toast.style.boxShadow='0 5px 20px rgba(0,0,0,.2)';

            document.body.appendChild(toast);

            setTimeout(()=>{

                toast.remove();

            },2000);

        }

        document.body.addEventListener('click',function(e){

            const btn=e.target.closest('.add-to-cart');

            if(!btn) return;

            e.preventDefault();

            const name=btn.dataset.name;

            const price=parseFloat(btn.dataset.price);

            cart.push({

                name:name,

                price:price

            });

            updateCartCount();

            showToast(name+" added to cart");

        });

        const cartIcon=document.querySelector('.cart-icon');

        if(cartIcon){

            cartIcon.addEventListener('click',function(){

                if(cart.length==0){

                    showToast("Your cart is empty");

                }

            });

        }
// ================= SLIDER =================

let list=document.querySelector(".slider .list");

let items=document.querySelectorAll(".slider .item");

let prev=document.getElementById("prev");

let next=document.getElementById("next");

let active=1;

let width=320;

function reloadSlider(){

let offset=(active-1)*width;

list.style.transform=`translateX(-${offset}px)`;

items.forEach(item=>item.classList.remove("active"));

items[active].classList.add("active");

}

next.onclick=function(){

active++;

if(active>=items.length){

active=0;

}

reloadSlider();

}

prev.onclick=function(){

active--;

if(active<0){

active=items.length-1;

}

reloadSlider();

}

window.addEventListener("resize",function(){

width=items[0].offsetWidth;

reloadSlider();

});

reloadSlider();

        // ================= CIRCLE =================

        const circle=document.querySelector('.circle');

        if(circle){

            const text="DELICIOUS FOOD • FRESH INGREDIENTS • AUTHENTIC TASTE • PETA DUNIA CAFE • ";

            circle.innerHTML='';

            text.split('').forEach(function(char,index){

                let span=document.createElement('span');

                span.innerText=char;

                span.style.transform='rotate('+(index*8)+'deg)';

                circle.appendChild(span);

            });

        }

        // ================= HAMBURGER =================

        const hamburger=document.getElementById('hamburger');

        const nav=document.getElementById('nav');

        if(hamburger && nav){

            hamburger.addEventListener('click',function(){

                nav.classList.toggle('active');

            });

        }

    });

</script>
</body>
</html>