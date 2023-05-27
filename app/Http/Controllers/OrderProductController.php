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
        // Validate the request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Rechercher la commande avec l'idProduct donné
        $order = Orders::where('user_id', auth()->id())->first();

        // Si la commande n'existe pas, la créer
        if (!$order) {
            $order = new Orders();
            $order->user_id = auth()->user()->id;
            // Définir d'autres propriétés de la commande

            // Enregistrer la commande dans la base de données
            $order->save();
        }

        // Create an order item record
        $orderProduct = new OrderProduct();
        $orderProduct->order_id = $order->id;
        $orderProduct->product_id = $request->product_id;
        $orderProduct->product_price = $request->product_price;
        $orderProduct->quantity = $request->quantity;
        // Set other properties such as price, discounts, etc.

        // Save the order item to the database
        $orderProduct->save();

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function destroy($orderProductId)
{
    $orderProduct = OrderProduct::findOrFail($orderProductId);
    $order = $orderProduct->orders;
    $orderProduct->delete();

    return redirect()->route('orders.index')
        ->with('success', 'Product removed from order successfully.');
}

}
