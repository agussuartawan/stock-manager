<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;
use Livewire\Component;

class SearchSupplierTable extends Component
{
    public $suppliers;

    protected $listeners = [
        'search:supplier' => 'searchData'
    ];

    public function mount()
    {
        $this->suppliers = Supplier::orderBy('created_at', 'desc')->take(10)->get();
    }

    public function searchData($query)
    {
        $this->suppliers = Supplier::where('name', 'like', '%'.$query['name'].'%')
                    ->where('address', 'like', '%'.$query['address'].'%')
                    ->where('phone', 'like', '%'.$query['phone'].'%')
                    ->get();
        $this->render();
    }

    public function render()
    {
        return view('livewire.supplier.search-supplier-table', ['suppliers' => $this->suppliers]);
    }
}
