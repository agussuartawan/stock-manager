<?php

namespace App\Http\Livewire\Purchase;

use Livewire\Component;

class ShowPurchases extends Component
{
    public $formTitle;
    public $action;
    public $formComponent = 'purchase.show-purchase-form';

    protected $listeners = [
        'create:purchase' => 'createPurchaseAction',
        'edit:purchase' => 'editPurchaseAction'
    ];

    public function createPurchaseAction()
    {
        $this->action = '$emit("store:purchase")';
        $this->formTitle = 'Tambah Obat Masuk';
        $this->emit('showCreate');
        $this->dispatchBrowserEvent('modal-show');
    }

    public function editPurchaseAction($id)
    {
        $this->action = '$emit("update:purchase",' . $id . ')';
        $this->formTitle = 'Edit Obat Masuk';
        $this->emit('showEdit:purchase', $id);
        $this->dispatchBrowserEvent('modal-show');
    }

    public function render()
    {
        return view('livewire.purchase.show-purchases')->extends('layouts.app');
    }
}
