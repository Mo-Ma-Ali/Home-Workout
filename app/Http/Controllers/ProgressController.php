<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    public function calculate(Request $request)
    {
        $age=$request->age;
        $gender=$request->gender;
        $Current_weight=$request->Current_weight;
        $height=$request->height;
        $Calories= 10*$Current_weight+625*$height-5*$age+5;
        $calcu=Progress::query()->create([
            'user_id'=>Auth::id(),
           'age'=>$age,
            'Current_weight'=>$Current_weight,
            'gender'=>$gender,
            'height'=>$height,
            'Calories'=>$Calories,
            ]);
           return response()->json(['message' => 'success' ,'data'=>$calcu],201);
    }
    public function GetDetails(Request $request,$id)
    {
        $get=Progress::query()->where('id',$id)->select(['id','user_id','Current_weight','age','height','gender','Calories'])->get();
        return response()->json(['message' => 'success','Details'=>$get],201);
    }
    public function TargetWeight(Request $request)
    {
        $age=$request->age;
        $gender=$request->gender;
        $height=$request->height;
        $Current_weight=$request->Current_weight;
        $Calories= 10*$Current_weight+625*$height-5*$age+5;
        $Target_weight=$request->Target_weight;
        $target=$Calories/3500;
        $Time=(($Current_weight-$Target_weight)/3500)*1000;
        $m=DB::table('progress')->update(['Target_weight'=>$Target_weight,'Time_to_reach_the_specified_weight'=>$Time]);
        return response()->json(['message' => 'success','You need a number of days to lose 0.45 of your weight'=>$Time]);
    }
}
