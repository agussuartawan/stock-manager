<?php

namespace App\Http\Livewire\Cure;

use Livewire\Component;

class ShowCures extends Component
{
    public $formTitle;
    public $action;

    protected $listeners = ['create:cure' => 'createCureAction'];

    public function createCureAction()
    {
        $this->action = '$emit("store:cure")';
        $this->formTitle = 'Tambah Obat';
        $this->dispatchBrowserEvent('modal-show');
    }

    public function render()
    {
        return view('livewire.cure.show-cures')->extends('layouts.app');
    }
}