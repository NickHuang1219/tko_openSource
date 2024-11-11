<?php

namespace App\Http\Controllers\TDX;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //20240731 add

class getTdxToken extends Controller
{
    public function getToken(){
        $i = 0;
        $tokenKP = [['k'=>'無法提供', 'p'=>'無法提供'],
                    ['k'=>'無法提供', 'p'=>'無法提供'],
                    ['k'=>'無法提供', 'p'=>'無法提供'],
                    ['k'=>'無法提供', 'p'=>'無法提供'],
                    ['k'=>'無法提供', 'p'=>'無法提供'],
                    ['k'=>'無法提供', 'p'=>'無法提供'],
                    ];

        foreach($tokenKP as $k=>$d){
            $getR = $this->curlTdxGetToken($d['k'], $d['p']);
            if($getR==1){ $i += 1; }
            else if($getR==0){ \Log::info('getTdxToken->k:'.$d['k'].'.  tdx server error.'); }
            else if($getR=='eu'){ \Log::info('eu getTdxToken->k:'.$d['k'].'.  lionfree server db crud error.'); }
            else if($getR=='ei'){ \Log::info('ei getTdxToken->k:'.$d['k'].'.  lionfree server db crud error.'); }
            else{  \Log::info('getTdxToken othere error.');  }
            if($k+1==count($tokenKP)){
                try{
                    $newToken = DB::table('tdxtokens')->first();
                    $updateUser = DB::update('update tdxtokens set tokenNum=? where TdxKeyId=?', 
                                                [$newToken->tokenNum+1, $newToken->tdxKeyId]);
                    return $newToken->tdxtoken;
                }
                catch(\Exception $exception){ return null; }
            }
        }
    }

    public function curlTdxGetToken($client_id, $client_secret){\Log::info('curlTdxGetToken');
        $token = 'err';
        $datetime = date("Y-m-d H:i:s");
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://tdx.transportdata.tw/auth/realms/TDXConnect/protocol/openid-connect/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id='.$client_id.'&client_secret='.$client_secret);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $httpCodes=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($httpCodes==200){
            $token = json_decode($result,1)['access_token'];
            $tokenDB = DB::table('tdxtokens')->where('tdxKeyId',$client_id)->get();
            if(count($tokenDB)==1){
                try{
                    $updateUser = DB::update('update tdxtokens set tokenTime=?, tokendate=?, tdxtoken=?, updateOC=?, tokenNum=?, tokenNumDate=? where TdxKeyId=?', 
                                                [2400, $datetime, $token, 1, 0, date("Y-m-d H:i:s"), $client_id]);
                    return 1;
                }
                catch(\Exception $exception){ return 'eu'; }
            }
            else if(count($tokenDB)==0){
                try{
                    $innsertDB = DB::insert('insert into tdxtokens (tdxIndex, tokenTime, tokendate, tdxtoken, updateOC, tdxKeyId, tokenNum, tokenNumDate) 
                            values (?, ?, ?, ?, ?, ?, ?, ?)', 
                            [0, 2400, $datetime, $token, 1, $client_id, 0, date("Y-m-d H:i:s")]);
                    return 1;
                }
                catch(\Exception $exception){ return 'ei'; }
            }
            
        }
        else{
            return 0;
        }
    }
}
