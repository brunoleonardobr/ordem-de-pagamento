<?php

namespace App\Services;

use App\Models\OrdensDePagamentos;

class ListarPagamentos {
  public static function porId(int $id) {
    $ordem = OrdensDePagamentos::find($id);
    if(!$ordem) return 'Não existe pagamento com esse ID';
    return $ordem;
  }
  public static function todos() {
    return OrdensDePagamentos::get();
  }
}