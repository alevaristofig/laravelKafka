<?php

use App\Http\Controllers\ConsumerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/consumer',[ConsumerController::class,'consumirMensagemUsuario']);
