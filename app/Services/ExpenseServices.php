<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Expense;
use App\Models\Provider;
use phpDocumentor\Reflection\Types\Float_;

class ExpenseServices
{
    public function createIncome(array $data): Expense
    {
        return DB::transaction(function () use ($data) {
            $income = Expense::create([
                'concept' => $data['concept'],
                'description' => $data['description'],
                'amount' => $data['amount'],
                'date' => $data['date_created'],
                'provider_id' => $data['provider_id'],
            ]);
            $income->provider()->associate($data['provider_id']);
            return $income;
        });
    }

    public function updateIncome(array $data, Expense $expense): Expense
    {
        return DB::transaction(function () use ($data, $expense) {
            return tap($expense)->update($data)->refresh();
        });
    }

    public function getTotalExpense(Provider $provider): Float
    {
        return (float) Expense::where('provider_id', $provider->id)
            ->sum('amount');
    }
}
