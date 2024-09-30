<?php

namespace App\Core;

use Carbon\Carbon;

class Helper
{
    public static $admin_base_url = "admin_panel/";
    public static $admin_base_route = "admin_panel.";
    public static $user_base_url = "";
    public static function BaseUrl(): string
    {

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $link = "https";
        else
            $link = "http";
        $link .= "://";
        $link .= $_SERVER['HTTP_HOST'];
        //$link .= $_SERVER['REQUEST_URI'];
        return  $link;
    }

    public static function ModelToURL($model): ?string
    {

        if (!$model) {
            return null;
        }
        $url = "?";
        foreach ($model as $key => $value) {
            $url .= $key . "=" . $value . "&";
        }
        return $url;
    }

    public static function WebRequest(string $url, int $method, $model, object $headers = null)
    {

        if (!$headers) {
            $headers = array(
                'Content-Type:application/json'
            );
        }

        $ch = null;
        switch ($method) {
            case RequestMethod::$GET:

                $url = $url . self::ModelToURL($model);
                $api_url = substr($url, 0, -1);
                $ch = curl_init($api_url);
                break;
            case RequestMethod::$POST:
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($model));
                break;
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

    public static function  GetDate($date, $format = "d M-Y")
    {
        return Carbon::parse($date)->format($format);
    }
}

class RequestMethod
{
    public static $GET = 0;
    public static $POST = 1;
}
