<?php

namespace App\Http\Controllers;

use App\Models\CateProduct;
use App\Models\product;
use App\Models\producte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function GetCategoryProduct()
    {
        $Get=CateProduct::all();
        return response()->json(['message'=>'success','data'=>$Get],201);
    }
    public function GetProductFromId($id)
    {
        $Get=product::query()->where('Cate_id',$id)->get();
        return response()->json(['message'=>'success','data'=>$Get],201);
    }
    public function SearchProduct($id)
    {
        $search=product::query()->where('name','=',$id)->get();
        return response()->json(['message'=>'success','product'=>$search],201);
    }
public function addproduct(Request $request)
{
//    $image=$request->file('image');
//    $imageName = time() . '_' . $image->getClientOriginalName();
//    $imagepath=$image->move(public_path('public/uploads'),$imageName);
//    $imagep = 'public/uploads' . $imageName;
    $add=product::query()->create([
        'name'=>$request->name,
        'cost'=>$request->cost,
        'image'=>$request->image,
        'points_cost'=>$request->points_cost,
        'amount'=>$request->amount,
        'Cate_id'=>$request->Cate_id,
    ]);
    return response()->json(['message'=>'Product add successfully'],201);
}
}
