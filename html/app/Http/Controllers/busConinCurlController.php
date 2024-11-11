<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class busConinCurlController extends Controller
{
    public function busConinTime($id){
        #--------------------
        #變數宣告
        #--------------------
        $i=0;
        $go = 0;
        $goS = '';
        $goE = '';
        $back = 0;
        $backS = '';
        $backE = '';
        $coninTime = array();
        $togo = array();
        $toback = array();
        $busC = '';
        $busCarId = '';
        $busCount = 0;
        $nowCar = '';
        
        //CURL開始
        $ch = curl_init();
        $url = "https://ibus.tbkc.gov.tw/xmlbus/GetEstimateTime.xml?routeIds=".$id;
                
        //curl_setopt可以設定curl參數
        //設定url
        curl_setopt($ch , CURLOPT_URL , $url);
                    
        //獲取結果不顯示
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);  // CURLOPT_NOSIGNAL 設為 0
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 15000); // 設定最長執行 900 毫秒  
                    
        curl_setopt($ch, CURLOPT_USERAGENT, "Google Bot");//執行，並將結果存回
        $BusLine = curl_exec($ch);
        $httpCode=curl_getinfo($ch,CURLINFO_HTTP_CODE);

        if($httpCode==200){
            $xml = simplexml_load_string($BusLine);
            $xml2array = json_decode(json_encode($xml),TRUE);
            if(isset($xml2array['BusInfo']['Route']['EstimateTime'])){
                $coninData = $xml2array['BusInfo']['Route']['EstimateTime'];
                foreach($coninData as $v){
                    if($i>=0){
                        $StopName = $v['@attributes']['StopName'];
                        $GoBack = $v['@attributes']['GoBack'];
                        $Value = $v['@attributes']['Value'];
                        $Time = $comeTime = $v['@attributes']['comeTime'];
                        $carId = $v['@attributes']['carId'];
                        $comeCarid = $v['@attributes']['comeCarid'];
                        if(strpos($Value,':')==false&&(int)$Value<10){
                            if($carId!=''||$carId!=null||$carId!='null'){
                                $nowCar=$carId;
                            }
                            else if($comeCarid!=''||$comeCarid!=null||$comeCarid!='null'){
                                $nowCar = $comeCarid;
                            }
                            else{
                                $nowCar = '';
                            }
                            if($i<2){
                                $busC = $nowCar;
                                $busCarId = $nowCar;
                            }
                            else if($busC==$nowCar){
                                $busCarId = '';
                            }
                            else{
                                $busC = $nowCar;
                                $busCarId = $nowCar;
                            }
                        }
                        else{
                            $busCarId = '';
                        }
                        if($GoBack=='1'){
                            if($go==0){
                                $goS = $StopName;
                            }
                            $goE = $StopName;
                            $togo[$go]['StopName'] = $StopName;
                            $togo[$go]['time'] = $this->cheTime($Value, $Time);
                            $togo[$go]['busCarId'] = $busCarId;
                            $go++;
                        }
                        if($GoBack=='2'){
                            if($back==0){
                                $backS = $StopName;
                            }
                            $backE = $StopName;
                            $toback[$back]['StopName'] = $StopName;
                            $toback[$back]['time'] = $this->cheTime($Value, $Time);
                            $toback[$back]['busCarId'] = $busCarId;
                            $back++;
                        }
                    }
                    $i++;
                }
                
                $coninTime['backS'] = $backS;
                $coninTime['backE'] = $backE;
                $coninTime['httpCode'] = $httpCode;
                $coninTime['stationLineID'] = $id;
                $coninTime['errT'] = '';
                if($go>0 && $back==0){
                    $coninTime['type'] = 1;
                    $coninTime['togo'] = $togo;
                    $coninTime['toback'] = '';
                }
                else if($go==0 && $back>0){
                    $coninTime['type'] = 2;
                    $coninTime['togo'] = '';
                    $coninTime['toback'] = $toback;
                }
                else{
                    $coninTime['type'] = 3;
                    $coninTime['togo'] = $togo;
                    $coninTime['toback'] = $toback;
                }
            }
            else{
                $coninTime['type'] = 0;
                $coninTime['errT'] = "高雄市公車Server無回傳即時動態.";
            }
        }
        else{
            $coninTime['type'] = 0;
            $coninTime['errT'] = "高雄市交通局伺服器異常.";
        }
        return $coninTime;
    }
    public function cheTime($time, $nextTime){
        $explTime = explode(':', $time);
        $explNextTime = explode(':', $nextTime);
        if($time=='null' || $time==null || $time==''){
            if(isset($explNextTime[1])){
                return $nextTime;
            }
            else{
                return $this->cheConinTime($nextTime);
            }
        }
        else{
            if(isset($explTime[1])){
                return $time;
            }
            else{
                return $this->cheConinTime($time);
            }
        }
    }
    public function cheConinTime($num){
        if($num=='-3'){
            return "末班車已離";
        }
        else if($num==''){
            return "";
        }
        else{
            if($num=='0'){
                return "進站中！";
            }
            else if($num=='1' || $num=='2'){
                return "即將進站.";
            }
            else{
                return $num."分.";
            }
        }
    }
}
