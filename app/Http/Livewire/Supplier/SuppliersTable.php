<?php

namespace App\Http\Livewire\Supplier;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Supplier;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class SuppliersTable extends DataTableComponent
{
    protected $model = Supplier::class;

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
                        'action' => '$emit("create:supplier")'
                    ]
                ],
            ])            
            ->setThAttributes(function(Column $column) {
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
                ->sortable(),
            Column::make("Alamat", "address")
                ->sortable(),
            Column::make("Telp", "phone")
                ->sortable(),
            LinkColumn::make('Aksi')
                ->title(fn ($row) => 'edit')
                ->location(fn ($row) => '#')
                ->attributes(fn ($row) => [
                    'class' => 'badge rounded-pill bg-primary',
                    'title' => 'Edit ' . $row->name,
                    "wire:click" => '$emit(`edit:supplier`,' . $row->id . ')'
                ]),
        ];
    }
}
