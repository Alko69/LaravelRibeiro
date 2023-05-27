<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Orders::where('user_id', auth()->id())->get();

        return view('orders.showOrder', compact('orders'));
    }


    public function create($productId)
{
    $product = Product::findOrFail($productId);
    return view('orders.addOrder', compact('product'));
}




    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            // Define validation rules for the order data
        ]);

        // Create a new order object
        $order = new Orders();
        $order->user_id = auth()->user()->id; // Assuming the order is associated with a user
        // Set other properties of the order, such as total amount, status, etc.

        // Save the order to the database
        $order->save();

        // Process the order items/products
        $items = $request->input('items');
        foreach ($items as $item) {
            // Retrieve product details and validate
            $productId = $item['product_id'];
            $quantity = $item['quantity'];

            // Perform necessary checks and validation for the product and quantity

            // Create an order item record
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $productId;
            $orderProduct->quantity = $quantity;
            // Set other properties such as price, discounts, etc.

            // Save the order item to the database
            $orderProduct->save();
        }

        return redirect()->route('orders.show', ['order' => $order->id])
            ->with('success', 'Order created successfully.');
    }
}
