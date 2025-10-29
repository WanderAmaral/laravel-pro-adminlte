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

        dd($request);
    }
}
