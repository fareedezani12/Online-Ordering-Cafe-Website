<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Menu Management</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<link rel="stylesheet" href="{{ asset('css/header.css') }}">

</head>

<body>

<div class="container">

<header>

<div class="logo">

<img src="{{ asset('images/logo-petadunia.jpg') }}"
class="logo-img">

<span>Peta Dunia Cafe</span>

</div>

<div>

<h2 style="color:#00573F;">

Menu Management

</h2>

</div>

<div class="buttons">

<a href="{{ url()->previous() }}"
class="btn btn-primary">

<i class="fa fa-arrow-left"></i>

Back

</a>

</div>

</header>

<main class="admin-dashboard">

<div class="hero-admin">

<div class="hero-left">

<span class="hero-badge">

MENU MANAGEMENT

</span>

<h1>

Manage Cafe Menu

</h1>

<p>

Create, edit and organize all food and beverage items from one place.

</p>

</div>

<div class="hero-right">

<img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

</div>

</div>

<div class="dashboard-cards">

<div class="dashboard-card green">

<div>

<span>Total Menu</span>

<h2>

{{ $menus->count() }}

</h2>

</div>

<i class="fa-solid fa-utensils"></i>

</div>

<div class="dashboard-card orange">

<div>

<span>Categories</span>

<h2>

{{ $menus->pluck('category')->unique()->count() }}

</h2>

</div>

<i class="fa-solid fa-layer-group"></i>

</div>

<div class="dashboard-card blue">

<div>

<span>Images</span>

<h2>

{{ $menus->whereNotNull('image')->count() }}

</h2>

</div>

<i class="fa-solid fa-image"></i>

</div>

<div class="dashboard-card purple">

<div>

<span>Status</span>

<h2>

Active

</h2>

</div>

<i class="fa-solid fa-circle-check"></i>

</div>

</div>

<div class="admin-card">

<div style="
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
flex-wrap:wrap;
gap:15px;
">

<div>

<h2 style="
color:#00573F;
margin-bottom:5px;
">

🍽️ Menu Management

</h2>

<p style="
color:#777;
font-size:14px;
">

Manage all food and beverage items for your cafe.

</p>

</div>

<div style="
display:flex;
gap:12px;
">

<a href="{{ Auth::user()->role == 'admin' ? url('/admin') : url('/staff') }}"
class="btn btn-primary">

<i class="fas fa-house"></i>

Dashboard

</a>

<a
href="{{ request()->is('admin/*') ? url('admin/menu/create') : url('staff/menu/create') }}"
class="btn btn-secondary">

<i class="fas fa-plus"></i>

Add New Menu

</a>

</div>

</div>

<input
type="text"
id="searchInput"
placeholder="Search menu..."
style="width:100%;padding:12px;border-radius:10px;border:1px solid #ddd;margin-bottom:20px;">

<table class="admin-table">

<thead>

<tr>

<th>Image</th>

<th>Name</th>

<th>Category</th>

<th>Price</th>

<th>Action</th>

</tr>

</thead>

<tbody id="menuTable">

@forelse($menus as $menu)

<tr>

<td>

@if($menu->image)

<img
src="{{ asset('images/'.$menu->image) }}"
style="width:70px;height:70px;border-radius:12px;object-fit:cover;">

@else

No Image

@endif

</td>

<td>

<strong>

{{ $menu->name }}

</strong>

</td>

<td>

<span class="badge">

{{ $menu->category }}

</span>

</td>

<td>

RM {{ number_format($menu->price,2) }}

</td>

<td>

<a href="{{ request()->is('admin/*') ? url('admin/menu/'.$menu->id.'/edit') : url('staff/menu/'.$menu->id.'/edit') }}"
class="edit-btn">

<i class="fa fa-pen"></i>

</a>

<form
action="{{ request()->is('admin/*') ? url('admin/menu/'.$menu->id) : url('staff/menu/'.$menu->id) }}"
method="POST"
style="display:inline;">

@csrf

@method('DELETE')

<button
class="delete-btn"
onclick="return confirm('Delete this menu?')">

<i class="fa fa-trash"></i>

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5">

<div style="padding:60px;text-align:center;">

<i class="fa fa-utensils"
style="font-size:60px;color:#ccc;"></i>

<h2>

No Menu Available

</h2>

<p>

Create your first menu item.

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

const input=document.getElementById("searchInput");

input.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let rows=document.querySelectorAll("#menuTable tr");

rows.forEach(row=>{

row.style.display=row.innerText.toLowerCase().includes(value)
? ""
: "none";

});

});

</script>

</body>

</html>