<h1>Checkout</h1>

@guest

<form action="{{ url('/place-order') }}" method="POST">

    @csrf

    <input type="text"
           name="guest_name"
           placeholder="Your Name">

    <br><br>

    <input type="text"
           name="guest_phone"
           placeholder="Phone Number">

    <br><br>

    <h3>Payment Method</h3>

    <label>
        <input type="radio"
               name="payment_method"
               value="cash"
               checked>
        Cash / Pay at Counter
    </label>

    <br>

    <label>
        <input type="radio"
               name="payment_method"
               value="fpx">
        FPX Online Banking
    </label>

    <br>

    <label>
        <input type="radio"
               name="payment_method"
               value="ewallet">
        E-Wallet
    </label>

    <br><br>

    <button type="submit">
        Place Order
    </button>

</form>

@endguest

@auth

<form action="{{ url('/place-order') }}" method="POST">

    @csrf

    <h3>{{ auth()->user()->name }}</h3>

    <p>Member rewards will be collected.</p>

    <h3>Payment Method</h3>

    <label>
        <input type="radio"
               name="payment_method"
               value="cash"
               checked>
        Cash / Pay at Counter
    </label>

    <br>

    <label>
        <input type="radio"
               name="payment_method"
               value="fpx">
        FPX Online Banking
    </label>

    <br>

    <label>
        <input type="radio"
               name="payment_method"
               value="ewallet">
        E-Wallet
    </label>

    <br><br>

    <button type="submit">
        Place Order
    </button>

</form>

@endauth