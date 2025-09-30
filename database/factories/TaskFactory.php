<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * define el modelo de la fábrica.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'is_completed' => $this->faker->boolean(30), // la probabilidad de que esté completada es del 30%
            'start_at' => $this->faker->optional()->dateTimeBetween('-1 week', '+1 week'),
            'expired_at' => $this->faker->optional()->dateTimeBetween('+1 week', '+1 month'),
        ];
    }
}