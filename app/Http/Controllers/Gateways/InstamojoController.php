<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InstamojoController extends Controller
{
    
    public function payment(Request $request){
            $api_key = config('instamojo.api_key');
            $api_token = config('instamojo.api_token');
            $url = config('instamojo.end_point').'payment-requests/';

            
            $response = Http::withHeaders([
                'X-Api-Key' => $api_key,
                'X-Auth-Token' => $api_token,
            ])->post($url, [
                'purpose' => 'Online Payment',
                'amount' => $request->price,  
                'phone' => '9876543210',  
                'buyer_name' => 'John Doe',  
                'redirect_url' => route('instamojo.callback'),  
                'send_email' => true,  
                'send_sms' => true,  
                'email' => 'johndoe@example.com',  
                'allow_repeated_payments'=>false,

            ]);      
            
            $response_body=json_decode($response);
            if($response_body->success==true){
         return redirect($response_body->payment_request->longurl);

            }else{
         dd($response_body);

            }
                
    }
    

    public function callback(Request $request){
        $api_key = config('instamojo.api_key');
        $api_token = config('instamojo.api_token');
        $url = config('instamojo.end_point').'payment/';

        $response = Http::withHeaders([
            'X-Api-Key' => $api_key,
            'X-Auth-Token' => $api_token,
        ])->get($url.$request->payment_id);  
        
        if($response->failed()){
            dd($response);
        }else{
            $response_body=json_decode($response);
            if ($response_body->success==true&& $response_body->payment->status=='cridet') {
                return 'payment success';
            }else{
                return 'payment failed';

            }
        }
              
    }

    

}
