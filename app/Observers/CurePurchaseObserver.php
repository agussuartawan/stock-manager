<?php

namespace App\Observers;

use App\Models\CurePurchase;

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
        //
    }

    public function creating(CurePurchase $curePurchase)
    {
        $this->curePurchase = (int)$this->qty * (int)$this->price;
    }

    /**
     * Handle the CurePurchase "updated" event.
     *
     * @param  \App\Models\CurePurchase  $curePurchase
     * @return void
     */
    public function updated(CurePurchase $curePurchase)
    {
        //
    }

    /**
     * Handle the CurePurchase "deleted" event.
     *
     * @param  \App\Models\CurePurchase  $curePurchase
     * @return void
     */
    public function deleted(CurePurchase $curePurchase)
    {
        //
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
