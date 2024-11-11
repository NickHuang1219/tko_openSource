<?php

namespace App\Http\Controllers\TDX;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\TDX\tdxTokenCurl; //20221227 add
use DB; //20221227 add

use App\Http\Controllers\TDX\getTdxData; //20240731 add

class tdxCurl extends Controller
{
    public function __construct(){
        $this->access_tokenNum = 0;
    }
    
    public function tdxCurl($url){
        $curlTDX = new getTdxData;
        $curlTDX = $this->tdxCurl($url);
        return $curlTDX;
    }
    public function tdxCurls($url){
        $access_token = $this->getTdxToken();
        if($access_token!='err'){
            $che = curl_init();
            curl_setopt($che, CURLOPT_URL, $url);
            curl_setopt($che, CURLOPT_HTTPHEADER, array('authorization: Bearer '.$access_token));
            curl_setopt($che, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($che, CURLOPT_RETURNTRANSFER, 1);
            $tdxData = curl_exec($che);
            $httpCode=curl_getinfo($che,CURLINFO_HTTP_CODE);
            curl_close($che);
            
            if($httpCode==200){
                $tdxData = json_decode($tdxData,true);
                return $tdxData;
            }
            else if($httpCode==401){ \Log::info('tokenErr'); return 'tokenErr'; }
            else{ \Log::info('err.'); return 'err'; }
        }
        else{ return 'tokenErr'; }
    }
    public function getTdxToken(){
        date_default_timezone_set('Asia/Taipei');
        $dataNow = date("Y-m-d H:i:s");
        $dataStr = date("Y-m-d 00:00:00");
        $dataTime = strtotime(date("Y-m-d 00:00:00"));
        $tdxtokenDB = DB::table('tdxtoken')->where('tdxIndex','=',1)->get();
        if(count($tdxtokenDB)==1){
            if(strtotime(date("Y-m-d H:i:s"))<(strtotime(date($tdxtokenDB[0]->tokendate))+86000)){
                return $tdxtokenDB[0]->tdxtoken;
            }
            else{
                $tokenocUpdate = DB::table('tdxtoken')->where('tdxIndex', '=', 1)->update(['updateOC'=>1]);
                $token = new tdxTokenCurl;
                $tdxtoken = $token->getToken();
                if($tdxtoken=='err'){ 
                    $ocUpdate = DB::table('tdxtoken')->where('tdxIndex', '=', 1)->update(['updateOC'=>0]);
                    return 'err'; 
                }
                else{
                    $ocUpdate = DB::table('tdxtoken')->where('tdxIndex', 1)->update(['tdxtoken'=>$tdxtoken]);
                    $ocUpdate = DB::table('tdxtoken')->where('tdxIndex', 1)->update(['tokendate'=>date("Y-m-d H:i:s")]);
                    $ocUpdate = DB::table('tdxtoken')->where('tdxIndex', 1)->update(['updateOC'=>0]);
                    return $tdxtoken;
                }
            }
        }
        else{ \Log::info("err."); return 'err'; }
    }
}
