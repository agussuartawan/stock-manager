<?php

namespace App\Observers;

use App\Models\CurePurchase;
use App\Models\Stock;

class CurePurchaseObserver
{
    /**
     * Handle the CurePurchase "created" event.
     *
     * @param  \App\Models\CurePurchase  $curePurchase
     * @return void
     */
    public function created(CurePurchase $curePurchase)
    {
        $stockObj = Stock::query();
        if ($stockObj->where('cure_id', $curePurchase->cure_id)->exists()) {
            Stock::where('cure_id', $curePurchase->cure_id)
                ->increment('amount', $curePurchase->qty);
        } else {
            Stock::create([
                'cure_id' => $curePurchase->cure_id,
                'amount' => $curePurchase->qty,
            ]);
        }
    }

    public function creating(CurePurchase $curePurchase)
    {
        return $curePurchase->subtotal = (int)$curePurchase->qty * (int)$curePurchase->price;
    }

    /**
     * Handle the CurePurchase "updated" event.
     *
     * @param  \App\Models\CurePurchase  $curePurchase
     * @return void
     */
    public function updated(CurePurchase $curePurchase)
    {
        $stockObj = Stock::query();
        if ($stockObj->where('cure_id', $curePurchase->cure_id)->exists()) {
            Stock::where('cure_id', $curePurchase->cure_id)
                ->increment('amount', $curePurchase->qty);
        } else {
            Stock::create([
                'cure_id' => $curePurchase->cure_id,
                'amount' => $curePurchase->qty,
            ]);
        }
    }

    public function updating(CurePurchase $curePurchase)
    {
        $purchaseDetail = CurePurchase::find($curePurchase->id);
        Stock::where('cure_id', $purchaseDetail->cure_id)
            ->decrement('amount', $purchaseDetail->qty);

        return $curePurchase->subtotal = (int)$curePurchase->qty * (int)$curePurchase->price;
    }

    /**
     * Handle the CurePurchase "deleted" event.
     *
     * @param  \App\Models\CurePurchase  $curePurchase
     * @return void
     */
    public function deleted(CurePurchase $curePurchase)
    {
        Stock::where('cure_id', $curePurchase->cure_id)
            ->decrement('amount', $curePurchase->qty);
    }

    /**
     * Handle the CurePurchase "restored" event.
     *
     * @param  \App\Models\CurePurchase  $curePurchase
     * @return void
     */
    public function restored(CurePurchase $curePurchase)
    {
        //
    }

    /**
     * Handle the CurePurchase "force deleted" event.
     *
     * @param  \App\Models\CurePurchase  $curePurchase
     * @return void
     */
    public function forceDeleted(CurePurchase $curePurchase)
    {
        //
    }
}
