<?php

namespace App\Http\Controllers\Product\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Product\Category\ProductCategory;
use App\Models\Product\Category\ProductSubCategory;
use App\Models\Product\Category\ProductSubSubCategory;

class ProductSubSubCategoryController extends Controller
{
    /**
     * getSubSubCategoriesAjax
     *
     * @param  mixed $id
     * @return void
     */
    public function getSubSubCategoriesAjax($id)
    {
        $subSubCategories = ProductSubSubCategory::where('product_sub_category_id', $id)->get();

        return response()->json([
            'data' => $subSubCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('panel.products.category.sub-sub-category.index', compact('categories'));
    }


    public function storeSubSubCategoryAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shop' => 'required|numeric|exists:product_categories,id',
            'category' => 'required|numeric|exists:product_sub_categories,id',
            'brand_or_breed' => 'required|unique:product_sub_sub_categories,name'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages(),
            ]);
        } else {
            ProductSubSubCategory::create([
                'name' => $request->brand_or_breed,
                'slug' => Str::slug($request->brand_or_breed),
                'product_category_id' => $request->shop,
                'product_sub_category_id' => $request->category
            ]);

            return response()->json([
                'status' => 200,
                'message' => "Successfully added! ✌",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSubSubCategory $productSubSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSubSubCategory $productSubSubCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSubSubCategory $productSubSubCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSubSubCategory $productSubSubCategory)
    {
        //
    }
}
