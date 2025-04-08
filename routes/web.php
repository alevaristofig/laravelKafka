<?php

use App\Http\Controllers\ConsumerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/token', function () {
    return csrf_token(); 
});

Route::get('/',[ConsumerController::class,'index']);

Route::get('/{id}',[ConsumerController::class,'buscar']);

Route::delete('/{id}',[ConsumerController::class,'deletar']);

Route::post('/consumer',[ConsumerController::class,'consumirMensagemUsuario']);

Route::put('/{id}',[ConsumerController::class,'atualizar']);*/
