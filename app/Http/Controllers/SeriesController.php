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
}
