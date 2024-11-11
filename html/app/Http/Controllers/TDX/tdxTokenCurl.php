<?php

namespace App\Http\Controllers\TDX;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class tdxTokenCurl extends Controller
{
    public function getToken(){
        $client_id = '無法提供';
        $client_secret = '無法提供';
        $token = 'err';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://tdx.transportdata.tw/auth/realms/TDXConnect/protocol/openid-connect/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id='.$client_id.'&client_secret='.$client_secret);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $httpCodes=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($httpCodes==200){ $token = json_decode($result,1)['access_token']; }
        return $token;
    }
}
