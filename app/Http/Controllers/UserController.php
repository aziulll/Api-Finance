<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getCountOfUsers()
    {
        $count = User::count();
        return response()->json($count);
    }
    public function index()
    {
        $users = User::All();

        return response()->json(['users' => $users]);
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
    }




    public function show($id)
    {

        $user = User::find($id);
        return response()->json($user);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        
        $user = User::findOrFail($id);
    
    
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'data_nascimento' => 'required|date',
            'is_Adm' => 'required|boolean',
        ]);
    
        
        $user->update($request->only([
            'name',
            'email',
            'data_nascimento',
            'is_Adm',
        ]));
    
        // Retornar uma resposta de sucesso
        return response()->json(['message' => 'Usuário atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     */
}
