<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\product;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;


class Translate extends Controller
{

    public function Translate()
    {
        $exe=product::all();
        $tra=new GoogleTranslate();
        if ($exe)
        {
            return $tra->setSource('en')->setTarget('ar')->translate($exe);
        }
        else{
            return  response()->json('no');
        }
    }
    public function TranslateExercise()
    {
        $exe=Exercise::query()->select('description')->get();
        $tra=new GoogleTranslate();
        if ($exe)
        {
            return $tra->setSource('en')->setTarget('ar')->translate($exe);
        }else{
            return  response()->json('no');
        }

    }
}
