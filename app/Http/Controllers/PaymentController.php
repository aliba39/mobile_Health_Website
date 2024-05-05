<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\course;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      return view('Payment.form');
    }


     public function paymentAction(Request $request) {
dd($request);

       $stripe = new \Stripe\StripeClient(
     'sk_test_51JawcXEdQN6YZjuxiZyeug0fYd4GWKpmexqQ3Uw9BvL460IK5ktKUOtgpKeQF6elpZ1O1R998GAGjjH2djNep0cT00pG27q9iP'
   );
       $stripe->charges->create([
         'amount' => $request->input('course')*100,
         'currency' => 'nzd',
         'source' => 'tok_amex',
       ]);

        return view('payment.thankyou');
      }

}
