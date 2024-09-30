<?php

namespace App\Service;

use App\Core\Helper;
use App\Core\RequestMethod;

class WhatsAppService
{
    public static function SendWhatsappMessage($receiver_number, $message)
    {
        if (strlen($receiver_number) > 10) {
            $receiver_number = substr($receiver_number, -10);
        }
        $message = rawurlencode($message);
        $sender = "9147369778";
        $api_token = "R9JSv0lRGQDaqnQpiWnIchKpLbHP6M";
        $url = "https://apinew.getitsms.com/send-msg?apikey=$api_token&sender=$sender&receiver=91$receiver_number&message=$message";
        $data = Helper::WebRequest($url, RequestMethod::$GET, null);
        return $data->status;
    }
    public static function SendWhatsappMediaMessage($receiver_number, $message, $image_url)
    {
        if (strlen($receiver_number) > 10) {
            $receiver_number = substr($receiver_number, -10);
        }
        $message = $message;
        $sender = "9147369778";
        $api_token = "R9JSv0lRGQDaqnQpiWnIchKpLbHP6M";
        $url = "https://apinew.getitsms.com/send-media";
        $data = [
            'api_key' => $api_token,
            'sender' => $sender,
            'number' => "91".$receiver_number,
            'message' => $message,
            'url' => $image_url,
            'type' => 'image'
        ];
        $req = Helper::WebRequest($url, RequestMethod::$POST, $data);
        return $req->status;
    }
}
