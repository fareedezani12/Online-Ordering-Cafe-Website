<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class GuestTrackController extends Controller
{
    public function index()
    {
        return view(
            'landing.track-order',
            [
                'order' => null,
            ]
        );
    }

    public function search(Request $request)
    {
        $request->validate([

            'phone' => 'required',

        ]);

        $order = Order::with('items.menu')

            ->where('guest_phone', $request->phone)

            ->latest()

            ->first();

        return view(
            'landing.track-order',
            compact('order')
        );
    }
}
