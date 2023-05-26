<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $products = Product::all();
    $user = Auth::user();
    return view('products.listproducts', compact('products', 'user'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Create a new order object
    $order = new Orders();
    $order->user_id = auth()->user()->id; // Assuming the order is associated with a user
    // Set other properties of the order, such as total amount, status, etc.

    // Save the order to the database
    $order->save();

    // Create an order item record
    $orderProduct = new OrderProduct();
    $orderProduct->order_id = $order->id;
    $orderProduct->product_id = $request->product_id;
    $orderProduct->quantity = $request->quantity;
    // Set other properties such as price, discounts, etc.

    // Save the order item to the database
    $orderProduct->save();

    return redirect()->route('orders.index')
        ->with('success', 'Order created successfully.');
}



    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show($id)
{
    // Retrieve the product by its ID
    $product = Product::findOrFail($id);
    // Pass the product to the view
    return view('products.showProduct', compact('product'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        return view('products.editProduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price'=>'required',
            'quantity'=>'required',
            'description'=>'required',
        ]);

        $product->fill($request->post())->save();

        return redirect()->route('products.index')->with('success','Product Has Been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product has been deleted successfully');
    }

}
