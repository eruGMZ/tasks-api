<?php

namespace App\Traits;

use Closure;

trait SeederData
{

    public function createData(array $data, string $modelRef, ?Closure $callback): bool
    {
        try {
            foreach ($data as $value) {

                $builder = $callback($modelRef::query(), $value);    // si se pasa un callback, se ejecuta

                if ($builder->get()->count() > 0) continue; // si existe algun registro con el parametro ingresado, no crear (evita duplicados)

                $modelRef::create($value);
            }

            return true;
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
