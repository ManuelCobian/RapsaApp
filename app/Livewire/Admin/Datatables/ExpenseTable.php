<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ExpenseTable extends DataTableComponent
{
    public function builder(): Builder
    {
        $user = auth()->user();
        $provider = auth()->user()->providers()->first();
        $query = Expense::query()->with('provider');

        if (!$user->hasRole('SuperUsuario')) {
            $query->whereHas('provider', function ($q) use ($provider) {
                $q->whereKey($provider->getKey()); // where('users.id', $user->id)
            });
        }
        return $query;
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
            Column::make("Amount", "amount")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Concept", "concept")
                ->sortable(),
            
            Column::make("Fecha de Creación")
                ->sortable(
                    fn(Builder $query, $direction) =>
                    $query->orderBy('date', $direction)
                )
                ->label(
                    fn($row) =>
                    Carbon::parse($row->created_at)->format('d/m/Y')
                ),

            Column::make("Acciones")->label(
                fn($row) =>
                view('admin.expenses.actions', ['expense' => $row])
            ),

        ];
    }
}
