<?php

namespace App\Http\Livewire\Unit;

use Livewire\Component;

class ShowUnits extends Component
{
    public $formTitle;
    public $action;
    public $formComponent = 'unit.show-unit-form';

    protected $listeners = [
        'create:unit' => 'createUnitAction',
        'edit:unit' => 'editUnitAction'
    ];

    public function createUnitAction()
    {
        $this->action = '$emit("store:unit")';
        $this->formTitle = 'Tambah Satuan Obat';
        $this->emit('showCreate');
        $this->dispatchBrowserEvent('modal-show');
    }

    public function editUnitAction($id)
    {
        $this->action = '$emit("update:unit",' . $id . ')';
        $this->formTitle = 'Edit Satuan Obat';
        $this->emit('showEdit:unit', $id);
        $this->dispatchBrowserEvent('modal-show');
    }

    public function render()
    {
        return view('livewire.unit.show-units')->extends('layouts.app');
    }
}
