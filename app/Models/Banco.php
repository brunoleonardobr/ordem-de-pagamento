<?php

namespace App\Models;

class Banco
{
    protected $nomeBanco = 'DEFAULT';

    public function registraPagamento(OrdensDePagamentos $ordemDePagamento) {
        $ordemDePagamento->nome_banco = $this->nomeBanco;

    }

    public function consultaPagamento(int $id){

    }
}
