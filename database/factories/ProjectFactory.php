<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'tax' => $this->faker->numberBetween(1, 100),
            'depreciation' => $this->faker->numberBetween(1, 100),
            'invest_capital' => $this->faker->numberBetween(200, 900) * 1800,
            'invest_noncapital' => $this->faker->numberBetween(200, 900) * 1800,
            'user_id' => User::all()->random()->id,
            'site_manager' => $this->faker->name()
        ];
    }
}
