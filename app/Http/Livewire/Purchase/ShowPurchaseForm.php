<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use Livewire\Component;

class ShowPurchaseForm extends Component
{
    protected $rules = [];

    protected $messages = [
        'supplier_id.required' => 'Supplier tidak boleh kosong',
        'date.required' => 'Tanggal tidak boleh kosong',
    ];

    protected $listeners = [
        'show:modalSupplier' => 'showModalSupplier',
        'show:modalCure' => 'showModalCure',
    ];

    public function showModalCure()
    {
        $this->dispatchBrowserEvent('modal-show-cure');
    }

    public function showModalSupplier()
    {
        $this->dispatchBrowserEvent('modal-show-supplier');
    }

    public function edit(Purchase $purchase)
    {
        $this->name = $purchase->name;
    }

    public function resetForm()
    {
        $this->name = '';
    }

    public function modalClose()
    {
        $this->resetForm();
    }

    public function store()
    {
        Purchase::create($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function update(Purchase $purchase)
    {
        $purchase->update($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.purchase.show-purchase-form')->extends('layouts.app');
    }
}
