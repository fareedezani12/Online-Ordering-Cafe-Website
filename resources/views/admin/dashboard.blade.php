<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Peta Dunia Cafe</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<div class="container">

    <header>

        <div class="logo">
            <img src="{{ asset('images/logo-petadunia.jpg') }}"
            class="logo-img">

            <span>Peta Dunia Cafe</span>
        </div>

        <div class="logo">

            <span>

                <strong>Admin Dashboard</strong>

            </span>

        </div>

        <div class="buttons">

            <div class="user-dropdown">

                <button class="user-btn" id="userBtn">

                    <i class="fas fa-user-circle"></i>

                    {{ Auth::user()->name }}

                    <i class="fas fa-chevron-down"></i>

                </button>

                <div class="dropdown-menu" id="dropdownMenu">

                    <a href="#">
                        <i class="fas fa-gauge"></i>
                        Admin Profile
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

        </div>

    </header>

<main class="admin-dashboard">

    <!-- ================= HERO ================= -->

    <section class="hero-admin">

        <div class="hero-left">

            <span class="hero-badge">

                🚀 Peta Dunia Cafe Management Portal

            </span>

            <h1>

                Good {{ now()->hour < 12 ? 'Morning' : (now()->hour < 18 ? 'Afternoon' : 'Evening') }},

                {{ Auth::user()->name }} 👋

            </h1>

            <p>

                Welcome back.

                Monitor business performance, customer activity,

                menu management and revenue from one intelligent dashboard.

            </p>

            <div class="hero-buttons">

                <a href="{{ url('admin/reports') }}">

                    <i class="fa-solid fa-chart-line"></i>

                    Generate Report

                </a>

                <a href="{{ url('admin/promotions') }}">

                    <i class="fa-solid fa-gift"></i>

                    Promotions

                </a>

            </div>

        </div>

        <div class="hero-right">

            <img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

        </div>

    </section>



    <!-- ================= TODAY OVERVIEW ================= -->


    <section class="dashboard-cards">

        <div class="dashboard-card">

            <div>

                <span>Today's Revenue</span>

                <h2>

                    RM {{ number_format($todayRevenue,2) }}

                </h2>

                <small>

                    Revenue generated today

                </small>

            </div>

            <div class="card-icon green">

                <i class="fa-solid fa-money-bill-wave"></i>

            </div>

        </div>



        <div class="dashboard-card">

            <div>

                <span>Today's Orders</span>

                <h2>

                    {{ $todayOrders }}

                </h2>

                <small>

                    Orders received today

                </small>

            </div>

            <div class="card-icon orange">

                <i class="fa-solid fa-receipt"></i>

            </div>

        </div>



        <div class="dashboard-card">

            <div>

                <span>Completed</span>

                <h2>

                    {{ $completedToday }}

                </h2>

                <small>

                    Completed today

                </small>

            </div>

            <div class="card-icon blue">

                <i class="fa-solid fa-circle-check"></i>

            </div>

        </div>



        <div class="dashboard-card">

            <div>

                <span>Pending</span>

                <h2>

                    {{ $pendingOrders }}

                </h2>

                <small>

                    Waiting for preparation

                </small>

            </div>

            <div class="card-icon red">

                <i class="fa-solid fa-clock"></i>

            </div>

        </div>

    </section>



    <!-- ================= MAIN KPI ================= -->



    <h2 class="section-title">

        Business Overview

    </h2>



    <section class="dashboard-cards">

        <div class="dashboard-card">

            <div>

                <span>Total Users</span>

                <h2>

                    {{ $totalUsers }}

                </h2>

                <small>

                    Registered customers

                </small>

            </div>

            <div class="card-icon green">

                <i class="fa-solid fa-users"></i>

            </div>

        </div>



        <div class="dashboard-card">

            <div>

                <span>Total Orders</span>

                <h2>

                    {{ $totalOrders }}

                </h2>

                <small>

                    Orders processed

                </small>

            </div>

            <div class="card-icon orange">

                <i class="fa-solid fa-cart-shopping"></i>

            </div>

        </div>



        <div class="dashboard-card">

            <div>

                <span>Total Revenue</span>

                <h2 class="counter"

data-target="{{ $totalRevenue }}">

0

</h2>

                <small>

                    Completed sales

                </small>

            </div>

            <div class="card-icon blue">

                <i class="fa-solid fa-wallet"></i>

            </div>

        </div>



        <div class="dashboard-card">

            <div>

                <span>Total Members</span>

                <h2>

                    {{ $totalMembers }}

                </h2>

                <small>

                    Loyalty programme

                </small>

            </div>

            <div class="card-icon purple">

                <i class="fa-solid fa-crown"></i>

            </div>

        </div>


    </section>

<div class="dashboard-card">

<div>

<span>System Status</span>

<h2 style="color:#2ECC71;">

