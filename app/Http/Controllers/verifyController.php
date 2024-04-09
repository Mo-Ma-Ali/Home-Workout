<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class verifyController extends Controller
{
    public function sendVerify(Request $request)
    {
        if ($request->user()->hasVerifiedEmail())
        {
            return ['message'=>'already verifed'];
        }
        $request->user()->sendEmailVerificationNotification();
        return ['status'=>'virefcation link send'];
    }



    public function verify(Request $request) {
        $user = User::where('email', $request->email)->first();
        if ($user &&$request->verification_code) {
            //dd($user);
            if ( $user->code === $request->verification_code && $user->expire_at > Carbon::now()) {

                //Auth::login($user);


                $user->code = null;
                $user->expire_at = null;
                $user->email_verified_at=now();
                $user->save();

                return response()->json(['message' => 'login successful.']);
            }
            else
            return response()->json(['message' => 'The provided code is incorrect.'], 400);
        }
        else
        return response()->json(['message'=>'The provided email is incorrect.'], 400);
    }
}
