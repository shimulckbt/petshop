<?php

namespace App\Http\Controllers\Product\Category;

use Illuminate\Http\Request;
use App\Models\Product\Category\ProductCategory;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.category.index');
    }

}
