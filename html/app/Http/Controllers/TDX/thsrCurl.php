<?php

namespace App\Http\Controllers\TDX;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\TDX\tdxCurl; //20230903 add
use App\Http\Controllers\TDX\getTdxData; //20240731 add

class thsrCurl extends Controller
{
    // 列車所有停靠站   取得指定[日期],[車次]的時刻表資料
    
    // 車站當天停靠車次列表     取得指定[日期],[車站]的站別時刻表資料
    
	public function __construct(){
		date_default_timezone_set('Asia/Taipei');
        $this->Today = date("Y-m-d");
        $this->nowTime = date("Y-m-d H:i:00");
	}

    // 車站當日列車停靠資訊
    public function stationToday($StationID){
        $reD = [];
        $Npassing = [];
        $Nconnins = [];
        $Spassing = [];
        $Sconnins = [];

        $url = 'https://tdx.transportdata.tw/api/basic/v2/Rail/THSR/DailyTimetable/Station/'.$StationID.'/'.$this->Today.'?%24top=1000&%24format=JSON';
        $tdxCurl = new tdxCurl;
        
        $d = $tdxCurl->tdxCurl($url);
        if(count($d)>0){
            $reD['type'] = 'success';
            $reD['errT'] = '';

            foreach($d as $k=>$v){
                $StopSequence = '';

                if(isset($v['TrainNo'])==true){
                    $TrainNo = $v['TrainNo'];
                    $Direction = isset($v['Direction'])==true?$v['Direction']==1?'北上':'南下':'---';
                    $DirectionCode = isset($v['Direction'])==true?$v['Direction']:1;
                    $StartingStationNameTW = $v['StartingStationName']['Zh_tw'];
                    $EndingStationNameTW = $v['EndingStationName']['Zh_tw'];
                    $StationNameTW = $v['StationName']['Zh_tw'];

                    $TrainDate = $TrainDate = isset($v['TrainDate'])==true?$v['TrainDate']:$this->Today;
                    $ArrivalTime = isset($v['ArrivalTime'])==true?$v['ArrivalTime']:'';
                    $DepartureTime = isset($v['DepartureTime'])==true?$v['DepartureTime']:'';

                    if($ArrivalTime!='' && $DepartureTime!=''){
                        $t1 = (strtotime($this->nowTime)-strtotime($TrainDate.' '.$ArrivalTime));
                        $t2 = (strtotime($this->nowTime)-strtotime($TrainDate.' '.$DepartureTime));
                        
                        if($t2==0){ $TrainStatus='即將離站.'; $TrainStatusCode=3; }
                        else if($t1==0 || ($t1>0&&$t2<0)){ $TrainStatus='進站中.'; $TrainStatusCode=2; }
                        else if($t2>0){ $TrainStatus='已過站.'; $TrainStatusCode=0; }
                        else{ $TrainStatus='未抵達.'; $TrainStatusCode=1; }
                    }
                    else{ $TrainStatus = ''; }

                    $D = $this->thsrTodayReD($TrainNo, $Direction, $DirectionCode, 
                                $StartingStationNameTW, $EndingStationNameTW,
                                $StationNameTW, $TrainDate, $ArrivalTime, 
                                $DepartureTime, $TrainStatus, $TrainStatusCode);
                    if($TrainStatus=='已過站.'){
                        if($DirectionCode==0){ $Spassing[count($Spassing)] = $D; }
                        if($DirectionCode==1){ $Npassing[count($Npassing)] = $D; }
                    }
                    else{
                        if($DirectionCode==0){ $Sconnins[count($Sconnins)] = $D; }
                        if($DirectionCode==1){ $Nconnins[count($Nconnins)] = $D; }
                    }
                }
            }
        }
        else{
            $reD['type'] = 'err';
            $reD['errT'] = '高鐵伺服器無回傳.';
        }
        $cc = krsort($Npassing);
        $dd = krsort($Spassing);
        $reD['N'] = $StationID=='0990'?'':array_merge($Nconnins, $Npassing);//array_merge($Nconnins, $Npassing);//
        $reD['S'] = $StationID=='1070'?'':array_merge($Sconnins, $Spassing);//array_merge($Sconnins, $Spassing);//
        return json_encode($reD);
    }
    public function thsrTodayReD($TrainNo, $Direction, $DirectionCode, 
                                $StartingStationNameTW, $EndingStationNameTW,
                                $StationNameTW, $TrainDate, $ArrivalTime, 
                                $DepartureTime, $TrainStatus, $TrainStatusCode){
        $D = [];
        $D['TrainNo'] = $TrainNo; //車次號碼
        $D['Direction'] = $Direction; //方向說明
        $D['DirectionCode'] = $DirectionCode; //方向碼
        $D['StartingStationNameTW'] = $StartingStationNameTW; //起始站
        $D['EndingStationNameTW'] = $EndingStationNameTW; //終點站
        $D['StationNameTW'] = $StationNameTW; //站名

        $D['TrainDate'] = $TrainDate; //日期
        $D['ArrivalTime'] = $ArrivalTime; //到達時間
        $D['DepartureTime'] = $DepartureTime; //出發時間
        $D['TrainStatus'] = $TrainStatus; //列車狀態說明
        $D['TrainStatusCode'] = $TrainStatusCode; //列車狀態碼

        return $D;
    }
	
