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


}
