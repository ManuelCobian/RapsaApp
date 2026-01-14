<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Income;
use App\Models\Provider;

class IncomeServices
{

    public function createIncome(array $data): Income
    {
        return DB::transaction(function () use ($data) {
            $income = Income::create([
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

    public function updateIncome(array $data, Income $income): Income
    {
        return DB::transaction(function () use ($data, $income) {
            return tap($income)->update($data)->refresh();
        });
    }

    
    public function getTotalIncome($date = ""): Float
    {
        $query = Income::sum('amount');
        if ($date) {
            $query = Income::whereDate('date', $date)->sum('amount');
        }
        return (float) $query;
    }
}
