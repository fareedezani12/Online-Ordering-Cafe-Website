<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{

    public function index()
    {

        $membership = Membership::firstOrCreate(

            ['user_id' => Auth::id()],

            [
                'membership_level' => 'Bronze',
                'points'           => 0,
                'total_spending'   => 0,
            ]

        );

        return view(
            'user.membership',
            compact('membership')
        );

    }

}