    // 起訖站查詢停靠列車
    public function thsrOD($SID, $EID){
        $reD = [];
        $passing = [];
        $connins = [];
        $i = 0;
        $j = 0;
        $TrainStatusCode = 0;
        $StandardSeatStatus = '';
        $BusinessSeatStatus = '';

        // 查詢當日起訖站列車班表
        $url = 'https://tdx.transportdata.tw/api/basic/v2/Rail/THSR/DailyTimetable/OD/'.$SID.'/'.'to/'.$EID.'/'.$this->Today.'?%24top=1000&%24format=JSON';
        $tdxCurl = new tdxCurl;

        $d = $tdxCurl->tdxCurl($url);
        if($d!='tokenErr' && $d!='err'){
            $reD['type'] = 'success';
            $reD['errT'] = '';
            if(count($d)>0){
                foreach($d as $k=>$v){
                    $StopSequence = '';
                    if(isset($v['DailyTrainInfo']['TrainNo'])==true){
                        $TrainNo = $v['DailyTrainInfo']['TrainNo'];
                        $Direction = isset($v['DailyTrainInfo']['Direction'])==true?$v['DailyTrainInfo']['Direction']==1?'北上':'南下':'---';
                        $StartingStationNameTW = $v['DailyTrainInfo']['StartingStationName']['Zh_tw'];
                        $EndingStationNameTW = $v['DailyTrainInfo']['EndingStationName']['Zh_tw'];
                        $startStationNameTW = $v['OriginStopTime']['StationName']['Zh_tw'];
                        $startStationID = $v['OriginStopTime']['StationID'];
                        $endStationNameTW = $v['DestinationStopTime']['StationName']['Zh_tw'];
                        $endStationID = $v['DestinationStopTime']['StationID'];
    
                        // 站序
                        $StartStopSequence = isset($v['OriginStopTime']['StopSequence'])==true?$v['OriginStopTime']['StopSequence']:'';
                        $StopStopSequence = isset($v['DailyTrainInfo']['StopSequence'])==true?$v['DailyTrainInfo']['StopSequence']:'';
    
                        $TrainDate = $TrainDate = isset($v['TrainDate'])==true?$v['TrainDate']:$this->Today;
                        $OriginStopTimeA = isset($v['OriginStopTime']['ArrivalTime'])==true?$v['OriginStopTime']['ArrivalTime']:'';
                        $OriginStopTimeD = isset($v['OriginStopTime']['DepartureTime'])==true?$v['OriginStopTime']['DepartureTime']:'';
                        $DestinationStopTimeA = isset($v['DestinationStopTime']['ArrivalTime'])==true?$v['DestinationStopTime']['ArrivalTime']:'';
                        $DestinationStopTimeD = isset($v['DestinationStopTime']['DepartureTime'])==true?$v['DestinationStopTime']['DepartureTime']:'';
    
                        if($DestinationStopTimeA!='' && $OriginStopTimeD!=''){
                            $toTime = ((strtotime($TrainDate.' '.$DestinationStopTimeA)-
                                        strtotime($TrainDate.' '.$OriginStopTimeD))/60).'分鐘.';
                        }
                        else{ $toTime = ''; }
    
                        if($DestinationStopTimeA!='' && $DestinationStopTimeD!=''){
                            $t1 = (strtotime($this->nowTime)-strtotime($TrainDate.' '.$OriginStopTimeA));
                            $t2 = (strtotime($this->nowTime)-strtotime($TrainDate.' '.$OriginStopTimeD));
                            
                            if($t2==0){ $TrainStatus='即將離站.'; $TrainStatusCode=3; }
                            else if($t1==0 || ($t1>0&&$t2<0)){ $TrainStatus='進站中.'; $TrainStatusCode=2; }
                            else if($t2>0){ $TrainStatus='已過站.'; $TrainStatusCode=0; }
                            else{ $TrainStatus='未抵達.'; $TrainStatusCode=1; }
                        }
                        else{ $TrainStatus = ''; }
                        $D = $this->thsrODReD($TrainNo, $Direction, $StartingStationNameTW, 
                                                $EndingStationNameTW, $startStationNameTW, 
                                                $startStationID, $endStationNameTW, 
                                                $endStationID, $TrainDate, 
                                                $OriginStopTimeA, $OriginStopTimeD, 
                                                $DestinationStopTimeA, $DestinationStopTimeD, 
                                                $toTime, $TrainStatus, $TrainStatusCode,
                                                $StandardSeatStatus, $BusinessSeatStatus);
                        if($TrainStatus=='已過站.'){ $passing[count($passing)] = $D; }
                        else{ $connins[count($connins)] = $D; }
                    }
                }
            }
            else{
                $reD['type'] = 'err';
                $reD['errT'] = '高鐵伺服器回傳異常.';
            }
        }
        else{
            $reD['type'] = 'err';
            $reD['errT'] = '高鐵伺服器無回應.';
        }
        $dd = krsort($passing);
        $reD['all'] = array_merge($connins, $passing);
        $reD['connins'] = $connins;
        $reD['passing'] = $passing;
        return json_encode($reD);
    }
    public function thsrODReD($TrainNo, $Direction, $StartingStationNameTW, 
                                $EndingStationNameTW, $startStationNameTW, 
                                $startStationID, $endStationNameTW, 
                                $endStationID, $TrainDate, 
                                $OriginStopTimeA, $OriginStopTimeD, 
                                $DestinationStopTimeA, $DestinationStopTimeD, 
                                $toTime, $TrainStatus, $TrainStatusCode,
                                $StandardSeatStatus, $BusinessSeatStatus){
        $D = [];
        $D['TrainNo'] = $TrainNo;
        $D['Direction'] = $Direction;
        $D['StartingStationNameTW'] = $StartingStationNameTW;
        $D['EndingStationNameTW'] = $EndingStationNameTW;
        $D['startStationNameTW'] = $startStationNameTW;
        $D['startStationID'] = $startStationID;
        $D['endStationNameTW'] = $endStationNameTW;
        $D['endStationID'] = $endStationID;

        $D['TrainDate'] = $TrainDate;
        $D['OriginStopTimeA'] = $OriginStopTimeA;
        $D['OriginStopTimeD'] = $OriginStopTimeD;
        $D['DestinationStopTimeA'] = $DestinationStopTimeA;
        $D['DestinationStopTimeD'] = $DestinationStopTimeD;
        $D['toTime'] = $toTime;
        $D['TrainStatus'] = $TrainStatus;
        $D['TrainStatusCode'] = $TrainStatusCode;
        $D['StandardSeatStatus'] = $StandardSeatStatus;
        $D['BusinessSeatStatus'] = $BusinessSeatStatus;

        return $D;
    }
    public function SeatStatusT($seat, $type){
        $seatText = '';
        $seatType = '';
        if($type=='StandardSeatStatus'){ $seatType = '表準座位'; }
        if($type=='BusinessSeatStatus'){ $seatType = '商務座位'; }
        if($seatType!=''){
            if($seat=='O'){ $seatText = $seatType.': 尚有座位.'; }
            else if($seat=='L'){ $seatText = $seatType.': 座位有限.'; }
            else if($seat=='X'){ $seatText = $seatType.': 無座位.'; }
            else{ $seatText = ''; }
        }
        return $seatText;
    }

