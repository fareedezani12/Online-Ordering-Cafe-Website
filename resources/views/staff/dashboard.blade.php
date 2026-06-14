<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Staff Dashboard</title>

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

<span>

Peta Dunia Cafe

</span>

</div>

<div class="buttons">

<div class="user-dropdown">

<button class="user-btn"
id="userBtn">

<i class="fas fa-user-circle"></i>

{{ Auth::user()->name }}

<i class="fas fa-chevron-down"></i>

</button>

<div class="dropdown-menu"
id="dropdownMenu">

<a href="#">

<i class="fas fa-user"></i>

Staff Profile

</a>

<form
method="POST"
action="{{ route('logout') }}">

@csrf

<button
type="submit"
class="logout-btn">

<i class="fas fa-right-from-bracket"></i>

Logout

</button>

</form>

</div>

</div>

</div>

</header>

<main class="admin-dashboard">

<section class="hero-admin">

<div class="hero-left">

<span class="hero-badge">

STAFF OPERATION PANEL

</span>

<h1>

Welcome Back,

{{ Auth::user()->name }}

👋

</h1>

<p>

Manage customer orders,

update menu,

register memberships

and monitor today's operation

from one dashboard.

</p>



<div class="hero-buttons">

<a href="{{ url('staff/orders') }}">

<i class="fas fa-receipt"></i>

Manage Orders

</a>

<a href="{{ url('staff/menu') }}">

<i class="fas fa-utensils"></i>

Manage Menu

</a>

</div>

</div>

<div class="hero-right">

<img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

</div>

</section>

<section class="dashboard-cards">

    <div class="dashboard-card green">

        <div>

            <span>

                Today's Orders

            </span>

            <h2>

                {{ $todayOrders }}

            </h2>

            <small>

                Orders received today

            </small>

        </div>

        <i class="fa-solid fa-receipt"></i>

    </div>

    <div class="dashboard-card orange">

        <div>

            <span>

                Revenue Today

            </span>

            <h2>

                RM {{ number_format($todayRevenue,2) }}

            </h2>

            <small>

                Daily sales

            </small>

        </div>

        <i class="fa-solid fa-money-bill-wave"></i>

    </div>

    <div class="dashboard-card blue">

        <div>

            <span>

                Pending Orders

            </span>

            <h2>

                {{ $pendingOrders }}

            </h2>

            <small>

                Waiting to prepare

            </small>

        </div>

        <i class="fa-solid fa-clock"></i>

    </div>

    <div class="dashboard-card purple">

        <div>

            <span>

                Completed

            </span>

            <h2>

                {{ $completedOrders }}

            </h2>

            <small>

                Finished today

            </small>

        </div>

        <i class="fa-solid fa-circle-check"></i>

    </div>

</section>

<section style="margin-top:35px;">

<h2 class="section-title">

Business Summary

</h2>

<div class="dashboard-cards">

<div class="dashboard-card green">

<div>

<span>

Menu Items

</span>

<h2>

{{ $totalMenu }}

</h2>

<small>

Available menu

</small>

</div>

<i class="fas fa-utensils"></i>

</div>

<div class="dashboard-card orange">

<div>

<span>

Members

</span>

<h2>

{{ $members }}

</h2>

<small>

Registered customers

</small>

</div>

<i class="fas fa-crown"></i>

</div>

<div class="dashboard-card blue">

<div>

<span>

Today's Revenue

</span>

<h2>

RM {{ number_format($todayRevenue,2) }}

</h2>

<small>

Current income

</small>

</div>

<i class="fas fa-chart-line"></i>

</div>

<div class="dashboard-card purple">

<div>

<span>

Operation Status

</span>

<h2>

100%

</h2>

<small>

System Online

</small>

</div>

<i class="fas fa-server"></i>

</div>

</div>

</section>

<section style="margin-top:40px;">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    ">

        <h2 class="section-title">

            Recent Orders

        </h2>

        <a href="{{ url('staff/orders') }}"
        class="btn btn-primary">

            <i class="fas fa-eye"></i>

            View All

        </a>

    </div>

    <div class="admin-card">

        <table class="admin-table">

            <thead>

                <tr>

                    <th>Order ID</th>

                    <th>Customer</th>

                    <th>Total</th>

                    <th>Status</th>

                    <th>Date</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($recentOrders as $order)

                <tr>

                    <td>

                        <strong>

                            #{{ $order->id }}

                        </strong>

                    </td>

                    <td>

                        @if($order->user)

                            {{ $order->user->name }}

                        @else

                            {{ $order->guest_name ?? 'Guest Customer' }}

                        @endif

                    </td>

                    <td>

                        RM {{ number_format($order->total_price,2) }}

                    </td>

                    <td>

                        @if($order->status=='completed')

                        <span class="status-completed">

                            Completed

                        </span>

                        @elseif($order->status=='preparing')

                        <span class="status-preparing">

                            Preparing

                        </span>

                        @else

                        <span class="status-pending">

                            Pending

                        </span>

                        @endif

                    </td>

                    <td>

                        {{ $order->created_at->format('d M Y') }}

                    </td>

                    <td>

                        <a href="{{ url('staff/orders/'.$order->id) }}"
                        style="
                        background:#00573F;
                        color:white;
                        padding:8px 14px;
                        border-radius:8px;
                        text-decoration:none;
                        ">

                            <i class="fas fa-eye"></i>

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                    style="
                    text-align:center;
                    padding:30px;
                    ">

                        No recent orders found.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</section>

<section style="margin-top:40px;">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    ">

        <h2 class="section-title">

            Quick Actions

        </h2>

    </div>

    <div class="quick-action-grid">

        <a href="{{ url('staff/orders') }}"
        class="quick-action-card">

            <div class="quick-icon green-bg">

                <i class="fas fa-receipt"></i>

            </div>

            <h3>

                Manage Orders

            </h3>

            <p>

                View and update customer order status.

            </p>

        </a>

        <a href="{{ url('staff/menu') }}"
        class="quick-action-card">

            <div class="quick-icon orange-bg">

                <i class="fas fa-utensils"></i>

            </div>

            <h3>

                Manage Menu

            </h3>

            <p>

                Add, edit and remove menu items.

            </p>

        </a>

        <a href="{{ url('membership') }}"
        class="quick-action-card">

            <div class="quick-icon blue-bg">

                <i class="fas fa-crown"></i>

            </div>

            <h3>

                Membership

            </h3>

            <p>

                Register members and collect loyalty points.

            </p>

        </a>

        <a href="{{ url('admin/customers') }}"
        class="quick-action-card">

            <div class="quick-icon purple-bg">

                <i class="fas fa-store"></i>

            </div>

            <h3>

                Customer View

            </h3>

            <p>

                Open the customer website interface.

            </p>

        </a>

    </div>

</section>

</main>
</div>
<script>

const userBtn = document.getElementById('userBtn');
const dropdownMenu = document.getElementById('dropdownMenu');

if(userBtn){

    userBtn.addEventListener('click',function(e){

        e.stopPropagation();

        dropdownMenu.classList.toggle('active');

    });

    document.addEventListener('click',function(){

        dropdownMenu.classList.remove('active');

    });

    dropdownMenu.addEventListener('click',function(e){

        e.stopPropagation();

    });

}

</script>
</body>
</html>