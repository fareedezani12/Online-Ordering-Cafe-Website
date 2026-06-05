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

            <a href="{{ url('/admin') }}"
style="
background:white;
color:#355E3B;
padding:10px 20px;
border-radius:10px;
text-decoration:none;
font-weight:600;
">
    <i class="fas fa-house"></i>
    Dashboard
</a>

        </div>


    </header>

    <div class="admin-dashboard">

    <section class="hero-admin">

        <div class="hero-left">

            <span class="hero-badge">
                SALES REPORT
            </span>

            <h1>
                Revenue Analytics
            </h1>

            <p>
                Monitor sales performance,
                completed orders and
                best-selling menu items.
            </p>

        </div>

        <div class="hero-right">

            <img src="{{ asset('images/emoji-dashboard-staff2.png') }}"
                 style="max-width:350px;">

        </div>

    </section>

    <h2 class="admin-title" style="color: green">
        Sales Overview
    </h2>

    <div style="
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:20px;
        margin-bottom:30px;
    ">

        <div class="admin-card">

            <i class="fas fa-money-bill-wave"
            style="
                font-size:40px;
                color:#28A745;
            ">
            </i>

            <h3>Today's Revenue</h3>

            <h1 style="color:#355E3B;">

                RM {{ number_format($todayRevenue,2) }}

            </h1>

        </div>

        <div class="admin-card">

            <i class="fas fa-chart-line"
            style="
                font-size:40px;
                color:#D4A017;
            ">
            </i>

            <h3>Monthly Revenue</h3>

            <h1 style="color:#355E3B;">

                RM {{ number_format($monthlyRevenue,2) }}

            </h1>

        </div>

        <div class="admin-card">

            <i class="fas fa-check-circle"
            style="
                font-size:40px;
                color:#355E3B;
            ">
            </i>

            <h3>Completed Orders</h3>

            <h1 style="color:#355E3B;">

                {{ $completedOrders }}

            </h1>

        </div>

    </div>

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
            </div>
    </section>

    <div class="admin-card">

        <h2 style="
            color:#355E3B;
            margin-bottom:20px;
        ">
            🏆 Top Selling Menu
        </h2>

        <table style="
            width:100%;
            border-collapse:collapse;
        ">

            <thead>

                <tr style="
                    background:#355E3B;
                    color:white;
                ">

                    <th style="padding:15px;">
                        Ranking
                    </th>

                    <th>
                        Menu
                    </th>

                    <th>
                        Quantity Sold
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($topMenus as $item)

                <tr style="
                    text-align:center;
                    border-bottom:1px solid #ddd;
                ">

                    <td style="padding:15px;">

                        @if($loop->iteration == 1)

                            🥇

                        @elseif($loop->iteration == 2)

                            🥈

                        @elseif($loop->iteration == 3)

                            🥉

                        @else

                            #{{ $loop->iteration }}

                        @endif

                    </td>

                    <td>

                        {{ $item->menu->name }}

                    </td>

                    <td>

                        <span style="
                            background:#355E3B;
                            color:white;
                            padding:6px 12px;
                            border-radius:20px;
                        ">

                            {{ $item->total_sold }}

                        </span>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

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

const revenueData = @json($monthlyRevenueChart);
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

</script>

</body>
</html>