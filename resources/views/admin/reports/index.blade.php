<h1>Sales Report</h1>

<div>
    <h3>Today's Revenue</h3>
    <p>RM {{ number_format($todayRevenue,2) }}</p>
</div>

<div>
    <h3>Monthly Revenue</h3>
    <p>RM {{ number_format($monthlyRevenue,2) }}</p>
</div>

<div>
    <h3>Completed Orders</h3>
    <p>{{ $completedOrders }}</p>
</div>

<h2>Top Selling Menu</h2>

<table border="1" cellpadding="10">

    <tr>
        <th>Menu</th>
        <th>Quantity Sold</th>
    </tr>

    @foreach($topMenus as $item)

    <tr>

        <td>
            {{ $item->menu->name }}
        </td>

        <td>
            {{ $item->total_sold }}
        </td>

    </tr>

    @endforeach

</table>