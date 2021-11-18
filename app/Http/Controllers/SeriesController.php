<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSerieRequest;
use App\Http\Requests\UpdateSerieRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeriesController extends Controller
{
    public function index(): Response
    {
        return response(Serie::all(),Response :: HTTP_OK);
    }

    public function store(StoreSerieRequest $request): Response
    {
        $serieCadastrada = Serie::create($request->all());
        return response($serieCadastrada,Response :: HTTP_CREATED);
    }

    
    public function show(int $id): Response
    {
        $serie = Serie :: findOrFail($id);
        return response($serie, Response :: HTTP_OK);
    }


    public function update(UpdateSerieRequest $request, int $id): Response
    {

        $serie = Serie::find($id);
        $serie->nome = $request['nome'];
        $serie->categoria = $request['categoria'];
        $serie->streaming = $request['streaming'];
        $serie->status = $request['status'];
        $serie->save();
        return response('No Content',Response :: HTTP_NO_CONTENT);
    }
   
    public function status(int $id){

        $serie = Serie::find($id);
        if ($serie->status == 'nao-assistido') {
            $serie->status = 'assistido';
        } else {
            $serie->status = 'nao-assistido';
        }
        $serie->save();

        return response ('No Content',Response :: HTTP_NO_CONTENT);
    }

    public function destroy(int $id)
    {
        Serie::destroy($id);
        return response('OK', Response :: HTTP_OK);
    }
}
