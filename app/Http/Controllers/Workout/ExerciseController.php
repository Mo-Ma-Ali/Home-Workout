<?php

namespace App\Http\Controllers\Workout;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\WorkoutCompletion;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $level_id = $request->query('level_id');
        $category_id = $request->query('category_id');

        $exercises = Exercise::where('Level_id', $level_id)
                            ->where('category_id', $category_id)
                            ->get();

        if($exercises->isEmpty())
            return response()->json(['message' => 'third page', 'Categories' => 'not found'], 404);

            $userId = 1;
            $completedCount = WorkoutCompletion::where('user_id', $userId)->
                                                        where('Level_id',$level_id)->
                                                        where('category_id',$category_id)
                                                        ->count();
    //Note: add the next day to apply the addition later
            if($completedCount < 8)
            $percentageIncrease = ($completedCount * 1.5);
            else
            $percentageIncrease = 12;
            foreach ($exercises as $exercise) {
                $exercise->date += $percentageIncrease;
                $exercise->date = intval($exercise->date);
            }
        return response()->json(['message' => 'third page', 'Categories' => $exercises], 200);
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'Level_id' => 'required|integer',
        'category_id' => 'required|integer',
        'name' => 'required|string',
        'description' => 'required|string',
        'date'=> 'required|integer',
        'video' => 'required|string',
    ]);
    $existingExercise = Exercise::where([
        'Level_id' => $validatedData['Level_id'],
        'category_id' => $validatedData['category_id'],
        'name' => $validatedData['name'],
    ])->first();

    if ($existingExercise) {
        return response()->json(['message' => 'The exercise already exists'], 409);
    }
    $exercise = Exercise::create($validatedData);

    return response()->json(['message' => 'Exercise created successfully', 'exercise' => $exercise], 201);
}

}
