<?php

namespace App\Jobs;

use App\Models\OrdensDePagamentos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessaPagamento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ordemDePagamento;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ordemDePagamento)
    {
        $this->ordemDePagamento = $ordemDePagamento;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        log('Executando registro da fila');
        $ordem = OrdensDePagamentos::find($this->ordemDePagamento->id);
        $ordem->status = 'PROCESSANDO';

        info('Processando pagamento '.$this->ordemDePagamento->id.' da fila. STATUS="PROCESSADO"');

        $ordem->save();
    }
}
