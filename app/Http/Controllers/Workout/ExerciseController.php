<?php

namespace App\Http\Controllers\Workout;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
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
    $validatedData = $request->validate([
        'Level_id' => 'required|integer',
        'category_id' => 'required|integer',
        'name' => 'required|string',
        'description' => 'required|string',
        'image' => 'required|string',
        'video' => 'required|string',
    ]);

    $exercise = Exercise::create($validatedData);

    return response()->json(['message' => 'Exercise created successfully', 'exercise' => $exercise], 201);
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
