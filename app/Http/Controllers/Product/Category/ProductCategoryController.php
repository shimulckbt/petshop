<?php

namespace App\Http\Controllers\Product\Category;

use App\Http\Controllers\Controller;
use App\Services\Product\Category\CategoryService;

class ProductCategoryController extends Controller{
    
    /**
     * categoryService
     *
     * @var mixed
     */
    private $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('panel.products.category.index', compact('categories'));
    }

}
