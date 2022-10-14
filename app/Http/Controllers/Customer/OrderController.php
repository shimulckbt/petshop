<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\OrderInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function genOrderNo()
    {
        return 'O#' . sprintf('%0' . 8 . 's', rand(00_000_000, 99_999_999));
    }

    public function proceedToCheckout()
    {
        session(['order_info' => [
            'order_no' => $this->genOrderNo()
        ]]);

        return view('guest.products.checkout-address');
    }

    public function checkoutAddress(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $orderInfo = session('order_info');
        $orderInfo += [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        session(['order_info' => $orderInfo]);
        
        return view('guest.products.checkout-delivery-method');
    }

    public function checkoutDeliveryMethod(Request $request){
        $request->validate([
            'delivery_method' => ['required', 'string'],
        ]);

        $orderInfo = session('order_info');
        $orderInfo += [
            'delivery_method' => $request->delivery_method,
        ];

        session(['order_info' => $orderInfo]);
        
        return view('guest.products.checkout-payment-method');
    }

    public function checkoutPaymentMethod(Request $request){
        $request->validate([
            'payment_method' => ['required', 'string'],
        ]);

        $orderInfo = session('order_info');
        $orderInfo += [
            'payment_method' => $request->payment_method,
        ];

        session(['order_info' => $orderInfo]);

        $productsInCart = Cart::with('product')->where('customer_id', auth()->id())->get();

        $subTotalPrice = 0;
        $shippingPrice = 100;

        foreach ($productsInCart as $cart){
            $subTotalPrice += $cart->total_price;
        }

        $totalPrice = $subTotalPrice + $shippingPrice;
        
        return view('guest.products.confirm-order', compact('productsInCart', 'subTotalPrice' , 'shippingPrice', 'totalPrice'));
    }

    public function mapOrderData($cart, $orderInfo){
        return [
            'order_no' => $orderInfo['order_no'],
            'product_id' => $cart->product_id,
            'qty' => $cart->qty,
            'unit_price' => $cart->unit_price,
            'total_price' => $cart->total_price,
            'customer_id' => $cart->customer_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function productsFromCart(array $orderInfo){
        $productsInCart = Cart::with('product')->where('customer_id', auth()->id())->get();

        $cartToOrder = [];

        foreach ($productsInCart as $cart){
            $cartToOrder[] = $this->mapOrderData($cart, $orderInfo);
        }

        return $cartToOrder;
    }

    public function confirmOrder(){
        $orderInfo = session('order_info');
        DB::transaction(function () use ($orderInfo) {
            Order::insert($this->productsFromCart($orderInfo));
            OrderInfo::create($orderInfo);
            Cart::where('customer_id', auth()->id())->delete();
            session()->forget(['cart_info', 'cartCount']);
        });
        return view('guest.index')->with('orderSuccess', 'Successfully placed order.');
    }

    public function checkYourOrders(){
        
    }
}
