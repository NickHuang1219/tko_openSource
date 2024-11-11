<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\dbCRUD\ThsrTraSeleStrController;//20230904 add
use App\Http\Controllers\TDX\thsrCurl;//20230904 

class TaiwanTHSRController extends Controller
{
	public function __construct(){
		date_default_timezone_set('Asia/Taipei');
		$this->ThsrTraSeleStrController = new ThsrTraSeleStrController;
		$this->thsrCurl = new thsrCurl;
	}

    public function TaiwanTHSRindex(){
		return view('Thsr', $this->ThsrBladeView('i', '', ''));
	}
	public function goTo(){
		return $this->sToday_goTo('goTo');
	}
	public function sToday(){
		return $this->sToday_goTo('sToday');
	}
    public function sToday_goTo($str){
		if($str=='sToday' || $str=='goTo'){
			
			$D = $this->ThsrTraSeleStrController->thsrStr();
		
			if($D==null){
				return view('Thsr', $this->ThsrBladeView($str, '', '資料庫存取失敗'));
			}
			else{
				$meun = $this->StationList($D);
				if($meun==500){ return view('Thsr', $this->ThsrBladeView($str, '', '資料庫存取失敗')); }
				else{ return view('Thsr', $this->ThsrBladeView($str, $meun, '')); }
			}
		}
		else{ return App::abort(404); }
	}

    
	public function ThsrBladeView($type, $stationD, $errT){
		$view = [
				'tiImg'=>'/img/TaiwanTHSR.png',
				'tiText'=>'',
				'tiImgWid'=>'16vh',
				'tiImgHei'=>'4.5vh',
				'type'=>$type,
				'stationD'=>$stationD,
				'errT'=>$errT,
		];
		return $view;
	}
	public function StationList($station){
	    #----------------------------
	    #變數初始化
	    #----------------------------
	    $LineD = array();

		if(count($station)<1||$station==null){
			return 500;
		}
		else{
			foreach($station as $k=>$v){
				$LineD[$k]['name'] = $v->StationNameTW;
				$LineD[$k]['StationID'] = $v->StationID;
			}
			return $LineD;
		}
	}


	#依高鐵站 查詢本日列車停靠
	public function stationToday($StationID){
		return $this->thsrCurl->stationToday($StationID);
	}
	#依高鐵站 查詢本日列車停靠 App用
	public function stationTodayAPI($StationID){
		return $this->thsrCurl->stationToday($StationID);
	}

	#依高鐵站 起訖站 查詢本日停靠
	public function thsrOD($SID, $EID){
		return $this->thsrCurl->thsrOD($SID, $EID);
	}
	#依高鐵站 起訖站 查詢本日停靠 App用
	public function thsrODAPI($SID, $EID){
		return $this->thsrCurl->thsrOD($SID, $EID);
	}

	#查詢列車座位
	public function TrainSeatData($SID, $EID, $TrainNo){
		return $this->thsrCurl->TrainSeatData($SID, $EID, $TrainNo);
	}
	#查詢列車座位 App用
	public function TrainSeatDataAPI($SID, $EID, $TrainNo){\Log::info("OD");
		return $this->thsrCurl->TrainSeatData($SID, $EID, $TrainNo);
	}

}
