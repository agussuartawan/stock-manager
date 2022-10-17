<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;
use Livewire\Component;

class SearchSupplierForm extends Component
{
    public $supplier_name;
    public $supplier_address;
    public $supplier_phone;

    public function searchSupplier()
    {
        $query = [
            'name' => $this->supplier_name,
            'address' => $this->supplier_address,
            'phone' => $this->supplier_phone,
        ];
        $this->emit('search:supplier', $query);
    }

    public function render()
    {
        return view('livewire.supplier.search-supplier-form');
    }
}
