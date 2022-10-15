<?php

namespace App\Http\Livewire\Purchase;

use App\Models\TemporaryPurchase;
use Livewire\Component;

class PurchaseDetailTable extends Component
{
    public $purchase_detail;

    protected $listeners = ['refreshTableDetail' => '$refresh'];

    public function mount()
    {
        $this->purchase_details = TemporaryPurchase::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.purchase.purchase-detail-table');
    }
}
