<?php

namespace App\Http\Controllers;

use App\Http\Requests\Temporada\IndexTemporadaRequest;
use App\Http\Requests\Temporada\StoreTemporadaRequest;
use App\Http\Requests\Temporada\UpdateTemporadaRequest;
use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TemporadasController extends Controller
{
    public function index(IndexTemporadaRequest $request):Response
    {
        $where = ['serie_id'=>$request['serie_id']];
        $temporadas = Temporada::where($where)->get();
        return response($temporadas, Response::HTTP_OK);
    }

    
    public function store(StoreTemporadaRequest $request):Response
    {
        $novaTemporada = Temporada::create($request->all());
        return response($novaTemporada,Response::HTTP_CREATED);
    }

    
    public function show($id):Response
    {
        $temporada = Temporada::findOrFail($id);
        return response($temporada, Response::HTTP_OK);
    }

    
    public function update(UpdateTemporadaRequest $request, int $id):Response
    {
        $temporada = Temporada::find($id);
        $temporada->fill($request->all());
        $temporada->update();
        return response('No Content',Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        Temporada::destroy($id);
        return response('',Response::HTTP_OK);
    }
}
