<?php

namespace App\Http\Livewire\Report;

use App\Models\Purchase;
use Carbon\Carbon;
use Livewire\Component;

class ShowPurchase extends Component
{
    public $from;
    public $until;
    public $purchases;

    protected $rules = [
        'from' => ['required'],
        'until' => ['required'],
    ];

    public function search()
    {
        $this->validate();
        $dateFilter = [$this->from, $this->until];
        $this->emit('refresh:table', $dateFilter);
        $this->purchases = true;
    }

    public function mount()
    {
        $this->from = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->until = Carbon::now()->format('Y-m-d');
        $this->purchases = false;
    }

    public function render()
    {
        return view('livewire.report.show-purchase', ['purchases' => $this->purchases])->extends('layouts.app');
    }
}
