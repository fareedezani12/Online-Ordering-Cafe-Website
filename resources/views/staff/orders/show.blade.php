<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Order Details</title>

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

Order Details

</h2>

<div class="buttons">

<a href="{{ request()->is('admin/*') ? url('admin/orders') : url('staff/orders') }}"
class="btn btn-primary">

<i class="fas fa-arrow-left"></i>

Back

</a>

</div>

</header>

<main class="admin-dashboard">

<div class="hero-admin">

<div class="hero-left">

<span class="hero-badge">

ORDER DETAILS

</span>

<h1>

Order #{{ $order->id }}

</h1>

<p>

View customer order information and update its status.

</p>

</div>

<div class="hero-right">

<img src="{{ asset('images/gambar-staff.png') }}">

</div>

</div>

<div class="dashboard-cards">

<div class="dashboard-card green">

<div>

<span>Total Price</span>

<h2>

RM {{ number_format($order->total_price,2) }}

</h2>

</div>

<i class="fas fa-money-bill-wave"></i>

</div>

<div class="dashboard-card orange">

<div>

<span>Status</span>

<h2>

{{ ucfirst($order->status) }}

</h2>

</div>

<i class="fas fa-circle-info"></i>

</div>

<div class="dashboard-card blue">

<div>

<span>Date</span>

<h2>

{{ $order->created_at->format('d M') }}

</h2>

</div>

<i class="fas fa-calendar"></i>

</div>

<div class="dashboard-card purple">

<div>

<span>Customer</span>

<h2>

@if($order->user)

{{ $order->user->name }}

@else

Guest

@endif

</h2>

</div>

<i class="fas fa-user"></i>

</div>

</div>

<div class="admin-card">

<h2>

Customer Information

</h2>

<br>

<p>

<strong>Name :</strong>

@if($order->user)

{{ $order->user->name }}

@else

{{ $order->guest_name }}

@endif

</p>

<br>

<p>

<strong>Email :</strong>

{{ optional($order->user)->email }}

</p>

</div>

<div class="admin-card">

<h2>

Ordered Menu

</h2>

<table class="admin-table">

<thead>

<tr>

<th>Menu</th>

<th>Price</th>

<th>Quantity</th>

<th>Subtotal</th>

</tr>

</thead>

<tbody>

@foreach($order->items as $item)

<tr>

<td>

{{ $item->menu->name }}

</td>

<td>

RM {{ number_format($item->price,2) }}

</td>

<td>

{{ $item->quantity }}

</td>

<td>

RM {{ number_format($item->price*$item->quantity,2) }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="admin-card">

<h2>

Update Status

</h2>

<br>

<form

method="POST"

action="{{ request()->is('admin/*')
? url('admin/orders/'.$order->id)
: url('staff/orders/'.$order->id) }}">

@csrf

@method('PUT')

<select
name="status"
class="form-control">

<option value="pending"

{{ $order->status=="pending" ? "selected" : "" }}>

Pending

</option>

<option value="preparing"

{{ $order->status=="preparing" ? "selected" : "" }}>

Preparing

</option>

<option value="completed"

{{ $order->status=="completed" ? "selected" : "" }}>

Completed

</option>

<option value="cancelled"

{{ $order->status=="cancelled" ? "selected" : "" }}>

Cancelled

</option>

</select>

<br><br>

<button class="btn btn-primary">

<i class="fas fa-floppy-disk"></i>

Update Order

</button>

</form>

</div>

</main>

</div>

</body>

</html>
