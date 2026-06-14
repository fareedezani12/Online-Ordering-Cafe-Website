<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Membership Details</title>

<link rel="stylesheet"
href="{{ asset('css/style.css') }}">

<link rel="stylesheet"
href="{{ asset('css/header.css') }}">

<link rel="stylesheet"
href="{{ asset('css/admin.css') }}">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

<div class="container">

<header>

<div class="logo">

<img src="{{ asset('images/logo-petadunia.jpg') }}"
class="logo-img">

<span>

Peta Dunia Cafe

</span>

</div>

<div class="buttons">

<a href="{{ route('membership.index') }}"
class="btn btn-primary">

<i class="fas fa-arrow-left"></i>

Back

</a>

</div>

</header>

<main class="admin-dashboard">

<section class="hero-admin">

<div class="hero-left">

<span class="hero-badge">

LOYALTY MEMBER

</span>

<h1>

{{ $member->user->name }}

</h1>

<p>

Customer membership profile and loyalty information.

</p>

</div>

<div class="hero-right">

<i class="fas fa-user-circle"

style="font-size:180px;color:white;"></i>

</div>

</section>

<div class="admin-card">

<div style="display:grid;
grid-template-columns:1fr 1fr;
gap:30px;">

<div>

<h3>

Customer Information

</h3>

<hr><br>

<p>

<strong>Name :</strong>

{{ $member->user->name }}

</p>

<br>

<p>

<strong>Email :</strong>

{{ $member->user->email }}

</p>

<br>

<p>

<strong>Registered :</strong>

{{ $member->created_at->format('d M Y') }}

</p>

</div>

<div>

<h3>

Membership Details

</h3>

<hr><br>

<p>

<strong>Level :</strong>

@if($member->membership_level=="Bronze")

<span class="badge bronze">

Bronze

</span>

@elseif($member->membership_level=="Silver")

<span class="badge silver">

Silver

</span>

@elseif($member->membership_level=="Gold")

<span class="badge gold">

Gold

</span>

@else

<span class="badge platinum">

Platinum

</span>

@endif

</p>

<br>

<p>

<strong>Points :</strong>

{{ number_format($member->points) }}

</p>

<br>

<p>

<strong>Total Spending :</strong>

RM {{ number_format($member->total_spending,2) }}

</p>

</div>

</div>

</div>

@php

$cardClass = '';

$icon = 'fa-crown';

switch($member->membership_level){

    case 'Bronze':
        $cardClass='bronze-card';
        $icon='fa-medal';
        break;

    case 'Silver':
        $cardClass='silver-card';
        $icon='fa-award';
        break;

    case 'Gold':
        $cardClass='gold-card';
        $icon='fa-crown';
        break;

    case 'Platinum':
        $cardClass='platinum-card';
        $icon='fa-gem';
        break;

}

@endphp

<div class="admin-card">

    <h2 style="margin-bottom:20px;color:#00573F;">

        Membership Card

    </h2>

    <div class="membership-card {{ $cardClass }}">

        <div>

            <small>PETA DUNIA CAFE</small>

            <h1>

                {{ strtoupper($member->membership_level) }}

                MEMBER

            </h1>

            <h3>

                {{ $member->user->name }}

            </h3>

            <p>

                Member ID : #{{ str_pad($member->id,5,'0',STR_PAD_LEFT) }}

            </p>

        </div>

        <div class="membership-icon">

            <i class="fas {{ $icon }}"></i>

        </div>

    </div>

</div>

<div class="admin-card">

<h2 style="color:#00573F;">

Membership Progress

</h2>

@php

$progress=0;

$next="Silver";

if($member->total_spending<300){

$progress=($member->total_spending/300)*100;

$next="Silver";

}

elseif($member->total_spending<800){

$progress=(($member->total_spending-300)/500)*100;

$next="Gold";

}

elseif($member->total_spending<1500){

$progress=(($member->total_spending-800)/700)*100;

$next="Platinum";

}

else{

$progress=100;

$next="Maximum Level";

}

@endphp

<p>

Next Level :

<strong>

{{ $next }}

</strong>

</p>

<div style="

background:#e5e7eb;

height:18px;

border-radius:30px;

margin-top:20px;

overflow:hidden;

">

<div style="

width:{{ $progress }}%;

background:#F47920;

height:100%;

">

</div>

</div>

<p style="margin-top:10px;">

{{ number_format($progress,0) }}%

Completed

</p>

</div>

<div style="

margin-top:30px;

display:flex;

gap:15px;

">

<a href="{{ route('membership.edit',$member->id) }}"

class="btn btn-primary">

<i class="fas fa-pen"></i>

Edit

</a>

<a href="{{ route('membership.index') }}"

class="btn btn-secondary">

Back

</a>

</div>

</main>

</div>

</body>

</html>