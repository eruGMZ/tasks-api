<?php

namespace App\Services;

use App\Models\Company;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CompanyService extends BaseRepository
{    
    /**
     * Inyectando el modelo Company en el constructor padre.
     */
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    /**
     * Devuelve el nombre de la clase del modelo asociado al servicio.
     */
    public function getClassModel(): string
    {
        return $this->model::class;
    }

    /**
     * Obtiene todas las compañías con sus relaciones opcionales.
     * 
     * @param array $relations
     * @return Collection
     */
    public function getCompanies($relations = []): Collection
    {
        return $this->list($relations)->get();
    }

    /**
     * Formatea la respuesta de una compañía con sus tareas.
     * 
     * @param Company $company
     * @return array
     */
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
