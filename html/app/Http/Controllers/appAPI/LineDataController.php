<?php

namespace App\Http\Controllers\appAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\dbCRUD\seleDBController;//20230904 add
use App\Http\Controllers\dbCRUD\khhSeleStrController;//20230904 add
use App\Http\Controllers\appAPI\ver;//20230904 add
use App\Http\Controllers\curlWeathers\curlWeathersController;//20230904 add

class LineDataController extends Controller
{
    public function cheVerD($cityStr,$AppVersion , $versionCode, $key='', $WeatherCode=''){
        $ver = new ver;
        $WeatherD = new curlWeathersController;
        $dataV = array();
        $data = array();
        $versionData = array();
        $cityCode = $cityStr=='KHH'?'07':'';
        $AppVersionExplode = explode('.', $AppVersion);
        $cityNum = $cityStr=='KHH'?'07':'';
        
        if($cityStr=='KHH'){
            $md5Key = $this->md5Key($cityStr);
            $verD = $ver->ver('app', $cityNum, '');
            $privateKey = md5('App:'.$verD[0]->AppVersion.'version:'.$verD[0]->DataVersion.'cityCode:'.$cityStr.$cityNum);
            
            if($verD!='err-444' && $verD!='err'){
                $verDExplode = explode('.', $verD[0]->AppVersion);

                $versionData['AppV'] = $verD[0]->AppVersion;
                $versionData['DataV'] = $verD[0]->DataVersion;
                $versionData['K'] = $privateKey;
                $versionData['mrt'] = $verD[0]->MRTop==1?'flex':'none';
                $versionData['bus'] = $verD[0]->BUSop==1?'flex':'none';
                $versionData['bike'] = $verD[0]->BIKEop==1?'flex':'none';
                $versionData['tra'] = $verD[0]->TRAop==1?'flex':'none';
                $versionData['thsr'] = $verD[0]->THSRop==1?'flex':'none';
                $versionData['sys'] = 5;

                $data['sys'] = 5;
                $data['type'] = true;
                $data['versions'] = $versionData;
                
                $WeatherCode = $WeatherCode==''?'新興區':$WeatherCode;
                $WeatherData = $WeatherD->Weathers($WeatherCode,'k900nh');
                $data['WeatherOC'] = $WeatherCode;
                $data['Weather'] = $WeatherData;
                $data['dataType'] = false;
                $data['appType'] = false;

                if($verD[0]->DataVersion!=$versionCode && ($md5Key==$key || $privateKey!=$key)){
                    $lineData = $this->AppRouteData($WeatherCode,$cityCode);
                    $data['dataType'] = count($lineData)==2&&(count($lineData['DK'])==count($lineData['Data']))?true:false;
                    $data['lineData'] = $lineData;
                }
                if($AppVersionExplode[1]!=$verDExplode[1] || $AppVersionExplode[2]!=$verDExplode[2]){
                    $data['appType'] = true;
                }
            }
            else{
                $data['type'] = false;
                $data['Weather'] = '';
                $data['code']='401'; 
                $data['errT']='無權訪問';
                return $data;
            }
        }
        else if($cityStr=='TAC'){
            $data['type'] = false;
            $data['Weather'] = '';
            $data['code']='402.1'; 
            $data['errT']='未開放.';
        }
        else{
            $data['type'] = false;
            $data['Weather'] = '';
            $data['code']='404'; 
            $data['errT']='無權訪問';
        }
        return $data;
    }

    public function md5Key($cityStr){
        if($cityStr='TAC'){ return $md5TACKey = '0b1f1e75d634cb9ca579df6a8eb489f0'; }
        else if($cityStr='KHH'){ return $md5KHHKey = '401de903f90b19aa7c4f7a372cc76c23'; }
        else{ return 'err'; }
    }


