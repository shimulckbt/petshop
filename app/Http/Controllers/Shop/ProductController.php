<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product\Category\ProductSubSubCategory;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page');
        $pageNumber = $request->input('page_number');
        $filter = $request->input('filter');

        $allActiveProducts = Product::where('status', true)
            ->when($request->input('product_category_id') != NULL, function ($query) use ($request) {
                $query->where('product_category_id', $request->input('product_category_id'));
            })->where(function ($query) use ($filter) {
                $query->Where('name', 'LIKE', '%' . $filter . '%')
                    ->orWhere('sku', 'LIKE', '%' . $filter . '%');
            })
            ->with(['image', 'productSubSubCategory'])
            ->paginate($perPage, ['*'], 'page', $pageNumber)
            ->withQueryString();

        return view('guest.products.index', compact('allActiveProducts'));
    }

    public function detail(Request $request, Product $product)
    {
        // dd($product);
        return view('guest.products.detail', compact('product'));
    }
}
