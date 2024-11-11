<?php

namespace App\Http\Controllers\dbCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\dbCRUD\seleDBController;//20230904 add

class ThsrTraSeleStrController extends Controller
{
    public function thsrStr(){
        $thsrOrderbyStr = 'StationID';
        $thsrWhereStrArr = [['VersionID','=',1]];
        return $this->dbQuery('thsrstation',$thsrWhereStrArr,$thsrOrderbyStr);
    }
    
    public function traCountiesStr(){
        $countiesOrderbyStr = 'id';
        $countiesWhereStrArr = [['TRAop','=',1]];
        return $this->dbQuery('counties',$countiesWhereStrArr,$countiesOrderbyStr);
    }
    
    public function traTrastationdStr($id){
        $trastationdOrderbyStr = 'StationID';
        $trastationdWhereStrArr = [['CountiesID','=',$id],['op','=',1]];
        return $this->dbQuery('trastationd',$trastationdWhereStrArr,$trastationdOrderbyStr);
    }
    
    public function dbQuery($dbName,$WhereStrArr,$OrderbyStr){
        $seleDBController = new seleDBController;
        $D = $seleDBController->dbSele($dbName,$WhereStrArr,$OrderbyStr);
        return $D;
    }
}
