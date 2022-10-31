<?php

namespace App\Observers;

use App\Models\CureSale;

class CureSaleObserver
{
    /**
     * Handle the CureSale "created" event.
     *
     * @param  \App\Models\CureSale  $cureSale
     * @return void
     */
    public function created(CureSale $cureSale)
    {
        //
    }

    /**
     * Handle the CureSale "updated" event.
     *
     * @param  \App\Models\CureSale  $cureSale
     * @return void
     */
    public function updated(CureSale $cureSale)
    {
        //
    }

    /**
     * Handle the CureSale "deleted" event.
     *
     * @param  \App\Models\CureSale  $cureSale
     * @return void
     */
    public function deleted(CureSale $cureSale)
    {
        //
    }

    /**
     * Handle the CureSale "restored" event.
     *
     * @param  \App\Models\CureSale  $cureSale
     * @return void
     */
    public function restored(CureSale $cureSale)
    {
        //
    }

    /**
     * Handle the CureSale "force deleted" event.
     *
     * @param  \App\Models\CureSale  $cureSale
     * @return void
     */
    public function forceDeleted(CureSale $cureSale)
    {
        //
    }
}
