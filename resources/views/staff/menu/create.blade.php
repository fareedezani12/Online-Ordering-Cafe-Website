<h1>Add Menu</h1>

@if ($errors->any())

    <div style="color:red">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form action="{{ url('staff/menu') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div>
        <label>Menu Name</label>
        <input type="text" name="name">
    </div>

    <br>

    <div>
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>

    <br>

    <div>
        <label>Price</label>
        <input type="number" step="0.01" name="price">
    </div>

    <br>

    <div>
        <label>Category</label>
        <input type="text" name="category">
    </div>

    <br>

    <div>

    <label>Menu Image</label>

    <input type="file" name="image">

    </div>

    <br>

    <button type="submit">
        Save Menu
    </button>

</form>