<?php
namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Orders::findOrFail($request->order_id);
        $product = Product::findOrFail($request->product_id);

        $orderProduct = OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price, // You can adjust this based on your application logic
        ]);

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Product added to order successfully.');
    }

    public function destroy($orderProductId)
{
    $orderProduct = OrderProduct::findOrFail($orderProductId);
    $order = $orderProduct->order;
    $orderProduct->delete();

    return redirect()->route('orders.index')
        ->with('success', 'Product removed from order successfully.');
}

}
