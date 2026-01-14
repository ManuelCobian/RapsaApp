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


    public function getTotalIncome(Provider $provider): Float
    {
        return (float) Income::where('provider_id', $provider->id)
            ->sum('amount');
    }
}
