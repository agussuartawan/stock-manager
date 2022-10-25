<?php

namespace App\Http\Livewire\Report;

use App\Models\Purchase;
use Livewire\Component;

class PurchasesTable extends Component
{
    public $purchases;

    protected $listeners = ['refresh:table' => 'refresh'];

    public function mount()
    {
        $this->purchases = [];
    }

    public function refresh($dateFilter)
    {
        $this->purchases = Purchase::whereBetween('date', $dateFilter)->get();
    }

    public function render()
    {
        return view('livewire.report.purchases-table', [
            'purchases' => $this->purchases
        ]);
    }
}
