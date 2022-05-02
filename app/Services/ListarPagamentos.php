<?php

namespace App\Services;

use App\Models\OrdensDePagamentos;

class ListarPagamentos {
  public static function porId(int $id):OrdensDePagamentos{
    return OrdensDePagamentos::find($id);
  }
  public static function todos() {
    return OrdensDePagamentos::get();
  }
}