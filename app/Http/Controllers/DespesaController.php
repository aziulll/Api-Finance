<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class DespesaController extends Controller
{
    
    public function index(Despesa $despesa)
    {
        $despesa = Despesa::all(); 

        return response()->json($despesa);
        
    }
    public function sum($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $somaReceitas = $user->despesas()->sum('valor');

        return response()->json( $somaReceitas);
    
    }
    public function search(Request $request)
    {
        $termoDeBusca = $request->input('termo_de_busca');

        $receitas = Despesa::where('name', 'like', "%$termoDeBusca%")->get();

        return response()->json($receitas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'detalhes' => 'required',
            'valor' => 'required',
            'categoria' => 'required',
        ]);

        $user = auth()->user();
        $despesa = new Despesa([
            'nome' => $request->input('nome'),
            'detalhes' => $request->input('descricao'),
            'valor' => $request->input('valor'),
            'categoria' => $request->input('categoria'),
            'user_id' => $user->id
           
        ]);

        $despesa->save(); 

        return response()->json(['message' => 'Despesa criada com sucesso']);
    }


    public function show($id)
    {
        $despesa = Despesa::find($id);
        return response()->json(['message' => $despesa]);
    }

    public function destroy(Despesa $despesa)
    {
        $despesa->delete();

        return response()->json(['message' => 'Despesa deleted successfully']);
    }
}


