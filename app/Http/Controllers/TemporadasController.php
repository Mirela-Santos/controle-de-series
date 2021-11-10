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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):Response
    {
        /** @todo criação da regra para salvar uma temporada */
        return response('',Response::HTTP_CREATED);
    }

    
    public function show($id):Response
    {
        /** @todo busscar temporada e retornar os dados */
        return response('', Response::HTTP_OK);
    }

    
    public function update(Request $request, int $id):Response
    {
       /** @todo atualização da tmeporada */
        return response('No Content',Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        /** @todo exclusão de series */
        return response('',Response::HTTP_OK);
    }
}
