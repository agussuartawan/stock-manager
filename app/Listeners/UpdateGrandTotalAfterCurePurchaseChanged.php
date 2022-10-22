<?php

namespace App\Listeners;

use App\Events\CurePurchaseChanged;
use App\Models\CurePurchase;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateGrandTotalAfterCurePurchaseChanged
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
     * @param  \App\Events\CurePurchaseChanged  $event
     * @return void
     */
    public function handle(CurePurchaseChanged $event)
    {
        $purchase = $event->purchase;
        $purchase->grand_total = CurePurchase::where('purchase_id', $purchase->id)->sum('subtotal');
        $purchase->save();
    }
}
