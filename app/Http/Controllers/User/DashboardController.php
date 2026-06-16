<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $membership = Membership::where(
            'user_id',
            $user->id
        )->first();

        $recentOrders = Order::where(
            'user_id',
            $user->id
        )->latest()->take(3)->get();

        $promotion = Promotion::latest()->first();

        $recommendMenus = Menu::inRandomOrder()
            ->take(3)
            ->get();

        return view(
            'user.dashboard',
            compact(
                'membership',
                'recentOrders',
                'promotion',
                'recommendMenus'
            )
        );
    }

    public function profile()
    {
        $user = Auth::user();

        $membership = Membership::where(
            'user_id',
            $user->id
        )->first();

        $ordersCount = Order::where(
            'user_id',
            $user->id
        )->count();

        return view(
            'user.profile',
            compact(
                'user',
                'membership',
                'ordersCount'
            )
        );
    }
}
