<?php

namespace App\Service;

use App\Models\Otp;
use App\Core\BaseCore;
use App\Enum\OtpStatus;
use App\Models\ApplicationOtp;

//use App\Models\OTPStatus;

class ApplicationOTPService
{

    public static function SendOTP($mobile, $user_id = null)
    {

        $sender = null;
        $hash_key = BaseCore::NewID() . "FRM" . md5(BaseCore::GetDateTime());

        // $otp = ApplicationOtp::where("mobile", $mobile)->where("status", '!=', 1)->first();

        // if ($otp) {

        //     $message = "Your school dekho OTP is {$otp->code}";
        //     BusinessService::SendApplicationSms($sender, $mobile, $message);
        //     $otp->hash_key = $hash_key;
        //     $otp->update($otp->toArray());
        //     return $otp;
        // }

        $code = rand(11111, 99999);
        $entity = new ApplicationOtp();
        $entity->mobile = $mobile;
        // $entity->user_id = $user_id;
        $entity->otp = $code;
        $entity->hash_key = $hash_key;
        $entity->status = 0;
        $entity->save();

        // $message = "Hi, Your School Dekho OTP is {$code}. Use this to verify your mobile number. OTP is valid for 5 min. Please do not share. Regards, School Dekho Team";
        $message = "Hi, Your School Dekho OTP is {$code}. OTP is valid for 5 min. Please do not share. Regards, School Dekho Team";
        BusinessService::SendApplicationSms($sender, $mobile, $message);

        $entity->update($entity->toArray());
        return $entity;
    }

    public static function VerifyOtp($response, $request)
    {

        $otp = ApplicationOtp::where("otp", $request->code)->first();

        if (!$otp) {
            $response->message = "OTP does not match";
            return null;
        }

        if ($otp->status == 1) {
            $response->message = "Otp already verify";
            return null;
        }

        $otp->status = 1;
        $otp->update($otp->toArray());

        return $otp;
    }
}
