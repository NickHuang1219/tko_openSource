<?php

namespace App\Http\Controllers\TDX;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Http\Controllers\TDX\mrtNowTimeCurl;//20221205
use App\Http\Controllers\TDX\tdxCurl; //20230904 add

class traToday_NowData extends Controller
{
    public function getStationNow($StationID){
        $url = 'https://tdx.transportdata.tw/api/basic/v3/Rail/TRA/StationLiveBoard?%24filter=StationID%20eq%20%27'.$StationID.'%27&%24top=30&%24format=JSON';
        return $this->curlTDX($url);
    }

    public function getStationToday($StationID){
        $url = 'https://tdx.transportdata.tw/api/basic/v3/Rail/TRA/DailyStationTimetable/Today/Station/'.$StationID.'?%24top=1000&%24format=JSON';
        return $this->curlTDX($url);
    }

    // 取得車站列車進站資訊
    public function getTrainNow($trainNo){
        $url = 'https://tdx.transportdata.tw/api/basic/v3/Rail/TRA/StationLiveBoard?%24filter=TrainNo%20eq%20%27'.$trainNo.'%27&%24top=30&%24format=JSON';
        return $this->curlTDX($url);
    }

    // 取得列車目前位置 20230224 add
    public function getTrainAddr($trainNo){
        $url = 'https://tdx.transportdata.tw/api/basic/v3/Rail/TRA/TrainLiveBoard?%24filter=TrainNo%20eq%20%27'.$trainNo.'%27&%24top=30&%24format=JSON';
        return $this->curlTDX($url);
    }

    public function curlTDX($url){
        $tdxCurl = new tdxCurl;
        return $tdxCurl->tdxCurl($url);
    }
    public function getTDX_Token(){
        $tdx_Token = new tdxTokenCurl;
        return $tdx_Token->getToken();
    }
}
