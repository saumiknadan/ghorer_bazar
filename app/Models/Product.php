<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['id','cat_id','subcat_id', 'product_name', 'prod_slug','image','price','discount', 'description', 'status'];

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcat_id');
    }
}