    // 
    public function seatTextColor($seat){
        $color = '';
        if($seat=='O'){ $color = '#00BB00'; }
        else if($seat=='L'){ $color = '#FF8000'; }
        else if($seat=='X'){ $color = '#FF0000'; }
        return $color;
    }

    // 點到點座位資訊
    public function TrainStaToStaSeatData($SID, $EID, $TrainNo){
        $url = 'https://tdx.transportdata.tw/api/basic/v2/Rail/THSR/AvailableSeatStatus/Train/OD/'.$SID.'/'.'to/'.$EID.'/'.'TrainDate/'.$this->Today.'/TrainNo'.'/'.$TrainNo.'?%24top=30&%24format=JSON';
        $tdxCurl = new tdxCurl;
        $d = $tdxCurl->tdxCurl($url);
        $arr = [];
        // return $d;
        if(isset($d['AvailableSeats'][0]['StandardSeatStatus'])==true && isset($d['AvailableSeats'][0]['BusinessSeatStatus'])==true){ 
            $StandardSeatStatus = $d['AvailableSeats'][0]['StandardSeatStatus'];
            $BusinessSeatStatus = $d['AvailableSeats'][0]['BusinessSeatStatus'];
            $arr['StandardSeatStatus'] = $StandardSeatStatus; 
            $arr['BusinessSeatStatus'] = $BusinessSeatStatus; 
            return $arr;
        }
    }
    
