<?php

namespace App\Http\Controllers\TDX;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //20240731 add
use App\Http\Controllers\TDX\getTdxToken;

class getTdxData extends Controller
{
    public function __construct(){
        $this->access_tokenNum = 0;
    }

    public function tdxCurl($url){
        $access_token = $this->getTdxToken();
        
        if($access_token!='err'){
            \Log::info('tdx token != err');
            $che = curl_init();
            curl_setopt($che, CURLOPT_URL, $url);
            curl_setopt($che, CURLOPT_HTTPHEADER, array('authorization: Bearer '.$access_token));
            curl_setopt($che, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($che, CURLOPT_RETURNTRANSFER, 1);
            $tdxData = curl_exec($che);
            $httpCode=curl_getinfo($che,CURLINFO_HTTP_CODE);
            curl_close($che);
            
            if($httpCode==200){
                \Log::info("tdx 200".json_encode($tdxData));
                $tdxData = json_decode($tdxData,true);
                return $tdxData;
            }
            else if($httpCode==401){ \Log::info('tdx tokenErr'); return 'tokenErr'; }
            else{ \Log::info('tdx err.'); return 'err'; }
        }
        else{ return 'tokenErr'; }
    }
    public function getTdxToken(){
        $i = 0;
        $dateTimes = strtotime(date("Y-m-d H:i:s"));
        $dateTimes1 = strtotime(date("Y-m-d H:i"));
        $tdxtokenDB = DB::table('tdxtokens')->get();
        
        if(count($tdxtokenDB)>0){
            foreach($tdxtokenDB as $k=>$v){
                if(((strtotime(date($v->tokendate))+1800)>$dateTimes)&&(strtotime(date($v->tokendate))<$dateTimes)){
                    if((int)$v->tokenNum<5 && $dateTimes1<(strtotime(date("Y-m-d H:i",strtotime($v->tokenNumDate)))+60)){
                        $updateUser = DB::update('update tdxtokens set tokenNum=? where TdxKeyId=?', 
                                                        [$v->tokenNum+1, $v->tdxKeyId]);
                        return $v->tdxtoken;
                    }
                    else if($dateTimes1>(strtotime(date("Y-m-d H:i",strtotime($v->tokenNumDate)))+60)){
                        $updateUser = DB::update('update tdxtokens set tokenNum=?, tokenNumDate=? where TdxKeyId=?', 
                                                    [1, date("Y-m-d H:i:s"), $v->tdxKeyId]);
                            return $v->tdxtoken;
                    }
                }
                else if((strtotime(date($v->tokendate))+1800)<$dateTimes /*($k+1)==$tdxtokenDB->count()*/){
                    $token = new getTdxToken;
                    $tdxtoken = $token->getToken();
                    if($tdxtoken!=null){
                        return $tdxtoken;
                    }
                    else{ return 'err'; }
                }
                else{ /** */ }
            }
        }
        else{ /*\Log::info("err."); return 'err';*/ }
    }
    public function newTdxToken(){
        $token = new getTdxToken;
        $tdxtoken = $token->getToken();
        return 'ok';
    }
}
