<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(string $id)
    {

        $menu = Menu::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [

                'name'     => $menu->name,

                'price'    => $menu->price,

                'image'    => $menu->image,

                'quantity' => 1,

            ];

        }

        session()->put('cart', $cart);

        return redirect()->back();

    }

    public function cart()
    {

        $cart = session()->get('cart', []);

        return view('user.cart', compact('cart'));

    }

    public function remove(string $id)
    {

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);

        }

        return redirect()->back();

    }

    public function checkout()
    {

        $cart = session()->get('cart', []);

        return view('user.checkout', compact('cart'));

    }

    public function placeOrder(Request $request)
    {

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart');

        }

        $discount = 0;
        $total    = 0;

        foreach ($cart as $item) {

            $total += $item['price'] * $item['quantity'];

        }

        if (Auth::check()) {

            $membership = Auth::user()->membership;

            if ($membership) {

                switch ($membership->membership_level) {

                    case 'Silver':
                        $discount = 5;
                        break;

                    case 'Gold':
                        $discount = 10;
                        break;

                    case 'Platinum':
                        $discount = 15;
                        break;

                }

            }

        }

        $discountAmount = ($total * $discount) / 100;
        $finalTotal     = $total - $discountAmount;

        if (! Auth::check()) {

            $request->validate([
                'guest_name'  => 'required',
                'guest_phone' => 'required',
            ]);

        }

        $order = Order::create([

            'user_id'        => Auth::check() ? Auth::id() : null,
            'guest_name'     => $request->guest_name,
            'guest_phone'    => $request->guest_phone,
            'total_price'    => $finalTotal,
            'status'         => 'pending',
            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid',

        ]);

        foreach ($cart as $id => $item) {

            OrderItem::create([

                'order_id' => $order->id,
                'menu_id'  => $id,
                'quantity' => $item['quantity'],
                'price'    => $item['price'],

            ]);

        }

        session()->forget('cart');

        return redirect('/receipt/' . $order->id . '/view');

        return redirect('/menu')
            ->with('success', 'Order placed successfully');

    }
}
