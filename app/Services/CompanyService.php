<?php

namespace App\Services;

use App\Models\Company;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CompanyService extends BaseRepository
{    
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function getClassModel(): string
    {
        return $this->model::class;
    }

    public function getCompanies($relations = []): Collection
    {
        return $this->list($relations)->get();
    }

    public function formatCompanyResponse($company): array
    {
        return [
            'id' => $company->id,
            'name' => $company->name,
            'tasks' => $company->tasks->map(function ($task) {
                return [
                    'id' => $task->id,
                    'name' => $task->name,
                    'description' => $task->description,
                    'user' => $task->user->name,
                    'is_completed' => $task->is_completed,
                    'start_at' => $task->start_at,
                    'expired_at' => $task->expired_at
                ];
            })
        ];
    }
}
