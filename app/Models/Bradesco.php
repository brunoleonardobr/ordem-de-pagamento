<?php

namespace App\Models;

class Bradesco extends Banco {
  
  public function __construct()
  {
    $this->nomeBanco = 'BRADESCO';
  }
}