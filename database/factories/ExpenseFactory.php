<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{

    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $concepts = ['Renta', 'Nómina', 'Gasolina', 'Papelería'];

         return [
            'amount' => $this->faker->randomFloat(2, 20, 20000),
            'description' => $this->faker->optional()->sentence(6),
            'concept' => $this->faker->randomElement($concepts),
            'date' => $this->faker->dateTimeBetween('-3 months', 'now'),
        ];
    }
}
