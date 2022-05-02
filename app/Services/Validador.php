<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Validador {
  public static function rules(Request $request) {
      $uniqueRule =  Rule::unique('ordens_de_pagamentos')->where(function ($query) use 
                    ($request){
                        return $query->where('invoice', $request->invoice)
                        ->where('beneficiario', $request->beneficiario);
                    });

        $messages = array(
            'required'=>'O campo :attribute é obrigatório',
            'unique'=>'O cliente não pode ter mais de uma :attribute com mesmo número',
            'string'=>'O campo :attribute deve ser uma string',
            'regex'=>'O campo :attribute deve conter apenas dígitos',
            'cod_banco_beneficiario.max'=>'O campo :attribute deve ser menor ou igual a 3 dígitos',
            'numero_agencia_beneficiario.max'=>'O campo :attribute deve ser menor ou igual a 4 dígitos',
            'numero_conta_beneficiario.max'=>'O campo :attribute deve ser menor ou igual a 15 dígitos',
            'numeric'=>'O campo :attribute deve ser numérico',
            'between'=>'O campo :attribute deve ser maior que 0.01 e menor que 100.000'
        );

        $rules = array(
            'invoice'=>['required',$uniqueRule],
            'beneficiario'=>'required|string',
            'cod_banco_beneficiario'=>'required|string|regex:/(^[0-9]*$)/u|max:3',
            'numero_agencia_beneficiario'=>'required|string|regex:/(^[0-9]*$)/u|max:4',
            'numero_conta_beneficiario'=>'required|string|regex:/(^[0-9]*$)/u|max:15',
            'valor_pagamento'=>'required|numeric|between:0.01,100000'
        );
        return [$rules, $messages];
  }
}