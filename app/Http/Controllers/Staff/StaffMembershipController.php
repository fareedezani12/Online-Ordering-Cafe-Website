<?php
namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;

class StaffMembershipController extends Controller
{
    public function index()
    {
        $members = Membership::with('user')->latest()->get();

        $totalMembers = Membership::count();

        $bronze = Membership::where('membership_level', 'Bronze')->count();

        $silver = Membership::where('membership_level', 'Silver')->count();

        $gold = Membership::where('membership_level', 'Gold')->count();

        $platinum = Membership::where('membership_level', 'Platinum')->count();

        return view('staff.membership.index', compact(

            'members',

            'totalMembers',

            'bronze',

            'silver',

            'gold',

            'platinum'

        ));
    }

    public function create()
    {
        $users = User::where('role', 'user')

            ->whereDoesntHave('membership')

            ->get();

        return view('staff.membership.create', compact('users'));
    }

    public function store(Request $request)
    {

        $request->validate([

            'user_id' => 'required|unique:memberships',

        ]);

        Membership::create([

            'user_id'          => $request->user_id,

            'membership_level' => 'Bronze',

            'points'           => 0,

            'total_spending'   => 0,

        ]);

        return redirect('/membership')

            ->with('success', 'Membership registered successfully.');

    }

    public function show($id)
    {

        $member = Membership::with('user')

            ->findOrFail($id);

        return view('staff.membership.show',

            compact('member'));

    }

    public function edit($id)
    {

        $member = Membership::findOrFail($id);

        return view('staff.membership.edit',

            compact('member'));

    }

    public function update(Request $request, $id)
    {

        $member = Membership::findOrFail($id);

        $spending = $request->total_spending;

        if ($spending >= 1500) {
            $level = 'Platinum';
        } elseif ($spending >= 800) {
            $level = 'Gold';
        } elseif ($spending >= 300) {
            $level = 'Silver';
        } else {
            $level = 'Bronze';
        }

        $member->update([
            'points'           => $request->points,
            'total_spending'   => $spending,
            'membership_level' => $level,
        ]);

        return redirect('/membership')

            ->with('success', 'Membership updated.');

    }

    public function destroy($id)
    {

        if (auth()->user()->role != 'admin') {

            abort(403);

        }

        Membership::destroy($id);

        return back()

            ->with('success', 'Membership deleted.');

    }

}
