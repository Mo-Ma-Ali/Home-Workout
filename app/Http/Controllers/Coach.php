<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Coach extends Controller
{
    public function GetCoach()
    {
        $data=\App\Models\Coach::all();

        $phones = [];
        foreach($data as $coach)
        {
            $user = User::find($coach->user_id);
            if ($user) {
                $phones[$coach->id] = $user;
            }        }
        //dd($phone);
        if (!$data)
        {
            return response()->json(['message'=>'Notfound']);
        }else{
            return response()->json(['message' => 'success','coach'=>$phones],201);
        }

    }
    public function advice(Request $request)
    {
        $couch = Auth::user();
        if($couch)
       {
        if (!Advice::where('trainer_id', $request->trainer_id)->exists()) {
            $advice = Advice::create([
                'couch_id' => $couch->id,
                'message' => $request->message,
                'trainer_id' => $request->trainer_id,
            ]);
            return response()->json(['message' => 'success','advice' => $advice], 201);
        }}
        return response()->json(['message' => 'Advice for this trainer already exists'], 201);
    }

    public function getadvice($id)
    {
        $user=Advice::query()->where('couch_id',$id)->get();
        return response()->json(['message' => 'success','data'=>$user]);
    }



    public function good($id,$rating)
    {
        $array = ['bad','middle','good','excellent'];
        //dd($array[0]);
        if ($rating >= 0 && $rating < count($array))
       {
        Advice::where('id',$id)->update(['evaluation'=>$array[$rating]]);
        $massege = [
            "Sorry to hear that. We'll work hard to improve your experience!",
        "We appreciate your feedback. We'll strive to do better!",
        "Thank you for your positive feedback. We're glad you enjoyed it!",
        "Fantastic! We're thrilled to hear that you had an excellent experience!"
        ];
        return response()->json(['message' => 'success','rate'=>$array[$rating],'messsage'=>$massege[$rating]]);
    }
    return response()->json(['message'=>'WTF??']);
    }
    // public function middle($id)
    // {
    //     $middle=Advice::query()->where('id',$id)->update(['evaluation'=>'good']);
    //     return response()->json(['message'=>'Thank You']);
    // }
    // public function excellent($id)
    // {
    //     $excellent=Advice::query()->update(['evaluation'=>'excellent']);
    //     return response()->json(['message'=>'Welcome']);
    // }
}
