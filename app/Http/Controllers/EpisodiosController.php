<?php


namespace App\Http\Controllers;


use App\Models\Episodio;
use Illuminate\Http\Request;


class EpisodiosController
{
    public function index()
    {
        return Episodio::all();
    }

    public function store(Request $request)
    {
        return response()
            -> json(Episodio::create($request->all()), 201);
    }

    public function buscarPorId(int $id)
    {
        $serie = Episodio::find($id);
        return is_null($serie) ?  response()->json('', 204)
            : response()->json($serie);
    }

    public function atualizar(Request $request)
    {
        $serie = Episodio::find($request->id);
        if(is_null($serie)){
            return response()->json(['Recurso nao encontrado'], 404);
        }
        $serie -> fill($request->all());
        $serie->save();
        return $serie;
    }

    public function remover(int $id)
    {
        $qtdRecursosRemovidos = Episodio::destroy($id);

        return $qtdRecursosRemovidos === 0 ? response()->json(['Erro ao remover recurso'], 404)
            : response()->json('Removido com sucesso', 200);
    }
}
