<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\challenge;
use App\Http\Controllers\ChatController;
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
Route::post('addproduct',[\App\Http\Controllers\ProductController::class,'addproduct'])->middleware('admin');
Route::get('updatepayment/{id}',[\App\Http\Controllers\OrderController::class,'UpdatePayment'])->middleware('admin');

Route::get('GetCategory',[\App\Http\Controllers\ProductController::class,'GetCategoryProduct']);
Route::get('GetProduct/{id}',[\App\Http\Controllers\ProductController::class,'GetProductFromId']);
Route::post('register',[\App\Http\Controllers\UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('/admin',[Admin::class,'logAdmin']);
Route::get('logout',[UserController::class,'logout'])->middleware('auth:sanctum');
Route::post('forgot',[UserController::class,'forgot']);
Route::post('check_code',[UserController::class,'verfiyReset']);
Route::post('reset',[UserController::class,'reset']);
Route::post('verify',[verifyController::class,'verify'])->name('verify')->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function (){
    Route::get('DeleteOrder/{id}',[\App\Http\Controllers\OrderController::class,'DeleteOrder']);
    Route::get('searchproduct/{id}',[\App\Http\Controllers\ProductController::class,'SearchProduct']);
    Route::get('getorderwithproduct/{id}',[\App\Http\Controllers\OrderController::class,'Getorderwithproducet']);
    Route::post('addtocart/{id}',[\App\Http\Controllers\OrderController::class,'AddToCart']);
    Route::get('getorder/{id}',[\App\Http\Controllers\OrderController::class,'GetOrder']);
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
    //Route::post('add',[\App\Http\Controllers\Admin::class,'Add']);
    /////
    Route::get('getCoach',[\App\Http\Controllers\Coach::class,'GetCoach']);
    ////
    Route::post('advice',[\App\Http\Controllers\Coach::class,'advice'])->middleware('couch');
    ////
    Route::get('Get/{id}',[\App\Http\Controllers\Coach::class,'getadvice']);
    /////
    Route::get('experience/{id}/{rating}',[\App\Http\Controllers\Coach::class,'good']);
    /////
    Route::post('Favorite',[UserController::class,'Favorite']);

    Route::get('AllFavorite',[UserController::class,'AllFavorit']);

    ///////
    Route::get('GetFavorite/{id}',[UserController::class,'GetFavorite']);
    ///////
    Route::get('/deleteFav/{id}',[UserController::class,'delFavorite']);
    ///////
    Route::post('challenge',[\App\Http\Controllers\challenge::class,'addchallenge'])->middleware('admin');
    ////////
    Route::post('/is_done',[TestController::class,'verfiyCategory']);
    ///////
    Route::get('/record',[TestController::class,'getRecord']);
    //////
    Route::post('add',[\App\Http\Controllers\UserController::class,'Add']);
    ///////
    Route::get('exercise',[ExerciseController::class,'index']);
    //////
    Route::post('exercise',[ExerciseController::class,'store'])->middleware('admin');
    ////
    Route::get('search/{id}',[ExerciseController::class,'Search']);
    ////
    Route::resource('level', LevelsController::class);
    ////
    Route::resource('categaroy',CategoryController::class);
    ///
    Route::post('TargetWeight',[\App\Http\Controllers\ProgressController::class,'TargetWeight']);
    Route::get('GetDetails/{id}',[\App\Http\Controllers\ProgressController::class,'GetDetails']);
    Route::post('calculate',[\App\Http\Controllers\ProgressController::class,'calculate']);
    Route::get('Plan/{id}',[UserController::class,'GetPlan']);
    Route::get('GetWeek',[UserController::class,'GetWeek']);
    Route::get('PlanForUser/{id}',[UserController::class,'PlanForUser']);
    Route::post('UpdatePlane/{id}',[UserController::class,'UpdatePlane']);
    Route::get('GetWeightLossExercises',[UserController::class,'GetWeightLossExercise']);
    Route::get('PlanForWeightLoss/{id}',[UserController::class,'PlanforWeightLoss']);
    Route::post('UpdatePlaneForWeightLoss/{id}',[UserController::class,'UpdatePlaneForWeightLoss']);
});
Route::post('/chat', [ChatController::class, 'chat']);
//Route::get('getexe',[ExerciseController::class,'Getexe']);
Route::post('image',[UserController::class,'image']);
Route::get('adminLogout',[Admin::class,'logout'])->middleware('admin');
//Route::get('addFavorite/{id}',[UserController::class,'Favorite']);
//Route::post('advice',[\App\Http\Controllers\coach::class,'advice']);///////

