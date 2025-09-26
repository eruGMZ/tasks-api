<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TasksPerUser implements ValidationRule
{
    /**
     * Validate that a user does not have more than 5 pending tasks.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::find($value);
        
        if ($user && $user->tasks()->where('is_completed', false)->count() >= 5) {
            $fail('El usuario no puede tener más de 5 tareas pendientes.');
        }
    }
}