<?php

namespace App\Jobs;

use App\Models\OrdensDePagamentos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EfetivandoPagamento //implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $ordem = OrdensDePagamentos::select('*')->where('status','PROCESSANDO')->orderBy('id','ASC')->first();
        log('Executando tarefa agendada de 2 minutos');
        if($ordem) {
            $randomStatus = random_int( 1 , 2 );
            if ($randomStatus == 1) {
                $ordem->status = 'PAGO';
            } else {
                $ordem->status = 'REJEITADO';
            }
            info("Finalizando pagamento {$ordem->id}. STATUS='{$ordem->status}'");
            $ordem->save();
        }
    }
}
