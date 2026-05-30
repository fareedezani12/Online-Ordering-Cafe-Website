<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Menu;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $totalOrders = Order::count();

        $totalRevenue = Order::where(
            'status',
            'completed'
        )->sum('total_price');

        $totalMembers = Membership::count();

        $totalMenus = Menu::count();

        return view(
            'admin.dashboard',
            compact(
                'totalUsers',
                'totalOrders',
                'totalRevenue',
                'totalMembers',
                'totalMenus'
            )
        );
    }
}
