<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class TaskService extends BaseRepository
{
    /**
     * Inyectando el modelo Company en el constructor padre.
     */
    public function __construct(Task $model)
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
     * Obtiene todas las tareas con sus relaciones opcionales.
     * 
     * @param array $relations
     * @return Collection
     */
    public function getTasks(array $relations = []): Collection
    {
        return $this->list($relations)->get();
    }

    /**
     * Crea una nueva tarea y devuelve su representación formateada.
     * 
     * @param array $data
     * @return array
     */
    public function createTask(array $data): array
    {
        $task = $this->addNew($data);

        return $this->formatTaskResponse($task->load(['user', 'company']));
    }

    /**
     * Formatea la respuesta de una tarea con su usuario y compañía.
     * 
     * @param Task $task
     * @return array
     */
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
