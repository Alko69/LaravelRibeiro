<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orderItems = Orders::with('product')->where('user_id', auth()->id())->get();

        return view('orders.showOrder', compact('orderItems'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // Vérifier si le produit existe déjà dans le panier de l'utilisateur
        $orderItem = Orders::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($orderItem) {
            // Le produit existe déjà, mettre à jour la quantité
            $orderItem->quantity += $request->quantity;
            $orderItem->save();
        } else {
            // Le produit n'existe pas encore dans le panier, le créer
            Orders::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('orders.showOrder')->with('success', 'Le produit a été ajouté au panier.');
    }

    public function update(Request $request)
    {
        $orderItem = Orders::findOrFail($request->order_item_id);

        if ($request->quantity <= 0) {
            // La quantité est inférieure ou égale à zéro, supprimer l'élément du panier
            $orderItem->delete();
        } else {
            // Mettre à jour la quantité
            $orderItem->quantity = $request->quantity;
            $orderItem->save();
        }

        return redirect()->route('orders.showOrder')->with('success', 'Le panier a été mis à jour.');
    }

    public function remove(Request $request)
    {
        $orderItem = Orders::findOrFail($request->order_item_id);
        $orderItem->delete();

        return redirect()->route('orders.showOrder')->with('success', 'Le produit a été supprimé du panier.');
    }
}