<?php

namespace App\Http\Controllers;


use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TemporadasController extends Controller
{
    public function index():Response
    {
        return response(Temporada::all(), Response::HTTP_OK);
    }

    
    public function store(Request $request):Response
    {
        $novaTemporada = Temporada::create($request->all());
        return response($novaTemporada,Response::HTTP_CREATED);
    }

    
    public function show($id):Response
    {
        $temporada = Temporada::findOrFail($id);
        return response($temporada, Response::HTTP_OK);
    }

    
    public function update(Request $request, int $id):Response
    {
        $temporada = Temporada::find($id);
        $temporada->serie_id = $request['serie_id'];
        $temporada->nome = $request['nome'];
        $temporada->save();
        return response('No Content',Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        Temporada::destroy($id);
        return response('',Response::HTTP_OK);
    }
}
