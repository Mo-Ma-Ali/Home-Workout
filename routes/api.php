<?php

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
