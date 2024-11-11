<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TDX\mrtNowTimeCurl;//20230903 add
use App\Http\Controllers\TDX\tdxCurl; //20230903 add
use App\Http\Controllers\TDX\getTdxData; //20240731 add

class mrtConinCurlController extends Controller
{
    public function getKhsMRT_NowTime($type='KRTC',$id){
        $url = 'https://tdx.transportdata.tw/api/basic/v2/Rail/Metro/LiveBoard/'.$type.'?$filter=StationID%20eq%20%27'.$id.'%27&$top=5&$format=JSON';
        $curlTDX = new getTdxData;
        $curlTDX = $curlTDX->tdxCurl($url);
        if($curlTDX!='err' && $curlTDX!='tokenErr'){
            if($curlTDX==[]){
                return 'mrtD_Err';
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
    public function curlTDX($url){
        $tdxCurl = new tdxCurl;
        return $tdxCurl->tdxCurl($url);
    }
}
