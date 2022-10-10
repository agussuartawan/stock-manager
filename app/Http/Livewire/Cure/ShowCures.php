<?php

namespace App\Http\Livewire\Cure;

use Livewire\Component;

class ShowCures extends Component
{
    public $formTitle;
    public $action;

    protected $listeners = [
        'create:cure' => 'createCureAction',
        'edit:cure' => 'editCureAction'
    ];

    public function createCureAction()
    {
        $this->action = '$emit("store:cure")';
        $this->formTitle = 'Tambah Obat';
        $this->emit('showCreate');
        $this->dispatchBrowserEvent('modal-show');
    }

    public function editCureAction($id)
    {
        $this->action = '$emit("update:cure",' . $id . ')';
        $this->formTitle = 'Edit Obat';
        $this->emit('showEdit:cure', $id);
        $this->dispatchBrowserEvent('modal-show');
    }

    public function render()
    {
        return view('livewire.cure.show-cures')->extends('layouts.app');
    }
}