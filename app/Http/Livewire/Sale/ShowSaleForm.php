<?php

namespace App\Http\Livewire\Sale;

use App\Models\Sale;
use Livewire\Component;

class ShowSaleForm extends Component
{
    public $sale;
    public $title;
    public $emitAction;

    protected $rules = [];

    protected $messages = [
        'customer_id.required' => 'Pelanggan tidak boleh kosong',
        'date.required' => 'Tanggal tidak boleh kosong',
    ];

    protected $listeners = [
        'show:modalCustomer' => 'showModalCustomer',
        'show:modalCure' => 'showModalCure',
        'alert:error' => 'alertError',
    ];

    public function alertError()
    {
        $this->dispatchBrowserEvent('alert-error');
    }

    public function showModalCure()
    {
        $this->dispatchBrowserEvent('modal-show-cure');
    }

    public function showModalCustomer()
    {
        $this->dispatchBrowserEvent('modal-show-customer');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        if ($id > 0) {
            $sale = Sale::findOrFail($id);
            $this->sale = $sale;
            $this->title = 'Edit Obat Keluar';
            $this->emitAction = '$emit(`edit:transaction`,' . $sale->id . ')';
        } else {
            $this->sale = null;
            $this->title = 'Tambah Obat Keluar';
            $this->emitAction = '$emit(`save:transaction`)';
        }
    }

    public function render()
    {
        return view('livewire.sale.show-sale-form', [
            'title' => $this->title,
            'sale' => $this->sale,
            'emitAction' => $this->emitAction,
        ])->extends('layouts.app');
    }
}