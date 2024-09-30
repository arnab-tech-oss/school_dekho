<?php

namespace App\Http\Controllers\SchoolAdmin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\SchoolClaim;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function payment_checkout(Request $request) 
    {
        $input = $request->all();
        $payment_details=Payment::where('claim_id', Auth::user()->id)->where('school_id', $request->school_id)->first();
        if($payment_details){
            $api = new Api("rzp_live_bs5xjXp2e9VmoR", "a7yqfHxjJjZuGvV0hUgIqP0F"); 
             $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id']))
        {
             try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                if ($response->status == "captured") {
                    $next_year=date('Y-m-d', strtotime(date("Y-m-d"). ' + 1 year'));
                    $payment_details->status = 1;
                    $next_year=date('Y-m-d', strtotime(date("Y-m-d"). ' + 1 year'));
                    $payment_details->validated_at = $next_year;
                    $payment_details->update($payment_details->toArray());
                    Session::put('success', 'Payment successful');
                } else {
                    Session::put('success', 'Payment failed');
                        $payment_details->status = 2;
                        $payment_details->update($payment_details->toArray());
                }
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        } else {
                $entity = new Payment();
                $entity->payment_id = $request->razorpay_payment_id;
                $entity->school_id = $request->school_id;
                $entity->claim_id = Auth::user()->id;
                $school_claim = SchoolClaim::where('claim_id', Auth::user()->id)->where('school_id', $request->school_id)->first();
                $entity->school_claim_id = $school_claim->id;

                $entity->status = 1;
                // $entity->amount = '38350';
                $entity->amount = '38350';
                $entity->save();
                $api = new Api("rzp_test_t0IaxaxB8hIfSP", "HSCCMYSDFBb7GoMsmln7nbhD");
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                if (count($input) && !empty($input['razorpay_payment_id'])) {
                    try {
                        $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                        if ($response->status == "captured") {
                            $next_year = date('Y-m-d', strtotime(date("Y-m-d") . ' + 1 year'));
                            $entity->update(["status" => 1, "validated_at" => $next_year]);

                            Session::put('success', 'Payment successful');
                        } else {
                            Session::put('success', 'Payment failed');
                            $entity->update(["status" => 2]);
                        }

                    } catch (Exception $e) {
                        return $e->getMessage();
                        Session::put('error', $e->getMessage());
                        return redirect()->back();
                    }
                }
            }
            Session::put('success', 'Payment successful');
            return redirect()->route('schooladmin.checkout')->with('payment_success', 'Payment successfully done!');
        }
    }
}
