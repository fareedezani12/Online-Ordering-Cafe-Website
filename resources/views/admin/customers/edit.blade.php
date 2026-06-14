<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Customer</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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

CUSTOMER MANAGEMENT

</span>

<h1>

Edit Customer

</h1>

<p>

Update customer information.

</p>

</div>

<div class="hero-right">

<img
src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=00573f&color=fff&size=250">

</div>

</section>

<div class="admin-card">

<form
action="{{ url('admin/customers/'.$customer->id) }}"
method="POST">

@csrf

@method('PUT')

<div style="display:grid;
grid-template-columns:1fr 1fr;
gap:25px;">

<div>

<label>

Customer Name

</label>

<input
type="text"
name="name"
value="{{ $customer->name }}"
class="form-control"
required>

</div>

<div>

<label>

Email Address

</label>

<input
type="email"
name="email"
value="{{ $customer->email }}"
class="form-control"
required>

</div>

<div>

<label>

Role

</label>

<input
type="text"
value="{{ ucfirst($customer->role) }}"
class="form-control"
readonly>

</div>

<div>

<label>

Registered Date

</label>

<input
type="text"
value="{{ $customer->created_at->format('d M Y') }}"
class="form-control"
readonly>

</div>

</div>

<div style="
margin-top:35px;
display:flex;
gap:15px;">

<button
type="submit"
class="btn btn-primary">

<i class="fas fa-floppy-disk"></i>

Save Changes

</button>

<a
href="{{ url('admin/customers') }}"
class="btn btn-secondary">

Cancel

</a>

</div>

</form>

</div>

</main>

</div>

</body>

</html>