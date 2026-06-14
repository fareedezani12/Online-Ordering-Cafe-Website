<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Customer Profile</title>

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

<div class="buttons">

<a href="{{ url('admin/customers') }}"
class="btn btn-primary">

<i class="fas fa-arrow-left"></i>

Back

</a>

</div>

</header>

<main class="admin-dashboard">

<section class="hero-admin">

<div class="hero-left">

<span class="hero-badge">

CUSTOMER PROFILE

</span>

<h1>

{{ $customer->name }}

</h1>

<p>

View customer information and account details.

</p>

</div>

<div class="hero-right">

<img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=00573f&color=fff&size=250">

</div>

</section>

<div class="dashboard-cards">

<div class="dashboard-card green">

<div>

<span>Role</span>

<h2>

{{ ucfirst($customer->role) }}

</h2>

</div>

<i class="fas fa-user"></i>

</div>

<div class="dashboard-card orange">

<div>

<span>Member Since</span>

<h2>

{{ $customer->created_at->format('Y') }}

</h2>

</div>

<i class="fas fa-calendar"></i>

</div>

<div class="dashboard-card blue">

<div>

<span>Email</span>

<h2 style="font-size:18px;">

Active

</h2>

</div>

<i class="fas fa-envelope"></i>

</div>

<div class="dashboard-card purple">

<div>

<span>Status</span>

<h2>

Active

</h2>

</div>

<i class="fas fa-circle-check"></i>

</div>

</div>

<div class="admin-card">

<h2>

Basic Information

</h2>

<br>

<table class="admin-table">

<tr>

<th width="30%">

Name

</th>

<td>

{{ $customer->name }}

</td>

</tr>

<tr>

<th>

Email

</th>

<td>

{{ $customer->email }}

</td>

</tr>

<tr>

<th>

Role

</th>

<td>

{{ ucfirst($customer->role) }}

</td>

</tr>

<tr>

<th>

Created At

</th>

<td>

{{ $customer->created_at->format('d M Y h:i A') }}

</td>

</tr>

<tr>

<th>

Updated At

</th>

<td>

{{ $customer->updated_at->format('d M Y h:i A') }}

</td>

</tr>

</table>

</div>

<div class="admin-card">

<h2>

Quick Actions

</h2>

<br>

<div style="display:flex;gap:20px;flex-wrap:wrap;">

<a href="{{ url('admin/customers/'.$customer->id.'/edit') }}"

class="btn btn-primary">

<i class="fas fa-pen"></i>

Edit Customer

</a>

<form

action="{{ url('admin/customers/'.$customer->id) }}"

method="POST">

@csrf

@method('DELETE')

<button

onclick="return confirm('Delete this customer?')"

class="btn btn-secondary">

<i class="fas fa-trash"></i>

Delete Customer

</button>

</form>

<a href="{{ url('admin/customers') }}"

class="btn btn-primary">

<i class="fas fa-users"></i>

Customer List

</a>

</div>

</div>

<div class="admin-card">

<h2>

Account Summary

</h2>

<br>

<div style="display:grid;
grid-template-columns:repeat(4,1fr);
gap:20px;">

<div style="background:#f5f5f5;
padding:20px;
border-radius:15px;
text-align:center;">

<h1 style="color:#00573f;">

0

</h1>

<p>

Orders

</p>

</div>

<div style="background:#f5f5f5;
padding:20px;
border-radius:15px;
text-align:center;">

<h1 style="color:#00573f;">

RM0

</h1>

<p>

Total Spending

</p>

</div>

<div style="background:#f5f5f5;
padding:20px;
border-radius:15px;
text-align:center;">

<h1 style="color:#00573f;">

0

</h1>

<p>

Points

</p>

</div>

<div style="background:#f5f5f5;
padding:20px;
border-radius:15px;
text-align:center;">

<h1 style="color:#00573f;">

Bronze

</h1>

<p>

Membership

</p>

</div>

</div>

</div>

</main>

</div>

</body>

</html>