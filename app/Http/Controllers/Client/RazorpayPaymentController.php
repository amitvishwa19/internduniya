<?php

namespace App\Http\Controllers\Client;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Razorpay\Api\Api;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RazorpayPaymentController extends Controller
{
    public function index()
    {        
        return view('razorpayView');
    }

    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }

    public function payment_success(Request $request){

        $payment = new Payment;
        $payment->r_payment_id = $request->payment_id;
        $payment->product_id = $request->payment_id;
        $payment->user_id = auth()->user()->id;
        $payment->amount = $request->amount /100;
        $payment->save();

        if($payment){
            $user = User::findOrFail(auth()->user()->id);
            $user->subscribed = true;
            $user->payment = true;
            $user->amount = $request->amount / 100;
            $user->action_count = 5;
            $user->subscription_date = Carbon::now();
            $user->renew_date = Carbon::now();
            $user->plan = $request->plan;
            $user->save();
        }
        

        return $request->payment_id;
    }
}
