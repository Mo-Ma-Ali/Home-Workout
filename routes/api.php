<?php

use App\Http\Controllers\challenge;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\verifyController;
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
Route::post('login',[UserController::class,'login']);
Route::get('logout',[UserController::class,'logout'])->middleware('auth:sanctum');
Route::post('forgot',[UserController::class,'forgot']);
Route::post('check_code',[UserController::class,'verfiyReset']);
Route::post('reset',[UserController::class,'reset']);
Route::post('verify',[verifyController::class,'verify'])->name('verify')->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function (){
    ///////
    Route::get('/user',[UserController::class,'getUser']);
    ///////
    Route::get('/allchallenges',[challenge::class,'returnAll']);
    Route::get('getchallenge/{name}',[\App\Http\Controllers\challenge::class,'Getchallenge']);
    //////
    Route::get('getChallInfo/{challenge_id}',[challenge::class,'getChallInfo']);
    ////////
    Route::get('/enroll/{challenge_id}',[challenge::class,'enroll']);
    ////////
    Route::put('/completed/{challenge_id}',[challenge::class,'endOfChallenge']);
    ///////
    Route::post('challenge',[\App\Http\Controllers\challenge::class,'addchallenge'])->middleware('admin');
    //Route::post('add',[\App\Http\Controllers\Admin::class,'Add']);
    Route::post('advice',[\App\Http\Controllers\Coach::class,'advice']);
    Route::get('Get/{id}',[\App\Http\Controllers\Coach::class,'getadvice']);
    Route::post('Favorite',[UserController::class,'Favorite']);
    Route::get('GetFavorite/{id}',[UserController::class,'GetFavorite']);
    ////////
    Route::post('/is_done',[TestController::class,'verfiyCategory']);
    ///////
    Route::get('/record',[TestController::class,'getRecord']);
    //////
    Route::post('add',[\App\Http\Controllers\UserController::class,'Add']);
    ///////
    Route::resource('exercise',ExerciseController::class);
    Route::post('calculate',[\App\Http\Controllers\ProgressController::class,'calculate']);
    Route::post('TargetWeight',[\App\Http\Controllers\ProgressController::class,'TargetWeight']);
    ////
    Route::get('search/{id}',[ExerciseController::class,'Search']);
    ////
    Route::resource('level', LevelsController::class);
    ////
    Route::resource('categaroy',CategoryController::class);
});
Route::get('getexe',[ExerciseController::class,'Getexe']);
Route::post('image',[UserController::class,'image']);
Route::get('addFavorite/{id}',[UserController::class,'Favorite']);
Route::get('good/{id}',[\App\Http\Controllers\Coach::class,'good']);
Route::get('getCoach',[\App\Http\Controllers\Coach::class,'GetCoach']);


Route::post('advice',[\App\Http\Controllers\coach::class,'advice']);