    // 點到點座位資訊API
    public function TrainSeatData($SID, $EID, $TrainNo){
        $url = 'https://tdx.transportdata.tw/api/basic/v2/Rail/THSR/AvailableSeatStatus/Train/OD/'.$SID.'/'.'to/'.$EID.'/'.'TrainDate/'.$this->Today.'/TrainNo'.'/'.$TrainNo.'?%24top=30&%24format=JSON';
        $tdxCurl = new tdxCurl;
        $d = $tdxCurl->tdxCurl($url);
        $arr = [];
        if(isset($d['AvailableSeats'][0]['StandardSeatStatus'])==true && isset($d['AvailableSeats'][0]['BusinessSeatStatus'])==true){ 
            $StandardSeatStatus = $this->SeatStatusT($d['AvailableSeats'][0]['StandardSeatStatus'],'StandardSeatStatus');
            $BusinessSeatStatus = $this->SeatStatusT($d['AvailableSeats'][0]['BusinessSeatStatus'],'BusinessSeatStatus');
            $StandardSeatColor = $StandardSeatStatus!=''?$this->seatTextColor($d['AvailableSeats'][0]['StandardSeatStatus']):'';
            $BusinessSeatColor = $BusinessSeatStatus!=''?$this->seatTextColor($d['AvailableSeats'][0]['BusinessSeatStatus']):'';
            $arr['type'] = $StandardSeatStatus!=''&&$BusinessSeatStatus!=''?'success':'err'; 
            $arr['errT'] = $StandardSeatStatus==''&&$BusinessSeatStatus==''?'高鐵伺服器異常.':''; 
            $arr['StandardSeatStatus'] = $StandardSeatStatus; 
            $arr['BusinessSeatStatus'] = $BusinessSeatStatus; 
            $arr['StandardSeatColor'] = $StandardSeatColor; 
            $arr['BusinessSeatColor'] = $BusinessSeatColor; 
            return json_encode($arr);
        }
    }
    
