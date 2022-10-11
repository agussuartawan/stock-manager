<?php

namespace App\Http\Livewire\Rack;

use Livewire\Component;

class ShowRacks extends Component
{
    public $formTitle;
    public $action;
    public $formComponent = 'rack.show-rack-form';

    protected $listeners = [
        'create:rack' => 'createRackAction',
        'edit:rack' => 'editRackAction'
    ];

    public function createRackAction()
    {
        $this->action = '$emit("store:rack")';
        $this->formTitle = 'Tambah Rak Obat';
        $this->emit('showCreate');
        $this->dispatchBrowserEvent('modal-show');
    }

    public function editRackAction($id)
    {
        $this->action = '$emit("update:rack",' . $id . ')';
        $this->formTitle = 'Edit Rak Obat';
        $this->emit('showEdit:rack', $id);
        $this->dispatchBrowserEvent('modal-show');
    }

    public function render()
    {
        return view('livewire.rack.show-racks')->extends('layouts.app');
    }
}