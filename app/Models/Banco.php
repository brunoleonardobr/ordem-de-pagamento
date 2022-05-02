<?php

namespace App\Models;

class Banco
{
    protected $nomeBanco = 'DEFAULT';

    public function registraPagamento(OrdensDePagamentos $ordemDePagamento) {
        $ordemDePagamento->banco_processador = $this->nomeBanco;
        $ordemDePagamento->status = 'PROCESSADO';
        $ordemDePagamento->save();
    }

    public function consultaPagamento(OrdensDePagamentos $ordemDePagamento){
        $randomStatus = random_int( 1 , 2 );
        if ($randomStatus == 1) {
            $ordemDePagamento->status = 'PAGO';
        } else {
            $ordemDePagamento->status = 'REJEITADO';
        }
        $ordemDePagamento->save();
    }
}
