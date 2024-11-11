<?php

namespace App\Http\Controllers\dbCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\dbCRUD\seleDBController;//20230903 add

class khhSeleStrController extends Controller
{
    public function busStr($id){
        $orderbyStr = 'seRounts';
        $whereStrArr = [['BusLineEnable','=',1],['cityCode','=','07']];
        $whereStrArr = $id=='m'?array_merge($whereStrArr,[['nameZh','like','%幹線%']]):array_merge($whereStrArr,[['BClass','=',$id]]);
        $bus = $this->dbQuery('busdata',$whereStrArr,$orderbyStr);
        return $bus;
	}
    public function mrtStr($id){
        $mrtOrderbyStr = 'sort desc';
        $mrtWhereStrArr = [['op','=',1],['cityCode','=','07'],['line','=',strtoupper($id)]];
        $mrt = $this->dbQuery('mrtdata',$mrtWhereStrArr,$mrtOrderbyStr);
        return $mrt;
    }
    public function mrtR($id){
        $mrtOrderbyStr = 'sort desc';
        $mrtWhereStrArr = [['op','=',1],['cityCode','=','07'],['line','=',strtoupper($id)]];
        $mrt = $this->dbQuery('mrtdata',$mrtWhereStrArr,$mrtOrderbyStr);
        return $mrt;
    }
    public function bikeStr($id){
        $bikeOrderbyStr = 'class';
        $bikeWhereStrArr = [['Enable','=',1],['cityCode','=','07'],['class','=',$id]];
        $bike = $this->dbQuery('bikedata',$bikeWhereStrArr,$bikeOrderbyStr);
		return $bike;
    }
    public function seleBBM_Class($cityCode){
        $orderbyStr = 'adesc';
        $whereStrArr = [['op','=',1],['cityCode','=',$cityCode]];
        $seleArr = $this->dbQuery('bbm_class',$whereStrArr,$orderbyStr);
        return $seleArr;
    }
    public function traStr(){
        $traArr = [];
        $CcountiesOrderbyStr = 'id';
        $CcountiesWhereStrArr = [['TRAop','=',1]];
        $Ccounties = $this->dbQuery('counties',$CcountiesWhereStrArr,$CcountiesOrderbyStr);
        $traArr['Ccounties'] = $Ccounties;//count($Ccounties)>0?$Ccounties:null;

        foreach($Ccounties as $v){
            $StationdOrderbyStr = 'StationID';
            $StationdWhereStrArr = [['op','=',1],['CountiesID','=',$v->id]];
            $Stationd = $this->dbQuery('trastationd',$StationdWhereStrArr,$StationdOrderbyStr);
            if($Stationd!=null){
                $traArr['Stationd'][$v->id] = $Stationd;//count($Stationd)>0?$Stationd:null;
            }
            else{ $traArr['Stationd'][$v->id] = null; }
        }
        return $traArr;
    }
    public function thsrStr(){
        $thsrArr = [];
        $CcountiesOrderbyStr = 'StationID';
        $CcountiesWhereStrArr = [['VersionID','=',1]];
        $Ccounties = $this->dbQuery('thsrstation',$CcountiesWhereStrArr,$CcountiesOrderbyStr);
        $thsrArr = $Ccounties;
        return $thsrArr;
    }

    public function khhArea(){
        $thsrArr = [];
        $CcountiesOrderbyStr = 'AreaNum';
        $CcountiesWhereStrArr = [['AreaIndex','>',0]];
        $Ccounties = $this->dbQuery('area',$CcountiesWhereStrArr,$CcountiesOrderbyStr);
        $thsrArr = $Ccounties;
        return $thsrArr;
    }
    
    public function dbQuery($dbName,$WhereStrArr,$OrderbyStr){
        $seleDBController = new seleDBController;
        $D = $seleDBController->dbSele($dbName,$WhereStrArr,$OrderbyStr);
		return $D;
    }
}
