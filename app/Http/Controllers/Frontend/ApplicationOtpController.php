<?php

namespace App\Http\Controllers\Frontend;

use App\Core\BaseController;
use App\Http\Controllers\Controller;
use App\Models\ApplicationOtp;
use App\Models\SchoolNewApplication;
use App\Service\ApplicationOTPService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicationOtpController extends BaseController
{
    public function send_otp(Request $request)
    {
        $response = ['is_success' => false, 'message' => ""];
        $validation = Validator::make($request->all(), [
            'mobile' => 'required|numeric|min:10',
        ]);
        if ($validation->fails()) {
            $response['message'] = "Please provide your mobile number";
            return response()->json($response);
        }

        $otp = ApplicationOTPService::SendOTP($request->mobile);
        $response['is_success'] = true;
        $response['message'] = "OTP has been sent to your mobile";
        $response['data'] = ['hash_key' => $otp->hash_key];
        return response()->json($response);
    }

    public function verify(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "code" => "required",
            "hash_key" => "required",
            "school_id" => "required",
            "name" => "required",
            "seeking_class" => "required",
            "gender" => "required",
            "phone" => "required"
        ]); 

        if ($validator->fails()) {
            $this->response->message = "All field is required";
            return $this->rModel();
        }
        $otp = ApplicationOTPService::VerifyOtp($this->response, $request);
        if (!$otp) {
            return $this->rModel();
        }
        $school_id = $request->school_id;
        $phone = $request->phone;
        $total_application_count = SchoolNewApplication::where('school_id', $school_id)->where('phone', $phone)->count();
        if ($total_application_count > 0) {
            $this->response->is_success = true;
            $this->response->message = "Application OTP verified successfully";
            return $this->rModel();
        }
        $entity = new SchoolNewApplication(); 
        $entity->school_id = $request->school_id;
        $entity->name = $request->name;
        $entity->phone = $request->phone;
        $entity->application_date = date('Y-m-d');
        $entity->seeking_class = $request->seeking_class;
        $entity->school_type = $request->school_type;
        $entity->gender = $request->gender;
        $entity->save();
        $this->response->is_success = true;
        $this->response->message = "Application OTP verified successfully";
        return $this->rModel();
    }
}
