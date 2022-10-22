<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use Livewire\Component;

class ShowPurchaseForm extends Component
{
    public $purchase;
    public $title;
    public $emitAction;

    protected $rules = [];

    protected $messages = [
        'supplier_id.required' => 'Supplier tidak boleh kosong',
        'date.required' => 'Tanggal tidak boleh kosong',
    ];

    protected $listeners = [
        'show:modalSupplier' => 'showModalSupplier',
        'show:modalCure' => 'showModalCure',
        'alert:error' => 'alertError',
    ];

    public function alertError()
    {
        $this->dispatchBrowserEvent('alert-error');
    }

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

    public function mount($id)
    {
        if($id > 0){
            $purchase = Purchase::findOrFail($id);
            $this->purchase = $purchase;
            $this->title = 'Edit Obat Masuk';
            $this->emitAction = '$emit(`edit:transaction`,'. $purchase->id .')';
        } else {
            $this->purchase = null;
            $this->title = 'Tambah Obat Masuk';
            $this->emitAction = '$emit(`save:transaction`)';
        }
    }

    public function render()
    {
        return view('livewire.purchase.show-purchase-form', [
            'title' => $this->title,
            'purchase' => $this->purchase,
            'emitAction' => $this->emitAction,
        ])->extends('layouts.app');
    }
}
