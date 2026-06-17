<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Register Membership</title>

<link rel="stylesheet"
href="{{ asset('css/style.css') }}">

<link rel="stylesheet"
href="{{ asset('css/header.css') }}">

<link rel="stylesheet"
href="{{ asset('css/admin.css') }}">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

<a href="{{ route('membership.index') }}"
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

LOYALTY PROGRAM

</span>

<h1>

Register Membership

</h1>

<p>

Register a customer into the Peta Dunia Cafe Loyalty Programme.

Every new member starts as

<strong>Bronze Member.</strong>

</p>

</div>

<div class="hero-right">

<img src="{{ asset('images/gambar-staff.png.png') }}">

</div>

</section>

<div class="admin-card">

<form

method="POST"

action="{{ route('membership.store') }}">

@csrf

<div class="form-group">

<label>

Select Customer

</label>

<select

name="user_id"

required

class="form-control">

<option value="">

Choose Customer

</option>

@foreach($users as $user)

<option value="{{ $user->id }}">

{{ $user->name }}

-

{{ $user->email }}

</option>

@endforeach

</select>

</div>

<div class="form-group">

<label>

Membership Level

</label>

<input

type="text"

value="Bronze"

readonly

class="form-control">

</div>

<div class="form-group">

<label>

Starting Points

</label>

<input

type="number"

value="0"

readonly

class="form-control">

</div>

<div class="form-group">

<label>

Total Spending

</label>

<input

type="number"

value="0"

readonly

class="form-control">

</div>

<div style="margin-top:30px;">

<button

type="submit"

class="btn btn-primary">

<i class="fas fa-user-plus"></i>

Register Member

</button>

<a

href="{{ route('membership.index') }}"

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