ONLINE

</h2>

<small>

All services running normally

</small>

</div>

<i class="fa-solid fa-server"></i>

</div>

    <!-- ================= QUICK ACTION ================= -->



    <h2 class="section-title">

        Quick Actions

    </h2>



    <section class="quick-grid">



        <a href="{{ url('staff/menu') }}" class="quick-card">

            <i class="fa-solid fa-utensils"></i>

            <h3>Manage Menu</h3>

            <p>

                Add, edit and delete menu items.

            </p>

        </a>



        <a href="{{ url('staff/orders') }}" class="quick-card">

            <i class="fa-solid fa-receipt"></i>

            <h3>Orders</h3>

            <p>

                Update customer order status.

            </p>

        </a>



        <a href="{{ url('admin/promotions') }}" class="quick-card">

            <i class="fa-solid fa-gift"></i>

            <h3>Promotion</h3>

            <p>

                Create cafe campaigns.

            </p>

        </a>



        <a href="{{ url('admin/reports') }}" class="quick-card">

            <i class="fa-solid fa-chart-column"></i>

            <h3>Sales Report</h3>

            <p>

                View business analytics.

            </p>

        </a>



        <a href="{{ url('membership') }}" class="quick-card">

            <i class="fa-solid fa-id-card"></i>

            <h3>Membership</h3>

            <p>

                Loyalty programme management.

            </p>

        </a>



        <a href="{{ url('admin/customers') }}" class="quick-card">

            <i class="fa-solid fa-users"></i>

            <h3>Customers</h3>

            <p>

                View customer information.

            </p>

        </a>

    </section>



<!-- ================= CHART SECTION STARTS BELOW ================= -->
<!-- ========================================= -->
<!-- BUSINESS ANALYTICS -->
<!-- ========================================= -->

<h2 class="section-title">

    Business Analytics

</h2>

<div class="analytics-grid">

    <!-- Revenue Chart -->

    <div class="chart-card">

        <div class="chart-header">

            <div>

                <h3>

                    Monthly Revenue

                </h3>

                <p>

                    Revenue generated every month

                </p>

            </div>

            <i class="fa-solid fa-chart-column"></i>

        </div>

        <canvas id="revenueChart"></canvas>

    </div>



    <!-- Orders Chart -->

    <div class="chart-card">

        <div class="chart-header">

            <div>

                <h3>

                    Monthly Orders

                </h3>

                <p>

                    Customer ordering trend

                </p>

            </div>

            <i class="fa-solid fa-chart-line"></i>

        </div>

        <canvas id="ordersChart"></canvas>

    </div>

</div>



<!-- ========================================= -->

<!-- SECOND ROW -->

<!-- ========================================= -->

<div class="analytics-grid second-row">

    <!-- Membership -->

    <div class="chart-card membership-card">

        <div class="chart-header">

            <div>

                <h3>

                    Membership Distribution

                </h3>

                <p>

                    Customer loyalty programme

                </p>

            </div>

            <i class="fa-solid fa-crown"></i>

        </div>

        <div class="membership-wrapper">

            <canvas id="membershipChart"></canvas>

        </div>

    </div>



    <!-- Business Insight -->

    <div class="insight-card">

        <h3>

            Business Insight

        </h3>

        <div class="insight-list">

            <div class="insight-item">

                <i class="fa-solid fa-fire"></i>

                <div>

                    <span>

                        Popular Category

                    </span>

                    <strong>

                        {{ $popularCategory->category ?? 'No Data' }}

                    </strong>

                </div>

            </div>



            <div class="insight-item">

                <i class="fa-solid fa-clock"></i>

                <div>

                    <span>

                        Pending Orders

                    </span>

                    <strong>

                        {{ $pendingOrders }}

                    </strong>

                </div>

            </div>



            <div class="insight-item">

                <i class="fa-solid fa-gift"></i>

                <div>

                    <span>

                        Active Promotions

                    </span>

                    <strong>

                        {{ $activePromotions }}

                    </strong>

                </div>

            </div>



            <div class="insight-item">

                <i class="fa-solid fa-wallet"></i>

                <div>

                    <span>

                        Total Revenue

                    </span>

                    <h2 class="counter"

data-target="{{ $totalRevenue }}">

0

</h2>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ===================================== -->
<!-- RECENT ORDERS -->
<!-- ===================================== -->

<h2 class="section-title">

    Recent Orders

</h2>

