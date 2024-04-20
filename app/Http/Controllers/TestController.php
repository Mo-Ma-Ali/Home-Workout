<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkoutCompletion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
   function verfiyCategory(Request $request)
   {
       $level_id=$request->input('level_id');
       $category_id = $request->input('category_id');
       $isDone=$request->input('is_done');
       $user_id=Auth()->user();
    $verifiedCategory = WorkoutCompletion::where('created_at', '>=', now()->startOfDay())
    ->where('user_id',
    $user_id->id)
    ->where('Level_id',$level_id)
    ->where('category_id',$category_id)
    ->exists();
    if(!$isDone&&!$verifiedCategory)
    return response()->json(['message'=>"don't west time again"],200);
if($verifiedCategory)
return response()->json(['message' => 'Workout already completed for today'],200);
WorkoutCompletion::create([
    'user_id' => $user_id->id,
    'Level_id'=>$level_id,
    'category_id'=>$category_id,
    'is_done' => $isDone,
    'created_at' => now()
]);
return response()->json(['message' => 'Workout verification recorded successfully'],200);
   }




   function getRecord()
   {
    $user=Auth::id();
    $record=WorkoutCompletion::where('user_id',$user)->get();
    return response()->json(['message' => 'completed category','data'=>$record]);
   }


}
