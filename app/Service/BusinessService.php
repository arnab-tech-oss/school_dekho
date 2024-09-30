<?php

namespace App\Service;

use App\Core\Helper;
use App\Core\RequestMethod;

class BusinessService
{

    public static function getSchools($filter = null, $orderBy = null, $search = null)
    {
    }

    public static function SendSms($sender, $mobile, $message)
    {
        if (!$sender) {
            $sender = "SKLDKO";
        }

        $args = array(
            "apikey" => "LjeeHNL1gkiGE2uUDR5U8w",
            "text" => rawurlencode($message),
            "senderid" => urlencode($sender),
            "channel" => "trans",
            "number" => "91" . $mobile,
            "flashsms" => 0,
            "route" => 29,
            "DCS" => 0
        );

        $url = 'http://pertinaxsolution.com/api/mt/SendSMS';
        return Helper::WebRequest($url, RequestMethod::$GET, $args);
    }

    // public static function SendApplicationSms($sender, $mobile, $message)
    // {
    //     if (!$sender) {
    //         $sender = "SCHLDK";
    //     }

    //     $args = array(
    //         "authkey" => "236704ASqnxTw6up5b96449b",
    //         "message" => rawurlencode($message),
    //         "sender" => urlencode($sender),
    //         "mobiles" => "91" . $mobile,
    //         "route" => 4,
    //         "country" => 0,
    //         "DLT_TE_ID" => "1007581078055372693"
    //     );

    //     $url = 'http://sms.mondalsoft.com/api/sendhttp.php';
    //     return Helper::WebRequest($url, RequestMethod::$GET, $args);
    // }

    public static function SendApplicationSms($sender, $mobile, $message)
    {
        if (!$sender) {
            $sender = "SCHLDK";
        }

        $args = array(
            "authkey" => "9232Gn2qbH0VM",
            "text" => rawurlencode($message),
            "sender" => urlencode($sender),
            "mobile" => $mobile,
            "entityid" => "1001890354646132386",
            "templateid" => "1007729517555158095",
            "user" => "schooldekho"
        );

        $url = 'http://amazesms.in/api/pushsms';
        return Helper::WebRequest($url, RequestMethod::$GET, $args);
    }
}
