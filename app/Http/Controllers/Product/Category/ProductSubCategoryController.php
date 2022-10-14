<?php

namespace App\Http\Controllers\Product\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Product\Category\ProductCategory;
use App\Models\Product\Category\ProductSubCategory;

class ProductSubCategoryController extends Controller
{
    /**
     * getSubCategoriesAjax
     *
     * @param  mixed $id
     * @return void
     */
    public function getSubCategoriesAjax($id)
    {
        $subCategories = ProductSubCategory::where('product_category_id', $id)->get();

        return response()->json([
            'data' => $subCategories,
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
        $subCategories = ProductSubCategory::with(['productCategory'])->get();
        return view('panel.products.category.sub-category.index', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSubCategoryAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|numeric|exists:product_categories,id',
            'name' => 'required|unique:product_sub_categories,name'
        ], [
            'product_category_id.required' => 'Please select shop',
            'product_category_id.numeric' => 'Invalid shop selection',
            'product_category_id.exists' => 'Selected shop does not exist',
            'name.required' => 'Category name is required',
            'name.unique' => 'Category name already exists',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->messages(),
            ], 400);
        } else {
            ProductSubCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'product_category_id' => $request->product_category_id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => "Successfully added! ✌",
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSubCategory $productSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSubCategory = ProductSubCategory::findOrFail($id);
        // $categories = ProductCategory::all();

        return view('panel.products.category.sub-category.edit', compact('productSubCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'string|required']);

        $productSubCategory = ProductSubCategory::findOrFail($id);

        $productSubCategory->update(['name' => $request->name]);

        return redirect()->route('subCategory.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productSubCategory = ProductSubCategory::findOrFail($id);
        $productSubCategory->delete();

        return back();
    }
}
