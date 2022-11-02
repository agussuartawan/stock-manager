<?php

namespace App\Observers;

use App\Models\Purchase;
use App\Models\Stock;
use App\Models\TemporaryPurchase;
use Illuminate\Support\Facades\DB;

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
        DB::transaction(function () use ($purchase) {
            $tempDetail = TemporaryPurchase::where('user_id', auth()->user()->id)->get();
            foreach ($tempDetail as $value) {
                $purchase->cure()->attach($purchase->id, [
                    'cure_id' => $value->cure_id,
                    'qty' => $value->qty,
                    'price' => $value->price,
                    'subtotal' => $value->subtotal,
                    'expired' => $value->expired,
                ]);

                $stockObj = Stock::query();
                if ($stockObj->where('cure_id', $value->cure_id)->exists()) {
                    $stockObj->where('cure_id', $value->cure_id)->increment('amount', $value->qty);
                } else {
                    $stockObj->create([
                        'cure_id' => $value->cure_id,
                        'amount' => $value->qty,
                    ]);
                }
            }
            $purchase->grand_total = $tempDetail->sum("subtotal");
            $purchase->save();
            TemporaryPurchase::where('user_id', auth()->user()->id)->delete();
        });
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