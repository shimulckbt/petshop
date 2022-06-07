<?php

namespace App\Http\Controllers\Product\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product\Category\ProductCategory;
use App\Models\Product\Category\ProductSubCategory;
use App\Models\Product\Category\ProductSubSubCategory;

class ProductSubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
        
    /**
     * getSubSubCategoriesAjax
     *
     * @param  mixed $id
     * @return void
     */
    public function getSubSubCategoriesAjax($id){
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
        return view('panel.products.category.sub-sub-category.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
