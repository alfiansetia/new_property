<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:50|unique:categories,name',
        ]);
        Category::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
        ]);
        return redirect()->route('backend.categories.index')->with('message', 'Success Add Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name'      => 'required|max:50|unique:categories,name,' . $category->id,
        ]);
        $category->update([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
        ]);
        return redirect()->route('backend.categories.index')->with('message', 'Success Edit Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('backend.categories.index')->with('message', 'Success Delete Data!');
    }
}
