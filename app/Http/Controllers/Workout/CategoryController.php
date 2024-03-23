<?php

namespace App\Http\Controllers\Workout;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $category=Cate::all();
    return response()->json(['message'=>'seccand page','exercise'=>$category],200);
    }

}
