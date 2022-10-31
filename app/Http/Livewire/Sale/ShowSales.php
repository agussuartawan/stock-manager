<?php

namespace App\Http\Livewire\Sale;

use Livewire\Component;

class ShowSales extends Component
{
    public $formTitle;
    public $action;
    public $formComponent = 'sale.show-sale-form';

    protected $listeners = [
        'create:sale' => 'createSaleAction',
        'edit:sale' => 'editSaleAction'
    ];

    public function createSaleAction()
    {
        $this->action = '$emit("store:sale")';
        $this->formTitle = 'Tambah Obat Keluar';
        $this->emit('showCreate');
        $this->dispatchBrowserEvent('modal-show');
    }

    public function editSaleAction($id)
    {
        $this->action = '$emit("update:sale",' . $id . ')';
        $this->formTitle = 'Edit Obat Keluar';
        $this->emit('showEdit:sale', $id);
        $this->dispatchBrowserEvent('modal-show');
    }

    public function render()
    {
        return view('livewire.sale.show-sales')->extends('layouts.app');
    }
}