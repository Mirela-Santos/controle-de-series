<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route :: get('/v1/series', [SeriesController :: class, 'index']);

Route :: prefix('/v1/serie')->group(function (){
    Route :: post('/',[SeriesController::class, 'store']);
    Route :: put('/',[SeriesController::class, 'update']);
    Route :: delete('/',[SeriesController::class, 'destroy']);
});