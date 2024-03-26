<?php

namespace App\Http\Controllers;

use App\Models\Challenge as ModelsChallenge;
use Carbon\Carbon;
use Hamcrest\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class challenge extends Controller
{
    public function addchallenge(Request $request)
    {
        $request->validate([
            'exercise_ids' => 'required|array',
            'Challenge_name' => 'required|string',
            'Description' => 'required|string',
            'end_at'=>'required|integer'
        ]);
        $challenge = \App\Models\challenge::create([
            'Challenge_name' => $request->input('Challenge_name'),
            'Description' => $request->input('Description'),
            'end_at'=> $request->input('end_at'),
        ]);

        $exerciseIds = $request->input('exercise_ids');
        $challenge->exercises()->attach($exerciseIds);
        return response()->json(['message'=>'challenge create successfuly','challenge'=>$challenge],201);
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

    return response()->json(['challenge' => $challenge, 'exercises' => $pivotData]);
}

public function enroll($challenge_id)
{
    $user_id = auth()->id();
    $startTime = Carbon::now();

    $challenge = \App\Models\Challenge::findOrFail($challenge_id);

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
            return response()->json(['message' => 'The challenge completed'], 200);
        } else {
            return response()->json(['message' => 'Failed, Try next time'], 200);
        }

}

}
