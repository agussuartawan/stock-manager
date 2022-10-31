<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class ShowCustomer extends Component
{
    public $formTitle;
    public $action;
    public $formComponent = 'customer.show-customer-form';

    protected $listeners = [
        'create:customer' => 'createCustomerAction',
        'edit:customer' => 'editCustomerAction'
    ];

    public function createCustomerAction()
    {
        $this->action = '$emit("store:customer")';
        $this->formTitle = 'Tambah customer';
        $this->emit('showCreate');
        $this->dispatchBrowserEvent('modal-show');
    }

    public function editCustomerAction($id)
    {
        $this->action = '$emit("update:customer",' . $id . ')';
        $this->formTitle = 'Edit Pelanggan';
        $this->emit('showEdit:customer', $id);
        $this->dispatchBrowserEvent('modal-show');
    }

    public function render()
    {
        return view('livewire.customer.show-customer')->extends('layouts.app');
    }
}