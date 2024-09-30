<?php

namespace App\Core;

use DateTime;

class BaseCore {

    public  static function NewID(){
		return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0);
	}

    public static function GetDateTime(){
        date_default_timezone_set("Asia/Kolkata");
        $fineStamp = date('Y-m-d\TH:i:s').substr(microtime(), 1, 9);
        $d = new DateTime($fineStamp);
        $date=$d->format('Y-m-d H:i:s.u').PHP_EOL;
        return substr($date, 0, -2);
    }



    public static function CopyModel($model, $newModel)
    {
        $list = array();
        $data = json_decode($model);
        foreach ($data as $k => $value) {
            $obj = new Property();
            $obj->name = $k;
            $obj->value = $value;
            array_push($list, $obj);
        }

        foreach ($newModel as $key => $value) {

            if (property_exists($data, $key)) {
                $index = array_search($key, array_column($list, 'name'));
                $p = $list[$index];
                $newModel->$key = $p->Value;
            }
        }

        return $newModel;
    }


    public static function GetPathData($url) : PathData{
        $path = pathinfo($url);
        $extension=null;
        if(isset($path['extension'])){
            $extension= ".".$path['extension'];
        }
        $obj=new PathData();
        $obj->name=$path['filename'];
        $obj->extension=$extension;
        $obj->file_name=$obj->name.$obj->extension;
        return $obj;
    }
}

class Property
{
    public $name;
    public $value;
}

class PathData {
    public $name;
    public $extension;
    public $file_name;
}
