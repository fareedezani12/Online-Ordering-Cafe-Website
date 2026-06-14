<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\User;

class StaffController extends Controller
{

    public function dashboard()
    {

        $todayOrders = Order::whereDate(
            'created_at',
            today()
        )->count();

        $todayRevenue = Order::whereDate(
            'created_at',
            today()
        )->sum('total_price');

        $pendingOrders = Order::where(
            'status',
            'pending'
        )->count();

        $completedOrders = Order::where(
            'status',
            'completed'
        )->count();

        $totalMenu = Menu::count();

        $members = User::where(
            'role',
            'user'
        )->count();

        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();
        return view(

            'staff.dashboard',

            compact(

                'todayOrders',

                'todayRevenue',

                'pendingOrders',

                'completedOrders',

                'totalMenu',

                'members',

                'recentOrders'

            )

        );

    }

}
