<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Inventory::with('category')->get(); // Eager load the category relationship
        return view('product-view', compact('products'));
    }

    public function create()
    {
        $warehouses = Warehouse::all(); // Fetch all warehouses
        return view('product-add', compact('warehouses'));
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
}