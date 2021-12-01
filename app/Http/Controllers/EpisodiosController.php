<?php

namespace App\Http\Controllers;

use App\Http\Requests\Episodio\IndexEpisodioRequest;
use App\Http\Requests\Episodio\StoreEpisodioRequest;
use App\Http\Requests\Episodio\UpdateEpisodioRequest;
use App\Models\Episodio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EpisodiosController extends Controller
{
    
    public function index(IndexEpisodioRequest $request):Response
    {
        $where = ['temporada_id'=>$request['temporada_id']];
        $episodios = Episodio::where($where)->get();
        return response($episodios, Response::HTTP_OK);
    }

    
    public function store(StoreEpisodioRequest $request): Response
    {
        $novoEpisodio = Episodio::create($request->all());
        return response($novoEpisodio,Response::HTTP_CREATED);
    }

    public function show($id): Response
    {
        $episodio = Episodio::findOrFail($id);
        return response($episodio, Response::HTTP_OK);
    }

    public function update(UpdateEpisodioRequest $request,int $id): Response
    {
        $episodio = Episodio::find($id);
        $episodio->fill($request->all());
        $episodio->update();
        return response('No Content',Response::HTTP_NO_CONTENT);
    }

    public function destroy($id): Response
    {
        Episodio::destroy($id);
        return response('',Response::HTTP_OK);
    }
}
