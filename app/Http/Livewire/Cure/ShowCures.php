<?php

namespace App\Http\Livewire\Cure;

use Livewire\Component;

class ShowCures extends Component
{
    public function render()
    {
        return view('livewire.cure.show-cures')->extends('layouts.app');
    }
}