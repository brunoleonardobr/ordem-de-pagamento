<?php

namespace App\Models;

class Banco
{
    public static function registraPagamento(OrdensDePagamentos $ordemDePagamento){

        $bancoProcessador = '';

        if($ordemDePagamento->id % 2 == 0)
            $bancoProcessador = 'BANCO DO BRASIL';
        else
            $bancoProcessador = 'BRADESCO';
        
        $ordemDePagamento->banco_processador = $bancoProcessador;
        $ordemDePagamento->push();
        
        return $ordemDePagamento;
    }

    public function consultaPagamento(int $id){

    }
}
