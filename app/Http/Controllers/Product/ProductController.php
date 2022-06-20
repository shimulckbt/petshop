<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use App\Models\Product\Category\ProductCategory;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'All Products';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('panel.products.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|numeric|exists:product_categories,id',
            'product_sub_category_id' => 'required|numeric|exists:product_sub_categories,id',
            'product_sub_sub_category_id' => 'required|numeric|exists:product_sub_sub_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'short_description' => 'required|string|max:255',
            'short_description' => 'required|string|max:1000',
            'sku' => 'required|string|max:255',
            'stock' => 'required|numeric',
            'unit_price_buying' => 'required|numeric',
            'unit_price_selling' => 'required|numeric',
            'image' => 'required|mimes:jpg,png|dimensions:max_width=450,max_height=678|max:1024',
        ], [
            'product_category_id.required' => 'Please select shop',
            'product_category_id.numeric' => 'Invalid shop selection',
            'product_category_id.exists' => 'Selected shop does not exist',
            'product_sub_category_id.required' => 'Please select category',
            'product_sub_category_id.numeric' => 'Invalid category selection',
            'product_sub_category_id.exists' => 'Selected category does not exist',
            'product_sub_sub_category_id.required' => 'Please select sub-category',
            'product_sub_sub_category_id.numeric' => 'Invalid sub-category selection',
            'product_sub_sub_category_id.exists' => 'Selected sub-category does not exist',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->messages(),
            ], 400);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => "Successfully added! ✌",
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
