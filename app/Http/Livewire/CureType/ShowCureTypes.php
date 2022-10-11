<?php

namespace App\Http\Livewire\CureType;

use Livewire\Component;

class ShowCureTypes extends Component
{
    public $formTitle;
    public $action;
    public $formComponent = 'cure-type.show-cure-type-form';

    protected $listeners = [
        'create:cure-type' => 'createCureTypeAction',
        'edit:cure-type' => 'editCureTypeAction'
    ];

    public function createCureTypeAction()
    {
        $this->action = '$emit("store:cure-type")';
        $this->formTitle = 'Tambah Jenis Obat';
        $this->emit('showCreate');
        $this->dispatchBrowserEvent('modal-show');
    }

    public function editCureTypeAction($id)
    {
        $this->action = '$emit("update:cure-type",' . $id . ')';
        $this->formTitle = 'Edit Jenis Obat';
        $this->emit('showEdit:cure-type', $id);
        $this->dispatchBrowserEvent('modal-show');
    }

    public function render()
    {
        return view('livewire.cure-type.show-cure-types')->extends('layouts.app');
    }
}
