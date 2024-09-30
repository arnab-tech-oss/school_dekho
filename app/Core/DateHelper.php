<?php
namespace App\Core;

use DateTime;

class DateHelper {

    public static function GetDateTimspan($start,$end,$of){

        if ($of!="Day" && $of!="Month" && $of!="Months" && $of!="Dates" && $of!="MonthCount" && $of!="Object") {
            return null;
        }

        if ($of==="Day") {
            return self::GetDay($start,$end);
        }

        if ($of==="Month") {
            return self::GetMonth($start,$end);
        }

        $monthCount=self::GetMonthCount($start,$end);
        $dateList=array();
        $bindStartDate=self::BindStartDate($start);
        $bindEndDate=self::BindEndDate($end);
        for ($i=1; $i <=$monthCount ; $i++) {
            $date= self::AddMonth($bindStartDate,$i);
            if ($bindEndDate>$date) {
                    array_push($dateList, $date);
                }
        }


        $listObj=array();

        foreach ($dateList as  $value) {

            if ($of==="Months") {
                array_push($listObj, (int) date("m",strtotime($value)));
            }

            if ($of==="Dates") {
                array_push($listObj, date("Y-m-d",strtotime($value)));
            }

            if ($of==="Object") {
                $obj=array(
                    "Year" => (int) date("Y",strtotime($value)),
                    "Name" => date("M",strtotime($value)),
                    "Value" => (int) date("m",strtotime($value)),
                    "Day" => (int) date("d",strtotime($value)),
                    "Date" =>  date("Y-m-d",strtotime($value))

                );

                array_push($listObj, (object) $obj);
            }
            
        }

        if ($of==="MonthCount") {
            return  count($dateList);
        }

        return $listObj;
    }


    public static function BindStartDate($date){
        $day=date('d', strtotime($date));

        if ($day==30 || $day==31) {
            return date('Y-m', strtotime($date))."-28";
        }

        return $date;
    }

    public static function AddMonth($date,$month){
        return date('Y-m-d', strtotime($date. ' + '. $month .'month'));
    }

    public static function BindEndDate($date){
        return date('Y-m', strtotime($date))."-01";
    }

    public static function AddDays($date,$day){
        return date('Y-m-d', strtotime($date. ' + '. $day .'day'));
    }


    public static function GetMonthCount($from,$to){
        // $fDate=date("Y-m",strtotime($from))."-01";
        // $day=self::GetDayOfMonth($to);
        // if ($day==28 || $day==29) {
        // 	$day=30;
        // }
        // $tDate=self::AddDays(date("Y-m",strtotime($to))."-".$day,1);
        $toTime=strtotime($to);
        $fromTime=strtotime($from);
        $difference = $toTime - $fromTime;
        $days = floor($difference / (60*60*24));
        return ceil($days/30);
    }


    public static function GetDay($from,$to){
            $toTime=strtotime($to);
            $fromTime=strtotime($from);
            $difference = $toTime - $fromTime;
            return $days = floor($difference / (60*60*24));
    }

    public static function GetMonth($from,$to){
            $toTime=strtotime($to);
            $fromTime=strtotime($from);
            $difference = $toTime - $fromTime;
            return floor($difference / (60*60*24*30));
    }


    public static function GetDayOfMonth($date){
        $time=strtotime($date);
        return cal_days_in_month(CAL_GREGORIAN,date("m",$time),date("Y",$time));
    }


    public static function GetMinutesBetweenTwoDate($from,$to){
        $formDate=new DateTime($from);
        $toDate=new DateTime($to);
        $diff = $formDate->diff($toDate);
        $minutes = ($diff->days * 24 * 60) +
           ($diff->h * 60) + $diff->i;
           return $minutes;
    }

}


?>