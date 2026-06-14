<?php
namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')
            ->latest()
            ->get();

        if (request()->is('admin/*')) {

            return view('staff.orders.index', compact('orders'));

        }

        return view('staff.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('user', 'items.menu')->findOrFail($id);

        if (request()->is('admin/*')) {

            return view('staff.orders.show', compact('order'));

        }

        return view('staff.orders.show', compact('order'));
    }

    public function update(Request $request, string $id)
    {

        $order = Order::findOrFail($id);

        $order->update([

            'status'         => $request->status,

            'payment_status' => $request->payment_status,

        ]);

        if ($request->status == 'completed' && $order->user_id) {

            $membership = Membership::where(
                'user_id',
                $order->user_id
            )->first();

            if ($membership) {

                $membership->points += $order->total_price;

                $membership->total_spending += $order->total_price;

                // LEVEL SYSTEM

                if ($membership->total_spending >= 1500) {

                    $membership->membership_level = 'Platinum';

                } elseif ($membership->total_spending >= 800) {

                    $membership->membership_level = 'Gold';

                } elseif ($membership->total_spending >= 300) {

                    $membership->membership_level = 'Silver';

                } else {

                    $membership->membership_level = 'Bronze';

                }

                $membership->save();

            }

        }

        return redirect('/staff/orders');

    }
}
