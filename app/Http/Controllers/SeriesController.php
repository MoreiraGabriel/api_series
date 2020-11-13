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
            -> json(Serie::create(['nome' => $request->nome]), 201);
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
}
