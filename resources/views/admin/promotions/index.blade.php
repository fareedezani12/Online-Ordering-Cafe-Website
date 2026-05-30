<h1>Promotions</h1>

<a href="{{ url('admin/promotions/create') }}">
    Add Promotion
</a>

<table border="1" cellpadding="10">

    <tr>

        <th>Title</th>
        <th>Discount</th>
        <th>Members Only</th>
        <th>Action</th>

    </tr>

    @foreach($promotions as $promotion)

    <tr>

        <td>{{ $promotion->title }}</td>

        <td>
            {{ $promotion->discount_percentage }}%
        </td>

        <td>

            @if($promotion->members_only)

                Yes

            @else

                No

            @endif

        </td>

        <td>

            <a href="{{ url(
                'admin/promotions/'.$promotion->id.'/edit'
            ) }}">
                Edit
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