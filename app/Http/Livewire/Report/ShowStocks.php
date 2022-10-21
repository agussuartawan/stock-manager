<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;

class ShowStocks extends Component
{
    public function render()
    {
        return view('livewire.report.show-stocks')->extends('layouts.app');
    }
}
