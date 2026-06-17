<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Memberships</title>

    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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

    <main class="customer-dashboard">

        @php

        $cardClass='bronze-member';
        $icon='🥉';

        if($membership->membership_level=='Silver'){
            $cardClass='silver-member';
            $icon='🥈';
        }
        elseif($membership->membership_level=='Gold'){
            $cardClass='gold-member';
            $icon='🥇';
        }
        elseif($membership->membership_level=='Platinum'){
            $cardClass='platinum-member';
            $icon='💎';
        }

        @endphp

        <section class="membership-hero">

            <span class="hero-badge">

                👑 DIGITAL MEMBERSHIP

            </span>

            <h1>

                My Membership

            </h1>

            <p>

                Enjoy exclusive rewards, collect loyalty points and unlock premium benefits every time you dine with us.

            </p>

        </section>

        <section class="member-card {{ $cardClass }}">

            <div class="member-left">

                <small>

                    PETA DUNIA CAFE

                </small>

                <h2>

                    {{ strtoupper($membership->membership_level) }}

                    MEMBER

                </h2>

                <h3>

                    {{ Auth::user()->name }}

                </h3>

                <p>

                    Member ID

                </p>

                <h4>

                    PDC{{ str_pad($membership->id,5,'0',STR_PAD_LEFT) }}

                </h4>

            </div>

            <div class="member-right">

                <div class="member-icon">

                    {{ $icon }}

                </div>

            </div>

        </section>

        <section class="member-info-grid">

            <div class="qr-card">

                <h2>

                    Scan Membership

                </h2>

                <p>

                    Show this QR code at the counter.

                </p>

                {!! QrCode::size(180)

                ->backgroundColor(255,255,255)

                ->generate(

                'Member ID: '.$membership->id.

                '|Name:'.Auth::user()->name.

                '|Level:'.$membership->membership_level

                ) !!}

            </div>

            <div class="member-details">

                <h2>

                    Member Information

                </h2>

                <div class="detail-row">

                    <span>

                        Membership Level

                    </span>

                    <strong>

                        {{ $membership->membership_level }}

                    </strong>

                </div>

                <div class="detail-row">

                    <span>

                        Reward Points

                    </span>

                    <strong>

                        {{ number_format($membership->points) }}

                    </strong>

                </div>

                <div class="detail-row">

                    <span>

                        Total Spending

                    </span>

                    <strong>

                        RM {{ number_format($membership->total_spending,2) }}

                    </strong>

                </div>

                <div class="detail-row">

                    <span>

                        Total Orders

                    </span>

                    <strong>

                        {{ $orders->count() }}

                    </strong>

                </div>

            </div>

        </section>

        @php

        $target=300;
        $next='Silver';

        if($membership->membership_level=='Silver'){

            $target=800;
            $next='Gold';

        }

        elseif($membership->membership_level=='Gold'){

            $target=1500;
            $next='Platinum';

        }

        elseif($membership->membership_level=='Platinum'){

            $target=$membership->total_spending;
            $next='Maximum';

        }

        $progress=$target>0
        ?min(100,($membership->total_spending/$target)*100)
        :100;

        @endphp


        <section class="progress-section">

            <div class="progress-header">

                <div>

                    <small>

                        MEMBERSHIP PROGRESS

                    </small>

                    <h2>

                        {{ number_format($progress,0) }}%

                    </h2>

                </div>

                <div>

                    <strong>

                        Next Level

                    </strong>

                    <br>

                    {{ $next }}

                </div>

            </div>

            <div class="member-progress">

                <div class="member-progress-fill"

                    style="width:{{ $progress }}%;">

                </div>

            </div>

            <p>

                Spend

                <strong>

                    RM {{ number_format(max(0,$target-$membership->total_spending),2) }}

                </strong>

                more to unlock

                <strong>

                    {{ $next }}

                </strong>

                Membership.

            </p>

        </section>

        <section class="member-stats">

            <div class="stat-card">

                <div class="stat-icon">

                    ⭐

                </div>

                <h2>

                    {{ number_format($membership->points) }}

                </h2>

                <p>

                    Reward Points

                </p>

            </div>

            <div class="stat-card">

                <div class="stat-icon">

                    💰

                </div>

                <h2>

                    RM {{ number_format($membership->total_spending,2) }}

                </h2>

                <p>

                    Total Spending

                </p>

            </div>

            <div class="stat-card">

                <div class="stat-icon">

                    📦

                </div>

                <h2>

                    {{ $orders->count() }}

                </h2>

                <p>

                    Recent Orders

                </p>

            </div>

            <div class="stat-card">

                <div class="stat-icon">

                    👑

                </div>

                <h2>

                    {{ $membership->membership_level }}

                </h2>

                <p>

                    Current Rank

                </p>

            </div>

        </section>

        <section class="membership-benefits">

            <div class="section-title">

            <h2>

            🎁 Membership Benefits

            </h2>

            <p>

            Enjoy exclusive privileges as a loyal member.

            </p>

            </div>

            <div class="benefit-grid">

            <div class="benefit-box">

            <div class="benefit-icon">

            🎁

            </div>

            <h3>

            Exclusive Discounts

            </h3>

            <p>

            Receive member-only promotions and seasonal offers.

            </p>

            </div>

            <div class="benefit-box">

            <div class="benefit-icon">

            ☕

            </div>

            <h3>

            Birthday Reward

            </h3>

            <p>

            Celebrate your birthday with a complimentary drink.

            </p>

            </div>

            <div class="benefit-box">

            <div class="benefit-icon">

            ⭐

            </div>

            <h3>

            Earn Loyalty Points

            </h3>

            <p>

            Collect reward points every purchase and redeem gifts.

            </p>

            </div>

            </div>

        </section>

        <section class="order-history">

            <div class="section-title">

            <h2>

            📦 Recent Orders

            </h2>

            </div>

            <div class="order-grid">

            @foreach($orders as $order)

            <div class="order-card">

            <div class="order-top">

            <h3>

            #{{ $order->id }}

            </h3>

            <span>

            +{{ intval($order->total_price) }}

            Pts

            </span>

            </div>

            <h2>

            RM {{ number_format($order->total_price,2) }}

            </h2>

            <p>

            {{ ucfirst($order->status) }}

            </p>

            </div>

            @endforeach

            </div>

        </section>

        <section class="reward-section">

            <div class="reward-left">

            <h2>

            🎉 Ready To Redeem?

            </h2>

            <p>

            Use your reward points to enjoy exclusive gifts and special discounts at Peta Dunia Cafe.

            </p>

            </div>

            <div class="reward-right">

            <h1>

            {{ number_format($membership->points) }}

            </h1>

            <p>

            Available Points

            </p>

            </div>

        </section>
    </main>

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