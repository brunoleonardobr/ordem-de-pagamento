<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemDePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens_de_pagamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice');
            $table->string('beneficiario');
            $table->string('cod_banco_beneficiario');
            $table->string('numero_agencia_beneficiario');
            $table->string('numero_conta_beneficiario');
            $table->decimal('valor_pagamento', $precision = 8, $scale = 2);
            $table->string('status')->default('CRIADO');
            $table->string('banco_processador')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordens_de_pagamentos');
    }
}
