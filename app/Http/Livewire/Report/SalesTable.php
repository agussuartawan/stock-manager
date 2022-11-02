<?php

namespace App\Http\Livewire\Report;

use App\Models\Sale;
use Livewire\Component;

class SalesTable extends Component
{
    public $sales;

    protected $listeners = ['refresh:table' => 'refresh'];

    public function mount()
    {
        $this->sales = [];
    }

    public function refresh($dateFilter)
    {
        $this->sales = Sale::whereBetween('date', $dateFilter)->get();
    }

    public function render()
    {
        return view('livewire.report.sales-table', [
            'sales' => $this->sales
        ]);
    }
}