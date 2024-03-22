<?php

use App\Http\Controllers\Workout\CategoryController;
use App\Http\Controllers\Workout\ExerciseController;
use App\Http\Controllers\Workout\LevelsController;
use App\Models\Category;
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
Route::get('search/{id}',[\App\Http\Controllers\Search::class,'Search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::post('add',[\App\Http\Controllers\Admin::class,'Add']);
});
Route::get('search/{id}',[\App\Http\Controllers\Search::class,'Search']);
Route::post('add',[\App\Http\Controllers\UserController::class,'Add']);
Route::resource('level', LevelsController::class);
Route::resource('exercise',CategoryController::class);
Route::resource('category',ExerciseController::class);
Route::get('categaroy/get', [ExerciseController::class,'index']);
