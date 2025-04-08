<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MensagensController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function() {

    Route::group([
        'as' => 'mensagens'
    ],
        function() {
            Route::get('/mensagens',[MensagensController::class,'listar']);
            Route::get('/mensagens/{id}',[MensagensController::class,'buscar']);
            Route::put('/mensagens/{id}',[MensagensController::class,'atualizar']);
            Route::delete('/mensagens/{id}',[MensagensController::class,'deletar']);
        }
    );
});
