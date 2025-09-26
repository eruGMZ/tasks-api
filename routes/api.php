<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// endpoint para obtener todas las compañias
Route::get('companies', [CompanyController::class, 'index']);

// Endpoint para todas las tareas
Route::get('tasks', [TaskController::class, 'index']);

// Endpoint solo para crear tareas
Route::post('tasks/create', [TaskController::class, 'store']);
