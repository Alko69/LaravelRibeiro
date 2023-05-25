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
        return view('user.listUsers', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.addUser');
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

        return redirect()->route('user.listUsers')->with('success','Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.detailUsers',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.editUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user->fill($request->post())->save();

        return redirect()->route('user.listUsers')->with('success','Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.listUsers')->with('success','Company has been deleted successfully');
    }

}
