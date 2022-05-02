<?php

namespace App\Jobs;

use App\Models\BancoDoBrasil;
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
        $bancoProcessador = '';

        $ordem = OrdensDePagamentos::where('id',$this->ordensDePagamentos->id)->first();
        if($ordem->id % 2 == 0)
            $bancoProcessador = 'BANCO DO BRASIL';
        else
            $bancoProcessador = 'BRADESCO';
        
        $ordem->banco_processador = $bancoProcessador;

        $ordem->status = 'PROCESSADO';
        $ordem->save();
    }
}
