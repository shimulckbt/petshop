<?php

namespace App\Http\Controllers\Orders;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;

class AdminSellerOrderController extends Controller
{
    public function checkAllOrders()
    {
        if (auth()->user()->role->name == 'Admin') {
            $orders = Order::with(['product', 'orderInfo'])->get();
        }

        if (auth()->user()->role->name == 'Seller') {
            $orders = Order::with([
                'product' => function ($query) {
                    $query->where('user_id', auth()->id());
                }, 'orderInfo'
            ])->whereHas('product', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->get();
        }

        // dd($orders);

        return view('panel.orders.index', compact('orders'));
    }

    public function approveOrder(Order $order)
    {
        if ($order->is_aproved == NULL) {
            $order->is_aproved = true;
            $order->save();
        }

        return back();
    }

    public function declineOrder(Order $order)
    {
        // dd($order);
        if ($order->is_aproved == NULL) {
            $order->is_aproved = false;
            $order->is_delivered = false;
            $order->save();

            $product = Product::where('id', $order->product_id)->firstOrFail();
            $product->stock = $product->stock + $order->qty;
            $product->save();
        }

        return back();
    }

    public function approveDelivery(Order $order)
    {
        // dd($order);
        if ($order->is_aproved == true && $order->is_delivered == NULL) {
            $order->is_delivered = true;
            $order->save();
        }

        return back();
    }

    public function declineDelivery(Order $order)
    {
        if ($order->is_delivered == NULL) {
            $order->is_delivered = false;
            $order->save();
        }

        return back();
    }
}
