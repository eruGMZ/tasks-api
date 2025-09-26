<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function __construct(private TaskService $service) {}

    public function index(): JsonResponse
    {
        $tasks = $this->service->getTasks(['user', 'company']);
        return response()->json(['data' => $tasks->map(fn ($task) => $this->service->formatTaskResponse($task))]);
    }

    public function store(TaskRequest $request): JsonResponse
    {
        $task = $this->service->createTask($request->validated());
        return response()->json($task, 201);
    }
}