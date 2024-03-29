<?php

namespace App\Models\Product\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'product_sub_category_id', 'product_category_id', 'description', 'image'];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function productSubCategory()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }
}
