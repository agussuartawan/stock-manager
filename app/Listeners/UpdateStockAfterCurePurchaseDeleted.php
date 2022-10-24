<?php

namespace App\Listeners;

use App\Events\CurePurchaseDeleted;
use App\Models\Stock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStockAfterCurePurchaseDeleted
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
     * @param  \App\Events\CurePurchaseDeleted  $event
     * @return void
     */
    public function handle(CurePurchaseDeleted $event)
    {
        $purchaseDetail = $event->purchaseDetail;
        Stock::where('expired_date', $purchaseDetail->expired)->where('cure_id', $purchaseDetail->cure_id)->decrement('amount', $purchaseDetail->qty);
    }
}
