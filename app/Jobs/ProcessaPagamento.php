<?php

namespace App\Jobs;

use App\Models\BancoDoBrasil;
use App\Models\Bradesco;
use App\Models\OrdensDePagamentos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessaPagamento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ordensDePagamentos;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ordensDePagamentos)
    {
        $this->ordensDePagamentos = $ordensDePagamentos;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ordem = OrdensDePagamentos::where('id',$this->ordensDePagamentos->id)->first();

        $idIsEven = $ordem->id % 2 == 0;

        if ($idIsEven) {
            $banco = new BancoDoBrasil();
            $banco->registraPagamento($ordem);
        } else {
            $banco = new Bradesco();
            $banco->registraPagamento($ordem);
        }
    }
}
