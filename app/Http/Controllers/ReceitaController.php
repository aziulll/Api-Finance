<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Receita;

class ReceitaController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->input('user_id');

        $receitas = Receita::where('user_id', $userId)->get();

        return response()->json(['receitas' => $receitas]);
    }

    public function sum()
    {
        $somaReceitas = Receita::sum('valor');
        return $somaReceitas;
    }

    public function search(Request $request)
    {
        $termoDeBusca = $request->input('termo_de_busca');

        $receitas = Receita::where('name', 'like', "%$termoDeBusca%")->get();

        return response()->json($receitas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'detalhes' => 'required',
            'valor' => 'required',
            'categoria' => 'required',
            'user_id' => 'required'
        ]);



        $receita = new Receita([
            'nome' => $request->input('nome'),
            'detalhes' => $request->input('detalhes'),
            'valor' => $request->input('valor'),
            'categoria' => $request->input('categoria'),
            'user_id' => $request->input('user_id')
        ]);

        $receita->save();

        return response()->json(['message' => 'Receita criada com sucesso']);
    }



    public function show($id)
    {
        $receita = Receita::find($id);
        return response()->json(['message' => $receita]);
    }


   
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required',
            'detalhe' => 'required',
            'valor' => 'required',
            'categoria' => 'required',

        ]);

        // Encontre a receita pelo ID
        $receita = Receita::find($id);

        if (!$receita) {
            return response()->json(['message' => 'Receita não encontrada'], 404);
        }

        // Atualize os campos da receita
        $receita->name = $request->input('name');
        $receita->detalhe = $request->input('detalhe');
        $receita->valor = $request->input('valor');
        $receita->categoria = $request->input('categoria');

        // Salve as alterações no banco de dados
        $receita->save();

        return response()->json($receita);
    }

    public function destroy(Receita $receita)
    {
        $receita->delete();

        return response()->json(['message' => 'receita deleted successfully']);
    }
}
