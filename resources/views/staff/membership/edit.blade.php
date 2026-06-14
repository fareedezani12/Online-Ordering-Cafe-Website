<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Edit Membership</title>

<link rel="stylesheet"
href="{{ asset('css/style.css') }}">

<link rel="stylesheet"
href="{{ asset('css/header.css') }}">

<link rel="stylesheet"
href="{{ asset('css/admin.css') }}">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

MEMBERSHIP MANAGEMENT

</span>

<h1>

Edit Membership

</h1>

<p>

Update customer membership level,

points and spending information.

</p>

</div>

<div class="hero-right">

<img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

</div>

</section>

<div class="admin-card">

<form method="POST"
action="{{ route('membership.update',$member->id) }}">

@csrf

@method('PUT')

<div class="form-group">

<label>

Customer Name

</label>

<input

type="text"

class="form-control"

value="{{ $member->user->name }}"

readonly>

</div>

<div class="form-group">

<label>

Membership Level

</label>

<select

name="membership_level"

class="form-control">

<option value="Bronze"

{{ $member->membership_level=="Bronze" ? "selected":"" }}>

Bronze

</option>

<option value="Silver"

{{ $member->membership_level=="Silver" ? "selected":"" }}>

Silver

</option>

<option value="Gold"

{{ $member->membership_level=="Gold" ? "selected":"" }}>

Gold

</option>

<option value="Platinum"

{{ $member->membership_level=="Platinum" ? "selected":"" }}>

Platinum

</option>

</select>

</div>

<div class="form-group">

<label>

Points

</label>

<input

type="number"

name="points"

class="form-control"

value="{{ $member->points }}">

</div>

<div class="form-group">

<label>

Total Spending (RM)

</label>

<input

type="number"

step="0.01"

name="total_spending"

class="form-control"

value="{{ $member->total_spending }}">

</div>

<div style="margin-top:30px;display:flex;gap:15px;">

<button
type="submit"
class="btn btn-primary">

<i class="fas fa-save"></i>

Save Changes

</button>

<a
href="{{ route('membership.index') }}"
class="btn btn-secondary">

Cancel

</a>

</div>

</form>

</div>

<div class="admin-card" style="margin-top:25px;">

<h2 style="color:#00573F;">

Membership Guide

</h2>

<table class="admin-table">

<thead>

<tr>

<th>Level</th>

<th>Total Spending</th>

<th>Benefits</th>

</tr>

</thead>

<tbody>

<tr>

<td>

🥉 Bronze

</td>

<td>

RM0 - RM299

</td>

<td>

Basic Membership

</td>

</tr>

<tr>

<td>

🥈 Silver

</td>

<td>

RM300 - RM799

</td>

<td>

5% Discount

</td>

</tr>

<tr>

<td>

🥇 Gold

</td>

<td>

RM800 - RM1499

</td>

<td>

10% Discount

</td>

</tr>

<tr>

<td>

💎 Platinum

</td>

<td>

RM1500+

</td>

<td>

15% Discount + Priority

</td>

</tr>

</tbody>

</table>

</div>

</main>

</div>

</body>

</html>