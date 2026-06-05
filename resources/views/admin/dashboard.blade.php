<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Peta Dunia Cafe</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        <section class="hero-admin">

            <div class="hero-left">

                <span class="hero-badge">

                    ADMIN PANEL

                </span>

                <h1>

                    Welcome Back,
                    {{ Auth::user()->name }}

                </h1>

                <p>

                    Manage menu items,
                    promotions,
                    memberships,
                    sales reports
                    and customer orders
                    from one dashboard.

                </p>

                <div class="hero-buttons">

                    <a href="{{ url('admin/reports') }}">

                        View Reports

                    </a>

                    <a href="{{ url('admin/promotions') }}">

                        Promotions

                    </a>

                </div>

            </div>

            <div class="hero-right">

                <img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

            </div>

        </section>

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;">

            <div>

                <h1 style="
                    color: green;
                    margin:0;
                ">
                    Dashboard Overview
                </h1>

                <p style="
                    color: green;
                    margin-top:5px;
                ">
                    Monitor your cafe performance and customer activity.
                </p>

            </div>

        </div>

        <section style="
                display:grid;
                grid-template-columns:repeat(4,1fr);
                gap:20px;
                margin-top:20px;">


            <!-- Users -->
            <div style="
                background:#F5EEDC;
                border-top:5px solid #355E3B;
                padding:25px;
                border-radius:15px;
                box-shadow:0 4px 12px rgba(0,0,0,0.08);
            ">

                <i class="fas fa-users"
                style="
                        font-size:40px;
                        color:#355E3B;
                ">
                </i>

                <p style="
                    margin-top:15px;
                    color:#666;
                    font-size:14px;
                ">
                    Total Users
                </p>

                <h1 style="
                    color:#355E3B;
                    margin:0;
                ">
                    {{ $totalUsers }}
                </h1>

            </div>

            <!-- Orders -->
            <div style="
                background:#F5EEDC;
                border-top:5px solid #D4A017;
                padding:25px;
                border-radius:15px;
                box-shadow:0 4px 12px rgba(0,0,0,0.08);
            ">

                <i class="fas fa-receipt"
                style="
                        font-size:40px;
                        color:#D4A017;
                ">
                </i>

                <p style="
                    margin-top:15px;
                    color:#666;
                    font-size:14px;
                ">
                    Total Orders
                </p>

                <h1 style="
                    color:#355E3B;
                    margin:0;
                ">
                    {{ $totalOrders }}
                </h1>

            </div>

            <!-- Revenue -->
            <div style="
                background:#F5EEDC;
                border-top:5px solid #28A745;
                padding:25px;
                border-radius:15px;
                box-shadow:0 4px 12px rgba(0,0,0,0.08);
            ">

                <i class="fas fa-money-bill-wave"
                style="
                        font-size:40px;
                        color:#28A745;
                ">
                </i>

                <p style="
                    margin-top:15px;
                    color:#666;
                    font-size:14px;
                ">
                    Total Revenue
                </p>

                <h2 style="
                    color:#355E3B;
                    margin:0;
                ">
                    RM {{ number_format($totalRevenue,2) }}
                </h2>

            </div>

            <!-- Members -->
            <div style="
                background:#F5EEDC;
                border-top:5px solid #6F42C1;
                padding:25px;
                border-radius:15px;
                box-shadow:0 4px 12px rgba(0,0,0,0.08);
            ">

                <i class="fas fa-id-card"
                style="
                        font-size:40px;
                        color:#6F42C1;
                ">
                </i>

                <p style="
                    margin-top:15px;
                    color:#666;
                    font-size:14px;
                ">
                    Total Members
                </p>

                <h1 style="
                    color:#355E3B;
                    margin:0;
                ">
                    {{ $totalMembers }}
                </h1>

            </div>

        </section>

        <section style="margin-top:30px;">

            <h2 style="
                color: green;
                margin-bottom:15px;
            ">
            </h2>

            <div style="
                display:grid;
                grid-template-columns:repeat(4,1fr);
                gap:20px;
            ">

                <div style="
                    background:#F5EEDC;
                    padding:20px;
                    border-radius:15px;
                    text-align:center;
                ">

                    <i class="fas fa-receipt"
                    style="
                            font-size:30px;
                            color:#355E3B;
                    ">
                    </i>

                    <h3>Today's Orders</h3>

                    <p style="
                        font-size:28px;
                        font-weight:bold;
                        color:#355E3B;
                    ">
                        {{ $todayOrders }}
                    </p>

                </div>

                <div style="
                    background:#F5EEDC;
                    padding:20px;
                    border-radius:15px;
                    text-align:center;
                ">

                    <i class="fas fa-money-bill-wave"
                    style="
                            font-size:30px;
                            color:#355E3B;
                    ">
                    </i>

                    <h3>Today's Revenue</h3>

                    <p style="
                        font-size:28px;
                        font-weight:bold;
                        color:#355E3B;
                    ">
                        RM {{ number_format($todayRevenue,2) }}
                    </p>

                </div>

                <div style="
                    background:#F5EEDC;
                    padding:20px;
                    border-radius:15px;
                    text-align:center;
                ">

                    <i class="fas fa-check-circle"
                    style="
                            font-size:30px;
                            color:#355E3B;
                    ">
                    </i>

                    <h3>Completed Orders</h3>

                    <p style="
                        font-size:28px;
                        font-weight:bold;
                        color:#355E3B;
                    ">
                        {{ $completedToday }}
                    </p>

                </div>

                <div style="
                    background:#F5EEDC;
                    padding:20px;
                    border-radius:15px;
                    text-align:center;
                ">

                    <i class="fas fa-user-plus"
                    style="
                            font-size:30px;
                            color:#355E3B;
                    ">
                    </i>

                    <h3>New Members</h3>

                    <p style="
                        font-size:28px;
                        font-weight:bold;
                        color:#355E3B;
                    ">
                        {{ $newMembersToday }}
                    </p>

                </div>

            </div>

        </section>

        <section class="admin-card">

            <div style="
                display:flex;
                gap:20px;
                margin-top:20px;
            ">

                <div style="
                    flex:1;
                    background:white;
                    padding:20px;
                    border-radius:15px;
                ">
                    <h3>Monthly Revenue</h3>

                    <canvas id="revenueChart"
                            style="max-height:250px;">
                    </canvas>
                </div>

                <div style="
                    flex:1;
                    background:white;
                    padding:20px;
                    border-radius:15px;
                ">
                    <h3>Monthly Orders</h3>

                    <canvas id="ordersChart"
                            style="max-height:250px;">
                    </canvas>
                </div>

            </div>

            <div style="
                background:white;
                padding:20px;
                border-radius:15px;
                margin-top:20px;
            ">

                <h3>Membership Distribution</h3>

                <div style="
                    width:300px;
                    margin:auto;
                ">

                    <canvas id="membershipChart"></canvas>

                </div>

            </div>

        </section>

        <section style="margin-top:30px;">

            <h2 style="
                color: green;
                margin-bottom:15px;
            ">
                Recent Orders
            </h2>

            <div style="
                background:#F5EEDC;
                border-radius:20px;
                overflow:hidden;
            ">

                <table style="
                    width:100%;
                    border-collapse:collapse;
                ">

                    <thead>

                        <tr style="
                            background:#355E3B;
                            color:white;
                        ">

                            <th style="padding:15px;">Order ID</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($recentOrders as $order)

                        <tr style="
                            text-align:center;
                            border-bottom:1px solid #ddd;
                        ">

                            <td style="padding:15px;">
                                #{{ $order->id }}
                            </td>

                            <td>

                                @if($order->user_id)

                                    User #{{ $order->user_id }}

                                @else

                                    {{ $order->guest_name }}

                                @endif

                            </td>

                            <td>
                                RM {{ number_format($order->total_price,2) }}
                            </td>

                            <td>

                                @if($order->status == 'completed')

                                    <span style="
                                        background:#28a745;
                                        color:white;
                                        padding:5px 10px;
                                        border-radius:20px;
                                    ">
                                        Completed
                                    </span>

                                @elseif($order->status == 'preparing')

                                    <span style="
                                        background:#ffc107;
                                        color:black;
                                        padding:5px 10px;
                                        border-radius:20px;
                                    ">
                                        Preparing
                                    </span>

                                @else

                                    <span style="
                                        background:#dc3545;
                                        color:white;
                                        padding:5px 10px;
                                        border-radius:20px;
                                    ">
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

        </section>

        <section style="margin-top:30px;">

            <h2 style="
                color: green;
                margin-bottom:15px;
            ">
                Top Selling Menu
            </h2>

            <div style="
                display:flex;
                gap:20px;
            ">

                @foreach($topMenus as $item)

                <div style="
                    flex:1;
                    background:#F5EEDC;
                    border-radius:20px;
                    padding:20px;
                    text-align:center;
                ">

                    <img
                        src="{{ asset('images/'.$item->menu->image) }}"
                        style="
                            width:100%;
                            height:180px;
                            object-fit:cover;
                            border-radius:15px;
                        "
                    >

                    <h3 style="
                        color:#355E3B;
                        margin-top:15px;
                    ">
                        {{ $item->menu->name }}
                    </h3>

                    <p>
                        Category:
                        {{ $item->menu->category }}
                    </p>

                    <div style="
                        background:#355E3B;
                        color:white;
                        padding:10px;
                        border-radius:10px;
                        margin-top:10px;
                    ">

                        Sold:
                        {{ $item->total_sold }}

                    </div>

                </div>

                @endforeach

            </div>

        </section>

        <section style="margin-top:30px;">

            <h2 style="
                color: green;
                margin-bottom:15px;
            ">
                Business Insights
            </h2>

            <div style="
                display:grid;
                grid-template-columns:repeat(2,1fr);
                gap:20px;
            ">

                <div style="
                    background:#F5EEDC;
                    padding:20px;
                    border-radius:15px;
                ">

                    <h3>📈 Revenue Overview</h3>

                    <p>
                        Total Revenue:
                        <strong>
                            RM {{ number_format($totalRevenue,2) }}
                        </strong>
                    </p>

                </div>

                <div style="
                    background:#F5EEDC;
                    padding:20px;
                    border-radius:15px;
                ">

                    <h3>🔥 Popular Category</h3>

                    <p>

                        {{ $popularCategory->category ?? 'No Data' }}

                    </p>

                </div>

                <div style="
                    background:#F5EEDC;
                    padding:20px;
                    border-radius:15px;
                ">

                    <h3>⚠️ Pending Orders</h3>

                    <p>

                        {{ $pendingOrders }}

                    </p>

                </div>

                <div style="
                    background:#F5EEDC;
                    padding:20px;
                    border-radius:15px;
                ">

                    <h3>🎁 Active Promotions</h3>

                    <p>

                        {{ $activePromotions }}

                    </p>

                </div>

            </div>

        </section>

        <section style="margin-top:30px;">
            <h2 style="
                color: green;
                margin-bottom:15px;
            ">
                Quick Actions
            </h2>

            <div style="
                display:grid;
                grid-template-columns:repeat(3,1fr);
                gap:20px;
            ">

                <a href="{{ url('staff/menu') }}"
                style="
                    background:#F5EEDC;
                    text-decoration:none;
                    color:#355E3B;
                    padding:25px;
                    border-radius:15px;
                    text-align:center;
                    transition:0.3s;
                ">

                    <i class="fas fa-utensils"
                    style="font-size:40px;">
                    </i>

                    <h3>Manage Menu</h3>

                    <p>
                        Add, edit and delete menu items.
                    </p>

                </a>

                <a href="{{ url('staff/orders') }}"
                style="
                    background:#F5EEDC;
                    text-decoration:none;
                    color:#355E3B;
                    padding:25px;
                    border-radius:15px;
                    text-align:center;
                ">

                    <i class="fas fa-receipt"
                    style="font-size:40px;">
                    </i>

                    <h3>Manage Orders</h3>

                    <p>
                        Track and update customer orders.
                    </p>

                </a>

                <a href="{{ url('admin/promotions') }}"
                style="
                    background:#F5EEDC;
                    text-decoration:none;
                    color:#355E3B;
                    padding:25px;
                    border-radius:15px;
                    text-align:center;
                ">

                    <i class="fas fa-gift"
                    style="font-size:40px;">
                    </i>

                    <h3>Promotions</h3>

                    <p>
                        Create and manage cafe promotions.
                    </p>

                </a>

                <a href="{{ url('membership') }}"
                style="
                    background:#F5EEDC;
                    text-decoration:none;
                    color:#355E3B;
                    padding:25px;
                    border-radius:15px;
                    text-align:center;
                ">

                    <i class="fas fa-id-card"
                    style="font-size:40px;">
                    </i>

                    <h3>Memberships</h3>

                    <p>
                        View loyalty program statistics.
                    </p>

                </a>

                <a href="{{ url('admin/reports') }}"
                style="
                    background:#F5EEDC;
                    text-decoration:none;
                    color:#355E3B;
                    padding:25px;
                    border-radius:15px;
                    text-align:center;
                ">

                    <i class="fas fa-chart-line"
                    style="font-size:40px;">
                    </i>

                    <h3>Reports</h3>

                    <p>
                        View revenue and sales reports.
                    </p>

                </a>

                <a href="#"
                style="
                    background:#F5EEDC;
                    text-decoration:none;
                    color:#355E3B;
                    padding:25px;
                    border-radius:15px;
                    text-align:center;
                ">

                    <i class="fas fa-users"
                    style="font-size:40px;">
                    </i>

                    <h3>Users</h3>

                    <p>
                        Manage customer accounts.
                    </p>

                </a>

            </div>

        </section>

    </main>

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

</body>
</html>