<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;

class ProviderFullTable extends DataTableComponent
{

    public ?string $date = null;

    public function mount($date = null)
    {
        $this->date = $date;
    }
    public function builder(): Builder
    {
        return Provider::query()
            ->with(['user'])
            ->when($this->date, function ($q) {
                $q->where(function ($qq) {
                    $qq->whereHas('income', fn($i) => $i->whereDate('date_created', $this->date))
                        ->orWhereHas('expenses', fn($e) => $e->whereDate('date_created', $this->date));
                });
            })
            ->withSum(['income as total_income' => function ($q) {
                $q->when($this->date, fn($qq) => $qq->whereDate('date_created', $this->date));
            }], 'amount')
            ->withSum(['expenses as total_expense' => function ($q) {
                $q->when($this->date, fn($qq) => $qq->whereDate('date_created', $this->date));
            }], 'amount');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Proveedor", "name")
                ->sortable()
                ->searchable(),

            Column::make("Ingresos")
                ->label(function ($row) {
                    $income = (float) ($row->total_income ?? 0);
                    return '<span class="font-semibold text-green-600">'
                        . $this->money($income)
                        . '</span>';
                })
                ->sortable(fn(Builder $q, string $dir) => $q->orderBy('total_income', $dir))
                ->html(),

            Column::make("Gastos")
                ->label(function ($row) {
                    $expense = (float) ($row->total_expense ?? 0);
                    return '<span class="font-semibold text-red-600">'
                        . $this->money($expense)
                        . '</span>';
                })
                ->sortable(fn(Builder $q, string $dir) => $q->orderBy('total_expense', $dir))
                ->html(),

            Column::make("Utilidad Neta")
                ->label(function ($row) {
                    $income  = (float) ($row->total_income ?? 0);
                    $expense = (float) ($row->total_expense ?? 0);
                    $net = $income - $expense;

                    $class = $net >= 0 ? 'text-green-600' : 'text-red-600';

                    return '<span class="font-bold ' . $class . '">'
                        . $this->money($net)
                        . '</span>';
                })
                ->sortable(function (Builder $q, string $dir) {
                    $q->orderByRaw('(COALESCE(total_income,0) - COALESCE(total_expense,0)) ' . $dir);
                })
                ->html(),

           
        ];
    }

    private function money(float $amount): string
    {
        return '$' . number_format($amount, 2);
    }
}
