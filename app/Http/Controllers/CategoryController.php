<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // Get all Categories from the database
        $Categories = Category::all();

        // Return view with Categories
        return view('Categories.index', compact('Categories'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        // Return view to create a new category
        return view('Categories.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create new category
        Category::create($request->all());

        // Redirect to Categories index with success message
        return redirect()->route('Categories.index')->with('success', 'Category created successfully.');
    }

    // Display the specified resource.
    public function show(Category $category)
    {
        // Return view with category details
        return view('Categories.show', compact('category'));
    }

    // Show the form for editing the specified resource.
    public function edit(Category $category)
    {
        // Return view to edit the category
        return view('Categories.edit', compact('category'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Category $category)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the category
        $category->update($request->all());

        // Redirect to Categories index with success message
        return redirect()->route('Categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();

        // Redirect to Categories index with success message
        return redirect()->route('Categories.index')->with('success', 'Category deleted successfully.');
    }
}
