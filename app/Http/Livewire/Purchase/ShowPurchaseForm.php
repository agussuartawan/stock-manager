<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use Livewire\Component;

class ShowPurchaseForm extends Component
{
    public $name;

    protected $rules = [
        'supplier_id' => ['required'],
        'date' => ['required'],
    ];

    protected $messages = [
        'supplier_id.required' => 'Supplier tidak boleh kosong',
        'date.required' => 'Tanggal tidak boleh kosong',
    ];

    protected $listeners = [
        'showEdit:purchase' => 'edit',
        'modal:close' => 'modalClose',
        'store:purchase' => 'store',
        'update:purchase' => 'update',
    ];

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
        return view('livewire.purchase.show-purchase-form');
    }
}
