<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Promotion</title>

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

            <i class="fas fa-house"></i>

            Dashboard

        </a>

        <a href="{{ url('admin/promotions') }}"
        class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

</header>

<main class="admin-dashboard">

<section class="hero-admin">

    <div class="hero-left">

        <span class="hero-badge">

            PROMOTION MANAGEMENT

        </span>

        <h1>

            Edit Promotion

        </h1>

        <p>

            Update promotion details and discount information.

        </p>

    </div>

    <div class="hero-right">

        <img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

    </div>

</section>

<div class="admin-card">

<form action="{{ url('admin/promotions/'.$promotion->id) }}"
method="POST">

@csrf

@method('PUT')

<div class="form-grid">

<div class="form-group">

<label>

Promotion Title

</label>

<input
type="text"
name="title"
class="form-control"
value="{{ $promotion->title }}"
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
value="{{ $promotion->discount_percentage }}"
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
required>{{ $promotion->description }}</textarea>

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
value="{{ $promotion->start_date }}"
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
value="{{ $promotion->end_date }}"
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

<option value="0"

@if(!$promotion->members_only)

selected

@endif>

Public Promotion

</option>

<option value="1"

@if($promotion->members_only)

selected

@endif>

Members Only

</option>

</select>

</div>

<div style="display:flex;gap:15px;margin-top:30px;">

<button
type="submit"
class="btn-success">

<i class="fas fa-save"></i>

Update Promotion

</button>

<a
href="{{ url('admin/promotions') }}"
class="btn-danger">

Cancel

</a>

</div>

</form>

</div>

</main>

</div>

</body>

</html>