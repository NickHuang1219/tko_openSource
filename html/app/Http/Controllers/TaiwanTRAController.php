<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Http\Controllers\classMeun;//20221204
use App\Http\Controllers\dbCRUD\seleDBController;//20221204
use App\Http\Controllers\TDX\traToday_NowData;//20221205
use App\Http\Controllers\dbCRUD\ThsrTraSeleStrController;//20221206

class TaiwanTRAController extends Controller
{
	public function __construct(){
		date_default_timezone_set('Asia/Taipei');
		$this->ThsrTraSeleStrController = new ThsrTraSeleStrController;
	}

    public function TaiwanTRAindex(){
        $countiesOrderbyStr = 'id';
        $countiesWhereStrArr = [['TRAop','=',1]];
        $seleDBController = new seleDBController;
        $D = $seleDBController->dbSele('counties',$countiesWhereStrArr,$countiesOrderbyStr);

		if($D==null){
			return view('Tra', $this->TraBladeView(false, '', '', '', '資料庫存取失敗'));
		}
		else{
			return view('Tra', $this->TraBladeView(false, '', $this->CountiesList($D,''), '', ''));
		}
	}
	public function getTrastationd($id){
        $chechId = '';
        $countiesOrderbyStr = 'id';
        $countiesWhereStrArr = [['TRAop','=',1]];
		
		$TraStation = $this->ThsrTraSeleStrController->traCountiesStr();
		
		if($TraStation!=null){
			foreach($TraStation as $v){
				if($v->id==$id){
					$chechId = '1';
				}
			}
		}
        
		if($id!='' && $TraStation!=null && $chechId=='1'){
            $trastationdOrderbyStr = 'StationID';
            $trastationdWhereStrArr = [['CountiesID','=',$id],['op','=',1]];
			
			$D = $this->ThsrTraSeleStrController->traTrastationdStr($id);
		
            if($D!=null){
                return view('Tra', $this->TraBladeView(false, $id, $this->CountiesList($TraStation,$id), $D, ''));
            }
            else{
                return redirect('TaiwanTRA');
            }
		}
		else{
			return redirect('TaiwanTRA');
		}
	}
    
	public function CountiesList($str, $id){
	    #----------------------------
	    #變數初始化
	    #----------------------------
	    $LineD = array();

		if(count($str)<1){
			return 500;
		}
		else{
			foreach($str as $k=>$v){
				$LineD[$k]['name'] = $v->name;
				$LineD[$k]['addr'] = "/TaiwanTRA/Trastationds/".$v->id;
				if($id==$v->id){
					$LineD[$k]['sele'] = 'selected';
				}
				else{
					$LineD[$k]['sele'] = '';
				}
			}
			return $LineD;
		}
	}
    
	public function TraBladeView($topBtn, $CountiesID, $Counties, $Trastationd, $errT){
		$view = [
				'tiImg'=>'/img/TaiwanTRA.png',
				'tiText'=>'台灣鐵路',
				'tiImgWid'=>'5vh',
				'tiImgHei'=>'4vh',
				'topBtn'=>$topBtn,
				'CountiesID'=>$CountiesID,
				'Counties'=>$Counties,
				'Trastationd'=>$Trastationd,
				'errT'=>$errT,
		];
		return $view;
	}


