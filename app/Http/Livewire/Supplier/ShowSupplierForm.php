<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;
use Livewire\Component;

class ShowSupplierForm extends Component
{
    public $name;
    public $address;
    public $phone;

    protected $rules = [
        'name' => ['required'],
        'address' => ['required'],
        'phone' => ['required'],
    ];

    protected $messages = [
        'name.required' => 'Nama supplier tidak boleh kosong',
        'address.required' => 'Alamat supplier tidak boleh kosong',
        'phone.required' => 'No telp supplier tidak boleh kosong',
    ];

    protected $listeners = [
        'showEdit:supplier' => 'edit',
        'modal:close' => 'modalClose',
        'store:supplier' => 'store',
        'update:supplier' => 'update',
    ];

    public function edit(Supplier $supplier)
    {
        $this->name = $supplier->name;
        $this->address = $supplier->address;
        $this->phone = $supplier->phone;
    }

    public function resetForm()
    {
        $this->name = null;
        $this->address = null;
        $this->phone = null;
    }

    public function modalClose()
    {
        $this->resetForm();
    }

    public function store()
    {
        Supplier::create($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function update(Supplier $supplier)
    {
        $supplier->update($this->validate());
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
        return view('livewire.supplier.show-supplier-form');
    }
}
