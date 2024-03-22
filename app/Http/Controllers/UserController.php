<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Add(Request $request)
    {
        $request->validated();
        $user=detail::query()->create([
            'age'=>$request->age,
            'weight'=>$request->weight,
            'height'=>$request->height,
        ]);
        return response()->json(['data'=>$user],201);
    }
}
