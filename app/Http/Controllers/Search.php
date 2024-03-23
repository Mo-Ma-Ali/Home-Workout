<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function Search($search)
    {
        $se=Exercise::query()->where('name','like',$search)->get()->first();
        if (!$se)
        {
            return response()->json(['message'=>'Notfound'],404);
        }
        else {
            return response()->json(['Exercise' => $se], 200);
        }
    }
}
