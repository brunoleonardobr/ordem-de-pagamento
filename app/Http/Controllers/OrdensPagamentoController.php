<?php

namespace App\Http\Controllers;

use App\Services\CriarOrdemPagamento;
use Illuminate\Http\Request;

class OrdensPagamentoController extends Controller
{
    public function criar(Request $request, CriarOrdemPagamento $criarOrdemPagamento){
        $ordem = [
            "invoice"=>$request->invoice,
            "beneficiario"=>$request->beneficiario,
            "cod_banco_beneficiario"=>$request->cod_banco_beneficiario,
            "numero_agencia_beneficiario"=>$request->numero_agencia_beneficiario,
            "numero_conta_beneficiario"=>$request->numero_conta_beneficiario,
            "valor_pagamento"=>$request->valor_pagamento,
        ];
        $ordemCriada = $criarOrdemPagamento->executar($ordem);
        return $ordemCriada;
    }
}
