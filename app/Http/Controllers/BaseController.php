<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;


abstract class BaseController
{
    protected $classe;

    public function index()
    {
        return $this->classe::all();
    }

    public function store(Request $request)
    {
        return response()
            -> json(this.classe::create($request->all()), 201);
    }

    public function buscarPorId(int $id)
    {
        $recurso = this.classe::find($id);
        return is_null($recurso) ?  response()->json('', 204)
            : response()->json($recurso);
    }

    public function atualizar(Request $request)
    {
        $recurso = this.classe::find($request->id);
        if(is_null($recurso)){
            return response()->json(['Recurso nao encontrado'], 404);
        }
        $recurso -> fill($request->all());
        $recurso->save();
        return $recurso;
    }

    public function remover(int $id)
    {
        $qtdRecursosRemovidos = this.classe::destroy($id);

        return $qtdRecursosRemovidos === 0 ? response()->json(['Erro ao remover recurso'], 404)
            : response()->json('Removido com sucesso', 200);
    }
}