	// AppAPI
	public function TRADAPI($seleStr, $stationID='', $seleID=''){
		if($seleID=='MAndroid' || $seleID=='MIos'){ return $this->TRAD($seleStr, $stationID, $seleID); }
		else{ return 500; }
	}	
    public function TRAD($seleStr, $stationID='', $seleID=''){
		$DN = [];
		$DS = [];
		$stationNow = [];
    	$traD = new traToday_NowData;
		if($seleStr=='stationNow'){
			$stationNows = $traD->getStationNow($stationID);
			if($stationNows!='err' && $stationNows!='tokenErr'){
				$isset_StationLiveBoards = isset($stationNows['StationLiveBoards']);
				if($isset_StationLiveBoards==true){
					if(count($stationNows['StationLiveBoards'])>0){
						foreach($stationNows['StationLiveBoards'] as $k=>$v){
							$stationNow[$k]['GO'] = $v['EndingStationName']['Zh_tw'];
							$stationNow[$k]['TrainNo'] = $v['TrainNo'];
							$stationNow[$k]['TrainTypeNameTW'] = $v['TrainTypeName']['Zh_tw'];
							$stationNow[$k]['ArrivalTime'] = date("a G:i",strtotime($v['ScheduleArrivalTime']));
							if($v['TripLine']==0){
								$stationNow[$k]['TripLine'] = '不經山海線';
							}
							else if($v['TripLine']==1){
								$stationNow[$k]['TripLine'] = '山線';
							}
							else if($v['TripLine']==2){
								$stationNow[$k]['TripLine'] = '海線';
							}
							else if($v['TripLine']==3){
								$stationNow[$k]['TripLine'] = '追成線';
							}
							
							if($v['RunningStatus']==0){
								$stationNow[$k]['RunningStatus'] = '準點.';
								$stationNow[$k]['color'] = '#04bf04';
							}
							else if($v['RunningStatus']==1){
								$stationNow[$k]['RunningStatus'] = '誤點';
								$stationNow[$k]['color'] = '#f00';
							}
							else if($v['RunningStatus']==2){
								$stationNow[$k]['RunningStatus'] = '取消.';
								$stationNow[$k]['color'] = '#000';
							}
							else{
								$stationNow[$k]['RunningStatus'] = '---';
							}
							
							$stationNow[$k]['DelayTime'] = (int)$v['DelayTime']==0?'':$v['DelayTime']."分.";
						}
						return $this->reD('success', '', $stationNow, '', '');
					}
					else{ return $this->reD('err', '無列車進站.', '', '', ''); }
				}
				else{ return $this->reD('err', '台鐵無回傳訊息.', '', '', ''); }
			}
			else{ return $this->reD('err', '台鐵伺服器異常.', '', '', ''); }
		}
		if($seleStr=='stationToday'){
			$getStationToday = $traD->getStationToday($stationID);
			if($getStationToday!='err' && $getStationToday!='tokenErr'){
				if(isset($getStationToday['StationTimetables'])==true && 
					count($getStationToday['StationTimetables'])>0){
						foreach($getStationToday['StationTimetables'] as $k=>$v){
							if(isset($v['TimeTables'])==true&&count($v['TimeTables'])>0){
								if(isset($v['TimeTables'])==true&&count($v['TimeTables'])>0){
									if($k==0||($v['Direction']==0)){ $DN = $this->DNDS($v['TimeTables']); }
									if($k==1||$v['Direction']==1){ $DS = $this->DNDS($v['TimeTables']); }
								}
							}
						}
					return $this->reD('success', '', '', $DN, $DS);;
				}
				else{ return $this->reD('err', '沒有當日資料.', '', '', ''); }
			}
			else{ return $this->reD('err', '台鐵伺服器異常.', '', '', ''); }
		}
    }
	public function DNDS($TimeTables){
		$D = [];
		$i = 0;
		$timeD = strtotime(date('Y-m-d H:i:s+08:00'));
		foreach($TimeTables as $TimeTablesk=>$TimeTablesv){
			if(isset($TimeTablesv['TrainNo'])==true && 
				isset($TimeTablesv['TrainTypeID'])==true && 
				isset($TimeTablesv['TrainTypeName']['Zh_tw'])==true && 
				isset($TimeTablesv['DestinationStationName']['Zh_tw'])==true && 
				isset($TimeTablesv['ArrivalTime'])==true && 
				isset($TimeTablesv['DepartureTime'])==true){
					$trainTime = strtotime(date(date('Y-m-d '). $TimeTablesv['ArrivalTime']));
					if((($timeD-$trainTime)<300) || ($timeD<$trainTime)){
						$D[$i]['TrainNo'] = $TimeTablesv['TrainNo'];
						$D[$i]['TrainTypeID'] = $TimeTablesv['TrainTypeID'];
						$D[$i]['TrainTypeNameTW'] = $TimeTablesv['TrainTypeName']['Zh_tw'];
						$D[$i]['DestinationStationNameTW'] = $TimeTablesv['DestinationStationName']['Zh_tw'];
						$D[$i]['ArrivalTime'] = date('a G:i', strtotime($TimeTablesv['ArrivalTime']));
						$D[$i]['DepartureTime'] = date('a G:i', strtotime($TimeTablesv['DepartureTime']));
						$i++;
					}
			}
		}
		return $D;
	}
	public function reD($type, $errT, $stationNow, $DN, $DS){
		$retD = [];
		$retD['type'] = $type;
		$retD['errT'] = $errT;
		$retD['stationNow'] = $stationNow;
		$retD['DN'] = $DN;
		$retD['DS'] = $DS;
		return json_encode($retD);
	}
	

