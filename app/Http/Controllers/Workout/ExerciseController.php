<?php

namespace App\Http\Controllers\Workout;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use GuzzleHttp\Psr7\Response;
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

        $exercise = Exercise::where('Level_id', $level_id)
                            ->where('category_id', $category_id)
                            ->get();

        if(!$exercise->isEmpty())
        return response()->json(['message' => 'third page', 'Categories' => $exercise], 200);
    return response()->json(['message' => 'third page', 'Categories' => 'not found'], 404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Exercise::insert(
            [
                [
                    'Level_id'=>1,
                    'category_id'=>1,
                    'name' => 'Push-up',
                    'description' => 'A basic exercise for the chest and arms.',
                    'image' => 'push_up.jpg',
                    'video' => 'push_up_video.mp4',
                ],
                [
                    'Level_id'=>1,
                    'category_id'=>1,
                    'name' => 'Squats',
                    'description' => 'Great for the legs and glutes.',
                    'image' => 'squats.jpg',
                    'video' => 'squats_video.mp4',
                ],
                [
                    'Level_id'=>1,
                    'category_id'=>1,
                    'name' => 'Plank',
                    'description' => 'Core-strengthening exercise.',
                    'image' => 'plank.jpg',
                    'video' => 'plank_video.mp4',
                ],
            ]
            );
            return response()->json(['massage'=>'done'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
