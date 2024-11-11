<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\classMeun;//20230903 add
use App\Http\Controllers\dbCRUD\seleDBController;//20230903 add
use App\Http\Controllers\mrtConinCurlController;//20230903 add
use App\Http\Controllers\dbCRUD\khhSeleStrController;//20230903 add

use Log;

class TkoMrtController extends Controller
{
    public function Mrtindex(){
		$viewer = $this->mrtBladeView('', '', '');
		if($viewer!='err'){
			return view('Mrt', $viewer);
		}
		else{
			return redirect('/');
		}
	}
	public function MrtLine($id){
        $viewer = $this->mrtBladeView('', $id);
        return view('Mrt', $viewer);
	}
    
	public function mrtBladeView($MrtD='', $id=''){
		$meun = null;
        $orderbyStr = 'adesc';
        $whereStrArr = [['op','=',1],['cityCode','=','07'],['class','=','mrt']];
		$seleDBController = new seleDBController;
        $seleArr = $seleDBController->dbSele('bbm_class',$whereStrArr,$orderbyStr);
		
        if($seleArr!=null){
			if($id!=''){
				$mrtData = new khhSeleStrController;
				$meun = $mrtData->mrtStr($id);
				if($id=='r'){
					$seleMrt = $mrtData->mrtStr('RK');
					$meun = $seleMrt->merge($meun);
				}
				if($id=='o'){
					$seleMrt = $mrtData->mrtStr('OT');
					\Log::info('OT:'.gettype($seleMrt));
					$meun = $seleMrt!=null?$seleMrt->merge($meun):$meun;
				}
			}
			
			$topBtn = false;
			$mrt = null;
			$mrtClass = '請選分類';

            foreach($seleArr as $v){
                if($v->selename==strtoupper($id)){
                    $mrtClass = $v->linename;
                    $topBtn = true;
                    // $mrt = $meun;
                }
            }
			$view = [
                        'tiImg'=>'/img/MrtLogo.png',
                        'tiText'=>'捷運輕軌',
                        'tiImgWid'=>'5vh',
                        'tiImgHei'=>'4vh',
                        'mrtClass'=>$mrtClass,
                        'topBtn'=>$topBtn,
                        'dColor'=>$this->dColor($id),
                        'bColor'=>$this->bColor($id),
                        'borColor'=>$this->borColor($id),
                        'mrt'=>$id==''?null:$meun,
                        'mrtMeun'=>$seleArr,
                    ];
			return $view;
        }
        else{
			return 'err';
            // return redirect('/');
        }
	}

	public function dColor($id){
		$dColor='#d4edda';
		if($id=='r'){
			$dColor='#f8d7da';
		}
		else if($id=='o'){
			$dColor='#ffeeba';
		}
		else{
			$dColor='#d4edda';
		}
		return $dColor;
	}
	public function bColor($id){
		$bColor='#28a745';
		if($id=='r'){
			$bColor='#dc3545';
		}
		else if($id=='o'){
			$bColor='#ffc107';
		}
		else{
			$bColor='#28a745';
		}
		return $bColor;
	}
	public function borColor($id){
		$borColor='#28a745';
		if($id=='r'){
			$borColor='#dc3545';
		}
		else if($id=='o'){
			$borColor='#ffc107';
		}
		else{
			$borColor='#28a745';
		}
		return $borColor;
	}

	public function menuIf($id,$arr){
		$t = '請選分類';
		foreach($arr as $v){
			if($v->selename==$id){
				return $v->linename;
			}
		}
	}


