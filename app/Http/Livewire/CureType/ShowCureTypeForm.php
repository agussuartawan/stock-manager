<?php

namespace App\Http\Livewire\CureType;

use App\Models\CureType;
use Livewire\Component;

class ShowCureTypeForm extends Component
{
    public $name;

    protected $rules = [
        'name' => ['required']
    ];

    protected $messages = [
        'name.required' => 'Nama jenis tidak boleh kosong'
    ];

    protected $listeners = [
        'showEdit:cure-type' => 'edit',
        'modal:close' => 'modalClose',
        'store:cure-type' => 'store',
        'update:cure-type' => 'update',
    ];

    public function edit(CureType $cureType)
    {
        $this->name = $cureType->name;
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
        CureType::create($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function update(CureType $cureType)
    {
        $cureType->update($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.cure-type.show-cure-type-form');
    }
}
