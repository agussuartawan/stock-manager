<?php

namespace App\Http\Livewire\Rack;

use Livewire\Component;

class ShowRacks extends Component
{
    public function render()
    {
        return view('livewire.rack.show-racks')->extends('layouts.app');
    }
}