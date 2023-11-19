<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrerController extends Controller
{
    public function store(Request $request)
    {
   
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

       
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash a senha
        ]);

        return response()->json(['message'=> 'Usuário criado com sucesso']);
    }
}
