<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|min:3',
        ]);
        
        $user = new UserModel;
        $user->nama_user = $request->nama_user;
        $user->save();

        return to_route('task.index')->with('user-success', 'Data User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user.edit')->with([
            'user' => UserModel::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_user' => 'required',
        ]);
        
        $user = UserModel::find($id);
        $user->nama_user = $request->nama_user;
        $user->save();

        return to_route('task.index')->with('user-success', 'Data User berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return back()->with('user-success', 'Data berhasil dihapus!');
    }
}
