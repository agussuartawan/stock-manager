<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;

class ShowSupplier extends Component
{
    public $formTitle;
    public $action;
    public $formComponent = 'supplier.show-supplier-form';

    protected $listeners = [
        'create:supplier' => 'createSupplierAction',
        'edit:supplier' => 'editSupplierAction'
    ];

    public function createSupplierAction()
    {
        $this->action = '$emit("store:supplier")';
        $this->formTitle = 'Tambah Supplier';
        $this->emit('showCreate');
        $this->dispatchBrowserEvent('modal-show');
    }

    public function editSupplierAction($id)
    {
        $this->action = '$emit("update:supplier",' . $id . ')';
        $this->formTitle = 'Edit Supplier';
        $this->emit('showEdit:supplier', $id);
        $this->dispatchBrowserEvent('modal-show');
    }

    public function render()
    {
        return view('livewire.supplier.show-supplier')->extends('layouts.app');
    }
}
