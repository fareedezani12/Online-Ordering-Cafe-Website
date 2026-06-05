<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Promotion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        $monthlyRevenue = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as revenue')
        )
            ->where('status', 'completed')
            ->groupBy('month')
            ->get();

        $monthlyOrders = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('month')
            ->get();

        $membershipLevels = Membership::select(
            'membership_level',
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('membership_level')
            ->get();

        $totalMembers = Membership::count();

        $totalMenus = Menu::count();

        $todayOrders = Order::whereDate(
            'created_at',
            Carbon::today()
        )->count();

        $todayRevenue = Order::whereDate(
            'created_at',
            Carbon::today()
        )
            ->where('status', 'completed')
            ->sum('total_price');

        $completedToday = Order::whereDate(
            'created_at',
            Carbon::today()
        )
            ->where('status', 'completed')
            ->count();

        $newMembersToday = Membership::whereDate(
            'created_at',
            Carbon::today()
        )->count();

        $recentOrders = Order::latest()
            ->take(5)
            ->get();

        $topMenus = OrderItem::select(
            'menu_id',
            DB::raw('SUM(quantity) as total_sold')
        )
            ->with('menu')
            ->groupBy('menu_id')
            ->orderByDesc('total_sold')
            ->take(3)
            ->get();

        $pendingOrders = Order::where(
            'status',
            'pending'
        )->count();

        $activePromotions = Promotion::count();

        $highestMembership = Membership::orderByRaw("
            CASE membership_level
                WHEN 'Platinum' THEN 4
                WHEN 'Gold' THEN 3
                WHEN 'Silver' THEN 2
                WHEN 'Bronze' THEN 1
            END DESC
            ")->first();

        $popularCategory = DB::table('order_items')
            ->join('menus', 'order_items.menu_id', '=', 'menus.id')
            ->select(
                'menus.category',
                DB::raw('SUM(order_items.quantity) as total')
            )
            ->groupBy('menus.category')
            ->orderByDesc('total')
            ->first();

        return view(
            'admin.dashboard',
            compact(
                'totalUsers',
                'totalOrders',
                'totalRevenue',
                'totalMembers',
                'totalMenus',
                'monthlyRevenue',
                'monthlyOrders',
                'membershipLevels',
                'todayOrders',
                'todayRevenue',
                'completedToday',
                'newMembersToday',
                'recentOrders',
                'topMenus',
                'popularCategory',
                'pendingOrders',
                'activePromotions',
                'highestMembership'
            )
        );
    }
}
