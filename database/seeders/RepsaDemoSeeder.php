<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepsaDemoSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::query()->take(5)->get();

        if ($users->isEmpty()) {
            $users = User::factory()->count(3)->create();
        }

        foreach ($users as $user) {

            $providers = Provider::factory()
                ->count(2)
                ->for($user)
                ->create();

            foreach ($providers as $provider) {
                if ($user->hasRole('Proveedor')) {
                    Income::factory()
                        ->count(30)
                        ->for($provider, 'provider')
                        ->create();

                    Expense::factory()
                        ->count(30)
                        ->for($provider, 'provider')
                        ->create();
                }
            }
        }
    }
}
