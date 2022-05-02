<?php

namespace App\Http\Controllers;

use App\Services\CriarOrdemPagamento;
use App\Services\ListarPagamentos;
use App\Services\Validador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdensPagamentoController extends Controller
{
    public function criar(Request $request, CriarOrdemPagamento $criarOrdemPagamento) {

        [$rules,$messages] = Validador::rules($request);

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return $validator->errors();
        }

        $ordemCriada = $criarOrdemPagamento->executar($request->all());
        return $ordemCriada;
    }

    public function buscar(int $id) {
        return ListarPagamentos::porId($id);
    }

    public function listar() {
        return ListarPagamentos::todos();
    }
}
