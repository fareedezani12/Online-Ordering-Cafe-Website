<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Menu</title>

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
Add New Menu
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

Create New Menu

</h1>

<p>

Add delicious food and beverages for your customers.

</p>

</div>

<div class="hero-right">

<img src="{{ asset('images/emoji-dashboard-staff2.png') }}">

</div>

</div>

<div class="admin-card">

@if ($errors->any())

<div style="
background:#FEE2E2;
color:#B91C1C;
padding:15px;
border-radius:10px;
margin-bottom:20px;
">

<ul>

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form
action="{{ request()->is('admin/*') ? url('admin/menu') : url('staff/menu') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div style="
display:grid;
grid-template-columns:1fr 1fr;
gap:30px;
">

<!-- LEFT -->

<div>

<label>

Menu Name

</label>

<input
type="text"
name="name"
class="form-control"
value="{{ old('name') }}"
required>

<br>

<label>

Category

</label>

<select
name="category"
class="form-control">

<option value="">Select Category</option>

<option>Food</option>

<option>Drink</option>

<option>Coffee</option>

<option>Dessert</option>

<option>Snack</option>

</select>

<br>

<label>

Price (RM)

</label>

<input
type="number"
step="0.01"
name="price"
class="form-control"
value="{{ old('price') }}"
required>

<br>

<label>

Description

</label>

<textarea
name="description"
rows="6"
class="form-control">{{ old('description') }}</textarea>

</div>

<!-- RIGHT -->

<div>

<label>

Menu Image

</label>

<div class="upload-box">

<img

id="preview"

src="https://placehold.co/350x250?text=Preview"

style="
width:100%;
height:250px;
object-fit:cover;
border-radius:15px;
">

</div>

<br>

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

<h3 style="margin-bottom:10px;">

Tips

</h3>

<ul>

<li>Use high quality images</li>

<li>Square image recommended</li>

<li>Maximum 2MB</li>

<li>PNG or JPG only</li>

</ul>

</div>

</div>

</div>

<hr style="margin:35px 0;">

<div style="
display:flex;
justify-content:flex-end;
gap:15px;
">

<a
href="{{ url()->previous() }}"
class="btn btn-secondary">

Cancel

</a>

<button
type="submit"
class="btn btn-primary">

<i class="fas fa-save"></i>

Save Menu

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