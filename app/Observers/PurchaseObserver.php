<?php

namespace App\Observers;

use App\Models\Purchase;
use App\Models\TemporaryPurchase;

class PurchaseObserver
{
    /**
     * Handle the Purchase "created" event.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return void
     */
    public function created(Purchase $purchase)
    {
        $tempDetail = TemporaryPurchase::where('user_id', auth()->user()->id)->get();
        foreach ($tempDetail as $value) {
            $purchase->cure()->attach($purchase->id, [
                'cure_id' => $value->cure_id,
                'qty' => $value->qty,
                'price' => $value->price,
                'subtotal' => $value->subtotal,
                'expired' => $value->expired,
            ]);
        }
        $purchase->grand_total = $tempDetail->sum("subtotal");
        $purchase->save();
        TemporaryPurchase::where('user_id', auth()->user()->id)->delete();
    }

    public function creating(Purchase $purchase)
    {
        return $purchase->code = $purchase->getNextCode();
    }

    /**
     * Handle the Purchase "updated" event.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return void
     */
    public function updated(Purchase $purchase)
    {
        //
    }

    /**
     * Handle the Purchase "deleted" event.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return void
     */
    public function deleted(Purchase $purchase)
    {
        //
    }

    /**
     * Handle the Purchase "restored" event.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return void
     */
    public function restored(Purchase $purchase)
    {
        //
    }

    /**
     * Handle the Purchase "force deleted" event.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return void
     */
    public function forceDeleted(Purchase $purchase)
    {
        //
    }
}
