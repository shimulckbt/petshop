<?php

namespace App\Models\Product;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Category\ProductCategory;
use App\Models\Product\Category\ProductSubCategory;
use App\Models\Product\Category\ProductSubSubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'short_description', 'long_description', 'sku', 'stock', 'unit_price_buying', 'unit_price_selling', 'status', 'product_category_id', 'product_sub_category_id', 'product_sub_sub_category_id'];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function productSubCategory()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }

    public function productSubSubCategory()
    {
        return $this->belongsTo(ProductSubSubCategory::class);
    }

    public function images()
    {
        return $this->morphOne(Image::class, 'imagable');
    }
}
