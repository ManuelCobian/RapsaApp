<?php

namespace Database\Factories;

use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    
    protected $model = Income::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $concepts = ['Venta', 'Servicio', 'Depósito', 'Suscripción', 'Reembolso'];
         return [
            'amount' => $this->faker->randomFloat(2, 50, 25000),
            'description' => $this->faker->optional()->sentence(6),
            'concept' => $this->faker->randomElement($concepts),
            'date' => $this->faker->dateTimeBetween('-3 months', 'now'),
        ];
    }
}
