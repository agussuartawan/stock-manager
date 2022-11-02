<?php

namespace App\Observers;

use App\Models\CureSale;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\TemporarySale;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SaleObserver
{
    /**
     * Handle the Sale "created" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function created(Sale $sale)
    {
        DB::transaction(function () use ($sale) {
            $tempDetail = TemporarySale::where('user_id', auth()->user()->id)->get();
            foreach ($tempDetail as $value) {
                $cure = $value->cure;
                $stock = $cure->stock;
                $stockAmount = $stock->amount;
                $stockRemains = $stockAmount - $value->qty;
                $minimumStock = $cure->minimum_stock;

                if ($minimumStock > $stockRemains) {
                    abort(Response::HTTP_BAD_REQUEST);
                }

                $sale->cure()->attach($sale->id, [
                    'cure_id' => $value->cure_id,
                    'qty' => $value->qty,
                    'price' => $value->price,
                    'subtotal' => $value->subtotal,
                ]);

                $stock->decrement('amount', $value->qty);
            }

            $sale->grand_total = $tempDetail->sum("subtotal");
            $sale->save();
            TemporarySale::where('user_id', auth()->user()->id)->delete();
        });
    }

    public function creating(Sale $sale)
    {
        return $sale->code = $sale->getNextCode();
    }

    /**
     * Handle the Sale "updated" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function updated(Sale $sale)
    {
        //
    }

    /**
     * Handle the Sale "deleted" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function deleted(Sale $sale)
    {
        //
    }

    /**
     * Handle the Sale "restored" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function restored(Sale $sale)
    {
        //
    }

    /**
     * Handle the Sale "force deleted" event.
     *
     * @param  \App\Models\Sale  $sale
     * @return void
     */
    public function forceDeleted(Sale $sale)
    {
        //
    }
}