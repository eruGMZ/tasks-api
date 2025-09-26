<?php

namespace App\Traits;

use Closure;

trait SeederData
{
    /**
     * Create data in the database if it does not already exist.
     *
     * @param array $data The data to be inserted.
     * @param string $modelRef The model class reference.
     * @param Closure|null $callback Optional callback to customize the query for checking existing records.
     * @return bool Returns true if the operation is successful.
     * @throws \Throwable Throws an exception if an error occurs during the operation.
     */
    public function createData(array $data, string $modelRef, ?Closure $callback = null): bool
    {
        try {
            foreach ($data as $value) {

                $builder = $modelRef::query();

                if (is_callable($callback)) {   // if a callback function is provided

                    $builder = $callback($builder, $value);
                    
                    if ($builder->exists()) continue;  // and if the record exists, skip to the next iteration
                }

                $modelRef::create($value);
            }

            return true;
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