<div class="table-card">

    <table class="admin-table">

        <thead>

            <tr>

                <th>#</th>

                <th>Customer</th>

                <th>Total</th>

                <th>Status</th>

                <th>Date</th>

            </tr>

        </thead>

        <tbody>

            @foreach($recentOrders as $order)

            <tr>

                <td>

                    #{{ $order->id }}

                </td>

                <td>

                    @if($order->user)

                        {{ $order->user->name }}

                    @else

                        {{ $order->guest_name }}

                    @endif

                </td>

                <td>

                    RM {{ number_format($order->total_price,2) }}

                </td>

                <td>

                    @if($order->status=="completed")

                        <span class="badge success">

                            Completed

                        </span>

                    @elseif($order->status=="preparing")

                        <span class="badge warning">

                            Preparing

                        </span>

                    @else

                        <span class="badge danger">

                            Pending

                        </span>

                    @endif

                </td>

                <td>

                    {{ $order->created_at->format('d M Y') }}

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>





<!-- ===================================== -->
<!-- TOP SELLING MENU -->
<!-- ===================================== -->

<h2 class="section-title">

    Best Selling Menu

</h2>

<div class="menu-grid">

    @foreach($topMenus as $item)

    <div class="menu-card">

        <img src="{{ asset('images/'.$item->menu->image) }}">

        <div class="menu-content">

            <h3>

                {{ $item->menu->name }}

            </h3>

            <span>

                {{ $item->menu->category }}

            </span>

            <div class="sold-box">

                {{ $item->total_sold }}

                Sold

            </div>

        </div>

    </div>

    @endforeach

</div>





<!-- ===================================== -->
<!-- BUSINESS STATUS -->
<!-- ===================================== -->

<h2 class="section-title">

    Cafe Performance

</h2>

<div class="status-grid">

    <div class="status-card">

        <i class="fa-solid fa-fire"></i>

        <h3>

            Popular Category

        </h3>

        <h2>

            {{ $popularCategory->category ?? 'No Data' }}

        </h2>

    </div>



    <div class="status-card">

        <i class="fa-solid fa-clock"></i>

        <h3>

            Pending Orders

        </h3>

        <h2>

            {{ $pendingOrders }}

        </h2>

    </div>



    <div class="status-card">

        <i class="fa-solid fa-gift"></i>

        <h3>

            Active Promotion

        </h3>

        <h2>

            {{ $activePromotions }}

        </h2>

    </div>

</div>





<!-- ===================================== -->
<!-- ADMIN ACTIVITY -->
<!-- ===================================== -->

<h2 class="section-title">

    System Activity

</h2>

<div class="timeline-card">

    <div class="timeline-item">

        <div class="timeline-dot"></div>

        <div>

            <h4>

                New Order Received

            </h4>

            <span>

                Customer placed an online order.

            </span>

        </div>

    </div>



    <div class="timeline-item">

        <div class="timeline-dot green"></div>

        <div>

            <h4>

                Promotion Running

            </h4>

            <span>

                {{ $activePromotions }}

                active promotion available.

            </span>

        </div>

    </div>



    <div class="timeline-item">

        <div class="timeline-dot orange"></div>

        <div>

            <h4>

                Membership Growth

            </h4>

            <span>

                {{ $totalMembers }}

                registered members.

            </span>

        </div>

    </div>

</div>
</main>
<footer class="dashboard-footer">

<div>

Peta Dunia Cafe Management System

Version 1.0

</div>

<div>

Last Updated :

{{ now()->format('d M Y H:i') }}

</div>

</footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

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

const revenueData = @json($monthlyRevenue);
new Chart(
    document.getElementById('revenueChart'),
    {
        type: 'bar',
        data: {

            labels: revenueData.map(item => item.month),

            datasets: [{

                label: 'Revenue (RM)',
                data: revenueData.map(item => item.revenue),
                backgroundColor: '',
                borderColor: ''

            }]
        }
    }
);

const orderData = @json($monthlyOrders);
new Chart(
    document.getElementById('ordersChart'),
    {
        type: 'line',

        data: {

            labels: orderData.map(item => item.month),

            datasets: [{

                label: 'Orders',
                data: orderData.map(item => item.total),
                borderColor: '#355E3B',
                backgroundColor: '#F5EEDC',
                tension: 0.4

            }]
        }
    }
);

const membershipData = @json($membershipLevels);

new Chart(
    document.getElementById('membershipChart'),
    {
        type: 'pie',

        data: {

            labels: membershipData.map(
                item => item.membership_level
            ),

            datasets: [{

                data: membershipData.map(
                    item => item.total
                ),

                backgroundColor: [
                    '#CD7F32', // Bronze
                    '#C0C0C0', // Silver
                    '#FFD700', // Gold
                    '#355E3B'  // Platinum
                ]

            }]
        }
    }
);

</script>
<script>

const counters=document.querySelectorAll(".counter");

counters.forEach(counter=>{

const update=()=>{

const target=+counter.dataset.target;

const count=+counter.innerText;

const speed=40;

const inc=target/speed;

if(count<target){

counter.innerText=Math.ceil(count+inc);

setTimeout(update,30);

}else{

counter.innerText=target.toLocaleString();

}

}

update();

});

</script>

</body>
</html>