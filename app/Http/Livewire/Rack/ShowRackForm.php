<?php

namespace App\Http\Livewire\Rack;

use App\Models\Rack;
use Livewire\Component;

class ShowRackForm extends Component
{
    public $name;

    protected $rules = [
        'name' => ['required']
    ];

    protected $messages = [
        'name.required' => 'Nama rak tidak boleh kosong'
    ];

    protected $listeners = [
        'showEdit:rack' => 'edit',
        'modal:close' => 'modalClose',
        'store:rack' => 'store',
        'update:rack' => 'update',
    ];

    public function edit(Rack $rack)
    {
        $this->name = $rack->name;
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
        $rack = Rack::create($this->validate());
        $this->emit('refresh:table');
        $this->dispatchBrowserEvent('modal-hide');
        $this->resetForm();
    }

    public function update(Rack $rack)
    {
        $rack->update($this->validate());
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
        return view('livewire.rack.show-rack-form');
    }
}
