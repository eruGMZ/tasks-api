<?php

namespace Database\Seeders;

use App\Services\TaskService;
use App\Traits\SeederData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    use SeederData;

    public function __construct(private TaskService $service) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'name' => 'Task 1',
                'description' => 'Task content 1',
                'user_id' => 1,
                'company_id' => 1,
                'is_completed' => false,
                'start_at' => now(),
                'expired_at' => now(),
            ],
            [
                'name' => 'Task 2',
                'description' => 'Task content 2',
                'user_id' => 1,
                'company_id' => 1,
                'is_completed' => true,
                'start_at' => now(),
                'expired_at' => null,
            ],
            // [more tasks...]
        ];

        $this->createData($tasks, $this->service->getClassModel(), function (Builder $query, $value) {
            return $query->where('name', $value['name']);
        });
    }
}
