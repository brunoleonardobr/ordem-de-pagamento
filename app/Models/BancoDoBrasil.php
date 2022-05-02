<?php

namespace App\Models;

class BancoDoBrasil extends Banco {
  
  public function __construct()
  {
    $this->nomeBanco = 'BANCO DO BRASIL';
  }
}