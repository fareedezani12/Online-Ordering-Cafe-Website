<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

Promotion Management

</title>

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

<a href="{{ url('/admin') }}"
class="btn btn-primary">

<i class="fas fa-house"></i>

Dashboard

</a>

<a href="{{ url('admin/promotions/create') }}"
class="btn btn-secondary">

<i class="fas fa-plus"></i>

New Promotion

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

Manage Promotions

</h1>

<p>

Create attractive promotions and boost your cafe sales.

</p>

</div>

<div class="hero-right">

<img
src="{{ asset('images/gambar-admin.png') }}">

</div>

</section>

<section class="dashboard-cards">

<div class="dashboard-card green">

<div>

<span>

Total Promotions

</span>

<h2>

{{ $promotions->count() }}

</h2>

</div>

<i class="fas fa-gift"></i>

</div>

<div class="dashboard-card orange">

<div>

<span>

Active

</span>

<h2>

{{ $activePromotions }}

</h2>

</div>

<i class="fas fa-fire"></i>

</div>

<div class="dashboard-card blue">

<div>

<span>

Expired

</span>

<h2>

{{ $expiredPromotions }}

</h2>

</div>

<i class="fas fa-clock"></i>

</div>

<div class="dashboard-card purple">

<div>

<span>

Members Only

</span>

<h2>

{{ $promotions->where('members_only',1)->count() }}

</h2>

</div>

<i class="fas fa-crown"></i>

</div>

</section>

<div class="admin-card">

<div style="display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;">

<h2>

Promotion List

</h2>

<input

type="text"

id="search"

class="form-control"

placeholder="Search promotion...">

</div>
@if(session('success'))

<div style="
background:#d1fae5;
color:#065f46;
padding:15px;
border-radius:10px;
margin-bottom:20px;
font-weight:600;
">

<i class="fas fa-circle-check"></i>

{{ session('success') }}

</div>

@endif
<table class="admin-table">

<thead>

<tr>

<th>

Title

</th>

<th>

Discount

</th>

<th>

Members

</th>

<th>

Start

</th>

<th>

End

</th>

<th>

Status

</th>

<th>

Action

</th>

</tr>

</thead>

<tbody id="promotionTable">

@foreach($promotions as $promotion)

<tr>

<td>

<strong>

{{ $promotion->title }}

</strong>

<br>

<small>

{{ $promotion->description }}

</small>

</td>

<td>

<span style="

background:#22c55e;

color:white;

padding:8px 15px;

border-radius:20px;">

{{ $promotion->discount_percentage }}%

</span>

</td>

<td>

@if($promotion->members_only)

<span style="

background:#f59e0b;

color:white;

padding:8px 15px;

border-radius:20px;">

Members

</span>

@else

<span style="

background:#6b7280;

color:white;

padding:8px 15px;

border-radius:20px;">

Public

</span>

@endif

</td>

<td>

{{ $promotion->start_date }}

</td>

<td>

{{ $promotion->end_date }}

</td>

<td>

@if(\Carbon\Carbon::parse($promotion->end_date)->isFuture())

<span style="

background:#16a34a;

color:white;

padding:8px 15px;

border-radius:20px;">

Active

</span>

@else

<span style="

background:#dc2626;

color:white;

padding:8px 15px;

border-radius:20px;">

Expired

</span>

@endif

</td>

<td>

<a
href="{{ url('admin/promotions/'.$promotion->id.'/edit') }}"
style="
background:#f59e0b;
color:white;
padding:8px 15px;
border-radius:8px;
text-decoration:none;
margin-right:5px;
">

<i class="fas fa-pen"></i>

</a>

<form
action="{{ url('admin/promotions/'.$promotion->id) }}"
method="POST"
style="display:inline;">

@csrf

@method('DELETE')

<button
onclick="return confirm('Delete this promotion?')"
style="
background:#dc2626;
color:white;
border:none;
padding:8px 15px;
border-radius:8px;
cursor:pointer;
">

<i class="fas fa-trash"></i>

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</main>

</div>

<script>

document.getElementById('search')

.addEventListener('keyup',function(){

let value=this.value.toLowerCase();

let rows=document.querySelectorAll('#promotionTable tr');

rows.forEach(function(row){

row.style.display=row.innerText.toLowerCase().includes(value)

? ''

: 'none';

});

});

</script>

</body>

</html>