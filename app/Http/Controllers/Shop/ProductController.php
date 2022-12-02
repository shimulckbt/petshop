<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use App\Models\Product\Category\ProductCategory;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page') ?: 10;
        $pageNumber = $request->input('page_number');
        $filter = $request->input('filter');

        $allActiveProducts = Product::where('status', true)
            ->when($request->input('product_category_id') != NULL, function ($query) use ($request) {
                $query->where('product_category_id', $request->input('product_category_id'));
            })->when($request->input('product_sub_category_id') != NULL, function ($query) use ($request) {
                $query->where('product_sub_category_id', $request->input('product_sub_category_id'));
            })
            ->where(function ($query) use ($filter) {
                $query->Where('name', 'LIKE', '%' . $filter . '%')
                    ->orWhere('sku', 'LIKE', '%' . $filter . '%');
            })
            ->with(['image', 'productSubSubCategory'])
            ->paginate($perPage, ['*'], 'page', $pageNumber)
            ->withQueryString();

        $allCategoriesWithSubCategories = $this->getAllSubCategories();

        return view('guest.products.index', compact('allCategoriesWithSubCategories', 'allActiveProducts'));
    }

    public function detail(Request $request, Product $product)
    {
        $allCategoriesWithSubCategories = $this->getAllSubCategories();
        // dd($product);
        return view('guest.products.detail', compact('allCategoriesWithSubCategories', 'product'));
    }

    private function getAllSubCategories()
    {
        return $allCategoriesWithSubCategories = ProductCategory::with(['productSubCategory'])->get();
    }
}
