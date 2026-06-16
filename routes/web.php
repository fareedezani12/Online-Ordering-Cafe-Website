<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Staff\OrderController;
use App\Http\Controllers\Staff\StaffMenuController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\MembershipController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk ke landing page
Route::get('/', [MenuController::class, 'home']);
Route::get('/menu', [MenuController::class, 'menu']);
Route::get('/gallery', function () {return view('landing.gallery');});
Route::get('/about', function () {return view('landing.about');});

Route::get('/cart', [CartController::class, 'cart']);
Route::get('/add-to-cart/{id}', [CartController::class, 'add']);
Route::get('/remove-cart/{id}', [CartController::class, 'remove']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/place-order', [CartController::class, 'placeOrder']);
Route::get('/receipt/{id}/view', [ReceiptController::class, 'viewReceipt']);
Route::get('/receipt/{id}', [ReceiptController::class, 'generate']);

Route::get('/dashboard', function () {

    if (Auth::user()->role === 'admin') {

        return redirect('/admin');

    }

    if (Auth::user()->role === 'staff') {

        return redirect('/staff');

    }

    return redirect('/customer');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get(
    '/customer/profile',
    [UserDashboardController::class, 'profile']
)
    ->middleware('auth')
    ->name('customer.profile');

Route::get('/customer/rewards', function () {return view('user.rewards');})->middleware('auth')->name('customer.rewards');

Route::middleware('auth')->group(function () {

    Route::get(
        '/customer',
        [UserDashboardController::class, 'index']
    );
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/my-orders', [UserOrderController::class, 'index']);
    Route::get('/membership', [MembershipController::class, 'index']);
});

// Route untuk staff page
Route::middleware(['auth', 'staff'])->group(function () {

    Route::get('/staff', [StaffController::class, 'dashboard']);

    Route::resource('staff/menu', StaffMenuController::class);

    Route::get('/staff/orders', [OrderController::class, 'index']);
    Route::get('/staff/orders/{id}', [OrderController::class, 'show']);
    Route::put('/staff/orders/{id}', [OrderController::class, 'update']);
    Route::resource('admin/customers', CustomerController::class);
    Route::get('/admin/customers', [CustomerController::class, 'index']);
});

// Route untuk admin page
Route::get('/admin',
    [AdminDashboardController::class, 'index']
)->middleware('admin');

Route::middleware(['admin'])->group(function () {

    Route::resource('admin/promotions', PromotionController::class);
    Route::get(
        '/admin/reports',
        [ReportController::class, 'index']
    )->middleware('admin');

    Route::get(
        '/admin/reports/export',
        [ReportController::class, 'export']
    )->middleware('admin');

});

require __DIR__ . '/auth.php';
