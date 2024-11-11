<?php

namespace App\Http\Controllers\cmsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use mysqli;
use DB;

class getTDXbuslineController extends Controller
{
    public function curlGetBusline(){
        $url = 'https://tdx.transportdata.tw/api/basic/v2/Bus/Route/City/Kaohsiung?%24top=1000&%24format=JSON';
    
        $appId = '無法提供';
        $appKey = '無法提供';
        
        $hostname="127.0.0.1";
        $username="root";
        $password="";
        $dbname="id14884914_tkogo";
        $yourfield = "your_field";
        $connection = new mysqli($hostname, $username, $password, $dbname);
        $connection->set_charset("utf8");
        if($connection->connect_error){
            die("資料庫連接失敗: " . $connection->connect_error."<br>");
        }
        else{ echo '資料庫連接成功<br>'; }
    
        $client_id = $appId;
        $client_secret = $appKey;
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://tdx.transportdata.tw/auth/realms/TDXConnect/protocol/openid-connect/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id='.$appId.'&client_secret='.$appKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
    
        $access_token = json_decode($result,1)['access_token'];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('authorization: Bearer '.$access_token));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $busEstimatedTime = curl_exec($ch);
        $httpCode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);
        $d = json_decode($busEstimatedTime,true);
    
    
        if($httpCode==200 && count($d)>0){
            echo 'HttpCode: '.$httpCode.'<br><br>';
            if($connection->error){}
            else{
                $bbmrouteS = "SELECT * FROM bbmrouteclass WHERE cityCodeS="."'KHH' order by sort";
                $routeclass = $connection->query($bbmrouteS);
                
                $bbmR = null;
                try{
                    $dbArr = DB::table('bbmrouteclass')->where([['cityCodeS','=','KHH']])->orderBy('sort')->get();
                    $bbmR = $dbArr->count()>0?$dbArr->count():null;
                }
                catch(\Exception $exception){
                }
    
                if($bbmR!=null){
                    $fetch = $routeclass->fetch_assoc();
                    foreach($d as $v){
                        $BClass = 'E';
                        $DArray = json_decode(json_encode($v), true);

                        if(isset($DArray['RouteUID']) && isset($DArray['RouteID']) && isset($DArray['SubRoutes'][0]['Headsign']) && 
                            isset($DArray['SubRoutes'][0]['SubRouteName']['Zh_tw'])){
                                foreach($routeclass as $fv){
                                    $Headsign1 = mb_split('',$Headsign,1)[0];

                                    if($fv['checkfirtype']=='Num'&&is_numeric($Headsign1)){
                                        $Headsign1 = str_split($Headsign,$fv['checkfirch']-1)[0];
                                        $Headsign2 = str_split($Headsign,$fv['checkfirch']-1)[0];
                                        $Headsign3 = str_split($Headsign,$fv['checkfirch']-1)[0];
                                        $Headsign4 = str_split($Headsign,$fv['checkfirch']-1)[0];
                                        $Headsign5 = str_split($Headsign,$fv['checkfirch']-1)[0];
                                        echo '<br>'.$Headsign2[0].'---Num: '.$DArray['SubRoutes'][0]['SubRouteName']['Zh_tw']; 
                                    }
                                    else if($fv['checkfirtype']=='TWS+Num'&&str_split($Headsign,strlen($fv['checkfirs']))[0]=='紅'){ echo '<br>'.str_split($Headsign,(strlen($fv['checkfirs'])+1))[0].'---TWS+Num: '.$DArray['SubRoutes'][0]['SubRouteName']['Zh_tw']; }
                                    else{}
                                }
                        }
                        $Headsign1 = str_split($Headsign,1)[0];
                        $Headsign2 = str_split($Headsign,2)[0];
                        $Headsign3 = str_split($Headsign,3)[0];
                        $Headsign4 = str_split($Headsign,4)[0];
                        $Headsign5 = str_split($Headsign,5)[0];
                        if($Headsign1=='T'){
                            $T4 = str_split(mb_split('T',$Headsign)[1],4)[0];
                            $T3 = str_split(mb_split('T',$Headsign)[1],3)[0];
                            $T2 = str_split(mb_split('T',$Headsign)[1],2)[0];
                            $T1 = str_split(mb_split('T',$Headsign)[1],1)[0];
                            if((int)$T4>999){
                                $BClass = 'e';
                                $seRounts = (int)$T4;
                            }
                            else if((int)$T3>99){
                                $BClass = 'e';
                                $seRounts = (int)$T3;
                            }
                            else if((int)$T2>9){
                                $BClass = 'e';
                                $seRounts = (int)$T2;
                            }
                            else if((int)$T1>=0){
                                $BClass = 'e';
                                $seRounts = (int)$T1;
                            }
                            else{
                                $BClass = 'e';
                                $seRounts = 99999999;
                            }
                        }
                        else if($Headsign3=='紅'){
                            $R4 = str_split(mb_split('紅',$Headsign)[1],4)[0];
                            $R3 = str_split(mb_split('紅',$Headsign)[1],3)[0];
                            $R2 = str_split(mb_split('紅',$Headsign)[1],2)[0];
                            $R1 = str_split(mb_split('紅',$Headsign)[1],1)[0];
                            if((int)$R4>999){
                                $BClass = 'r';
                                $seRounts = (int)$R4;
                            }
                            else if((int)$R3>99){
                                $BClass = 'r';
                                $seRounts = (int)$R3;
                            }
                            else if((int)$R2>9){
                                $BClass = 'r';
                                $seRounts = (int)$R2;
                            }
                            else if((int)$R1>=0){
                                $BClass = 'r';
                                $seRounts = (int)$R1;
                            }
                            else{
                                $BClass = 'r';
                                $seRounts = 99999999;
                            }
                        }
                        else if($Headsign3=='黃'){
                            $Y4 = str_split(mb_split('黃',$Headsign)[1],4)[0];
                            $Y3 = str_split(mb_split('黃',$Headsign)[1],3)[0];
                            $Y2 = str_split(mb_split('黃',$Headsign)[1],2)[0];
                            $Y1 = str_split(mb_split('黃',$Headsign)[1],1)[0];
                            if((int)$Y4>999){
                                $BClass = 'y';
                                $seRounts = (int)$Y4;
                            }
                            else if((int)$Y3>99){
                                $BClass = 'y';
                                $seRounts = (int)$Y3;
                            }
                            else if((int)$Y2>9){
                                $BClass = 'y';
                                $seRounts = (int)$Y2;
                            }
                            else if((int)$Y1>=0){
                                $BClass = 'y';
                                $seRounts = (int)$Y1;
                            }
                            else{
                                $BClass = 'y';
                                $seRounts = 99999999;
                            }
                        }
                        else if($Headsign3=='綠'){
                            $Gre4 = str_split(mb_split('綠',$Headsign)[1],4)[0];
                            $Gre3 = str_split(mb_split('綠',$Headsign)[1],3)[0];
                            $Gre2 = str_split(mb_split('綠',$Headsign)[1],2)[0];
                            $Gre1 = str_split(mb_split('綠',$Headsign)[1],1)[0];
                            if((int)$Gre4>999){
                                $BClass = 'gre';
                                $seRounts = (int)$Gre4;
                            }
                            else if((int)$Gre3>99){
                                $BClass = 'gre';
                                $seRounts = (int)$Gre3;
                            }
                            else if((int)$Gre2>9){
                                $BClass = 'gre';
                                $seRounts = (int)$Gre2;
                            }
                            else if((int)$Gre1>=0){
                                $BClass = 'gre';
                                $seRounts = (int)$Gre1;
                            }
                            else{
                                $BClass = 'gre';
                                $seRounts = 99999999;
                            }
                        }
                        else if($Headsign3=='橘'){
                            $O4 = str_split(mb_split('橘',$Headsign)[1],4)[0];
                            $O3 = str_split(mb_split('橘',$Headsign)[1],3)[0];
                            $O2 = str_split(mb_split('橘',$Headsign)[1],2)[0];
                            $O1 = str_split(mb_split('橘',$Headsign)[1],1)[0];
                            if((int)$O4>999){
                                $BClass = 'o';
                                $seRounts = (int)$O4;
                            }
                            else if((int)$O3>99){
                                $BClass = 'o';
                                $seRounts = (int)$O3;
                            }
                            else if((int)$O2>9){
                                $BClass = 'o';
                                $seRounts = (int)$O2;
                            }
                            else if((int)$O1>=0){
                                $BClass = 'o';
                                $seRounts = (int)$O1;
                            }
                            else{
                                $BClass = 'o';
                                $seRounts = 99999999;
                            }
                        }
                        else if($Headsign3=='JOY'){
                            $JOY4 = str_split(mb_split('JOY公車H',$Headsign)[0],4)[0];
                            $JOY3 = str_split(mb_split('JOY公車H',$Headsign)[0],3)[0];
                            $JOY2 = str_split(mb_split('JOY公車H',$Headsign)[0],2)[0];
                            $JOY1 = str_split(mb_split('JOY公車H',$Headsign)[0],1)[0];
                            if((int)$JOY4>999){
                                $BClass = 'e';
                                $seRounts = (int)$JOY4;
                            }
                            else if((int)$JOY3>99){
                                $BClass = 'e';
                                $seRounts = (int)$JOY3;
                            }
                            else if((int)$JOY2>9){
                                $BClass = 'e';
                                $seRounts = (int)$JOY2;
                            }
                            else if((int)$JOY1>=0){
                                $BClass = 'e';
                                $seRounts = (int)$JOY1;
                            }
                            else{
                                $BClass = 'e';
                                $seRounts = 99999999;
                            }
                        }
                        else if($Headsign1=='E'){
                            $E4 = str_split(mb_split('E',$Headsign)[1],4)[0];
                            $E3 = str_split(mb_split('E',$Headsign)[1],3)[0];
                            $E2 = str_split(mb_split('E',$Headsign)[1],2)[0];
                            $E1 = str_split(mb_split('E',$Headsign)[1],1)[0];
                            if((int)$E4>999){
                                $BClass = 'f';
                                $seRounts = (int)$E4;
                            }
                            else if((int)$E3>99){
                                $BClass = 'f';
                                $seRounts = (int)$E3;
                            }
                            else if((int)$E2>9){
                                $BClass = 'f';
                                $seRounts = (int)$E2;
                            }
                            else if((int)$E1>=0){
                                $BClass = 'f';
                                $seRounts = (int)$E1;
                            }
                            else{
                                $BClass = 'f';
                                $seRounts = 99999999;
                            }
                        }
                        else if($Headsign1=='H'){echo 'H';
                            $H4 = str_split(mb_split('H',$Headsign)[1],4)[0];
                            $H3 = str_split(mb_split('H',$Headsign)[1],3)[0];
                            $H2 = str_split(mb_split('H',$Headsign)[1],2)[0];
                            $H1 = str_split(mb_split('H',$Headsign)[1],1)[0];
                            if((int)$H4>999){
                                $BClass = 'e';
                                $seRounts = 99999999;
                            }
                            else if((int)$H3>99){
                                $BClass = 'e';
                                $seRounts = 99999999;
                            }
                            else if((int)$H2>9){
                                $BClass = 'e';
                                $seRounts = 99999999;
                            }
                            else if((int)$H1>=0){
                                $BClass = 'e';
                                $seRounts = 99999999;
                            }
                            else{
                                $BClass = 'e';
                                $seRounts = 99999999;
                            }
                        }
                        else if((int)$Headsign5>9999 && is_numeric($Headsign5)){
                            $BClass = 'g';
                            $seRounts = (int)$Headsign5;
                        }
                        else if((int)$Headsign4>999 && is_numeric($Headsign4)){
                            if((int)$Headsign4>8499 && (int)$Headsign4<8530){
                                $BClass = 'g';
                                $seRounts = (int)$Headsign4;
                            }
                            else if((int)$Headsign4>7999 && (int)$Headsign4<8100){
                                $BClass = 'h';
                                $seRounts = (int)$Headsign4;
                            }
                        }
                        else if((int)$Headsign3>99 && is_numeric($Headsign3)){
                            $BClass = 'g';
                            $seRounts = (int)$Headsign3;
                        }
                        else if((int)$Headsign2>9 && is_numeric($Headsign2)){
                            $BClass = 'g';
                            $seRounts = (int)$Headsign2;
                        }
                        else if((int)$Headsign1>=0 && is_numeric($Headsign1)){
                            $BClass = 'g';
                            $seRounts = (int)$Headsign1;
                        }
                        else{
                            $BClass = 'e';
                            $seRounts = 99999999;
                        }
                
                        $sQuery = "SELECT * FROM busdata WHERE ID=".$ID;
                    }
                }
                else{}
            }
        }
        else{}
    }
}
