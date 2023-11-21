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
        $users = User::orderBy("id", "asc")->paginate(10);

        return response()->json(['users' => $users]);

       
    }

  
    public function create()
    {
    }


    public function store(Request $request)
    {
    }




    public function show($id)
    { {

            $user = User::find($id);


        
                return response()->json($user);
             
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
}
