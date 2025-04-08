<?php

namespace App\Http\Controllers;

use App\Models\KafkaMessages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MensagensController extends Controller
{
    private KafkaMessages $model;
        
    public function __construct(KafkaMessages $model)
    {
        $this->model = $model;
    }

    public function listar(): JsonResponse {
        $dados = $this->model->select()->get();

        return response()->json($dados,200);
    }

    public function buscar(string $id): JsonResponse {
        $dados = $this->model->where('_id',$id)->get();

        return response()->json($dados,200);
    }

    public function atualizar(string $id, Request $request): JsonResponse {
        $dados = $this->model->find($id);

        $dados->nome = $request->nome;
        $dados->profissao = $request->profissao;
        $dados->linguagem = $request->linguagem;

        $dados->save();

        return response()->json($dados,200);
    }

    public function deletar(string $id): void {
        $dados = $this->model->find($id);

        $dados->delete();
    }
}
