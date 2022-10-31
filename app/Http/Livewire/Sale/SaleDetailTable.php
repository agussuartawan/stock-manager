<?php

namespace App\Http\Livewire\Sale;

use App\Models\Sale;
use App\Models\TemporarySale;
use Livewire\Component;

class SaleDetailTable extends Component
{
    public $saleDetails;
    public $grandTotal;

    protected $listeners = ['refreshTableDetail' => 'refresh'];

    public function mount($sale)
    {
        if ($sale) {
            $this->saleDetails = $sale->cure()->get();
            $this->grandTotal = idr($sale->grand_total);
        } else {
            $this->saleDetails = TemporarySale::where('user_id', auth()->user()->id)->get();
            $this->grandTotal = idr(TemporarySale::getGrandTotal());
        }
    }

    public function refresh($sale)
    {
        if ($sale) {
            $sale = Sale::find($sale['id']);
            $this->saleDetails = $sale->cure()->get();
            $this->grandTotal = idr($sale->grand_total);
        } else {
            $this->saleDetails = TemporarySale::where('user_id', auth()->user()->id)->get();
            $this->grandTotal = idr(TemporarySale::getGrandTotal());
        }
    }

    public function render()
    {
        return view('livewire.sale.sale-detail-table', [
            'saleDetails' => $this->saleDetails,
            'grandTotal' => $this->grandTotal
        ]);
    }
}