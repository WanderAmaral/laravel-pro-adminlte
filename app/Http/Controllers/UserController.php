<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    // Metodo para mostrar o fomulario
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|string|email',
            'password' => 'required|min:6',
        ]);

        User::create($input);
        return redirect()->route('users.index')->with('status', 'User created successfully!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|string|email',
            'password' => 'exclude_if:password,null|min:6',
        ]);
        $user->fill($input);
        $user->save();
        return redirect()->route('users.index')->with('status', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User deleted successfully!');
    }
}
