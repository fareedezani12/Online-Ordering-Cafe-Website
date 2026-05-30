<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.orders.index', compact('orders'));

    }
}
