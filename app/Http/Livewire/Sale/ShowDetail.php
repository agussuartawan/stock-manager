<?php

namespace App\Http\Livewire\Sale;

use App\Models\Sale;
use Livewire\Component;

class ShowDetail extends Component
{
    public $sale;

    public function mount(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function render()
    {
        return view('livewire.sale.show-detail', [
            'sale' => $this->sale
        ])->extends('layouts.app');
    }
}