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

    public function requestAdvice(Request $request)///////////////////////////////////////////
    {
        $user = Auth::user();
        $couch = $request->input('couch_id');
        $request_advice = $request->input('request_advice');
        if($couch)
        {
            if(!Advice::where('trainer_id',$user->id)->where('request_advice',1)->exists())
           {
            $advice = Advice::create(
                [
                    'couch_id' => $couch,
                    'request_advice' => $request_advice,
                    'trainer_id' => $user->id,
                ]
                );
            return response()->json(['message' => 'success','request_advice' => $advice], 201);
            }
            else
            return response()->json(['message' => 'the request already send'], 200);;
        }
        return response()->json(['message' => 'the couch is not found'], 200);
    }



    public function advice(Request $request)
    {
        $couch = Auth::user();
        $trainer = Advice::where('trainer_id', $request->trainer_id)->where('couch_id', $couch->id)
        ->where('request_advice', true)->first();
        //dd($trainer);
        if($couch)
       {
        if (!Advice::where('trainer_id', $request->trainer_id)->where('couch_id', $couch->id)
        ->where('request_advice', true)->exists()) {
            $advice = Advice::create([
                'couch_id' => $couch->id,
                'message' => $request->message,
                'trainer_id' => $request->trainer_id,
            ]);
            return response()->json(['message' => 'success','advice' => $advice], 201);
        }
        else if(Advice::where('trainer_id', $request->trainer_id)->where('couch_id', $couch->id)
        ->where('request_advice', true)->exists())
        {
            $trainer->update(
                ['message'=>$request->message,
                 'request_advice' => false,
                ]);
            return response()->json(['message' => 'success','advice' => $trainer], 201);
        }
        else if (Advice::where('trainer_id', $request->trainer_id)->where('couch_id', $couch->id)
        ->where('request_advice', null)->exists()&&
        $trainer->couch_id === $couch->id)
        {
            $advice = Advice::create([
                'couch_id' => $couch->id,
                'message' => $request->message,
                'trainer_id' => $request->trainer_id,
            ]);
            return response()->json(['message' => 'success','advice' => $advice], 201);
        }

    }
        return response()->json(['message' => 'Advice for this trainer already exists'], 201);
    }

    public function getadvice($id)
    {
        $trainer = Auth::id();
        $user=Advice::where('couch_id',$id)->where('trainer_id',$trainer)->where('request_advice', false)->get();
        return response()->json(['message' => 'success','data'=>$user]);
    }
    public function getRequest()
    {
        $couch = Auth::user();
        $users = Advice::where('couch_id', $couch->id)->where('request_advice', 1)->get();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'There are no new requests']);
        }

        return response()->json(['message' => 'Success', 'data' => $users]);
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
}
