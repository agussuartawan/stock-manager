<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Supplier;
use Livewire\Component;

class PurchaseMainForm extends Component
{
    public $supplier_id;
    public $supplier_name;
    public $date;
    public $code;

    protected $listeners = ['choose:supplier' => 'chooseSupplier'];

    public function chooseSupplier(Supplier $supplier)
    {
        $this->supplier_id = $supplier->id;
        $this->supplier_name = $supplier->name;
        $this->dispatchBrowserEvent('modal-hide-supplier');
    }

    public function mount()
    {
        $this->date = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.purchase.purchase-main-form');
    }
}
