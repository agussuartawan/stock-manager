<?php

namespace App\Http\Livewire\Cure;

use App\Models\Cure;
use App\Models\Rack;
use Livewire\Component;
use App\Models\CureType;
use App\Models\CureUnit;

class ShowCureForm extends Component
{
    public function render()
    {
        return view('livewire.cure.show-cure-form', [
            'cure' => Cure::find(1),
            'method' => 'POST',
            'route' => 'cures.store',
            'cure_type' => CureType::pluck('name', 'id'),
            'cure_unit' => CureUnit::pluck('name', 'id'),
            'rack' => Rack::pluck('name', 'id'),
            'title' => 'Tambah Obat',
            'breadcumb' => 'Tambah',
            'code' => Cure::getNextCode()
        ])->extends('layouts.app');
    }
}