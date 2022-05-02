<?php

namespace App\Services;

use App\Models\OrdensDePagamentos;

class CriarOrdemPagamento {
  public function executar(array $ordemDePagamento) {

    $ordemCriada = OrdensDePagamentos::create($ordemDePagamento);

    DeterminarBancoProcessador::executar($ordemCriada);
    
    return $ordemCriada;
  }

}