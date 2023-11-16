<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubCategory;

use App\Models\Category;

use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index()
    {

        $categories=Category::all();
        $subcategories=SubCategory::all();
        $products=Product::where('status',1)->latest()->limit(12)->get();
        
        
        return view('frontend.welcome',  compact('categories','subcategories','products'));
    }

    public function view_details($id)
    {

        $categories=Category::all();
        $subcategories=SubCategory::all();
        $products=Product::findOrFail($id);
        
        
        return view('frontend.pages.view_details',  compact('categories','subcategories','products'));
    }

    public function product_by_cat($id)
    {

        $categories=Category::all();
        $subcategories=SubCategory::where('status',1)->where('cat_id',$id)->get();
        $products=Product::where('status',1)->where('cat_id',$id)->limit(12)->get();
        
        
        return view('frontend.pages.product_by_cat',  compact('categories','subcategories','products'));
    }

    public function product_by_subcat($id)
    {

        $categories=Category::all();
        $subcategories=SubCategory::all();
        $products=Product::where('status',1)->where('subcat_id',$id)->limit(12)->get();
        
        
        return view('frontend.pages.product_by_subcat',  compact('categories','subcategories','products'));
    }

    public function view_all()
    {
        $products = Product::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('frontend.pages.view_all', compact('products', 'categories', 'subcategories'));
    }

}
