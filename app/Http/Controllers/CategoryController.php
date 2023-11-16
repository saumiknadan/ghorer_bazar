<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories=Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'cat_name' => 'required|min:5',
            'description' => 'required',
        ]);
        //        
        $category = new Category;
        $category->id = $request->category;
        $category->cat_name = $request->cat_name;
        $category->description=$request->description;
        
        
        // $category->image = $request->image->store('category');

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('category');
        } else {
            return redirect()->back()->with('error', 'Please upload an image')->withInput();
        }

        $category->save();
        return redirect()->back()->with('message','category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function change_status(Category $category)
    {
        //
        if($category->status==1)
        {
            $category->update(['status'=>0]);
        }
        else
        {
            $category->update(['status'=>1]);
        }

        return redirect()->back()->with('message','Category status updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
        $update = $category->update([
            'cat_name'=>$request->cat_name,
            'description'=>$request->description,
            
        ]);

        if ($request->hasFile('image')) {
            // Update the image
            $category->update(['image' => $request->file('image')->store('product')]);
        }

        return redirect('/categories')->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $delete = $category->delete();

        if($delete)
            return redirect()->back()->with('message','Category deleted successfully');
    }
}
