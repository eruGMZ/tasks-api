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

// --------------------------------------- API Routes ---------------------------------------

// Endpoint to get all companies
Route::get('companies', [CompanyController::class, 'index']);

// Endpoint to get all tasks 
Route::get('tasks', [TaskController::class, 'index']);  

// Endpoint to create a new task
Route::post('tasks', [TaskController::class, 'store']);
