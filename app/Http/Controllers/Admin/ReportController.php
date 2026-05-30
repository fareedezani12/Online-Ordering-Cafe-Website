<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $todayRevenue = Order::whereDate(
            'created_at',
            today()
        )
            ->where('status', 'completed')
            ->sum('total_price');

        $monthlyRevenue = Order::whereMonth(
            'created_at',
            now()->month
        )
            ->where('status', 'completed')
            ->sum('total_price');

        $completedOrders = Order::where(
            'status',
            'completed'
        )->count();

        $topMenus = OrderItem::select(
            'menu_id',
            DB::raw('SUM(quantity) as total_sold')
        )
            ->groupBy('menu_id')
            ->with('menu')
            ->orderByDesc('total_sold')
            ->take(10)
            ->get();

        return view(
            'admin.reports.index',
            compact(
                'todayRevenue',
                'monthlyRevenue',
                'completedOrders',
                'topMenus'
            )
        );

    }
}