    public function thsrStopData($TrainNo){
        #依日期和車次取得列車停靠資訊
        $arr = [];
        if($TrainNo=='' || !is_numeric($TrainNo)){
            $arr['type'] = 'err';
            $arr['errT'] = 'ID錯誤.';
        }
        else{
            $url = 'https://tdx.transportdata.tw/api/basic/v2/Rail/THSR/DailyTimetable/TrainNo/'.$TrainNo.'/TrainDate'.'/'.$this->Today.'?%24top=30&%24format=JSON';
            $tdxCurl = new tdxCurl;
            $d = $tdxCurl->tdxCurl($url);

            $stopStation = [];
            $arr['type'] = count($d)>0 && $d!=''?'success':'err'; 
            $arr['errT'] = count($d)>0 && $d!=''?'':'高鐵伺服器異常.'; 
            if(count($d)>0 && $d!=''){
                $arr['TrainNo'] = isset($d[0]['DailyTrainInfo']['TrainNo'])?$d[0]['DailyTrainInfo']['TrainNo']:'---';
                $arr['StartingStationID'] = isset($d[0]['DailyTrainInfo']['StartingStationID'])?$d[0]['DailyTrainInfo']['StartingStationID']:'---';
                $arr['StartingStationName'] = isset($d[0]['DailyTrainInfo']['StartingStationName']['Zh_tw'])?$d[0]['DailyTrainInfo']['StartingStationName']['Zh_tw']:'---';
                $arr['EndingStationID'] = isset($d[0]['DailyTrainInfo']['EndingStationID'])?$d[0]['DailyTrainInfo']['EndingStationID']:'---';
                $arr['EndingStationName'] = isset($d[0]['DailyTrainInfo']['EndingStationName']['Zh_tw'])?$d[0]['DailyTrainInfo']['EndingStationName']['Zh_tw']:'---';
                if(count($d[0]['StopTimes'])>0 && isset($d[0]['StopTimes'])){
                    $arr['stopCount'] = count($d[0]['StopTimes']);
                    foreach($d[0]['StopTimes'] as $k=>$v){
                       $stopStation[$k]['StationID'] = isset($v['StationID'])?$v['StationID']:'---';
                       $stopStation[$k]['StationName'] = isset($v['StationName']['Zh_tw'])?$v['StationName']['Zh_tw']:'---';
                       $stopStation[$k]['ArrivalTime'] = isset($v['ArrivalTime'])?$v['ArrivalTime']:'未定';
                       $stopStation[$k]['DepartureTime'] = isset($v['DepartureTime'])?$v['DepartureTime']:'未定';
                    }
                }
                $arr['StopTimes'] = $stopStation;
            }
        }
        return response()->json($arr);
    }


    // 起訖站座位查詢
    public function thsrODNowData($SID, $EID){
        // 取得指定[日期], [起迄站]對號座即時剩餘位資料(加值型列車起迄段OD角度)
    }

    // 列車停靠資訊
    public function stationTrainNowData(){
        // 取得當天對號座即時剩餘位資料({原始}列車區段Leg角度)
    }

    // 列車停靠資訊+路線全部點到點座位資訊
    public function TrainStaToStaAllData(){
        // 取得當天對號座即時剩餘位資料({原始}列車區段Leg角度)
    }
}
