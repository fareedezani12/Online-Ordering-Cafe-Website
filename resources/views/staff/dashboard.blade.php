<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard - Peta Dunia Cafe</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<div class="container">

    <header>

        <div class="logo">
            <img src="{{ asset('images/logo-petadunia.jpg') }}"
            class="logo-img">

            <span>Peta Dunia Cafe</span>
        </div>

        <div class="logo">

        <span>Welcome to Peta Dunia Staff Page :) </span>
        </div>

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
                        Staff Profile`
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

        <section class="dashboard-hero">
            <div class="">

                <img src="{{ asset('images/emoji-dashboard-staff2.png') }}"
                    class="welcome-banner"
                    alt="Staff Banner">

                <div class="welcome-content">
                </div>

            </div>
        </section>

        <section class="stats-grid">

            <div class="stat-card">
                <i class="fas fa-receipt"></i>
                <h3>25</h3>
                <p>Total Orders</p>
            </div>

            <div class="stat-card">
                <i class="fas fa-clock"></i>
                <h3>8</h3>
                <p>Pending Orders</p>
            </div>

            <div class="stat-card">
                <i class="fas fa-check-circle"></i>
                <h3>17</h3>
                <p>Completed Orders</p>
            </div>

            <div class="stat-card">
                <i class="fas fa-coins"></i>
                <h3>RM 1,240</h3>
                <p>Today's Sales</p>
            </div>

        </section>

        <section class="quick-access">

            <a href="{{ url('staff/menu') }}" class="action-card">
                <i class="fas fa-utensils"></i>
                <span>Manage Menu</span>
            </a>

            <a href="{{ url('staff/orders') }}" class="action-card">
                <i class="fas fa-receipt"></i>
                <span>Customer Orders</span>
            </a>

            <a href="{{ url('staff/status') }}" class="action-card">
                <i class="fas fa-truck"></i>
                <span>Order Status</span>
            </a>

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