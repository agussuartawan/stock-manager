<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class SearchCustomerForm extends Component
{
    public $customer_name;
    public $customer_address;
    public $customer_phone;

    public function searchCustomer()
    {
        $query = [
            'name' => $this->customer_name,
            'address' => $this->customer_address,
            'phone' => $this->customer_phone,
        ];
        $this->emit('search:customer', $query);
    }

    public function render()
    {
        return view('livewire.customer.search-customer-form');
    }
}