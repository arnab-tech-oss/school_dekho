<?php

namespace App\Service;

use App\Models\Otp;
use App\Core\BaseCore;
use App\Enum\OtpStatus;
//use App\Models\OTPStatus;

class OTPService
{

    public static function SendOTP($mobile, $user_id = null)
    {

        $sender = null;
        $hash_key = BaseCore::NewID() . "FRM" . md5(BaseCore::GetDateTime());

        $otp = OTP::where("mobile", $mobile)->where("status", '!=', OTPStatus::$verified)->first();

        if ($otp) {

            $message = "Your school dekho OTP is {$otp->code}";
            BusinessService::SendSms($sender, $mobile, $message);
            $otp->hash_key = $hash_key;
            $otp->update($otp->toArray());
            return $otp;
        }

        $code = rand(11111, 99999);
        $entity = new OTP();
        $entity->mobile = $mobile;
        $entity->user_id = $user_id;
        $entity->code = $code;
        $entity->hash_key = $hash_key;
        $entity->status = OtpStatus::$delivered;
        $entity->save();

        $message = "Your school dekho OTP is {$code}";
        BusinessService::SendSms($sender, $mobile, $message);

        $entity->update($entity->toArray());
        return $entity;
    }

    public static function VerifyOtp($response, $request)
    {

        $otp = OTP::where("hash_key", $request->hash_key)->where("code", $request->code)->first();

        if (!$otp) {
            $response->message = "OTP does not match";
            return null;
        }

        if ($otp->status == OTPStatus::$verified) {
            $response->message = "Otp already verify";
            return null;
        }

        $otp->status = OTPStatus::$verified;
        $otp->update($otp->toArray());

        return $otp;
    }
}
