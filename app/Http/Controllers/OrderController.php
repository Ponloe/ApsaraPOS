<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')->get();
        return view('view-order', compact('orders'));
    }
    public function create()
    {
        $products = Inventory::all(); // Fetch all products from the Inventory model
        return view('create-order', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        // Retrieve the product from the database
        $product = Inventory::where('name', $request->product)->first();

        if (!$product) {
            return redirect()->route('orders.create')->with('error', 'Product not found.');
        }

        // Check if the requested quantity exceeds the available quantity
        if ($request->quantity > $product->quantity) {
            return redirect()->route('orders.create')->with('error', 'Requested quantity exceeds available stock.');
        }

        // Retrieve existing orders from the session or initialize an empty array
        $orders = session()->get('orders', []);

        // Check if the product already exists in the order
        $productExists = false;
        foreach ($orders as &$order) {
            if ($order['product'] == $request->product) {
                $order['quantity'] += $request->quantity;
                $productExists = true;
                break;
            }
        }

        // If the product does not exist, add it to the orders array
        if (!$productExists) {
            $orders[] = [
                'product_id' => $product->id,
                'product' => $request->product,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'code' => $product->code,
            ];
        }

        // Store the updated orders array in the session
        session()->put('orders', $orders);

        return redirect()->route('orders.create')->with('success', 'Order added successfully.');
    }

    public function remove(Request $request)
    {
        $index = $request->index;

        // Retrieve existing orders from the session
        $orders = session()->get('orders', []);

        // Remove the order at the specified index
        if (isset($orders[$index])) {
            unset($orders[$index]);
        }

        // Reindex the array to maintain proper indexing
        $orders = array_values($orders);

        // Store the updated orders array in the session
        session()->put('orders', $orders);

        return redirect()->route('orders.create')->with('success', 'Order removed successfully.');
    }

    public function updateQuantity(Request $request)
    {
        $index = $request->index;
        $action = $request->action;

        // Retrieve existing orders from the session
        $orders = session()->get('orders', []);

        // Update the quantity based on the action
        if (isset($orders[$index])) {
            if ($action == 'increment') {
                $orders[$index]['quantity']++;
            } elseif ($action == 'decrement' && $orders[$index]['quantity'] > 1) {
                $orders[$index]['quantity']--;
            } elseif ($request->has('quantity')) {
                $orders[$index]['quantity'] = $request->quantity;
            }
        }

        // Store the updated orders array in the session
        session()->put('orders', $orders);

        return redirect()->route('orders.create');
    }

    public function confirm(Request $request)
    {
        $orders = session()->get('orders', []);

        if (empty($orders)) {
            return redirect()->route('orders.create')->with('error', 'No orders to confirm.');
        }

        $orderCode = $this->generateUniqueOrderCode();

        // Create the Order
        $order = Order::create(['order_code' => $orderCode]);

        // Add items to the Order
        foreach ($orders as $item) {
            $order->items()->create([
                'product_id' => $item['product_id'],
                'product_name' => $item['product'],
                // 'product_code' => $item['code'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        session()->forget('orders');

        return redirect()->route('orders.receipt', ['order_code' => $orderCode])->with('success', 'Order confirmed successfully.');
    }


    private function generateUniqueOrderCode()
    {
        do {
            $orderCode = 'ORD-' . strtoupper(uniqid());
        } while (Order::where('order_code', $orderCode)->exists());

        return $orderCode;
    }

    public function showReceipt($orderCode)
    {
        $order = Order::with('items')->where('order_code', $orderCode)->firstOrFail();
        return view('receipt', compact('order'));
    }
}