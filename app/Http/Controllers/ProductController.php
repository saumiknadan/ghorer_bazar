<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubCategory;

use App\Models\Category;

use App\Models\Product;

use Illuminate\Support\Str; // slug
use Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index', compact('products'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        
        return view('admin.product.create', compact('categories','subcategories'));
    }
    



    public function show($id)
    {
        $product=product::find($id);
       
        return view('admin.product.show',compact('product'));
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request)
{
       $request->validate([
        'product_name' => ['required', 'min:5'],
        'prod_slug' => ['required', 'min:5'],  // slug
        'category' => 'required|exists:categories,id',
        'subcategory' => 'required|exists:sub_categories,id',
        'image' => 'required|image',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'discount' => 'numeric|min:0',
    ]);
    

    $product = new Product;
    $product->id = $request->product;
    $product->cat_id = $request->category;
    $product->subcat_id = $request->subcategory;
    $product->product_name = $request->product_name;
    // $product->prod_slug = $request->prod_slug;  // slug
    $product->prod_slug = Str::slug($request->prod_slug);  // slug
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount = $request->discount;

    if ($request->hasFile('image')) {
        $product->image = $request->file('image')->store('product');
    } else {
        return redirect()->back()->with('error', 'Please upload an image')->withInput();
    }

   

    $product->save();
    return redirect()->back()->with('message', 'Product added successfully');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        return view('admin.product.edit', compact('categories','subcategories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $update = $product->update([
            'product_name'=>$request->product_name,
            // 'prod_slug'=>$request->prod_slug,
            $product->prod_slug = Str::slug($request->prod_slug),  // slug
            'cat_id'=>$request->category,
            'subcat_id'=>$request->subcategory,
            'description'=>$request->description,
            'price'=>$request->price,
            'discount'=>$request->discount,
            
        ]);

        if ($request->hasFile('image')) {
            // Update the image
            $product->update(['image' => $request->file('image')->store('product')]);
        }

        return redirect('/products')->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $delete = $product->delete();

        if($delete)
            return redirect()->back()->with('message','Product deleted successfully');
    }
}
