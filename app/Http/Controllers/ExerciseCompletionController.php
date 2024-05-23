<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\ExerciseCompletion;
use App\Models\Progress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseCompletionController extends Controller
{

    public function verifyExercise(Request $request)
    {
        $user = Auth::id();
        $user_ = Auth::user();
        $exercise_id = $request->input('exercise_id');
        $is_done = $request->input('is_done');

        $ExerciseCompletion = ExerciseCompletion::where('user_id', $user)
            ->where('created_at', '>=', now()->startOfDay())
            ->where('exercise_id', $exercise_id)
            ->first();

        if ($ExerciseCompletion) {
            if ($ExerciseCompletion->is_done) {
                return response()->json(['message' => 'The exercise for this day is already marked as done'], 200);
            } else if(!$ExerciseCompletion->is_done&&$is_done==true) {
                    $user_->points+=30;
                    $user_->save();
                $ExerciseCompletion->update(['is_done' => $is_done]);
                return response()->json(['message' => 'The exercise is completed. Well done!'], 200);
            }
        } else {
            ExerciseCompletion::create([
                'user_id' => $user,
                'exercise_id' => $exercise_id,
                'is_done' => $is_done
            ]);
            if ($is_done)
            {
                $user_->points+=30;
                $user_->save();
            }
            return response()->json(['message' => 'The exercise has been recorded successfully'], 201);
        }
    }


    function getExerciseRecord()
    {
     $user=Auth::id();
     $record=ExerciseCompletion::where('user_id',$user)->get();
     $exercise_id = $record->pluck('exercise_id')->toArray();
     $exerciseNames = Exercise::whereIn('id', $exercise_id)->pluck('name')->toArray();
     $exerciseRecords = [];
     foreach ($record as $records) {
         $exerciseRecords[] = [
             "id"=> $records->id,
             "user_id"=> $records->user_id,
             'exercise_id' => $records->exercise_id,
             'exercise_name' => $exerciseNames[array_search($records->exercise_id, $exercise_id)],
             "is_done"=> $records->is_done,

         ];
     }
     return response()->json(['message' => 'completed exercises','data'=>$exerciseRecords]);
    }

    public function recordForCouch(Request $request)
    {
        $user_id = $request->input('user_id');
        $record=ExerciseCompletion::where('user_id',$user_id)->get();
        $exercise_id = $record->pluck('exercise_id')->toArray();
        $exerciseNames = Exercise::whereIn('id', $exercise_id)->pluck('name')->toArray();
        $exerciseRecords = [];
        foreach ($record as $records) {
            $exerciseRecords[] = [
                "id"=> $records->id,
                "user_id"=> $records->user_id,
                'exercise_id' => $records->exercise_id,
                'exercise_name' => $exerciseNames[array_search($records->exercise_id, $exercise_id)],
                "is_done"=> $records->is_done,

            ];
        }
        return response()->json(['message' => 'completed exercises','data'=>$exerciseRecords]);
    }
}
