<?php

namespace App\Models\Product\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'product_category_id'];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function productSubSubCategory()
    {
        return $this->hasMany(ProductSubSubCategory::class);
    }
}