	#AppAPI
	public function MrtLineConnAPI($id, $type){ return $this->MrtLineConn($id, $type); }
	#web ajax get mrtTime
	public function MrtLineConn($id, $type){
		$seleDBController = new seleDBController;
		$mrtOrderbyStr = 'sort';
		$mrtWhereStrArr = $mrtWhereStrArr = [['op','=',1],['cityCode','=','07'],['line','=',strtoupper($type)],['StationID','=',$id]];

			$uidStr = $type=='c'?'KLRT':'KRTC';
			$mrtConn = new mrtConinCurlController;
			$mrtD = $mrtConn->getKhsMRT_NowTime($uidStr,$id);
			if(count($mrtD)>0){
				foreach ($mrtD as $key => $value){
					if(isset($value['DestinationStationName']['Zh_tw'])==true && 
					  (isset($value['ServiceStatus'])==true||isset($value['EstimateTime'])==true)){
						$reD[$key]['goTName'] = $type=='c'?$value['TripHeadSign']:'往 '.$value['DestinationStationName']['Zh_tw'];
						if(isset($value['EstimateTime'])==true){
							$reD[$key]['ConinTime'] = $this->ServiceStatusStr($value['ServiceStatus'], $value['EstimateTime']);
						}
						else if($value['ServiceStatus']==0 && isset($value['EstimateTime'])==false){
							$reD[$key]['ConinTime'] = $this->ServiceStatusStr(1, '');
						}
						else if($value['ServiceStatus']==1 || $value['ServiceStatus']==2 || $value['ServiceStatus']==3){
							$reD[$key]['ConinTime'] = $this->ServiceStatusStr($value['ServiceStatus'], '');
						}
						else{ $reD[$key]['ConinTime'] = '今日未營運.'; }
					}
				}
				if(count($reD)>0){
					$mrtStationD = $this->returnData(200, $reD, 's', '');
				}
				else{
					$mrtStationD = $this->returnData(402, null, 'e', '捷運局資料異常.');
				}
				return json_encode($mrtStationD);
			}
			else{
				$mrtStationD = $this->returnData(403, null, 'e', '捷運局伺服器無回傳.');
				return json_encode($mrtStationD);
			}
	}
	public function reDataMap($mrtD){
		if(count($mrtD)!=0){
			foreach ($mrtD as $key => $value){
				if(isset($value['DestinationStationName']['Zh_tw'])==true && 
				  (isset($value['ServiceStatus'])==true||isset($value['EstimateTime'])==true)){
					$reD[$key]['goTName'] = '往 '.$value['DestinationStationName']['Zh_tw'];
					if(isset($value['EstimateTime'])==true){
						$reD[$key]['ConinTime'] = $this->ServiceStatusStr($value['ServiceStatus'], $value['EstimateTime']);
					}
					else if($value['ServiceStatus']==0 && isset($value['EstimateTime'])==false){
						$reD[$key]['ConinTime'] = $this->ServiceStatusStr(1, '');
					}
					else if($value['ServiceStatus']==1 || $value['ServiceStatus']==2 || $value['ServiceStatus']==3){
						$reD[$key]['ConinTime'] = $this->ServiceStatusStr($value['ServiceStatus'], '');
					}
					else{ $reD[$key]['ConinTime'] = '今日未營運.'; }
				}
			}
			$mrtStationD = $this->returnData(200, $reD, 's', '');
			return json_encode($mrtStationD);
		}
		else{ 
			$mrtStationD = $this->returnData(500, null, 'e', 'ID錯誤.');
			return json_encode($mrtStationD);
		}
	}
	public function ServiceStatusStr($ServiceStatus, $EstimateTime){
		$reD = '尚未發車.';
		if($ServiceStatus==0){ $reD = $this->timeStr($EstimateTime); }
		else if($ServiceStatus==1){ $reD = '尚未發車.'; }
		else if($ServiceStatus==2){ $reD = '交管不停靠.'; }
		else if($ServiceStatus==3){ $reD = '末班車已過.'; }
		else{ $reD = '今日未營運.'; }
		return $reD;
	}
	public function timeStr($time){
		if($time==0||$time=='0'){ return '進站中.'; }
		else if($time==1||$time=='1'){ return '即將抵達.'; }
		else if($time==''){ return ''; }
		else{ return $time.'分.'; }
	}
	public function returnData($StatusCode, $mrtD, $type, $errT){
		$mrtStationD = [];
		$mrtStationD['StatusCode'] = $StatusCode;
		$mrtStationD['mrtD'] = $mrtD;
		$mrtStationD['type'] = $type;
		$mrtStationD['errT'] = $errT;
		return $mrtStationD;
	}

}
