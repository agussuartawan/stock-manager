<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use Livewire\Component;

class ShowPurchaseForm extends Component
{
    public $requestDetail = [
        'cureId' => 1, 
        'cureName' => null, 
        'cureCode' => null, 
        'qty' => null, 
        'price' => null, 
        'expired' => null
    ];
    public $purchaseDetail = [];
    public $errorDetail = false;

    // protected $rules = [];

    protected $messages = [
        'supplier_id.required' => 'Supplier tidak boleh kosong',
        'date.required' => 'Tanggal tidak boleh kosong',
    ];

    protected $listeners = [
        'showEdit:purchase' => 'edit',
        'modal:close' => 'modalClose',
        'store:purchase' => 'store',
        'update:purchase' => 'update',
    ];

    public function addDetail()
    {
        foreach($this->requestDetail as $detail){
            if ($detail == null) {
                $this->errorDetail = true;
                return;
            }
        }
        
        $this->purchaseDetail[] = [
            'cureId' => $this->requestDetail['cureId'],
            'cureCode' => $this->requestDetail['cureCode'],
            'cureName' => $this->requestDetail['cureName'],
            'qty' => $this->requestDetail['qty'],
            'price' => $this->requestDetail['price'],
            'expired' => $this->requestDetail['expired'],
        ];
        $this->resetFormDetail();
    }

    public function edit(Purchase $purchase)
    {
        $this->name = $purchase->name;
    }

    public function resetFormDetail()
    {
        $this->requestDetail['cureId'] = null;
        $this->requestDetail['cureCode'] = null;
        $this->requestDetail['cureName'] = null;
        $this->requestDetail['qty'] = null;
        $this->requestDetail['price'] = null;
        $this->requestDetail['expired'] = null;
        $this->errorDetail = false;
    }

    public function resetForm()
    {
        $this->name = '';
    }

    public function modalClose()
    {
        $this->resetForm();
    }

    public function store()
    {
        Purchase::create($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function update(Purchase $purchase)
    {
        $purchase->update($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function render()
    {
        return view('livewire.purchase.show-purchase-form');
    }
}
