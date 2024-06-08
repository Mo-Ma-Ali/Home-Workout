<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\ExerciseCompletion;
use App\Models\order;
use App\Models\product;
use App\Models\Progress;
use App\Models\User;
use App\Models\WorkoutCompletion;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
///////////////////////////////////
////////////////////////bitcoines
class AwardController extends Controller
{
public function BuyWithPoint(Request $request,$id,$id1)
    {
        $product=product::query()->findOrFail($id);
        if ($product) {
            $progress =User::find($id1);
            if ($progress->points >= $product->points_cost) {
                $progress->points -= $product->points_cost;
                $progress->save();
                $point=User::query()->where('id','=',$id1)->select('points')->get();
                $pr=product::query()->where('id',$id)->select('points_cost')->get();
                return response()->json(['cost of product'=>$pr,'point after Buy'=>$point,'message'=>'Your purchase has been completed successfully']);
            }
            else{
                return response()->json(['message'=>'No Point ُEnough']);
            }

        }
    }
    //Move to ExerciseComplletionControllermAnd challenge
//    public function EndOfExerciseToAddPoint(Request $request,$id)
//    {
//
//        $exercise=ExerciseCompletion::query()->where('user_id',Auth::id())->where('id',$id)->where('is_done','=',1)->exists();
//        if ($exercise) {
////            $addpoints=$request->input('number');
//            $pro=Progress::where('user_id',Auth::id())->first();
//            if (!$pro)
//            {
//                $pro=new Progress(['user_id'=>Auth::id()]);
//            }
//            $pro->points+=30;
//            $pro->save();
//            return response()->json(['message' => 'You completed the exercise and got 30 points']);
//        }else{
//            return response()->json(['message'=>'Sorry, you did not complete your exercise']);
//        }
//    }
}
