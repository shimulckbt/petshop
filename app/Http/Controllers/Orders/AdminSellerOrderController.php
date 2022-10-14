<?php

namespace App\Http\Controllers\Orders;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSellerOrderController extends Controller
{
    public function checkAllOrders(){
        if (auth()->user()->role->name == 'Admin') {
            $orders = Order::with(['product', 'orderInfo'])->get();
        }

        if (auth()->user()->role->name == 'Seller') {
            $orders = Order::with(['product', 'orderInfo'])->where('user_id', auth()->id())->get();
        }

        // dd($orders);

        return view('panel.orders.index', compact('orders'));
    }
}
