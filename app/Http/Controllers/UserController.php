<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    public function __construct() {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users')->with('users', User::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    // public function show($id)
    // {
    //     $user = User::where('id', $id)->first();
    //     return view('users.show', compact('user'));
    // }

    public function show($name)
    {
        $user = User::where('name', $name)->first();
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update($request->only('role_id'));
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }



}
