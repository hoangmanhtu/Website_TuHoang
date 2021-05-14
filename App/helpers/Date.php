<?php
class Date{
  public static function getListDayInMoth(){
    $arraryDay=[];
    $month=date('m');
    $year=date("Y");
    for ($day=1;$day<=31;$day++){
      $time=mktime(12,0,0,$month,$day,$year);
      if(date('m')==$month){
        $arraryDay[]=date('Y-m-d',$time);
      }
    }
    return $arraryDay;
  }
}