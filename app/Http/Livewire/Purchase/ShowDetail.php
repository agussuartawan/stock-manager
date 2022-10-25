<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use Livewire\Component;

class ShowDetail extends Component
{
    public $purchase;

    public function mount(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function render()
    {
        return view('livewire.purchase.show-detail', [
            'purchase' => $this->purchase
        ])->extends('layouts.app');
    }
}
