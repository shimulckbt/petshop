<?php

namespace App\Models\Product\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function productSubCategory()
    {
        return $this->hasMany(ProductSubCategory::class);
    }

    public function productSubSubCategory()
    {
        return $this->hasMany(ProductSubSubCategory::class, 'product_category_id');
    }

    public function prodSubSubCatThroughProdSubCat()
    {
        return $this->hasManyThrough(ProductSubSubCategory::class, ProductSubCategory::class);
    }
}
