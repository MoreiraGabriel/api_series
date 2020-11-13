<?php


namespace App\Http\Controllers;


use App\Models\Serie;
use Illuminate\Http\Request;


class SeriesController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        return response()
            -> json(Serie::create($request->all()), 201);
    }

    public function buscarPorId(int $id)
    {
        $serie = Serie::find($id);
        return is_null($serie) ?  response()->json('', 204)
            : response()->json($serie);
    }

    public function atualizar(Request $request)
    {
        $serie = Serie::find($request->id);
        if(is_null($serie)){
            return response()->json(['Recurso nao encontrado'], 404);
        }
        $serie -> fill($request->all());
        $serie->save();
        return $serie;
    }

    public function remover(int $id)
    {
        $qtdRecursosRemovidos = Serie::destroy($id);

        return $qtdRecursosRemovidos === 0 ? response()->json(['Erro ao remover recurso'], 404)
            : response()->json('Removido com sucesso', 200);
    }
}
