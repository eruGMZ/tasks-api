<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase base para los repositorios.
 */
abstract class BaseRepository
{
    public function __construct(protected Model $model) {}

    /**
     * Devuelve una consulta para listar los registros del modelo.
     * 
     * @param array<int, string> $relations
     */
    public function list(array $relations = []): Builder
    {
        return $this->model->query()->with($relations);
    }

    /**
     * Crea un nuevo registro en la base de datos.
     * 
     * @param array<string, mixed> $data
     */
    public function addNew(array $data): Model
    {
        return $this->model->create($data);
    }
}
