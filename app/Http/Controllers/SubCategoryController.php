<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubCategory;

use App\Models\Category;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories=SubCategory::all();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subcategory = new SubCategory;
        $subcategory->id = $request->subcategory;
        $subcategory->cat_id = $request->category;
        $subcategory->sub_name = $request->sub_name;
        $subcategory->description=$request->description;
        $subcategory->save();
        return redirect()->back()->with('message','Sub category added successfully');
    }

    /**
     * Change the activity status
     */
    public function change_status(SubCategory $subcategory)
    {
        //
        if($subcategory->status==1)
        {
            $subcategory->update(['status'=>0]);
        }
        else
        {
            $subcategory->update(['status'=>1]);
        }

        return redirect()->back()->with('message','Sub Category status updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        $categories=Category::all();
        return view('admin.subcategory.edit', compact('categories','subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $update = $subCategory->update([
            'sub_name'=>$request->sub_name,
            'cat_id'=>$request->category,
            'description'=>$request->description,
             
        ]);

        return redirect('/sub-categories')->with('message', 'Sub Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $delete = $subCategory->delete();

        if($delete)
            return redirect()->back()->with('message','Sub Category deleted successfully');
    }
}
