<?php

namespace App\Livewire\Admin;

use App\Services\ExpenseServices;
use App\Services\IncomeServices;
use Livewire\Component;

class Dashboard extends Component
{

    public ?string $dateSearch = null;

    public float $totalIncome = 0;
    public float $totalExpense = 0;
    public float $total = 0;

    public function mount()
    {
        // carga inicial (sin fecha)
        $this->calculateTotals();
    }

    public function updatedDateSearch($value)
    {
        // se ejecuta AUTOMÁTICAMENTE cuando cambia el datepicker
        $this->calculateTotals();
    }

    protected function calculateTotals()
    {
        $incomeServices = app(IncomeServices::class);
        $expenseServices = app(ExpenseServices::class);

        $this->totalIncome  = $incomeServices->getTotalIncome($this->dateSearch);
        $this->totalExpense = $expenseServices->getTotalExpense($this->dateSearch);
        $this->total        = $this->totalIncome - $this->totalExpense;
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
