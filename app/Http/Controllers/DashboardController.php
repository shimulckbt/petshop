<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $totalCustomers = User::where('role_id', 3)->count();
        $totalSellers = User::where('role_id', 2)->count();
        $totalProducts = Product::count();
        $totalProductsForSellers = Product::where('user_id', '!=', 1)->count();
        $totalApprovedProducts = Product::where('status', 1)->count();
        $totalApprovedProductsForSellers = Product::where('user_id', '!=', 1)->where('status', 1)->count();

        $totalOrders = Order::when(auth()->user()->role->name == 'User', function ($query) {
            $query->where('customer_id', auth()->id());
        })->when(auth()->user()->role->name == 'Seller', function ($query) {
            $query->where('seller_id', auth()->id());
        })->count();

        $totalSales = Order::when(auth()->user()->role->name == 'Seller', function ($query) {
            $query->where('seller_id', auth()->id());
        })->where('is_aproved', 1)->sum('total_price');

        $totalAppointments = Booking::when(auth()->user()->role->name == 'Seller', function ($query) {
            $query->where('seller_id', auth()->id());
        })->when(auth()->user()->role->name == 'User', function ($query) {
            $query->where('customer_id', auth()->id());
        })->count();

        $totalTakenAppointments = Booking::when(auth()->user()->role->name == 'Seller', function ($query) {
            $query->where('seller_id', auth()->id());
        })->when(auth()->user()->role->name == 'User', function ($query) {
            $query->where('customer_id', auth()->id());
        })->where('status', 1)->count();

        $totalApprovedOrders = Order::where('is_aproved', 1)->count();

        return view('panel.index', compact('totalCustomers', 'totalSellers', 'totalProducts', 'totalOrders', 'totalApprovedProducts', 'totalAppointments', 'totalTakenAppointments', 'totalSales', 'totalProductsForSellers', 'totalApprovedProductsForSellers'));
    }
}
