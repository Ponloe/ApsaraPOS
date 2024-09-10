<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Inventory::with('category', 'warehouses')->get(); 
        $categories = Category::all();
        $warehouses = Warehouse::all();
        return view('product-view', compact('products', 'categories', 'warehouses'));
    }

    public function create()
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();
        return view('product-add', compact('categories', 'warehouses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Inventory();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        // Attach the product to the selected warehouse
        $product->warehouses()->attach($request->warehouse_id);

        return redirect()->route('inventory.index')->with('success', 'Product added successfully.');
    }


    public function edit($id)
    {
        $product = Inventory::findOrFail($id);
        $categories = Category::all();
        $warehouses = Warehouse::all();
        return view('product-edit', compact('product', 'categories', 'warehouses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = Inventory::findOrFail($id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        // Sync the product with the selected warehouse
        $product->warehouses()->sync($request->warehouse_id);

        return redirect()->route('inventory.index')->with('success', 'Product updated successfully.');
    }
    public function destroy($id)
    {
        $product = Inventory::findOrFail($id);
        $product->delete();

        return redirect()->route('inventory.index')->with('success', 'Product deleted successfully.');
    }
}