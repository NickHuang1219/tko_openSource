<?php

namespace App\Http\Controllers\TDX;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\TDX\getTdxData; //20240731 add

class bikeNowDataCurl extends Controller
{
    public function getKHHBikeNowData($city,$stationId){
        $url = 'https://tdx.transportdata.tw/api/basic/v2/Bike/Availability/City/'.$city.'?%24filter=StationUID%20eq%20%27'.$stationId.'%27&%24top=30&%24format=JSON';
        $curlTDX = new getTdxData;
        $curlTDX = $curlTDX->tdxCurl($url);
        if($curlTDX!='err' && $curlTDX!='tokenErr'){
            if($curlTDX==[]){
                return 'bikeD_Err';
            }
            else{
                return $curlTDX;
            }
        }
        else if($curlTDX=='err'){
            return $curlTDX;
        }
        else if($curlTDX=='tokenErr'){
            return $curlTDX;
        }
    }
}
