<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = User::where('role', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'admin.customers.index',
            compact('customers')
        );

    }

    public function show($id)
    {
        $customer = User::with([
            'membership',
            'orders',
        ])->findOrFail($id);

        return view(
            'admin.customers.show',
            compact('customer')
        );
    }

    public function edit($id)
    {

        $customer = User::findOrFail($id);

        return view(
            'admin.customers.edit',
            compact('customer')
        );

    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'name'  => 'required',

            'email' => 'required|email',

        ]);

        $customer = User::findOrFail($id);

        $customer->update([

            'name'  => $request->name,

            'email' => $request->email,

        ]);

        return redirect('/admin/customers')

            ->with(

                'success',

                'Customer updated successfully.'

            );

    }

    public function destroy($id)
    {

        User::findOrFail($id)->delete();

        return back()

            ->with(

                'success',

                'Customer deleted successfully.'

            );

    }

}
