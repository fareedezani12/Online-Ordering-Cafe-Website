<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{

    public function index()
    {
        $membership = Membership::where(
            'user_id',
            auth()->id()
        )->first();

        $orders = Order::where(
            'user_id',
            auth()->id()
        )
            ->latest()
            ->take(5)
            ->get();

        return view(
            'user.membership',
            compact(
                'membership',
                'orders'
            )
        );
    }

}
