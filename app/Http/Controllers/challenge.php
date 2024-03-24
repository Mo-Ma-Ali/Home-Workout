<?php

namespace App\Http\Controllers;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class challenge extends Controller
{
    public function addchallenge(Request $request)
    {
       $challenge=new \App\Models\challenge();
        $column1=$request->input('exercise_id');
        $column2=$request->input('Challenge_name');
        $column3=$request->input('Description');
        $data=[];
        foreach ($column1 as $value)
        {
            $data[]=[
                'exercise_id'=>$value,
                'Challenge_name'=>$column2,
                'Description'=>$column3,
                'user_id'=>auth()->id(),
            ];
        }
        \App\Models\challenge::query()->insert($data);
        return response()->json(['message'=>'challenge create successfuly'],201);
    }
    public function Getchallenge($name)
    {
        $Get=\App\Models\challenge::query()->where('Challenge_name',$name)->get();
        return response()->json(['challenge'=>$Get]);
    }

}
