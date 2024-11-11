<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\classMeun;//20221128
use App\Http\Controllers\dbCRUD\seleDBController;//20221128
// use App\Http\Controllers\TDX\bikeNowDataCurl;//20221128
use App\Http\Controllers\TDX\bikeNowDataCurl;
use App\Http\Controllers\dbCRUD\khhSeleStrController;//20221206

class TkoCityBikeController extends Controller
{
	public function __construct(){}

    public function CityBikeindex($id=''){
		$D = '';
		if($id!=''){
			$bikeOrderbyStr = 'class';
			$bikeWhereStrArr = [['Enable','=',1],['cityCode','=','07'],['class','=',$id]];
			
			$mrtData = new khhSeleStrController;
            $D = $mrtData->bikeStr($id);

			if($D!=null){ return view('Bike',$this->BikeBladeView($id, false, $D, 1)); }
			else{ return view('Bike',$this->BikeBladeView('請選分類', false, '', 0)); }
		}
		else{
			return view('Bike',$this->BikeBladeView('請選分類', false, '', 0));
		}
	}
	
	public function CityBikeLine($id){
        $bikeOrderbyStr = 'class';
        $bikeWhereStrArr = [['Enable','=',1],['cityCode','=','07'],['class','=',$id]];
        $seleDBController = new seleDBController;
        $D = $seleDBController->dbSele('bikedata',$bikeWhereStrArr,$bikeOrderbyStr);
		
        if($D!=null){
			$viewer = $this->BikeBladeView($id, true, $D);
			if($viewer!='err'){
				return view('Bike',$viewer,$D);
			}
			else{
                \Log::info('view err');
				return redirect('Bike');
			}
		}
		else{
            \Log::info('db err');
			return redirect('Bike');
		}
	}

	public function BikeBladeView($id, $topBtn, $bike, $num){
        $orderbyStr = 'adesc';
        $whereStrArr = [['op','=',1],['cityCode','=','07'],['class','=','bike']];

		$seleBBMClass = new seleDBController;
		$seleBBM = $seleBBMClass->dbSele('bbm_class',$whereStrArr,$orderbyStr);
        
		if($seleBBM!=null){
			$bikeClass = $this->BikeClassMeun($seleBBM,$id);
			$view = [
						'tiImg'=>'/img/KsBicycleLogo.png',
						'tiText'=>'高雄YouBike',
						'tiImgWid'=>'5vh',
						'tiImgHei'=>'4vh',
						'bikeClass'=>$bikeClass,
						'topBtn'=>$topBtn,
						'bike'=>$bike,
						'bikeMeun'=>$seleBBM,
						'num'=>$num,
					];
			return $view;
		}
		return 'err';
	}
	
	public function BikeClassMeun($meun,$id){
		$lineClass = '請選擇 路線';
		foreach($meun as $v){
			if($v->selename==$id){
				$lineClass = $v->linename;
			}
		}
		return $lineClass;
	}

	// AppAPI
	public function BikeConAPI($StationUID){
		return $this->BikeCon($StationUID);
	}
	// web用
	public function BikeCon($StationUID){
		$Conn = new bikeNowDataCurl;
		$bikeNowDataCurl = $Conn->getKHHBikeNowData('Kaohsiung',$StationUID);

		if($bikeNowDataCurl=='err'||$bikeNowDataCurl=='tokenErr'||$bikeNowDataCurl=='bikeD_Err'){
			$bickNowD = $this->reData('youbick伺服器錯誤', 404.1, '', '');
			return json_encode($bickNowD);
		}
		else{
			return $this->reDataMap($bikeNowDataCurl);
		}
	}

	public function reDataMap($bickNowDataCurl){
        if(count($bickNowDataCurl)>0){
            if(isset($bickNowDataCurl[0]['ServiceStatus'])==true){
                $ServiceStatus = $bickNowDataCurl[0]['ServiceStatus'];
				$bickRent = '';
				$bickReturn = '';
				if($ServiceStatus==1){
					if(isset($bickNowDataCurl[0]['AvailableRentBikes'])==true){
						$AvailableRentBikes = $bickNowDataCurl[0]['AvailableRentBikes'];
						$bickRent = is_numeric($AvailableRentBikes)==true?'可借車輛: '.$AvailableRentBikes.'台。':'';
					}
					if(isset($bickNowDataCurl[0]['AvailableReturnBikes'])==true){
						$AvailableReturnBikes = $bickNowDataCurl[0]['AvailableReturnBikes'];
						$bickReturn = is_numeric($AvailableReturnBikes)==true?'可還車輛: '.$AvailableReturnBikes.'台。':'';
					}
					return $this->reData('', 200, $bickRent, $bickReturn);
				}
				else if($ServiceStatus==2){ return $this->reData('此站 暫停服務.', 404.1, '', ''); }
				else{ return $this->reData('服務狀態不明.', 404.2, '', ''); }
			}
			else{ return $this->reData('YouBike資料異常.', 404, '', ''); }
		}
		else{ return $this->reData('YouBike無回應.', 403, '', ''); }
	}

	public function reData($errT, $type, $Rent, $Return){
		$BikeD = [];
		$BikeD['errT'] = $errT;
		$BikeD['type'] = $type;
		$BikeD['Rent'] = $Rent;
		$BikeD['Return'] = $Return;
		return $BikeD;
	}
}
