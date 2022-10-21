<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\TemporaryPurchase;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

class PurchaseMainForm extends Component
{
    public $supplier_id;
    public $supplier_name;
    public $date;
    public $code;

    protected $listeners = [
        'choose:supplier' => 'chooseSupplier',
        'save:transaction' => 'store'
    ];

    protected $rules = [
        'supplier_id' => ['required'],
        'date' => ['required'],
    ];

    protected $messages = [
        'supplier_id.required' => 'Supplier tidak boleh kosong',
        'date.required' => 'Tanggal tidak boleh kosong'
    ];

    public function store()
    {
        $this->validate();
        if(TemporaryPurchase::where("user_id", auth()->user()->id)->exists()){
            // try {
                Purchase::create([
                    'supplier_id' => $this->supplier_id,
                    'date' => $this->date,
                ]);
                return to_route('purchases.form')->with('success', 'Data obat masuk berhasil disimpan');
            // } catch (\Throwable $th) {
                $this->emit("alert:error");
            // }
        } else {
            $this->emit("alert:error");
        }
    }

    public function chooseSupplier(Supplier $supplier)
    {
        $this->supplier_id = $supplier->id;
        $this->supplier_name = $supplier->name;
        $this->dispatchBrowserEvent('modal-hide-supplier');
    }

    public function mount()
    {
        $this->date = date('Y-m-d');
        $this->code = Purchase::getNextCode();
    }

    public function render()
    {
        return view('livewire.purchase.purchase-main-form');
    }
}
