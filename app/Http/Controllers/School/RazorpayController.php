<?php

namespace App\Http\Controllers\School;

use Exception;
use Razorpay\Api\Api;
use App\Models\Payment;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Session;

class RazorpayController extends Controller 
{
    public function pay(Request $request)
    {
        $input = $request->all();
        $entity = new Payment();
        $entity->payment_id = $request->razorpay_payment_id;
        $entity->school_id = $request->school_id;
        $entity->claim_id = Auth::user()->id;
        $entity->school_claim_id = $request->school_claim_id;
        $entity->status = 0;
        $entity->amount = '100';
        $entity->save();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                if ($response->status == "captured") {
                    $next_year=date('Y-m-d', strtotime(date("Y-m-d"). ' + 1 year'));
                    $entity->update(["status" => 1,"validated_at"=>$next_year]);

                    Session::put('success', 'Payment successful');
                } else {
                    Session::put('success', 'Payment failed');
                    $entity->update(["status" => 2]);
                }
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        return redirect()->back();
    }
}
