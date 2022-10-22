<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use App\Models\TemporaryPurchase;
use Livewire\Component;

class PurchaseDetailTable extends Component
{
    public $purchaseDetails;
    public $grandTotal;

    protected $listeners = ['refreshTableDetail' => 'refresh'];

    public function mount($purchase)
    {
        if($purchase){
            $this->purchaseDetails = $purchase->cure()->get();
            $this->grandTotal = idr($purchase->grand_total);
        } else {
            $this->purchaseDetails = TemporaryPurchase::where('user_id', auth()->user()->id)->get();
            $this->grandTotal = idr(TemporaryPurchase::getGrandTotal());
        }
    }

    public function refresh($purchase)
    {
        $purchase = Purchase::find($purchase['id']);
        if($purchase){
            $this->purchaseDetails = $purchase->cure()->get();
            $this->grandTotal = idr($purchase->grand_total);
        } else {
            $this->purchaseDetails = TemporaryPurchase::where('user_id', auth()->user()->id)->get();
            $this->grandTotal = idr(TemporaryPurchase::getGrandTotal());
        }
    }

    public function render()
    {
        return view('livewire.purchase.purchase-detail-table', [
            'purchaseDetails' => $this->purchaseDetails,
            'grandTotal' => $this->grandTotal
        ]);
    }
}