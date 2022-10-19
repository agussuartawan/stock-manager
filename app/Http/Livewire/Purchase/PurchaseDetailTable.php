<?php

namespace App\Http\Livewire\Purchase;

use App\Models\TemporaryPurchase;
use Livewire\Component;

class PurchaseDetailTable extends Component
{
    protected $listeners = ['refreshTableDetail' => '$refresh'];

    public function render()
    {
        return view('livewire.purchase.purchase-detail-table', [
            'purchase_details' => TemporaryPurchase::where('user_id', auth()->user()->id)->get(),
            'grand_total' => idr(TemporaryPurchase::getGrandTotal())
        ]);
    }
}