	#AppAPI
	public function TrainStatusAPI($TrainNo){
		return $this->TrainStatus($TrainNo);
	}
	#查詢台鐵列車狀態
	public function TrainStatus($TrainNo){
    	$traD = new traToday_NowData;
		$stationNowD = $traD->getTrainNow($TrainNo);
    	$date1 = date("Y-m-d");
    	$date2 = date("H:i:00");
    	$date = $date1."T".$date2."+08:00";
		$today = date('Y/m/d H:i:00');
		
		if(isset($stationNowD['StationLiveBoards'])==true){
			if(count($stationNowD['StationLiveBoards'])>0){
				$stationNow = $stationNowD['StationLiveBoards'][0];
				$coninStation = isset($stationNow['StationName']['Zh_tw'])===true?$stationNow['StationName']['Zh_tw']:'';
				$ScheduledArrivalTime = isset($stationNow['ScheduleArrivalTime'])===true?$stationNow['ScheduleArrivalTime']:'';
				$ScheduledDepartureTime = isset($stationNow['ScheduleDepartureTime'])===true?$stationNow['ScheduleDepartureTime']:'';
				$DelayTime = isset($stationNow['DelayTime'])===true?$stationNow['DelayTime']:'';
				$TripLine = isset($stationNow['TripLine'])===true?$stationNow['TripLine']:'';
				$RunningStatus = isset($stationNow['RunningStatus'])===true?$stationNow['RunningStatus']:'';
				$color = '#000';
				if($RunningStatus==0){ $RunningStatus='●準點'; $color='#00CA00'; }
				else if($RunningStatus==1){ $RunningStatus='●誤點'; $color='#FF5809'; }
				else if($RunningStatus==2){ $RunningStatus='●取消'; $color='#FF0000'; }
				else{ $RunningStatus=''; }
				
				if($TripLine==0){
					$TripLine = '不經山海線';
				}
				else if($TripLine==1){
					$TripLine = '經 山線';
				}
				else if($TripLine==2){
					$TripLine = '經 海線';
				}
				else if($TripLine==3){
					$TripLine = '經 追成線';
				}
				else{
					$TripLine = '';
				}
	
				$statusTime = '';
				if($ScheduledArrivalTime!='' && $ScheduledDepartureTime!=''){
					$ScheduledArrivalTime_str = strtotime($ScheduledArrivalTime);
					$ScheduledDepartureTime_str = strtotime($ScheduledDepartureTime);
					if($ScheduledArrivalTime_str>$ScheduledDepartureTime_str){
						$ScheduledArrivalTime_str = $ScheduledArrivalTime_str-86400;
					}
					$nowDataStr = strtotime($date);
	
					if($DelayTime!='' && $DelayTime>0){
						if(strtotime($today)>=(strtotime($ScheduledArrivalTime)+($DelayTime))&&strtotime($today)<=(strtotime($ScheduledDepartureTime)+($DelayTime))){
							$statusTime = "列車進站";
						}
						else if(strtotime($today)<(strtotime($ScheduledArrivalTime)+($DelayTime))){
							$time_floor = floor(((strtotime($ScheduledArrivalTime)+($DelayTime))-strtotime($today))/60);
							if($time_floor==0){
								$statusTime = "列車進站";
							}
							else{
								$statusTime = "預計 ".$time_floor."分鐘後，到達";
							}
						}
						else{
							$statusTime = "列車已駛離";
						}
					}
					else{
						if(strtotime($today)>=strtotime($date1.' '.$ScheduledArrivalTime)&&strtotime($today)<strtotime($ScheduledDepartureTime)){
							$statusTime = "列車進站";
						}
						else if(strtotime($today)<strtotime($ScheduledArrivalTime)){
							$time_floor = floor((strtotime($date1.' '.$ScheduledArrivalTime)-strtotime($today))/60);
							if($time_floor==0){
								$statusTime = "列車進站";
							}
							else{
								$statusTime = '預計 '.$time_floor.'分鐘後，到達';
							}
						}
						else{
							$statusTime = "列車已駛離";
						}
					}
				}
				else{
					$statusTime = '';
				}
				if($coninStation!=''){ return $this->nowReD('success', '', $TripLine, $statusTime, $coninStation,$RunningStatus,$color); }
				else{ return $this->nowReD('err', '台鐵資料有誤.', '', '', '','',''); }
			}
		else{ return $this->nowReD('err', '無列車動態.', '', '', '','','#FF0000'); }
		}
		else{ return $this->nowReD('err', '台鐵伺服器異常.', '', '', '','',''); }
    }
	public function nowReD($type, $errT, $TripLine, $statusTime, $coninStation, $RunningStatus, $color){
		$retD = [];
		$retD['type'] = $type;
		$retD['errT'] = $errT;
		$retD['TrainStatusD']['TripLine'] = $TripLine;
		$retD['TrainStatusD']['statusD'] = $statusTime.' '.$coninStation.'站';
		$retD['RunningStatus'] = $RunningStatus;
		$retD['RunningStatusColor'] = $color;
		return json_encode($retD);
	}

}
