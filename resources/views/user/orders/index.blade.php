<h1>My Orders</h1>

<table border="1" cellpadding="10">

    <tr>

        <th>Order ID</th>
        <th>Total</th>
        <th>Status</th>
        <th>Date</th>

    </tr>

    @foreach($orders as $order)

    <tr>

        <td>{{ $order->id }}</td>

        <td>

            RM {{ number_format($order->total_price, 2) }}

        </td>

        <td>{{ $order->status }}</td>

        <td>{{ $order->created_at }}</td>

        <td>
    <a href="{{ url('/receipt/'.$order->id) }}">
        Download Receipt
    </a>
</td>

    </tr>

    @endforeach

</table>