<h1>Add Promotion</h1>

<form action="{{ url('admin/promotions') }}"
      method="POST">

    @csrf

    <input type="text"
           name="title"
           placeholder="Promotion Title">

    <br><br>

    <textarea name="description"
              placeholder="Description"></textarea>

    <br><br>

    <input type="number"
           name="discount_percentage"
           placeholder="Discount %">

    <br><br>

    <label>

        <input type="checkbox"
               name="members_only"
               value="1">

        Members Only

    </label>

    <br><br>

    <input type="date" name="start_date">

    <br><br>

    <input type="date" name="end_date">

    <br><br>

    <button type="submit">
        Save Promotion
    </button>

</form>