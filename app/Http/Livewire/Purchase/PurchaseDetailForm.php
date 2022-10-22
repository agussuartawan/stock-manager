<?php

namespace App\Http\Livewire\Purchase;

use App\Events\CurePurchaseChanged;
use App\Models\Cure;
use App\Models\CurePurchase;
use App\Models\TemporaryPurchase;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PurchaseDetailForm extends Component
{
    public $cure_id, $qty, $price, $expired, $cure_name;
    public $buttonLabel = 'Tambah';
    public $buttonAction = 'storeTemporaryDetail';
    public $purchase;

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
        'edit:detail' => 'editDetail', 
        'delete:detail' => 'deleteDetail',

        'edit:temporaryDetail' => 'editTemporaryDetail', 
        'delete:temporaryDetail' => 'deleteTemporaryDetail',

        'choose:cure' => 'chooseCure'
    ];

    public function chooseCure(Cure $cure)
    {
        $this->cure_id = $cure->id;
        $this->cure_name = $cure->name;
        $this->price = $cure->purchase_price;
        $this->dispatchBrowserEvent('modal-hide-cure');
    }

    public function storeTemporaryDetail()
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

    public function editTemporaryDetail(TemporaryPurchase $temporaryPurchase)
    {
        $this->cure_id = $temporaryPurchase->cure_id;
        $this->qty = $temporaryPurchase->qty;
        $this->price = round($temporaryPurchase->price);
        $this->expired = $temporaryPurchase->expired;
        $this->cure_name = $temporaryPurchase->cure->name;
        $this->buttonAction = 'updateTemporaryDetail(' . $temporaryPurchase->id . ')';
        $this->buttonLabel = 'Edit';
    }

    public function updateTemporaryDetail(TemporaryPurchase $temporaryPurchase)
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
        $this->buttonAction = 'storeTemporaryDetail';
    }

    public function deleteTemporaryDetail(TemporaryPurchase $temporaryPurchase)
    {
        $temporaryPurchase->delete();
        $this->emit('refreshTableDetail');
    }


    public function storeDetail()
    {
        $this->validate();

        DB::transaction(function(){
            $subtotal = (int)$this->qty * (int)$this->price;
            $this->purchase->cure()->attach($this->purchase->id, [
                'cure_id' => $this->cure_id,
                'qty' => $this->qty,
                'price' => $this->price,
                'expired' => $this->expired,
                'subtotal' => $subtotal
            ]);
            event(CurePurchaseChanged::class, $this->purchase);
        });
        event(new CurePurchaseChanged($this->purchase));
        $this->resetForm();
    }

    public function editDetail($id)
    {
        $purchaseCure = $this->purchase->cure()->where('id', $id)->first();
        $this->cure_id = $purchaseCure->cure_id;
        $this->qty = $purchaseCure->qty;
        $this->price = round($purchaseCure->price);
        $this->expired = $purchaseCure->expired;
        $this->cure_name = $purchaseCure->cure->name;
        $this->buttonAction = 'updateDetail(' . $purchaseCure->id . ')';
        $this->buttonLabel = 'Edit';
    }

    public function updateDetail($id)
    {
        $this->validate();
        $purchaseCure = $this->purchase->cure()->where('id', $id)->first();

        DB::transaction(function() use($purchaseCure){
            $subtotal = (int)$this->qty * (int)$this->price;
            $purchaseCure->update([
                'cure_id' => $this->cure_id,
                'qty' => $this->qty,
                'price' => $this->price,
                'expired' => $this->expired,
                'subtotal' => $subtotal
            ]);
            event(new CurePurchaseChanged($this->purchase));
        });

        $this->resetForm();
        $this->emit('refreshTableDetail', $this->purchase);
        $this->buttonLabel = 'Tambah';
        $this->buttonAction = 'storeDetail';
    }

    public function deleteDetail(CurePurchase $curePurchase)
    {
        DB::transaction(function() use($curePurchase){
            $curePurchase->delete();
            event(new CurePurchaseChanged($this->purchase));
        });
        $this->emit('refreshTableDetail', $this->purchase);
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        if($this->purchase){
            $this->buttonAction = "storeDetail";
        }
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