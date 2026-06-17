<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Management</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">

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

        <a href="{{ Auth::user()->role == 'admin' ? url('/admin') : url('/staff') }}"
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

            CUSTOMER MANAGEMENT

        </span>

        <h1>

            Manage Customers

        </h1>

        <p>

            View, edit and manage all registered customers.

        </p>

    </div>

    <div class="hero-right">

        <img src="{{ asset('images/gambar-admin.png') }}">

    </div>

</section>

<section class="dashboard-cards">

<div class="dashboard-card green">

    <div>

        <span>Total Customers</span>

        <h2>

            {{ $customers->count() }}

        </h2>

    </div>

    <i class="fa-solid fa-users"></i>

</div>

<div class="dashboard-card orange">

    <div>

        <span>Today's Register</span>

        <h2>

            {{ $customers->where('created_at','>=',today())->count() }}

        </h2>

    </div>

    <i class="fa-solid fa-user-plus"></i>

</div>

<div class="dashboard-card blue">

    <div>

        <span>Active Members</span>

        <h2>

            {{ $customers->count() }}

        </h2>

    </div>

    <i class="fa-solid fa-user-check"></i>

</div>

<div class="dashboard-card purple">

    <div>

        <span>Total Accounts</span>

        <h2>

            {{ $customers->count() }}

        </h2>

    </div>

    <i class="fa-solid fa-id-card"></i>

</div>

</section>

<div class="admin-card">

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;">

<h2>

Customer List

</h2>

<input

type="text"

id="searchCustomer"

class="form-control"

placeholder="Search customer...">

</div>

<table class="admin-table">

<thead>

<tr>

<th>Avatar</th>

<th>Name</th>

<th>Email</th>

<th>Role</th>

<th>Joined</th>

<th>Action</th>

</tr>

</thead>

<tbody id="customerTable">

@foreach($customers as $customer)

<tr>

<td>

<img

src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=00573f&color=fff"

style="width:55px;height:55px;border-radius:50%;">

</td>

<td>

{{ $customer->name }}

</td>

<td>

{{ $customer->email }}

</td>

<td>

<span class="badge-completed">

{{ ucfirst($customer->role) }}

</span>

</td>

<td>

{{ $customer->created_at->format('d M Y') }}

</td>

<td>

<a

href="{{ url('admin/customers/'.$customer->id) }}"

class="view-btn">

<i class="fas fa-eye"></i>

</a>

<a

href="{{ url('admin/customers/'.$customer->id.'/edit') }}"

class="view-btn"

style="background:#f59e0b;">

<i class="fas fa-pen"></i>

</a>

<form

action="{{ url('admin/customers/'.$customer->id) }}"

method="POST"

style="display:inline;">

@csrf

@method('DELETE')

<button

onclick="return confirm('Delete this customer?')"

style="border:none;background:none;">

<div class="view-btn"

style="background:#dc2626;">

<i class="fas fa-trash"></i>

</div>

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

const search=document.getElementById("searchCustomer");

search.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let rows=document.querySelectorAll("#customerTable tr");

rows.forEach(row=>{

row.style.display=row.innerText.toLowerCase().includes(value)

? ""

: "none";

});

});

</script>

</body>

</html>