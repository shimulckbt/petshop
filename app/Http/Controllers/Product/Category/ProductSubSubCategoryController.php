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
        $subSubCategories = ProductSubSubCategory::with(['productCategory', 'productSubCategory'])->get();
        return view('panel.products.category.sub-sub-category.index', compact('categories', 'subSubCategories'));
    }


    public function storeSubSubCategoryAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required|numeric|exists:product_categories,id',
            'product_sub_category_id' => 'required|numeric|exists:product_sub_categories,id',
            'name' => 'required|unique:product_sub_sub_categories,name',
            'description' => 'required|string',
        ], [
            'product_category_id.required' => 'Please select shop',
            'product_category_id.numeric' => 'Invalid shop selection',
            'product_category_id.exists' => 'Selected shop does not exist',
            'product_sub_category_id.required' => 'Please select category',
            'product_sub_category_id.numeric' => 'Invalid category selection',
            'product_sub_category_id.exists' => 'Selected category does not exist',
            'name.required' => 'Brand or Breed name is required',
            'name.unique' => 'Brand or Breed name already exists',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->messages(),
            ], 400);
        } else {
            ProductSubSubCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'product_category_id' => $request->product_category_id,
                'product_sub_category_id' => $request->product_sub_category_id
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
    public function edit($id)
    {
        $productSubSubCategory = ProductSubSubCategory::findOrFail($id);

        return view('panel.products.category.sub-sub-category.edit', compact('productSubSubCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->file());
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpg,png|dimensions:max_width=2000,max_height=2000|max:10240',
        ]);

        $productSubSubCategory = ProductSubSubCategory::findOrFail($id);

        $productSubSubCategory->name = $request->name;
        $productSubSubCategory->description = $request->description;
        if ($request->image != NULL) {
            $imageName = 'brand-breed-img-' . $productSubSubCategory->id . '.' . $request->image->extension();
            // $request->file('image')->move(public_path('images/products'), $imageName);
            $request->file('image')->storeAs('public/images/sub-sub-cat', $imageName);
            $productSubSubCategory->image = 'images/sub-sub-cat/' . $imageName;
        }
        $productSubSubCategory->save();

        return redirect()->route('subSubCategory.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubSubCategory  $productSubSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productSubSubCategory = ProductSubSubCategory::findOrFail($id);
        $productSubSubCategory->delete();

        return back();
    }
}
