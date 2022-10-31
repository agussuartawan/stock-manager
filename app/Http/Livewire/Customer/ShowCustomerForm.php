<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class ShowCustomerForm extends Component
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
        'name.required' => 'Nama pelanggan tidak boleh kosong',
        'address.required' => 'Alamat pelanggan tidak boleh kosong',
        'phone.required' => 'No telp pelanggan tidak boleh kosong',
    ];

    protected $listeners = [
        'showEdit:customer' => 'edit',
        'modal:close' => 'modalClose',
        'store:customer' => 'store',
        'update:customer' => 'update',
    ];

    public function edit(Customer $customer)
    {
        $this->name = $customer->name;
        $this->address = $customer->address;
        $this->phone = $customer->phone;
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
        Customer::create($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validate());
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
        return view('livewire.customer.show-customer-form');
    }
}