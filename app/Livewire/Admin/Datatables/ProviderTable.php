<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;

class ProviderTable extends DataTableComponent
{

    public function builder(): Builder
    {
        return Provider::query()->with(['user']);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),

            Column::make("Email", "user.email")
                ->sortable(),
          
        ];
    }
}
