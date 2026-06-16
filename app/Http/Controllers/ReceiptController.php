<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class ReceiptController extends Controller
{
    public function generate(int $id)
    {
        $order = Order::with('items.menu')
            ->findOrFail($id);

        $pdf = Pdf::loadView(
            'receipts.view',
            compact('order')
        );

        return $pdf->download(
            'receipt-' . $order->id . '.pdf'
        );
    }

    public function viewReceipt(int $id)
    {
        $order = Order::with('items.menu')
            ->findOrFail($id);

        return view('receipts.view',
            compact('order'));
    }
}
