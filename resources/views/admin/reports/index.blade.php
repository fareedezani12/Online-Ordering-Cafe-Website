<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Sales Report</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="container">

<header>

<div class="logo">

<img src="{{ asset('images/logo-petadunia.jpg') }}"
class="logo-img">

<span>Peta Dunia Cafe</span>

</div>

<div class="buttons">

<a href="{{ url('/admin') }}"
class="btn btn-primary">

<i class="fas fa-house"></i>

Dashboard

</a>

</div>

</header>

<main class="admin-dashboard">

<section class="hero-admin">

<div class="hero-left">

<span class="hero-badge">

SALES REPORT

</span>

<h1>

Business Analytics

</h1>

<p>

Track revenue, customer purchases and business growth in real time.

</p>

</div>

<div class="hero-right">

<img src="{{ asset('images/gambar-admin.png') }}">

</div>

</section>

<div class="dashboard-cards">

<div class="dashboard-card green">

<div>

<span>Today's Revenue</span>

<h2>

RM {{ number_format($todayRevenue,2) }}

</h2>

<small>

Today's sales

</small>

</div>

<i class="fas fa-money-bill-wave"></i>

</div>

<div class="dashboard-card orange">

<div>

<span>Monthly Revenue</span>

<h2>

RM {{ number_format($monthlyRevenue,2) }}

</h2>

<small>

Current month

</small>

</div>

<i class="fas fa-chart-line"></i>

</div>

<div class="dashboard-card blue">

<div>

<span>Completed Orders</span>

<h2>

{{ $completedOrders }}

</h2>

<small>

Finished orders

</small>

</div>

<i class="fas fa-check-circle"></i>

</div>

<div class="dashboard-card purple">

<div>

<span>Average Order</span>

<h2>

RM {{ number_format($averageOrder,2) }}

</h2>

<small>

Per transaction

</small>

</div>

<i class="fas fa-receipt"></i>

</div>

</div>

<section class="admin-grid-2">

<div class="admin-card">

<h3>

Monthly Revenue

</h3>

<canvas id="revenueChart"></canvas>

</div>

<div class="admin-card">

<h3>

Monthly Orders

</h3>

<canvas id="orderChart"></canvas>

</div>

</section>

<section class="admin-card">

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

<h2>

Top Selling Menu

</h2>

<a href="{{ url('/admin/reports/export') }}"
class="btn btn-secondary">

<i class="fas fa-download"></i>

Export PDF

</a>

</div>

<table class="admin-table">

<thead>

<tr>

<th>Rank</th>

<th>Menu</th>

<th>Total Sold</th>

</tr>

</thead>

<tbody>

@foreach($topMenus as $item)

<tr>

<td>

@if($loop->iteration==1)

🥇

@elseif($loop->iteration==2)

🥈

@elseif($loop->iteration==3)

🥉

@else

{{ $loop->iteration }}

@endif

</td>

<td>

{{ $item->menu->name }}

</td>

<td>

{{ $item->total_sold }}

</td>

</tr>

@endforeach

</tbody>

</table>

</section>

<section class="admin-card">

<h2>

Recent Transactions

</h2>

<table class="admin-table">

<thead>

<tr>

<th>ID</th>

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

RM {{ number_format($order->total_price,2) }}

</td>

<td>

@if($order->status=="completed")

<span class="status-completed">

Completed

</span>

@elseif($order->status=="preparing")

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

</tr>

@endforeach

</tbody>

</table>

</section>

</main>

</div>

<script>

const revenue=@json($monthlyRevenueChart);

new Chart(

document.getElementById('revenueChart'),

{

type:'bar',

data:{

labels:revenue.map(i=>i.month),

datasets:[{

label:'Revenue',

data:revenue.map(i=>i.revenue),

backgroundColor:'#355E3B',

borderRadius:10

}]

}

}

);

const orders=@json($monthlyOrderChart);

new Chart(

document.getElementById('orderChart'),

{

type:'line',

data:{

labels:orders.map(i=>i.month),

datasets:[{

label:'Orders',

data:orders.map(i=>i.total),

borderColor:'#F59E0B',

backgroundColor:'rgba(245,158,11,.2)',

fill:true,

tension:.4

}]

}

}

);

</script>

</body>

</html>