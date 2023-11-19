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
       $users = User::orderBy("id","asc")->paginate(10);

       return response()->json(['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */


public function show()
{
    // Verifica se o usuário está autenticado
    if (Auth::check()) {
        // Obtém o usuário autenticado
        $user = Auth::user();

        // Obtém o ID do usuário autenticado
        $userId = $user->id;

        return response()->json($user);
    } else {
        // O usuário não está autenticado
        return response()->json(['message' => 'Usuário não autenticado'], 401);
    }
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
