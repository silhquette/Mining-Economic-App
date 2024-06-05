<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cashflow>
 */
class CashflowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'year' => $this->faker->unique()->year(),
            'production' => $this->faker->numberBetween(200, 900),
            'income' => $this->faker->numberBetween(200, 900) * 100,
            'opex' => $this->faker->numberBetween(200, 900) * 100,
            'taxable_income' => $this->faker->numberBetween(200, 900) * 100,
            'net_cashflow' => $this->faker->numberBetween(200, 900) * 100,
            'project_id' => Project::all()->random()->id,
        ];
    }
}
