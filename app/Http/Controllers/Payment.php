<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Customer;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class Payment extends Controller
{//ononjjnooh[oh[ouh[ouh[ooooojlkoj
    public function makePayment(Request $request)
    {
        try {
            $stripe = new \Stripe\StripeClient(env('stripe_secret'));

          $res=$stripe->tokens->create([
                'card' => [
                    'number' => $request->number,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);
          Stripe::setApiKey(env('stripe_secret'));
          $response=$stripe->charges->create([
                'amount' => $request->amont,
                'currency' => 'usd',
                'source' => $res->id,
              'description'=>$request->description,
            ]);
          return response()->json($response->status,200);
        }catch (\Exception $exception)
        {
            return response()->json(['message'=>'يجب ادخال معلومات بطاقه ائتمان صحيحه'],500);
        }
    }

}
