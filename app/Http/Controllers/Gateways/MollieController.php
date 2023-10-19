<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{
    public function payment(Request $request){
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => number_format($request->price,2,'.'), // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #12345",
            "redirectUrl" => route('mollie.success'),
            // "webhookUrl" => route('mollie.callback'),
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);
        // dd($payment);

        session()->put('mollie_id',$payment->id);


        return redirect($payment->getCheckoutUrl(), 303);

       }

       public function success(Request $request){
         
           $paymentId = session()->get('mollie_id');
           $payment = Mollie::api()->payments->get($paymentId);
            //    dd($payment);
           if ($payment->isPaid())
           {
               return 'Payment received.'; 
           }

           return 'payment did not recived';

       }

}
