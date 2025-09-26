<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\BaseRepository;

class TaskService extends BaseRepository
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function getClassModel(): string
    {
        return $this->model::class;
    }

    public function getTasks(array $relations = [])
    {
        return $this->list($relations)->with($relations)->get();
    }

    public function createTask(array $data): array
    {
        $task = $this->addNew($data);

        return $this->formatTaskResponse($task->load(['user', 'company']));
    }

    public function formatTaskResponse($task): array
    {
        return [
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'user' => $task->user->name,
            'company' => [
                'id' => $task->company->id,
                'name' => $task->company->name,
            ]
        ];
    }
}
