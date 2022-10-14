<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $allActiveProducts = Product::where('status', true)->with('image')->get();

        return view('guest.products.index', compact('allActiveProducts'));
    }

    public function detail(Request $request, Product $product){
        // dd($product);
        return view('guest.products.detail', compact('product'));
    }

}
