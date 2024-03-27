<?php

use App\Http\Controllers\challenge;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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

Route::post('register',[\App\Http\Controllers\UserController::class,'register']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user',[UserController::class,'getUser']);
    Route::get('/allchallenges',[challenge::class,'returnAll']);
    Route::get('getchallenge/{name}',[\App\Http\Controllers\challenge::class,'Getchallenge']);
    Route::get('getChallInfo/{challenge_id}',[challenge::class,'getChallInfo']);
    Route::get('/enroll/{challenge_id}',[challenge::class,'enroll']);
    Route::put('/completed/{challenge_id}',[challenge::class,'endOfChallenge']);
    Route::post('challenge',[\App\Http\Controllers\challenge::class,'addchallenge'])->middleware('admin');
    Route::post('add',[\App\Http\Controllers\Admin::class,'Add']);
    Route::post('advice',[\App\Http\Controllers\Coach::class,'advice']);
    Route::get('Get/{id}',[\App\Http\Controllers\Coach::class,'getadvice']);

    Route::post('/is_done',[TestController::class,'verfiyCategory']);
    Route::get('/record',[TestController::class,'getRecord']);
    Route::resource('exercise',ExerciseController::class);
});

Route::get('good/{id}',[\App\Http\Controllers\Coach::class,'good']);
Route::get('getCoach',[\App\Http\Controllers\Coach::class,'GetCoach']);


Route::get('search/{id}',[ExerciseController::class,'Search']);
Route::post('add',[\App\Http\Controllers\UserController::class,'Add']);
Route::resource('level', LevelsController::class);
Route::resource('categaroy',CategoryController::class);

Route::post('advice',[\App\Http\Controllers\coach::class,'advice']);

