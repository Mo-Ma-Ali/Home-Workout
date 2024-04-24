<?php

namespace App\Http\Controllers;

use App\Models\Admin as ModelsAdmin;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Stringable;

class Admin extends Controller
{

    public function logAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        $user = User::where('email', $request->email)->first();
        //dd($user);
        if($user)
       {
        if (Hash::check($request->password, $user->password))
        {
            $token=$user->createToken('authtoken')->plainTextToken;
        return response()->json(['message'=>'login ','data'=>['user'=>$user],'token'=>$token]);}
    else return response()->json (['message'=>'password is incorrecte']);}
    else
    return response()->json(['error' => 'user not found'], 404);

    }

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


    public function logout(Request $request)
    {
        $token=$request->bearerToken();
        $admin=ModelsAdmin::where('admin_token',$token)->first();
        if($admin)
        {$admin->admin_token=null;
        $admin->save();
        return response()->json(['message'=>'admin log out successfully'],200);
        }
        else
        return response()->json(['message'=>'user not found'],404);
    }
}
