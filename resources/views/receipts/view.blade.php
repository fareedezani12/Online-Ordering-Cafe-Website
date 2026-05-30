<h1>Order Successful</h1>

<h2>Receipt #{{ $order->id }}</h2>

<p>Total: RM {{ number_format($order->total_price,2) }}</p>

<a href="{{ url('/receipt/'.$order->id) }}">
    Download Receipt PDF
</a>

<p>
    Returning to menu in 5 seconds...
</p>

<script>
setTimeout(() => {
    window.location.href = "/menu";
}, 5000);
</script>