<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdensDePagamentos extends Model
{
    protected $fillable = [
        'invoice',
        'beneficiario',
        'cod_banco_beneficiario',
        'numero_agencia_beneficiario',
        'numero_conta_beneficiario',
        'valor_pagamento',
        'status',
        'banco_processador'
    ];

}
