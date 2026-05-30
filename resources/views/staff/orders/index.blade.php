<h1>Customer Orders</h1>

<table border="1" cellpadding="10">

    <tr>

        <th>ID</th>
        <th>Customer</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>

    </tr>

    @foreach($orders as $order)

    <tr>

        <td>{{ $order->id }}</td>

        <td>

            @if($order->user_id)

                Member Order

            @else

                {{ $order->guest_name }}

            @endif

        </td>

        <td>

            RM {{ number_format($order->total_price, 2) }}

        </td>

        <td>

            {{ $order->status }}

        </td>

        <td>

            <a href="{{ url('/staff/orders/'.$order->id) }}">
                View
            </a>

        </td>

    </tr>

    @endforeach

</table>

@if(session('success'))

<script>

Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '{{ session("success") }}',
    confirmButtonColor: '#3085d6'
});

</script>

@endif