<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Product\Category\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role->name == 'Admin') {
            $products = Product::with('image')->get();
        }

        if (auth()->user()->role->name == 'Seller') {
            $products = Product::with('image')->where('user_id', auth()->id())->get();
        }

        return view('panel.products.index', compact('products'));
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
        // return $request->hasFile('image');
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|numeric|exists:product_categories,id',
            'product_sub_category_id' => 'required|numeric|exists:product_sub_categories,id',
            'product_sub_sub_category_id' => 'required|numeric|exists:product_sub_sub_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required|string|max:1000',
            'sku' => 'required|string|max:255',
            'stock' => 'required|numeric',
            'unit_price_buying' => 'required|numeric',
            'unit_price_selling' => 'required|numeric',
            'image' => 'required|mimes:jpg,png|dimensions:width=500,height=500|max:1024',
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
            DB::transaction(function () use ($request) {
                $product = Product::create([
                    'product_category_id' => $request->product_category_id,
                    'product_sub_category_id' => $request->product_sub_category_id,
                    'product_sub_sub_category_id' => $request->product_sub_sub_category_id,
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'short_description' => $request->short_description,
                    'long_description' => $request->long_description,
                    'sku' => $request->sku,
                    'stock' => $request->stock,
                    'unit_price_buying' => $request->unit_price_buying,
                    'unit_price_selling' => $request->unit_price_selling,
                    'status' => 0,
                    'user_id' => auth()->id(),
                ]);

                // if (!file_exists(public_path('images/product'))) {
                //     mkdir(public_path('images/product'));
                // }

                $imageName = 'prod-img-' . $product->id . '.' . $request->image->extension();
                // $request->file('image')->move(public_path('images/products'), $imageName);
                $request->file('image')->storeAs('public/images/products', $imageName);
                $product->image()->create([
                    'image' => 'images/products/' . $imageName
                ]);
            });
        }
        return response()->json([
            'status' => 'success',
            'message' => "Successfully added! ✌",
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(Product $product)
    {
        $product->status == false ? $product->status = true : $product->status = false;
        $product->save();

        return back();
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
        $product->delete();

        return back();
    }
}
