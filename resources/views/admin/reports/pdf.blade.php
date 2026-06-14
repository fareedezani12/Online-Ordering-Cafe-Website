<!DOCTYPE html>

<html>

<head>

<style>

body{

font-family:Arial;

}

table{

width:100%;

border-collapse:collapse;

}

th,td{

border:1px solid black;

padding:8px;

}

</style>

</head>

<body>

<h1>

Peta Dunia Cafe

</h1>

<h2>

Sales Report

</h2>

<p>

Total Revenue:

RM {{ number_format($totalRevenue,2) }}

</p>

<p>

Completed Orders:

{{ $completedOrders }}

</p>

<table>

<tr>

<th>ID</th>

<th>Total</th>

<th>Status</th>

</tr>

@foreach($orders as $order)

<tr>

<td>

{{ $order->id }}

</td>

<td>

RM {{ number_format($order->total_price,2) }}

</td>

<td>

{{ $order->status }}

</td>

</tr>

@endforeach

</table>

</body>

</html>