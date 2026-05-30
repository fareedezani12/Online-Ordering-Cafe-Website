<h1>Membership Card</h1>

<div style="
width:350px;
padding:30px;
border-radius:20px;
background:black;
color:white;
">

    <h2>Peta Dunia Cafe</h2>

    <h3>{{ auth()->user()->name }}</h3>

    <p>
        Level:
        {{ $membership->membership_level }}
    </p>

    <p>
        Points:
        {{ $membership->points }}
    </p>

    <p>
        Total Spending:
        RM {{ number_format($membership->total_spending, 2) }}
    </p>

</div>