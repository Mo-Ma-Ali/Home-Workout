<?php

namespace App\Http\Controllers;

use App\Models\Challenge as ModelsChallenge;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Hamcrest\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class challenge extends Controller
{
    public function addchallenge(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exercise_id1' => 'required|integer',
            'exercise_id2' => 'required|integer',
            'exercise_id3' => 'required|integer',
            'Challenge_name' => 'required|string|unique:challenges',
            'Description' => 'required|string',
            'end_at'=>'required|integer'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $challenge = \App\Models\challenge::create([
            'Challenge_name' => $request->input('Challenge_name'),
            'Description' => $request->input('Description'),
            'end_at'=> $request->input('end_at'),
        ]);

        $exerciseIds[0]= $request->input('exercise_id1');
        $exerciseIds[1]= $request->input('exercise_id2');
        $exerciseIds[2]= $request->input('exercise_id3');
        $exerciseIds[3]= $request->input('exercise_id4');
        $exerciseIds[4]= $request->input('exercise_id5');
        $exerciseIds[5]= $request->input('exercise_id6');
        $exerciseIds[6]= $request->input('exercise_id7');
        $exerciseIds[7]= $request->input('exercise_id8');
        $exerciseIds[8]= $request->input('exercise_id9');
        $exerciseIds[9]= $request->input('exercise_id10');
        for( $i = 0; $i < 10 ; $i++){
        {if($exerciseIds[$i]!=null)
        $challenge->exercises()->attach($exerciseIds[$i]);}}
        return response()->json(['message'=>'challenge create successfuly','challenge'=>$challenge],201);
    }

    public function returnAll()
    {
        $user = auth()->id();

        $challenges = \App\Models\Challenge::all();
        $challenges->load(['users' => function ($query) use ($user) {
            $query->where('user_id', $user)->withPivot('done');
        }]);

        return response()->json(['message' => 'Attached user to challenges', 'challenges' => $challenges]);
    }




    public function Getchallenge($name)
    {
        $Get=\App\Models\challenge::query()->where('Challenge_name',$name)->get();
        return response()->json(['challenge'=>$Get]);
    }


    public function getChallInfo($challenge_id)
{
    $challenge = \App\Models\challenge::find($challenge_id);

    $pivotData = $challenge->exercises()->withPivot('challenge_id', 'exercise_id')->get();

    return response()->json(['message' => 'success','challenge' => $challenge, 'exercises' => $pivotData]);
}

public function enroll($challenge_id)
{
    $user_id = auth()->id();
    $startTime = Carbon::now();

    $challenge = \App\Models\Challenge::findOrFail($challenge_id);

    $user=$challenge->users()->find($user_id);

    if(!$user)
    $challenge->users()->attach($user_id);

    $challenge->users()->updateExistingPivot($user_id, ['start_at' => $startTime]);

    $challenge->load('exercises');

    return response()->json(['message' => 'Enrolled', 'challenge' => $challenge], 201);
}

public function endOfChallenge(Request $request, $challenge_id)
{
    $user_id = auth()->id();
    $completed_at = Carbon::now();

    $challenge = \App\Models\Challenge::findOrFail($challenge_id);

    $pivotData = $challenge->users()->where('user_id', $user_id)->first()->pivot;
        $start_at = Carbon::parse($pivotData->start_at);

        $endTime = $start_at->copy()->addMinutes($challenge->end_at);

        if ($completed_at <= $endTime) {
            $challenge->users()->updateExistingPivot($user_id, ['done' => true]);
            $challenge->users()->updateExistingPivot($user_id, ['completed_at' => $completed_at]);

            return response()->json(['message' => 'The challenge completed'], 200);
        } else {
            return response()->json(['message' => 'Failed, Try next time'], 200);
        }

}

}
