<?php

namespace App\Services;

use App\Jobs\ProcessaPagamento;
use App\Models\OrdensDePagamentos;

class CriarOrdemPagamento {
  public function executar(array $ordemDePagamento) {

    info('Cria ordem de pagamento no banco de dados');
    $ordemCriada = OrdensDePagamentos::create($ordemDePagamento);

    info("[ID={$ordemCriada->id}]: Altera status do pagamento para PROCESSANDO e envia pagamento para fila");
    $ordemCriada->status = 'PROCESSANDO';
    $ordemCriada->save();
    ProcessaPagamento::dispatch($ordemCriada);
    
    return $ordemCriada;
  }

}