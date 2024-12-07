<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Consultant;
use App\Models\Employment;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultant>
 */
class ConsultantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Consultant::class;

    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'reimbursement' => $this->faker->numberBetween(1000, 10000),
            'availability' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
            'client_id' => Client::inRandomOrder()->first()->id,
            'employment_id' => Employment::inRandomOrder()->first()->id,
            'skill_id' => Skill::inRandomOrder()->first()->id,
            'image' => 'default.png',
        ];
    }
}
