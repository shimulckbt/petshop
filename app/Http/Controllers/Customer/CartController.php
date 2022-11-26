<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart(){
        $productsInCart = Cart::with('product')->where('customer_id', auth()->id())->get();

        $subTotalPrice = 0;
        $shippingPrice = 100;

        foreach ($productsInCart as $cart){
            $subTotalPrice += $cart->total_price;
        }

        $totalPrice = $subTotalPrice + $shippingPrice;

        return view('guest.products.cart', compact('productsInCart', 'subTotalPrice' , 'shippingPrice', 'totalPrice'));
    }

    public function addToCart(Request $request, Product $product){
        if(Cart::where('product_id', $product->id)
            ->where('customer_id', auth()->id())->first()
        ){
            return back()->with('cartExist', $product->id);
        }

        $addedtoCart = Cart::create([
            'product_id' => $product->id,
            'qty' => 1,
            'unit_price' => $product->unit_price_selling,
            'customer_id' => auth()->id()
        ]);

        $addedtoCart->total_price = $addedtoCart->unit_price * $addedtoCart->qty;
        $addedtoCart->save();

        $cartCount = session('cartCount') ?? 0;
        $cartCount++;
        session(['cartCount' => $cartCount]);

        return back()->with('cartAdded', $product->id);
    }

    public function updateCart(Request $request, Cart $cart){

        $stock = $cart->product->stock;
        $request->validate([
            'qty' => ['required', 'nullable', 'gt:1', 'lte:' . $stock]
        ]);

        $cart->qty = $request->qty;
        $cart->total_price = $request->qty * $cart->unit_price;
        $cart->save();
        
        return back();
    }

    public function deleteCart(Cart $cart){
        $cart->delete();

        $cartCount = session('cartCount') ?? 0;
        $cartCount--;
        session(['cartCount' => $cartCount]);

        return back();
    }
}
