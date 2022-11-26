<?php

namespace App\Services\Product\Category;

use App\Models\Product\Category\ProductCategory;

class CategoryService{
    
    /**
     * getAllCategories
     *
     * @return void
     */
    public function getAllCategories(){
        return ProductCategory::all();
    }
    
}