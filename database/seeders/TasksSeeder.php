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
            ],
            [
                'name' => 'Task 2',
                'description' => 'Task content 2',
                'user_id' => 1,
                'company_id' => 2,
                'is_completed' => true,
            ],
            [
                'name' => 'Task 3',
                'description' => 'Task content 3',
                'user_id' => 2,
                'company_id' => 1,
                'is_completed' => false,
            ],
            [
                'name' => 'Task 4',
                'description' => 'Task content 4',
                'user_id' => 2,
                'company_id' => 2,
                'is_completed' => false,
            ],
            [
                'name' => 'Task 5',
                'description' => 'Task content 5',
                'user_id' => 3,
                'company_id' => 1,
                'is_completed' => true,
            ]
        ];

        $this->createData($tasks, $this->service->getClassModel(), function (Builder $query, $value) {
            return $query->where('name', $value['name']);
        });
    }
}
