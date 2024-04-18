<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\detail;
use App\Models\Exercise;
use App\Models\Favorite;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Psy\CodeCleaner\ReturnTypePass;

class UserController extends Controller
{
    public function Add(Request $request)
    {
        $user=detail::query()->create([
            'user_id'=>Auth::id(),
            'age'=>$request->age,
            'weight'=>$request->weight,
            'height'=>$request->height,
            'gender'=>$request->gender,
        ]);
        return response()->json(['data'=>$user],201);
    }




    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // if ($request->has('admin')) {
        //     $user->admin()->create();
        // }

        $token=$user->createToken('authtoken')->plainTextToken;
        $user->createCode();

        $user->notify(new VerifyEmailNotification());
        return response()->json(['user' => $user, 'token' => $token], 201);
    }


    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $user = User::where('email', $request->email)->first();
        //dd($user);
        if($user)
       {
        if (Hash::check($request->password, $user->password))
        {$token=$user->createToken('authtoken')->plainTextToken;
        return response()->json(['message'=>'login ','data'=>['user'=>$user],'token'=>$token]);}
    else return response()->json (['message'=>'password is incorrecte']);}
    else
    return response()->json(['error' => 'user not found'], 404);
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message'=>'logout']);
    }


    public function forgot(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = User::where('email', $request->email)->first();
    if ($user) {
        $token = rand(1000,9999);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $user->notify(new ResetPasswordNotification($token));

        return response()->json(['message' => 'password reset code sent successfully.'], 200);
    }

    return response()->json(['message' => 'user not found.'], 404);
}


public function verfiyReset(Request $request) {
    $request->validate([
        'email'=>'required|email',
        'code'=>'required'
    ]);
    $token=DB::table('password_reset_tokens')->where('email',$request->email)->first();
    if($token)
    {
        if($request->code===$token->token)
        {
            return response()->json(['message'=>'the code is correct']);
        }
        else return response()->json(['message'=>'the code is incorrect']);
    }
    else
    return response()->json(['message'=>'the user not found']);
}


public function reset(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'code' => 'required',
        'password' => 'required|min:8',
    ]);

    $tokenData = DB::table('password_reset_tokens')
                    ->where('email', $request->email)
                    ->first();

    if ($tokenData) {

        if ($request->code == $tokenData->token) {
            $user = User::where('email', $request->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();

            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->delete();

            return response()->json(['message' => 'password reset successfully.'], 200);
        } else {
            return response()->json(['message' => 'incorrect reset code.'], 400);
        }
    } else {
        return response()->json(['message' => 'No reset token found.'], 400);
    }
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
       $user= Favorite::create([
            'user_id'=>Auth::id(),
            'exercise_id'=>$request->exercise_id,
        ]);
       return response()->json(['data'=>$user],201);
    }


    public function GetFavorite(Request $request , $id)
    {
        $get=Favorite::where('user_id',Auth::id())
        ->where('id',$id)->get();
        if($get=='[]')
        return response()->json(['message'=>'not found'],404);
        return response()->json(['data'=>$get],201);
    }


    public function delFavorite($id)
    {
        $favorite = Favorite::where('user_id',Auth::id())->where(
        'id',$id)->first();
        if ($favorite==null)
        return response()->json(['message'=>'not found'],404);
        $favorite->delete();
        return response()->json(['message' => 'Favorite exercise deleted successfully'], 200);
    }
}
