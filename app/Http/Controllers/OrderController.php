<?php

namespace App\Http\Controllers;

use App\Models\CateProduct;
use App\Models\Order;
use App\Models\product;
use App\Models\producte;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// Get Order with Products


class OrderController extends Controller
{
    public function AddToCart(Request $request,$id)
    {
        $ordere=new Order();
        $order = product::query()->findOrFail($id);
        if ($order)
        {
            $Quantitybyorder = $request->amount;
            if ($Quantitybyorder >= $order->amount)
            {
                return response()->json(['message'=>'sorry Not Found']);
            }
            else
            {
                $order->amount -= $Quantitybyorder;
                $order->save();
                $add = DB::table('product_order')->insert(
                    [
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'amount' => $Quantitybyorder,
                        'order_id'=>$request->order_id,
                        ]);
            }
            return response()->json(['message' => 'success', 'cart' => $add]);
        }
    }
    public function GetOrder($id)
    {
      $data=User::find($id);
        return response()->json(['order'=>$data->order],201);
    }
    public function Getorderwithproducet($id)
    {
        $order=order::query()->findOrFail($id);
        return response()->json(['data'=>$order->Product],201);
    }
    public function DeleteOrder($id)
    {
        $delete=DB::table('product_order')->where('id',$id)->delete($id);
        if (!$delete)
        {
            return response()->json(['message'=>'NotFound']);
        }
        return response()->json(['product delete successfully'],201);
    }
    public function UpdatePayment($id)
    {
        DB::table('product_order')->where('id',$id)->update(['Payment'=>'paid']);
        return response()->json(['message'=>'successfully']);
    }
}
