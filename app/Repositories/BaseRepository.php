<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function __construct(protected Model $model) {}

    public function list(array $relations = []): Builder
    {
        return $this->model->query()->with($relations);
    }

    public function addNew(array $data): Model
    {
        return $this->model->create($data);
    }
}
