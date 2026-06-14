<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index()
    {

        $todayRevenue = Order::whereDate(
            'created_at',
            today()
        )->sum('total_price');

        $monthlyRevenue = Order::whereMonth(
            'created_at',
            now()->month
        )->sum('total_price');

        $completedOrders = Order::where(
            'status',
            'completed'
        )->count();

        $averageOrder = Order::avg('total_price');

        $topMenus = OrderItem::select(
            'menu_id',
            DB::raw('SUM(quantity) as total_sold')
        )

            ->with('menu')

            ->groupBy('menu_id')

            ->orderByDesc('total_sold')

            ->take(5)

            ->get();

        $recentOrders = Order::latest()

            ->take(10)

            ->get();

        $monthlyRevenueChart = Order::selectRaw("
MONTH(created_at) as month_no,
MONTHNAME(created_at) as month,
SUM(total_price) as revenue
")

            ->groupByRaw("MONTH(created_at), MONTHNAME(created_at)")

            ->orderByRaw("MONTH(created_at)")

            ->get();

        $monthlyOrderChart = Order::selectRaw("
MONTH(created_at) as month_no,
MONTHNAME(created_at) as month,
COUNT(*) as total
")

            ->groupByRaw("MONTH(created_at), MONTHNAME(created_at)")

            ->orderByRaw("MONTH(created_at)")

            ->get();

        return view(

            'admin.reports.index',

            compact(

                'todayRevenue',

                'monthlyRevenue',

                'completedOrders',

                'averageOrder',

                'topMenus',

                'recentOrders',

                'monthlyRevenueChart',

                'monthlyOrderChart'

            )

        );

    }

    public function export()
    {

        $orders = Order::latest()->get();

        $totalRevenue = Order::sum('total_price');

        $completedOrders = Order::where(
            'status',
            'completed'
        )->count();

        $pdf = Pdf::loadView(
            'admin.reports.pdf',
            compact(
                'orders',
                'totalRevenue',
                'completedOrders'
            )
        );

        return $pdf->download(
            'Sales_Report.pdf'
        );

    }

}
