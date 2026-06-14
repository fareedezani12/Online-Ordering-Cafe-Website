<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Menu</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">

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

Edit Menu

</h2>

<div>

<a href="{{ url()->previous() }}" class="btn btn-primary">

<i class="fas fa-arrow-left"></i>

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

Edit Menu

</h1>

<p>

Update menu information, image and pricing.

</p>

</div>

<div class="hero-right">

<img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

</div>

</div>

<div class="admin-card">

@if ($errors->any())

<div style="background:#FEE2E2;padding:15px;border-radius:12px;color:red;margin-bottom:20px;">

<ul>

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form

action="{{ request()->is('admin/*') ? url('admin/menu/'.$menu->id) : url('staff/menu/'.$menu->id) }}"

method="POST"

enctype="multipart/form-data">

@csrf

@method('PUT')

<div style="display:grid;grid-template-columns:1fr 1fr;gap:35px;">

<div>

<label>Menu Name</label>

<input

type="text"

name="name"

class="form-control"

value="{{ old('name',$menu->name) }}"

required>

<br>

<label>Category</label>

<select

name="category"

class="form-control">

<option {{ $menu->category=='Food'?'selected':'' }}>Food</option>

<option {{ $menu->category=='Drink'?'selected':'' }}>Drink</option>

<option {{ $menu->category=='Coffee'?'selected':'' }}>Coffee</option>

<option {{ $menu->category=='Dessert'?'selected':'' }}>Dessert</option>

<option {{ $menu->category=='Snack'?'selected':'' }}>Snack</option>

</select>

<br>

<label>Price (RM)</label>

<input

type="number"

step="0.01"

name="price"

class="form-control"

value="{{ old('price',$menu->price) }}"

required>

<br>

<label>Description</label>

<textarea

name="description"

rows="6"

class="form-control">{{ old('description',$menu->description) }}</textarea>

</div>

<div>

<label>Current Image</label>

<div class="upload-box">

@if($menu->image)

<img

id="preview"

src="{{ asset('images/'.$menu->image) }}"

style="

width:100%;

height:260px;

object-fit:cover;

border-radius:15px;

">

@else

<img

id="preview"

src="https://placehold.co/400x260?text=No+Image"

style="

width:100%;

height:260px;

object-fit:cover;

border-radius:15px;

">

@endif

</div>

<br>

<label>Replace Image</label>

<input

type="file"

name="image"

id="imageInput"

accept="image/*">

<br><br>

<div style="

background:#F8F9FA;

padding:20px;

border-radius:15px;

">

<h3>

Current Information

</h3>

<p>

Category :

<strong>

{{ $menu->category }}

</strong>

</p>

<p>

Price :

<strong>

RM {{ number_format($menu->price,2) }}

</strong>

</p>

</div>

</div>

</div>

<hr style="margin:35px 0;">

<div style="display:flex;justify-content:flex-end;gap:15px;">

<a

href="{{ request()->is('admin/*') ? url('admin/menu') : url('staff/menu') }}"

class="btn btn-secondary">

Cancel

</a>

<button

type="submit"

class="btn btn-primary">

<i class="fas fa-save"></i>

Update Menu

</button>

</div>

</form>

</div>

</main>

</div>

<script>

document

.getElementById("imageInput")

.addEventListener("change",function(e){

const reader=new FileReader();

reader.onload=function(){

document

.getElementById("preview")

.src=reader.result;

}

reader.readAsDataURL(e.target.files[0]);

});

</script>

</body>

</html>