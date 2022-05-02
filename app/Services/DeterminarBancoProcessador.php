<?php

namespace App\Services;

use App\Jobs\ProcessaPagamento;
use App\Models\Banco;
use App\Models\OrdensDePagamentos;

class DeterminarBancoProcessador {
  public static function executar(OrdensDePagamentos $ordensDePagamentos){
    $ordemRegistrada = Banco::registraPagamento($ordensDePagamentos);
    
    info('Coloca pagamento '.$ordemRegistrada->id.' na fila de pagamento. STATUS = "PROCESSANDO"');
    $ordemRegistrada->status = 'PROCESSANDO';
    $ordemRegistrada->save();

    $ordemObj = (object) $ordemRegistrada->toArray();
    ProcessaPagamento::dispatch($ordemObj);
  }
}