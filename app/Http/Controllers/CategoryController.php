<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category-view', compact('categories'));
    }

    public function create()
    {
        return view('category-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'warehouse' => 'nullable|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'warehouse' => $request->warehouse,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}