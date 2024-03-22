<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function Add(Request $request)
    {
        $request->validated();
        $ex=Exercise::query()->create([
            'name'=>$request->name,
            'description'=>$request->description,
            'date'=>$request->date,
            'video'=>$request->video,
        ]);
        return response()->json(['Exercise'=>$ex],201);
    }
}
