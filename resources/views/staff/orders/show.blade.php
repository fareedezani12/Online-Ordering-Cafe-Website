<h1>Order Details</h1>

<p>Order ID: {{ $order->id }}</p>

<p>Status: {{ $order->status }}</p>

<p>Total: RM {{ $order->total_price }}</p>

<p>
    Payment Method:
    {{ $order->payment_method }}
</p>

<p>
    Payment Status:
    {{ $order->payment_status }}
</p>

<form action="{{ url('/staff/orders/'.$order->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <select name="status">

    <option value="pending"
        {{ $order->status == 'pending' ? 'selected' : '' }}>
        Pending
    </option>

    <option value="preparing"
        {{ $order->status == 'preparing' ? 'selected' : '' }}>
        Preparing
    </option>

    <option value="completed"
        {{ $order->status == 'completed' ? 'selected' : '' }}>
        Completed
    </option>

</select>

<br><br>

<h4>Payment Status</h4>

    <select name="payment_status">

        <option value="unpaid"
            {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>
            Unpaid
        </option>

        <option value="paid"
            {{ $order->payment_status == 'paid' ? 'selected' : '' }}>
            Paid
        </option>

    </select>

    <br><br>

    <button type="submit">
        Update Status
    </button>

</form>

<h3>Items Ordered</h3>

<table border="1">

    <tr>
        <th>Menu</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>

    @foreach($order->items as $item)

    <tr>

        <td>{{ $item->menu->name }}</td>

        <td>{{ $item->quantity }}</td>

        <td>RM {{ number_format($item->price, 2) }}</td>

    </tr>

    @endforeach

</table>