<?php

namespace App\Http\Controllers;

use App\Models\Order_product;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_product = Product::all();
        return view('products.listproducts', ['products' => $order_product]);
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
    public function store(Product $product)
    {

        // Create a new product instance
        $order_product->order_id;
        $order_product = new order_product();
        $order_product->price = $product->price;
        $order_product->quantity = $product->quantity;
        // Set other attributes as necessary
        
        // Save the product to the database
        $product->save();

        // Redirect to a success page or a list of products
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
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
