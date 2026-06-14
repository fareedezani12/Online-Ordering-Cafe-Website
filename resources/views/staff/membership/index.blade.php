<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Membership Management</title>

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

<a href="{{ auth()->user()->role=='admin' ? url('/admin') : url('/staff') }}"
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

LOYALTY PROGRAM

</span>

<h1>

Membership Management

</h1>

<p>

Manage customer loyalty programme,

membership levels,

points and spending records.

</p>

<div class="hero-buttons">

<a href="{{ route('membership.create') }}">

<i class="fas fa-user-plus"></i>

Register Member

</a>

</div>

</div>

<div class="hero-right">

<img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

</div>

</section>

<section class="dashboard-cards">

<div class="dashboard-card green">

<div>

<span>Total Members</span>

<h2>{{ $totalMembers }}</h2>

<small>Registered</small>

</div>

<i class="fas fa-users"></i>

</div>

<div class="dashboard-card orange">

<div>

<span>Bronze</span>

<h2>{{ $bronze }}</h2>

<small>Bronze Members</small>

</div>

<i class="fas fa-medal"></i>

</div>

<div class="dashboard-card blue">

<div>

<span>Silver</span>

<h2>{{ $silver }}</h2>

<small>Silver Members</small>

</div>

<i class="fas fa-award"></i>

</div>

<div class="dashboard-card purple">

<div>

<span>Gold & Platinum</span>

<h2>{{ $gold+$platinum }}</h2>

<small>Premium Members</small>

</div>

<i class="fas fa-crown"></i>

</div>

</section>

<div class="admin-card" style="margin-top:30px;">

<div style="display:flex;justify-content:space-between;margin-bottom:20px;align-items:center;">

<h2 style="color:#00573F;">

Member List

</h2>

<input
type="text"
id="searchInput"
placeholder="Search member..."
style="
padding:12px;
width:300px;
border-radius:10px;
border:1px solid #ddd;
">

</div>

<table class="admin-table"
id="memberTable">

<thead>

<tr>

<th>Name</th>

<th>Email</th>

<th>Level</th>

<th>Points</th>

<th>Total Spending</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($members as $member)

<tr>

<td>

{{ $member->user->name }}

</td>

<td>

{{ $member->user->email }}

</td>

<td>

@if($member->membership_level=="Bronze")

<span class="badge bronze">

Bronze

</span>

@elseif($member->membership_level=="Silver")

<span class="badge silver">

Silver

</span>

@elseif($member->membership_level=="Gold")

<span class="badge gold">

Gold

</span>

@else

<span class="badge platinum">

Platinum

</span>

@endif

</td>

<td>

{{ $member->points }}

</td>

<td>

RM {{ number_format($member->total_spending,2) }}

</td>

<td>

<a href="{{ route('membership.show',$member->id) }}"
class="table-btn">

<i class="fas fa-eye"></i>

</a>

<a href="{{ route('membership.edit',$member->id) }}"
class="table-btn edit">

<i class="fas fa-pen"></i>

</a>

@if(auth()->user()->role=="admin")

<form
action="{{ route('membership.destroy',$member->id) }}"
method="POST"
style="display:inline;">

@csrf

@method('DELETE')

<button
class="table-btn delete">

<i class="fas fa-trash"></i>

</button>

</form>

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</main>

</div>

<script>

const search=document.getElementById("searchInput");

search.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let rows=document.querySelectorAll("#memberTable tbody tr");

rows.forEach(row=>{

row.style.display=row.innerText.toLowerCase().includes(value)

?"":"none";

});

});

</script>

</body>

</html>