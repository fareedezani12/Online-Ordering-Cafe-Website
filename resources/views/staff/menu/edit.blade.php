<h1>Edit Menu</h1>

<form action="{{ url('staff/menu/'.$menu->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div>

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $menu->name }}">

    </div>

    <br>

    <div>

        <label>Description</label>

        <textarea name="description">{{ $menu->description }}</textarea>

    </div>

    <br>

    <div>

        <label>Price</label>

        <input type="number"
               step="0.01"
               name="price"
               value="{{ $menu->price }}">

    </div>

    <br>

    <div>

        <label>Category</label>

        <input type="text"
               name="category"
               value="{{ $menu->category }}">

    </div>

    <br>

    <div>

        <img src="{{ asset('images/'.$menu->image) }}"
             width="120">

    </div>

    <br>

    <div>

        <label>New Image</label>

        <input type="file" name="image">

    </div>

    <br>

    <button type="submit">
        Update Menu
    </button>

</form>