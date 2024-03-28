<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\detail;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if ($request->has('admin')) {
            $user->admin()->create();
        }
        $token=$user->createToken('authtoken')->plainTextToken;
        return response()->json(['data'=>$user,'token'=>$token]);
    }
    public function GetFavorite()
    {
        $get=Exercise::query()->where('Favorite','=',1)->get();
        return response()->json(['exercises Favorite'=>$get],201);
    }
    public function Favorite($id)
    {
        $favourite=Exercise::query()->where('id',$id)->update(['Favorite'=>1]);
        return response()->json(['message'=>'Ok'],201);
    }
    public function getUser()
    {
        $user=Auth::user();
        $admin=Admin::where('user_id',$user->id)->first();
       // dd($admin);
        if($admin)
       { return response()->json(['admin'=>true,'message'=>$user],200);}
        return response()->json(['message'=>$user],200);
    }
}
