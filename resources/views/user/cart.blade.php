<h1>Your Cart</h1>

@php
    $total = 0;
@endphp

<table border="1" cellpadding="10">

    <tr>

        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th>

    </tr>

    @foreach($cart as $item)

    <tr>

        <td>

            <img src="{{ asset('images/'.$item['image']) }}"
                 width="100">

        </td>

        <td>{{ $item['name'] }}</td>

        <td>RM {{ $item['price'] }}</td>

        <td>{{ $item['quantity'] }}</td>

        @php
            $total += $item['price'] * $item['quantity'];
        @endphp

        <td>

            <a href="{{ url('/remove-cart/'.$loop->index) }}">
                Remove
            </a>

        </td>

    </tr>

    @endforeach

</table>

<h2>
    Total: RM {{ number_format($total, 2) }}
</h2>

<a href="{{ url('/checkout') }}">
    Checkout
</a>