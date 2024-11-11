<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\busConinCurlController;
use App\Http\Controllers\classMeun;//20230903 add
use App\Http\Controllers\dbCRUD\seleDBController;//20230903 add
use App\Http\Controllers\dbCRUD\khhSeleStrController;//20230903 add
use PDO;

class TkoBusLineController extends Controller
{
    public function Busindex()
	{
		$viewer = $this->busBladeMeun('', '');
		if($viewer!='err'){
			return view('Bus', $viewer);
		}
		else{
			return redirect('/');
		}
	}
	
    public function BusLine($id)
	{
        $orderbyStr = 'seRounts';
        $whereStrArr = [['BusLineEnable','=',1],['cityCode','=','07']];
        $whereStrArr = $id=='m'?array_merge($whereStrArr,[['nameZh','like','%幹線%']]):array_merge($whereStrArr,[['BClass','=',$id]]);
	
		$buSele = new khhSeleStrController;
		$BusD = $buSele->busStr($id);
		if($BusD!=null){
			return view('Bus', $this->busBladeMeun($BusD, $id));
		}
		else{
			return redirect('Bus');
		}
	}
	public function busBladeMeun($BusD='', $id=''){
        $orderbyStr = 'adesc';
        $whereStrArr = [['op','=',1],['cityCode','=','07'],['class','=','bus']];
        
		$seleDBController = new seleDBController;
        $seleArr = $seleDBController->dbSele('bbm_class',$whereStrArr,$orderbyStr);
        // if(count($seleArr)>0){
		if($seleArr!='dbErr'||$seleArr!=null){
			$reArr = array();
			
			foreach($seleArr as $k=>$v){
				$reArr[count($reArr)] = [
										'Addr'=>$v->webRoute, 
										'lineName'=>$v->linename,
										'selename'=>$v->selename
									];
			}
			$topBtn = false;
			$bus = null;
			$busClass = '請選分類';
			$view = [
				'tiImg'=>'/img/BusLogo.png',
				'tiText'=>'高雄公車',
				'tiImgWid'=>'5vh',
				'tiImgHei'=>'4vh',
				'busClass'=>$busClass,
				'topBtn'=>$topBtn,
				'bus'=>$bus,
				'busMeun'=>$reArr,
				];
			if($BusD!=''){
				$view['topBtn'] = true;
				$view['bus'] = $BusD;
				$view['busClass'] = $this->menuIf($id,$seleArr);
			}
			return $view;
        }
        else{
			return 'err';
        }

		
	}
	public function menuIf($id,$arr){
		$t = '---';
		foreach($arr as $v){
			if($v->selename==$id){
				$t = $v->linename;
			}
		}
		return $t;
	}

    
	#公車即時資訊
	public function BusConinTime($id){
        $orderbyStr = 'seRounts';
        $whereStrArr = [['BusLineEnable','=',1],['cityCode','=','07'],['ID','=',$id]];
		
		
		$seleBus = new seleDBController;
		$data = $seleBus->dbSele('busdata',$whereStrArr,$orderbyStr);
		if($data==null){
			return view('BusCon', $this->BusConnView('', ''));
		}
		else{
			$busConn = new busConinCurlController;
			$busConT = $busConn->busConinTime($id);
			if($busConT['type']>0&&$busConT['type']<4){
				return view('BusCon', $this->BusConnView($busConT, $data));
			}
			else{
				return view('BusCon', $this->BusConnView('', ''));
			}
		}
	}
	public function BusConnView($busConT='', $data=''){
		$lineName = '路線已停駛.';
		$lineId = '';
		$goName = '';
		$backName = '';
		$togo = null;
		$toback = null;
		$err = true;
		$D = [
			'tiImg'=>'/img/BusLogo.png',
			'tiText'=>'高雄公車',
			'tiImgWid'=>'5vh',
			'tiImgHei'=>'4vh',
			'topBtn'=>true,
			'lineName'=>$lineName,
			'lineId'=>$lineId,
			'goName'=>$goName,
			'backName'=>$backName,
			'togo'=>$togo,
			'toback'=>$toback,
			'err'=>$err,
		];
		if($busConT==''){
			return $D;
		}
		else if($busConT['type']>0&&count($busConT)>0){
			$D['lineName'] = $data[0]->nameZh;
			$D['lineId'] = $data[0]->ID;
			$D['goName'] = $busConT['backE'];
			$D['backName'] = $busConT['backS'];
			$D['togo'] = $busConT['togo'];
			$D['toback'] = $busConT['toback'];
			$D['err'] = false;
			return $D;
		}
		else{
			return $D;
		}
	}
    
    
	public function reGetBusTime($id, $type){#jq ajax
        $orderbyStr = 'seRounts';// 'ORDER BY adesc ASC';
        $whereStrArr = [['BusLineEnable','=',1],['cityCode','=','07'],['ID','=',$id]];
		
		$seleBus = new seleDBController;
		$data = $seleBus->dbSele('busdata',$whereStrArr,$orderbyStr);
		if(count($data)>0||$data[0]->BusLineEnable==1||$data!=null){
			$bus = new busConinCurlController;
			$connTime = $bus->busConinTime($id);
			$bdata['conn'] = $connTime;
			return json_encode($bdata);
		}
		else{
            $data['type'] = 0;
            $data['errT'] = '無此路線或路線已停駛.';
            return json_encode($data);
		}
	}
}
