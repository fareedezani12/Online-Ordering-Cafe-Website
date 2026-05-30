<h1>Manage Menu</h1>

<a href="{{ url('staff/menu/create') }}">
    Add Menu
</a>

<table border="1" cellpadding="10">

    <tr>

        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image</th>
        <th>Action</th>

    </tr>

    @foreach($menus as $menu)

    <tr>

        <td>{{ $menu->id }}</td>
        <td>{{ $menu->name }}</td>
        <td>RM {{ $menu->price }}</td>
        <td>{{ $menu->category }}</td>
        <td><img src="{{ asset('images/' . $menu->image) }}"width="100"></td>
        <td>

        <a href="{{ url('staff/menu/'.$menu->id.'/edit') }}">
            Edit
        </a>

        <form action="{{ url('staff/menu/'.$menu->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>

        </form>

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