<?php

namespace App\Jobs;

use App\Models\OrdensDePagamentos;
use Illuminate\Bus\Queueable;
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
        $ordens = OrdensDePagamentos::select('*')->where('status','PROCESSADO')->get();
        
        if(sizeOf($ordens) > 0) {
            foreach ($ordens as $key => $ordem) {
                $randomStatus = random_int( 1 , 2 );
                if ($randomStatus == 1) {
                    $ordem->status = 'PAGO';
                } else {
                    $ordem->status = 'REJEITADO';
                }
                info("[ID={$ordem->id}]: Finalizando pagamento. STATUS='{$ordem->status}'");
                $ordem->save();
            }
        }
    }
}
