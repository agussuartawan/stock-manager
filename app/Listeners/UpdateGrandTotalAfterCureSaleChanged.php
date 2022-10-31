<?php

namespace App\Listeners;

use App\Events\CureSaleChanged;
use App\Models\CureSale;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateGrandTotalAfterCureSaleChanged
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CureSaleChanged  $event
     * @return void
     */
    public function handle(CureSaleChanged $event)
    {
        $sale = $event->sale;
        $sale->grand_total = CureSale::where('sale_id', $sale->id)->sum('subtotal');
        $sale->save();
    }
}
