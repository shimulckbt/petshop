<?php

namespace Database\Seeders\Product;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Product\Category\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::insert([[
            'name' => 'Pets',
            'slug' => Str::slug('Pets'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Pet Foods',
            'slug' => Str::slug('Pet Foods'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Pet Accesories',
            'slug' => Str::slug('Pet Accesories'),
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
