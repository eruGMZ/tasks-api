<?php

namespace App\Http\Requests;

use App\Rules\TasksPerUser;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => ['required', 'exists:users,id', new TasksPerUser],
            'company_id' => 'required|exists:companies,id',
        ];
    }
}