<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Cure;
use App\Models\TemporaryPurchase;
use Livewire\Component;

class PurchaseDetailForm extends Component
{
    public $cure_id, $qty, $price, $expired, $cure_code, $cure_name;
    public $buttonLabel = 'Tambah';
    public $buttonAction = 'store';

    protected $rules = [
        'cure_id' => ['required'],
        'qty' => ['required'],
        'price' => ['required'],
        'expired' => ['required'],
    ];

    protected $messages = [
        'cure_id' => 'Obat tidak boleh kosong',
        'qty' => 'Jumlah tidak boleh kosong',
        'price' => 'Harga tidak boleh kosong',
        'date' => 'Tanggal kedaluarsa tidak boleh kosong',
    ];

    protected $listeners = [
        'editDetail' => 'edit', 
        'deleteDetail' => 'delete',
        'choose:cure' => 'chooseCure'
    ];

    public function chooseCure(Cure $cure)
    {
        $this->cure_id = $cure->id;
        $this->cure_name = $cure->name;
        $this->price = $cure->purchase_price;
        $this->dispatchBrowserEvent('modal-hide-cure');
    }

    public function store()
    {
        $this->validate();

        TemporaryPurchase::create([
            'cure_id' => $this->cure_id,
            'qty' => $this->qty,
            'price' => $this->price,
            'expired' => $this->expired,
        ]);
        $this->emit('refreshTableDetail');
        $this->resetForm();
    }

    public function edit(TemporaryPurchase $temporaryPurchase)
    {
        $this->cure_id = $temporaryPurchase->cure_id;
        $this->qty = $temporaryPurchase->qty;
        $this->price = $temporaryPurchase->price;
        $this->expired = $temporaryPurchase->expired;
        $this->cure_code = $temporaryPurchase->cure->code;
        $this->cure_name = $temporaryPurchase->cure->name;
        $this->buttonAction = 'update(' . $temporaryPurchase->id . ')';
        $this->buttonLabel = 'Edit';
    }

    public function update(TemporaryPurchase $temporaryPurchase)
    {
        $this->validate();
        $temporaryPurchase->update([
            'cure_id' => $this->cure_id,
            'qty' => $this->qty,
            'price' => $this->price,
            'expired' => $this->expired,
        ]);
        $this->resetForm();
        $this->emit('refreshTableDetail');
        $this->buttonLabel = 'Tambah';
        $this->buttonAction = 'store';
    }

    public function delete(TemporaryPurchase $temporaryPurchase)
    {
        $temporaryPurchase->delete();
        $this->emit('refreshTableDetail');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.purchase.purchase-detail-form');
    }

    public function resetForm()
    {
        $this->cure_id = null;
        $this->qty = null;
        $this->price = null;
        $this->expired = null;
        $this->cure_code = null;
        $this->cure_name = null;
    }
}