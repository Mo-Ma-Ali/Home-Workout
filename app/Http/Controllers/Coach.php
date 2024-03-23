<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use http\Env\Response;
use Illuminate\Http\Request;

class Coach extends Controller
{
    public function GetCoach()
    {
        $data=\App\Models\Coach::all();
        if (!$data)
        {
            return response()->json(['message'=>'Notfound']);
        }else{
            return response()->json(['coach'=>$data],201);
        }

    }
    public function advice(Request $request)
    {

        $advice=Advice::query()->create([
         'message'=>$request->message,
            'trainer_id'=>$request->trainer_id,
      ]);
      return response()->json(['advice'=>$advice],201);
    }
    public function getadvice($id)
    {
        $user=Advice::query()->where('trainer_id',$id)->get();
        return response()->json(['data'=>$user]);
    }
    public function good($id)
    {
        $good=Advice::query()->where('id',$id)->update(['evaluation'=>'good']);
        return response()->json(['messsage'=>'We strive to improve advice']);
    }
    public function middle($id)
    {
        $middle=Advice::query()->where('id',$id)->update(['evaluation'=>'good']);
        return response()->json(['message'=>'Thank You']);
    }
    public function excellent($id)
    {
        $excellent=Advice::query()->update(['evaluation'=>'excellent']);
        return response()->json(['message'=>'Welcome']);
    }
}
