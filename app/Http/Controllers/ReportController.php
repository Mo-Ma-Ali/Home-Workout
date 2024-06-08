<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\ExerciseCompletion;
use App\Models\Progress;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
///////////////////////////////////////
class ReportController extends Controller
{
    public function DailyForProgress(Request $request)
    {
        $pro=Progress::query()->where('user_id',Auth::id())->whereDate('created_at',\Illuminate\Support\Carbon::now())->get();
        if (!$pro)
       {
            return response()->json(['Sorry No Report For Today'],201);
       }
       else{
            return  response()->json(['message'=>'success','Report For Today'=>$pro],201);
       }
    }
    public function WeeklyForProgress(Request $request)
    {
        $start=Carbon::now()->startOfWeek();
        $end=Carbon::now()->endOfWeek();
        $pro=Progress::query()->where('user_id',Auth::id())->whereBetween('created_at',[$start,$end])->get();
        if (!$pro)
        {
            return response()->json(['sorry No Report for Week'],201);
        }else{
            return response()->json(['message'=>'success','Report'=>$pro]);
        }
    }
    public function MonthlyForProgress(Request $request)
    {
        $month=$request->get('month');
        $data=Progress::query()->where('user_id',Auth::id())->whereMonth('created_at',$month)->get();
        if ($data)
        {
            return response()->json(['message'=>'success','Report'=>$data],201);

        }else{
            return response()->json(['message'=>'Sorry No Report'],201);
        }
    }
    public function annualForProgress(Request $request)
    {
        $year=$request->get('year');
        $data=Progress::query()->where('user_id',Auth::id())->whereYear('created_at',$year)->get();
        if ($data) {
            return response()->json(['message'=>'success','Report' => $data]);
        }else{
            return  response()->json(['Sorry No Report'],201);
        }
    }
    public function DailyForOrder(Request $request){
    $order=DB::table('product_order')->where('user_id',Auth::id())->whereDate('created_at',\Illuminate\Support\Carbon::now())->get();
    if ($order)
    {
        return response()->json(['message'=>'success','Report For Today'=>$order],201);
    }else{return response()->json(['no Report For Today']);}
    }
    public function WeeklyForOrder(Request $request){
        $start=Carbon::now()->startOfWeek();
        $end=Carbon::now()->endOfWeek();
        $order=DB::table('product_order')->where('user_id',Auth::id())->whereBetween('created_at',[$start,$end])->get();
        if ($order)
        {
            return \response()->json(['message'=>'success','Report for Week'=>$order],201);
        }
        else{
            return  \response()->json(['Sorry no Report'],201);
        }
    }
    public function MonthlyForOrder(Request $request){
        $month=$request->get('month');
        $order=DB::table('product_order')->where('user_id',Auth::id())->whereMonth('created_at',$month)->get();
        if ($order)
        {
            return \response()->json(['message'=>'success','Report For Month'=>$order],201);
        }else{
            return \response()->json(['sorry No report For Month'],201);
        }
    }
    public function annualFororder(Request $request){
        $year=$request->get('year');
        $order=DB::table('product_order')->where('user_id',Auth::id())->whereYear('created_at',$year)->get();
        if ($order)
        {
            return response()->json(['message'=>'success','Report For Year'=>$order]);
        }else{
            return response()->json(['Sorry No Report'],201);
        }
    }
    public function DailyForExercise(Request $request){
     $exe=ExerciseCompletion::query()->where('user_id',Auth::id())->whereDate('created_at',Carbon::now())->get();
     if ($exe)
     {
         return \response()->json(['message'=>'success','Report for today'=>$exe],201);
     }else{
         return  \response()->json(['sorry No Report'],201);
     }
    }
    public function WeeklyForExercise(Request $request){
        $start=Carbon::now()->startOfWeek();
        $end=Carbon::now()->endOfWeek();
        $exe=ExerciseCompletion::query()->where('user_id',Auth::id())->whereBetween('created_at',[$start,$end])->get();
        if ($exe)
        {
            return \response()->json(['message'=>'success','Report For Wekkly'=>$exe],201);
        }else{
            return \response()->json(['sorry No Report'],201);
        }

    }
    public function MonthlyForExercise(Request $request){
        $month=$request->get('month');
        $exe=ExerciseCompletion::query()->where('user_id',Auth::id())->whereMonth('created_at',$month)->get();
        if ($exe)
        {
            return \response()->json(['message'=>'success','Report for month'=>$exe],201);
        }else{
            return \response()->json('Sorry No Report',201);
        }
    }
    public function annualForExercise(Request $request){
        $year=$request->get('year');
        $exe=ExerciseCompletion::query()->where('user_id',Auth::id())->whereYear('created_at',$year)->get();
        if ($exe)
        {
            return \response()->json(['message'=>'success','Report For annul'=>$exe],201);
        }
        else{
            return \response()->json('soory No Report');
        }
    }
    public function GetExerciseWhereid($id)
    {
        $data=Exercise::query()->where('id','=',$id)->get();
        if ($data)
        return \response()->json(['message'=>'success','Exercise'=>$data],201);
        else{
            return \response()->json(['Not Found'],201);
        }
    }

}
