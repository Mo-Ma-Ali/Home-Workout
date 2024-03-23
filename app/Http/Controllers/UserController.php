<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function register(Request $request)
    {
        $user=User::query()->create(['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
        $token=$user->createToken('authtoken')->plainTextToken;
        return response()->json(['data'=>$user,'token'=>$token]);
    }
}
