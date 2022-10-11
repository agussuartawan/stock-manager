<?php

namespace App\Http\Livewire\Unit;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\CureUnit;

class UnitsTable extends DataTableComponent
{
    protected $model = CureUnit::class;

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
                        'action' => '$emit("create:unit")'
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
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            LinkColumn::make('Aksi')
            ->title(fn ($row) => 'edit')
            ->location(fn ($row) => '#')
            ->attributes(fn ($row) => [
                'class' => 'badge rounded-pill bg-primary',
                'title' => 'Edit ' . $row->name,
                "wire:click" => '$emit(`edit:unit`,' . $row->id . ')'
            ]),
        ];
    }
}
