<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Peta Dunia Cafe</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<div class="container">

    <header>

        <div class="logo">
            <img src="{{ asset('images/logo-petadunia.jpg') }}"
            class="logo-img">

            <span>Peta Dunia Cafe</span>
        </div>

        <nav id="nav">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ url('/menu') }}">Manage Customer</a></li>
                <li><a href="{{ url('/gallery') }}">Manage Staff</a></li>
                <li><a href="{{ url('admin/reports') }}">Sales Report</a></li>
                <li><a href="{{ url('admin/promotions') }}">Manage Promotions</a></li>
            </ul>
        </nav>

        <div class="buttons">

            <div class="user-dropdown">

                <button class="user-btn" id="userBtn">

                    <i class="fas fa-user-circle"></i>

                    {{ Auth::user()->name }}

                    <i class="fas fa-chevron-down"></i>

                </button>

                <div class="dropdown-menu" id="dropdownMenu">

                    <a href="#">
                        <i class="fas fa-gauge"></i>
                        Admin Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="logout-btn">

                            <i class="fas fa-right-from-bracket"></i>

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </header>

    <main>

        <section class="popular-dishes">

            <h1>Admin Dashboard</h1>

            <div class="card">
                <h2>Total Users</h2>
                <p>{{ $totalUsers }}</p>
            </div>

<div class="card">
    <h2>Total Orders</h2>
    <p>{{ $totalOrders }}</p>
</div>

<div class="card">
    <h2>Total Revenue</h2>
    <p>RM {{ number_format($totalRevenue,2) }}</p>
</div>

<div class="card">
    <h2>Total Members</h2>
    <p>{{ $totalMembers }}</p>
</div>

<div class="card">
    <h2>Total Menu Items</h2>
    <p>{{ $totalMenus }}</p>
</div>

        </section>

        <section class="popular-dishes">

            <h2>Quick Actions</h2>

            <div class="dishes">

                <div class="dish">
                    <h3>Add New Menu</h3>
                    <p>Create new food or beverage</p>
                </div>

                <div class="dish">
                    <h3>Update Order Status</h3>
                    <p>Change customer order progress</p>
                </div>

                <div class="dish">
                    <h3>View Reservations</h3>
                    <p>Check booking table requests</p>
                </div>

            </div>

        </section>

    </main>

</div>

<script>

const userBtn = document.getElementById('userBtn');
const dropdownMenu = document.getElementById('dropdownMenu');

if (userBtn) {

    userBtn.addEventListener('click', () => {
        dropdownMenu.classList.toggle('active');
    });

    window.addEventListener('click', (e) => {

        if (!e.target.closest('.user-dropdown')) {
            dropdownMenu.classList.remove('active');
        }

    });

}

</script>

</body>
</html>