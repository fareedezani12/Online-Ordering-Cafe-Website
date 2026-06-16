<style>
body{

    margin:0;

    font-family:'Poppins',sans-serif;

    background:#f5f7f9;

}

.receipt-container{

    max-width:900px;

    margin:60px auto;

    padding:20px;

}

.receipt-card{

    background:white;

    border-radius:30px;

    padding:50px;

    box-shadow:0 15px 40px rgba(0,0,0,.08);

}

.receipt-logo{

    text-align:center;

    margin-bottom:40px;

}

.receipt-logo img{

    width:90px;

    height:90px;

    border-radius:50%;

    object-fit:cover;

    margin-bottom:15px;

}

.receipt-logo h1{

    color:#00573F;

    margin:0;

    font-size:38px;

}

.receipt-logo p{

    color:#777;

    margin-top:10px;

}

.receipt-info{

    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:20px;

    margin-bottom:40px;

}

.receipt-info div{

    background:#f8f8f8;

    padding:20px;

    border-radius:15px;

    text-align:center;

}

.receipt-info strong{

    color:#00573F;

}

.customer-info{

    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:20px;

    margin-bottom:40px;

}

.customer-info div{

    background:#FFF9F3;

    padding:20px;

    border-radius:15px;

    text-align:center;

}

.customer-info strong{

    color:#F47920;

}

.receipt-items{

    margin-top:30px;

}

.receipt-item{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:18px 0;

    border-bottom:1px solid #eee;

}

.receipt-item:last-child{

    border-bottom:none;

}

.item-name{

    font-weight:600;

    color:#333;

}

.item-price{

    font-weight:bold;

    color:#00573F;

}

.receipt-summary{

    margin-top:40px;

    border-top:2px dashed #ddd;

    padding-top:25px;

}

.summary-row{

    display:flex;

    justify-content:space-between;

    margin:18px 0;

    font-size:17px;

}

.summary-total{

    display:flex;

    justify-content:space-between;

    margin-top:25px;

    padding-top:20px;

    border-top:2px solid #ddd;

    font-size:28px;

    font-weight:bold;

    color:#00573F;

}

.reward-box{

    margin-top:40px;

    background:linear-gradient(135deg,#FFF4D6,#FFE8A3);

    padding:25px;

    border-radius:20px;

    text-align:center;

    font-size:20px;

    font-weight:600;

}

.thank-you{

    margin-top:40px;

    text-align:center;

}

.thank-you h2{

    color:#00573F;

    margin-bottom:10px;

}

.thank-you p{

    color:#666;

}

.receipt-action{

    display:flex;

    justify-content:center;

    gap:20px;

    margin-top:50px;

    flex-wrap:wrap;

}

.receipt-action a{

    padding:15px 35px;

    border-radius:50px;

    text-decoration:none;

    font-weight:600;

    transition:.3s;

}

.receipt-action a:nth-child(1){

    background:#00573F;

    color:white;

}

.receipt-action a:nth-child(2){

    background:#F47920;

    color:white;

}

.receipt-action a:nth-child(3){

    background:#ececec;

    color:#333;

}

.receipt-action a:hover{

    transform:translateY(-4px);

    box-shadow:0 10px 25px rgba(0,0,0,.15);

}

@media(max-width:768px){

.receipt-info,

.customer-info{

grid-template-columns:1fr;

}

.receipt-card{

padding:25px;

}

.summary-total{

font-size:22px;

}

.receipt-action{

flex-direction:column;

}

.receipt-action a{

text-align:center;

}

}
</style>

<div class="receipt-logo">

<img src="{{ asset('images/logo-petadunia.jpg') }}">

<h1>

Peta Dunia Cafe

</h1>

<p>

Global Flavors, Local Heart

</p>

</div>

<div class="receipt-info">

<div>

<strong>

Receipt No

</strong>

<br>

#{{ $order->id }}

</div>

<div>

<strong>

Date

</strong>

<br>

{{ $order->created_at->format('d M Y') }}

</div>

<div>

<strong>

Time

</strong>

<br>

{{ $order->created_at->format('h:i A') }}

</div>

</div>

@if(auth()->check())

<div class="reward-box">

⭐

You earned

<b>

{{ floor($order->total_price) }}

reward points

</b>

from this purchase.

</div>

@endif

<div class="receipt-action">

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