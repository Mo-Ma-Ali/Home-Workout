<?php

namespace App\Http\Controllers\Workout;

use App\Http\Controllers\Controller;
use App\Models\Levels;
use Illuminate\Http\Request;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Levels::all();
        return response()->json(['message'=>'first page','levels'=>$levels]);
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
        Levels::insert([
            ['level' => 'easy'],
            ['level' => 'medium'],
            ['level' => 'hard'],
        ]);

        return response()->json(['message' => 'Levels created successfully']);
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
