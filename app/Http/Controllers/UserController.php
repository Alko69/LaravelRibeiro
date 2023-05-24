<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('users.listUsers', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        Company::create($request->post());

        return redirect()->route('users.listUsers')->with('success','Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $product
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.detailUsers',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.editUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $product->fill($request->post())->save();

        return redirect()->route('users.listUsers')->with('success','Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $product->delete();
        return redirect()->route('users.listUsers')->with('success','Company has been deleted successfully');
    }

}
