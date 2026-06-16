<style>
    .receipt-card{

max-width:750px;

margin:auto;

background:white;

padding:50px;

border-radius:30px;

box-shadow:0 10px 35px rgba(0,0,0,.08);

}

.receipt-row{

display:flex;

justify-content:space-between;

margin:18px 0;

}

.receipt-total{

font-size:28px;

font-weight:bold;

color:#00573F;

border-top:2px dashed #ddd;

padding-top:20px;

margin-top:20px;

}

.reward-earned{

margin-top:30px;

background:#FFF6D8;

padding:20px;

border-radius:15px;

text-align:center;

font-size:18px;

}

.receipt-buttons{

display:flex;

justify-content:center;

gap:20px;

margin-top:40px;

}

.receipt-buttons a{

padding:15px 30px;

background:#00573F;

color:white;

text-decoration:none;

border-radius:50px;

font-weight:bold;

}

.receipt-buttons a:last-child{

background:#F47920;

}
</style>

<section class="receipt-header">

    <img src="{{ asset('images/logo-petadunia.jpg') }}">

    <h1>

        Peta Dunia Cafe

    </h1>

    <p>

        Global Flavors, Local Heart

    </p>

</section>

<div class="receipt-card">

Order Number

Date

Customer

Dining Option

Payment Method

Items

Total

</div>

@if(auth()->check())

<div class="reward-earned">

⭐

You earned

<b>

{{ floor($order->total_price) }}

points

</b>

from this purchase.

</div>

@endif

<div class="receipt-buttons">

<a href="{{ url('/customer') }}">

🏠 Back Home

</a>

<a href="{{ url('/my-orders') }}">

📦 My Orders

</a>

<a href="{{ url('/receipt/'.$order->id) }}">

⬇ Download PDF

</a>

</div>