<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Order Management</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/orders.css') }}">

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

<h2 style="color:#00573F;">

Order Management

</h2>

<div class="buttons">

<a href="{{ Auth::user()->role == 'admin' ? url('/admin') : url('/staff') }}"
class="btn btn-primary">

<i class="fas fa-house"></i>

Dashboard

</a>

</div>

</header>

<main class="admin-dashboard">

<div class="hero-admin">

<div class="hero-left">

<span class="hero-badge">

ORDER MANAGEMENT

</span>

<h1>

Manage Customer Orders

</h1>

<p>

Track customer orders and update their status in real time.

</p>

</div>

<div class="hero-right">

<img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

</div>

</div>

<div class="dashboard-cards">

<div class="dashboard-card green">

<div>

<span>Pending</span>

<h2>

{{ $orders->where('status','pending')->count() }}

</h2>

</div>

<i class="fas fa-clock"></i>

</div>

<div class="dashboard-card orange">

<div>

<span>Preparing</span>

<h2>

{{ $orders->where('status','preparing')->count() }}

</h2>

</div>

<i class="fas fa-fire"></i>

</div>

<div class="dashboard-card blue">

<div>

<span>Completed</span>

<h2>

{{ $orders->where('status','completed')->count() }}

</h2>

</div>

<i class="fas fa-circle-check"></i>

</div>

<div class="dashboard-card purple">

<div>

<span>Total Orders</span>

<h2>

{{ $orders->count() }}

</h2>

</div>

<i class="fas fa-receipt"></i>

</div>

</div>

<div class="admin-card">

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;">

<h2>

Customer Orders

</h2>

<input

type="text"

id="searchOrder"

placeholder="Search order..."

class="form-control"

style="max-width:300px;">

</div>

<table class="admin-table">

<thead>

<tr>

<th>Order ID</th>

<th>Customer</th>

<th>Total</th>

<th>Status</th>

<th>Date</th>

<th>Waiting Time</th>

<th>Action</th>

</tr>

</thead>

<tbody id="orderTable">

@forelse($orders as $order)

@php

$waiting = 'Ready';

switch($order->status){

    case 'pending':
        $waiting = '15 min';
        break;

    case 'preparing':
        $waiting = '8 min';
        break;

    case 'completed':
        $waiting = 'Ready';
        break;

    case 'cancelled':
        $waiting = 'Cancelled';
        break;

}

@endphp

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

@if($order->status=="pending")

<span class="badge-pending">

Pending

</span>

@elseif($order->status=="preparing")

<span class="badge-preparing">

Preparing

</span>

@elseif($order->status=="completed")

<span class="badge-completed">

Completed

</span>

@else

<span class="badge-cancel">

Cancelled

</span>

@endif

</td>

<td>

{{ $order->created_at->format('d M Y') }}

</td>

<td>

<span class="badge-waiting">

⏱ {{ $waiting }}

</span>

</td>

<td>

<a

href="{{ request()->is('admin/*')
    ? url('admin/orders/'.$order->id)
    : url('staff/orders/'.$order->id) }}"

class="view-btn">

<i class="fas fa-eye"></i>

</a>

</td>

</tr>

@empty

<tr>

<td colspan="6">

<div class="empty-state">

<i class="fas fa-box-open"></i>

<h2>

No Orders Yet

</h2>

<p>

Orders will appear here.

</p>

</div>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</main>

</div>

<script>

const search=document.getElementById("searchOrder");

search.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let rows=document.querySelectorAll("#orderTable tr");

rows.forEach(row=>{

row.style.display=row.innerText.toLowerCase().includes(value)

? ""

: "none";

});

});

</script>

</body>

</html>