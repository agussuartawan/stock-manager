<?php

namespace App\Observers;

use App\Models\Cure;

class CureObserver
{
    /**
     * Handle the Cure "creating" event.
     *
     * @param  \App\Models\Cure  $cure
     * @return void
     */
    public function creating(Cure $cure)
    {
        $cure_count = Cure::count();
        if ($cure_count == 0) {
            $number = 10001;
            $fullnumber = 'OBT' . $number;
        } else {
            $number = Cure::all()->last();
            $number_plus = (int)substr($number->code, -5) + 1;
            $fullnumber = 'OBT' . $number_plus;
        }

        return $cure->code = $fullnumber;
    }
    /**
     * Handle the Cure "created" event.
     *
     * @param  \App\Models\Cure  $cure
     * @return void
     */
    public function created(Cure $cure)
    {
        //
    }

    /**
     * Handle the Cure "updated" event.
     *
     * @param  \App\Models\Cure  $cure
     * @return void
     */
    public function updated(Cure $cure)
    {
        //
    }

    /**
     * Handle the Cure "deleted" event.
     *
     * @param  \App\Models\Cure  $cure
     * @return void
     */
    public function deleted(Cure $cure)
    {
        //
    }

    /**
     * Handle the Cure "restored" event.
     *
     * @param  \App\Models\Cure  $cure
     * @return void
     */
    public function restored(Cure $cure)
    {
        //
    }

    /**
     * Handle the Cure "force deleted" event.
     *
     * @param  \App\Models\Cure  $cure
     * @return void
     */
    public function forceDeleted(Cure $cure)
    {
        //
    }
}
