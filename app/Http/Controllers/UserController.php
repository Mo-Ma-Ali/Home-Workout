<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\detail;
use App\Models\Exercise;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Add(Request $request)
    {
//        $request->validated();
        $user=detail::query()->create([
            'user_id'=>Auth::id(),
            'age'=>$request->age,
            'weight'=>$request->weight,
            'height'=>$request->height,
            'gender'=>$request->gender,
        ]);
        return response()->json(['data'=>$user],201);
    }
    public function progress()
    {

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
    public function getUser()
    {
        $user=Auth::user();
        $admin=Admin::where('user_id',$user->id)->first();
       // dd($admin);
        if($admin)
       { return response()->json(['admin'=>true,'message'=>$user],200);}
        return response()->json(['message'=>$user],200);
    }
    public function image(Request $request)
    {
        $image=$request->file('image');
        $imageName = time().'_'.$image->getClientOriginalName();
       $imagepath= $image->move(public_path('public/uploads'),$imageName);
       $imagep='public/uploads'.$imageName;
       return response()->json(['path'=>$imagep]);
    }
    public function Favorite(Request $request)
    {
       $user= DB::table('exersice_favorite_pivot')->insert([
            'user_id'=>Auth::id(),
            'exersice_id'=>$request->exersice_id,
        ]);
       return response()->json(['data'=>$user],201);
    }
    public function GetFavorite($id)
    {
        $get=DB::table('exersice_favorite_pivot')->where('user_id',$id)->get();
        return response()->json(['data'=>$get],201);
    }

}
