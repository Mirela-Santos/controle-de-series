<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeriesController extends Controller
{
    /**
     * Lista todas as series cadastradas no SGBD
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        return response(Serie::all(),200);
    }

    /**
     * Cria novo registo de serie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Response
    {
        $request->validate(['nome'=>'required|min:5']);
        $serieCadastrada = Serie::create($request->all());
        return response($serieCadastrada,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): Response
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id == false) {
            return response("Not found",404);
        }
        $serie = Serie :: findOrFail($id);
        return response($serie, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
