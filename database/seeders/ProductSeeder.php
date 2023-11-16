<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $product = new Product;
        
        $product->cat_id = 1;
        $product->subcat_id = 2;
        $product->product_name = "Royal Enfield";
        
        $product->prod_slug = "royal-enfield";  // slug
        $product->description = " Please do Subscribe";
        $product->price = 200;
        $product->discount = 20;
        $product->image = "product/1699186103.jpg";
        $product->save();
    }
}
