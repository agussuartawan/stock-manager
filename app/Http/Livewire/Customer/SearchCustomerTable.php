<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCustomerTable extends Component
{
    public $customers;

    protected $listeners = [
        'search:customer' => 'searchData'
    ];

    public function mount()
    {
        $this->customers = Customer::orderBy('created_at', 'desc')->take(10)->get();
    }

    public function searchData($query)
    {
        $this->customers = Customer::where('name', 'like', '%' . $query['name'] . '%')
            ->where('address', 'like', '%' . $query['address'] . '%')
            ->where('phone', 'like', '%' . $query['phone'] . '%')
            ->get();
        $this->render();
    }

    public function render()
    {
        return view('livewire.customer.search-customer-table', ['customers' => $this->customers]);
    }
}