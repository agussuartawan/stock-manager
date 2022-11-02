<?php

namespace App\Http\Livewire\Report;

use Carbon\Carbon;
use Livewire\Component;

class ShowSale extends Component
{
    public $from;
    public $until;
    public $sales;

    protected $rules = [
        'from' => ['required'],
        'until' => ['required'],
    ];

    public function search()
    {
        $this->validate();
        $dateFilter = [$this->from, $this->until];
        $this->emit('refresh:table', $dateFilter);
        $this->sales = true;
    }

    public function mount()
    {
        $this->from = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->until = Carbon::now()->format('Y-m-d');
        $this->sales = false;
    }

    public function render()
    {
        return view('livewire.report.show-sale', ['sales' => $this->sales])->extends('layouts.app');
    }
}
