<?php

namespace App\Http\Livewire\Customer;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Customer;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class CustomersTable extends DataTableComponent
{
    protected $model = Customer::class;

    protected $listeners = ['refresh:table' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setEmptyMessage('Tidak ada data')
            ->setDefaultSort('id', 'desc')
            ->setTableAttributes([
                'class' => 'bg-white rounded-3 table-hover',
            ])
            ->setSortingPillsDisabled()
            ->setConfigurableAreas([
                'toolbar-right-start' => [
                    'include.btn-add', [
                        'action' => '$emit("create:customer")'
                    ]
                ],
            ])
            ->setThAttributes(function (Column $column) {
                if ($column->isField('Aksi')) {
                    return [
                        'width' => '10%',
                    ];
                }

                return [];
            });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nama", "name")
                ->sortable()
                ->searchable(),
            Column::make("Alamat", "address")
                ->sortable()
                ->searchable(),
            Column::make("Telp", "phone")
                ->sortable()
                ->searchable(),
            LinkColumn::make('Aksi')
                ->title(fn ($row) => 'edit')
                ->location(fn ($row) => '#')
                ->attributes(fn ($row) => [
                    'class' => 'badge rounded-pill bg-primary',
                    'title' => 'Edit ' . $row->name,
                    "wire:click" => '$emit(`edit:customer`,' . $row->id . ')'
                ]),
        ];
    }
}