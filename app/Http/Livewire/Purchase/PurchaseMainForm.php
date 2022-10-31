<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\TemporaryPurchase;
use Carbon\Carbon;
use Livewire\Component;

class PurchaseMainForm extends Component
{
    public $supplier_id;
    public $supplier_name;
    public $date;
    public $code;

    protected $listeners = [
        'choose:supplier' => 'chooseSupplier',
        'save:transaction' => 'store',
        'edit:transaction' => 'update',
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
        try {
            if (TemporaryPurchase::where("user_id", auth()->user()->id)->exists()) {
                Purchase::create([
                    'supplier_id' => $this->supplier_id,
                    'date' => $this->date,
                ]);
                return to_route('purchases.create')->with('success', 'Data obat masuk berhasil disimpan');
            } else {
                $this->emit("alert:error");
            }
        } catch (\Throwable $th) {
            $this->emit("alert:error");
        }
    }

    public function update(Purchase $purchase)
    {
        $this->validate();
        try {
            if ($purchase->cure()->exists()) {
                $purchase->update([
                    'supplier_id' => $this->supplier_id,
                    'date' => $this->date,
                ]);
                return to_route('purchases.create')->with('success', 'Data obat masuk berhasil disimpan');
            } else {
                $this->emit("alert:error");
            }
        } catch (\Throwable $th) {
            $this->emit("alert:error");
        }
    }

    public function chooseSupplier(Supplier $supplier)
    {
        $this->supplier_id = $supplier->id;
        $this->supplier_name = $supplier->name;
        $this->dispatchBrowserEvent('modal-hide-supplier');
    }

    public function mount($purchase)
    {
        if ($purchase) {
            $this->supplier_id = $purchase->supplier->id;
            $this->supplier_name = $purchase->supplier->name;
            $this->date = Carbon::createFromFormat('d/m/Y', $purchase->date)->format('Y-m-d');
            $this->code = $purchase->code;
        } else {
            $this->supplier_id = null;
            $this->supplier_name = null;
            $this->date = date('Y-m-d');
            $this->code = Purchase::getNextCode();
        }
    }

    public function render()
    {
        return view('livewire.purchase.purchase-main-form');
    }
}