<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Create Promotion</title>

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

        <a href="{{ url('/admin') }}"
           class="btn btn-primary">

            <i class="fa-solid fa-house"></i>

            Dashboard

        </a>

        <a href="{{ url('admin/promotions') }}"
           class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left"></i>

            Back

        </a>

    </div>

</header>

<main class="admin-dashboard">

<section class="hero-admin">

<div class="hero-left">

<span class="hero-badge">

CREATE PROMOTION

</span>

<h1>

New Promotion

</h1>

<p>

Create discounts and exclusive offers for your customers.

</p>

</div>

<div class="hero-right">

<img src="{{ asset('images/gambar-admin.png') }}">

</div>

</section>

<div class="admin-card">

<form action="{{ url('admin/promotions') }}" method="POST">

@csrf

<div class="form-grid">

<div class="form-group">

<label>

Promotion Title

</label>

<input

type="text"

name="title"

class="form-control"

placeholder="Example: Hari Raya Sale"

required>

</div>

<div class="form-group">

<label>

Discount (%)

</label>

<input

type="number"

name="discount_percentage"

class="form-control"

placeholder="20"

required>

</div>

</div>

<div class="form-group">

<label>

Description

</label>

<textarea

name="description"

rows="5"

class="form-control"

placeholder="Promotion description..."

required></textarea>

</div>

<div class="form-grid">

<div class="form-group">

<label>

Start Date

</label>

<input

type="date"

name="start_date"

class="form-control"

required>

</div>

<div class="form-group">

<label>

End Date

</label>

<input

type="date"

name="end_date"

class="form-control"

required>

</div>

</div>

<div class="form-group">

<label>

Promotion Type

</label>

<select

name="members_only"

class="form-control">

<option value="0">

Public Promotion

</option>

<option value="1">

Members Only

</option>

</select>

</div>

<div style="margin-top:30px;display:flex;gap:15px;">

<button

class="btn btn-success"

type="submit">

<i class="fas fa-save"></i>

Save Promotion

</button>

<a

href="{{ url('admin/promotions') }}"

class="btn btn-danger">

Cancel

</a>

</div>

</form>

</div>

</main>

</div>

</body>

</html>