    public function AppRouteData($Weather='', $cityCode=''){
        $ver = new ver;
        $WeatherD = new curlWeathersController;

        $seleDBController = new seleDBController;
        $khhSeleStrController = new khhSeleStrController;

        $reData = array();
        $reData['DK'] = array();
        $reData['Data'] = array();
        $weathers = $Weather==''?'新興區':$Weather;
        $cityCode = $cityCode==''?'07':$cityCode;

            $BBMClass = $khhSeleStrController->seleBBM_Class($cityCode);
            if($BBMClass!=null){
                $busViewList = array();
                $bikeViewList = array();
                $mrtViewList= array();
                $busi = 0;
                $bikei = 0;
                $mrti = 0;
                $busErr = 0;
                $bikeErr = 0;
                $mrtErr = 0;
                $reData['DK'][0] = 'bus_all';
                $reData['Data'][0]['d'] = [];

                foreach($BBMClass as $k=>$v){
                    if($v->class=='bus'){
                        $busi++;
                        $data = $khhSeleStrController->busStr($v->selename);
                        $reData['DK'][count($reData['DK'])] = $v->appstorage;
                        if($data!=null){
                            $reData['Data'][count($reData['Data'])] = ['d'=>$data, 'dis'=>'flex'];
                            $reData['Data'][0]['d'][count($reData['Data'][0]['d'])] = ['k'=>$v->appstorage, 'd'=>$data, 'dis'=>'flex'];
                            $busViewList[count($busViewList)] = [
                                                                    'lineName'=>$v->linename,
                                                                    'flex'=>'flex',
                                                                    'storageName'=>$v->appstorage,
                                                                ];
                        }
                        else{
                            $busErr++;
                            $reData['Data'][count($reData['DK'])] = ['d'=>null, 'dis'=>'none'];
                            $reData['Data'][0]['d'][count($reData['Data'][0]['d'])] = ['k'=>$v->appstorage, 'd'=>null, 'dis'=>'none'];
                            $busViewList[count($busViewList)] = [
                                                                    'lineName'=>$v->linename,
                                                                    'flex'=>'none',
                                                                    'storageName'=>$v->appstorage,
                                                                ];
                        }
                    }
                    if($v->class=='bike'){
                        $bikei++;
                        $data = $khhSeleStrController->bikeStr($v->selename);
                        $reData['DK'][count($reData['DK'])] = $v->appstorage;
                        if($data!=null){
                            $reData['Data'][count($reData['Data'])] = ['d'=>$data, 'dis'=>'flex'];
                            $bikeViewList[count($bikeViewList)] = [
                                                                    'lineName'=>$v->linename,
                                                                    'flex'=>'flex',
                                                                    'storageName'=>$v->appstorage,
                                                                ];
                        }
                        else{
                            $bikeErr++;
                            $reData['Data'][count($reData['DK'])] = ['d'=>null, 'dis'=>'none'];
                            $bikeViewList[count($bikeViewList)] = [
                                                                    'lineName'=>$v->linename,
                                                                    'flex'=>'none',
                                                                    'storageName'=>$v->appstorage,
                                                                ];
                        }
                    }
                    if($v->class=='mrt'){
                        $mrti++;
                        $mrtR = '';
                        $mrtO = '';
                        $data = $khhSeleStrController->mrtStr($v->selename);
                        $mrtR = $v->selename=='R'?$khhSeleStrController->mrtStr('RK'):'';
                        $data = $mrtR!=''&&$mrtR!=null?$mrtR->merge($data):$data;
                        $mrtO = $v->selename=='O'?$khhSeleStrController->mrtStr('OT'):'';
                        $data = $mrtO!=''&&$mrtO!=null?$mrtO->merge($data):$data;
                        $reData['DK'][count($reData['DK'])] = $v->appstorage;
                        if($data!=null){
                            $reData['Data'][count($reData['Data'])] = ['d'=>$data, 'dis'=>'flex'];
                            $mrtViewList[count($mrtViewList)] = [
                                                                    'lineName'=>$v->linename,
                                                                    'lineClass'=>$v->class,
                                                                    'flex'=>'flex',
                                                                    'storageName'=>$v->appstorage,
                                                                    'dColor'=>$this->dColor($v->appstorage),
                                                                    'bColor'=>$this->bColor($v->appstorage),
                                                                ];
                        }
                        else{
                            $mrtErr++;
                            $reData['Data'][count($reData['DK'])] = ['d'=>null, 'dis'=>'none'];
                            $mrtViewList[count($mrtViewList)] = [
                                                                    'lineName'=>$v->linename,
                                                                    'flex'=>'none',
                                                                    'storageName'=>$v->appstorage,
                                                                ];
                        }
                    }
                }
                $traData = $khhSeleStrController->traStr();
				if($traData!=null){
					$reData['DK'][count($reData['DK'])] = 'traD';
					$reData['Data'][count($reData['Data'])] = $traData;
				}
				else{
					$reData['type'] = false;
					$reData['ApiErr'] = '伺服器API維護中...';
				}
				
                $thsrData = $khhSeleStrController->thsrStr();
				if($thsrData!=null){
					$reData['DK'][count($reData['DK'])] = 'thsrViewList';
					$reData['Data'][count($reData['Data'])] = $thsrData;
				}
				else{
					$reData['type'] = false;
					$reData['ApiErr'] = '伺服器API維護中...';
				}
				
                $areaData = $khhSeleStrController->khhArea();
				if($areaData!=null){
					$reData['DK'][count($reData['DK'])] = 'Area';
					$reData['Data'][count($reData['Data'])] = $areaData;
				}
				else{
					$reData['type'] = false;
					$reData['ApiErr'] = '伺服器API維護中...';
				}
            }
            else{
                $reData['type'] = false;
                $reData['ApiErr'] = '伺服器API維護中...';
            }
        return $reData;
    }
    
    public function dColor($id){
        $dColor='#D9D9D9';
        if($id=='mrt_r'){
            $dColor='#FFC7C7';
        }
        else if($id=='mrt_o'){
            $dColor='#FFF6D4';
        }
        else{
            $dColor='#D9D9D9';
        }
        return $dColor;
    }
    public function bColor($id){
        $bColor='#FF7979';
        if($id=='mrt_r'){
            $bColor='#FF7979';
        }
        else if($id=='mrt_o'){
            $bColor='#FFBA33';
        }
        else{
            $bColor='#FF7979';
        }
        return $bColor;
    }
}
