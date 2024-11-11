<?php

namespace App\Http\Controllers\appAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;//20230904 add

class ver extends Controller
{
    public function connMySQL(){
        $conn = new sqlConn;
        $dbConn = $conn->sqlconn();
        return $dbConn;
    }

    public function ver($str, $cityCode='07'){
        $data = array();
        $cityCode = $cityCode==''?'07':$cityCode;

            if($str=='p'){
                $versionD = DB::table('appdataversion')
                                    ->join('counties', 'appdataversion.cityCode', '=', 'counties.id')
                                    ->where('appdataversion.cityCode', '=', $cityCode)
                                    ->get();
                return $versionD;
            }
            else if($str=='app'){
                $versionD = DB::table('appdataversion')
                                    ->join('counties', 'appdataversion.cityCode', '=', 'counties.id')
                                    ->where('appdataversion.cityCode', '=', $cityCode)
                                    ->get();
                $data['AppV'] = $versionD[0]->AppVersion;
                $data['DataV'] = $versionD[0]->DataVersion;
                $data['K'] = $versionD[0]->DataVersion;
                $data['mrt'] = $versionD[0]->MRTop==1?'flex':'none';
                $data['bus'] = $versionD[0]->BUSop==1?'flex':'none';
                $data['bike'] = $versionD[0]->BIKEop==1?'flex':'none';
                $data['tra'] = $versionD[0]->TRAop==1?'flex':'none';
                $data['thsr'] = $versionD[0]->THSRop==1?'flex':'none';
                $data['sys'] = 5;
                return $versionD;
            }
            else{
                return 'err-444';
            }
    }

    public function AppFunction($versionD, $conn=''){
        $this->dbConn = $this->connMySQL();
        if($this->dbConn=='err'){
            return 'err';
        }
        else{
            $counties = $this->dbConn->query("SELECT * FROM counties where id='".$versionD[0]['cityCode']."'");
            $countiesD = $counties->fetchAll();
            $closeDB = $this->closeDBConn();
            $data['AppV'] = $versionD[0]['AppVersion'];
            $data['DataV'] = $versionD[0]['DataVersion'];
            $data['mrt'] = $versionD[0]['MRTop']==1?'flex':'none';
            $data['bus'] = $versionD[0]['BUSop']==1?'flex':'none';
            $data['bike'] = $versionD[0]['BIKEop']==1?'flex':'none';
            $data['tra'] = $versionD[0]['TRAop']==1?'flex':'none';
            $data['thsr'] = $versionD[0]['THSRop']==1?'flex':'none';
            $data['sys'] = 5;
            return $data;
        }
    }
    public function AppFunctionD($versionD, $conn=''){
        $data['AppV'] = $versionD[0]['AppVersion'];
        $data['DataV'] = $versionD[0]['DataVersion'];
        $data['mrt'] = $versionD[0]['MRTop']==1?'flex':'none';
        $data['bus'] = $versionD[0]['BUSop']==1?'flex':'none';
        $data['bike'] = $versionD[0]['BIKEop']==1?'flex':'none';
        $data['tra'] = $versionD[0]['TRAop']==1?'flex':'none';
        $data['thsr'] = $versionD[0]['THSRop']==1?'flex':'none';
        $data['sys'] = 5;
        $data['type'] = true;
        return $data;
    }
    
    public function closeDBConn(){
        $this->dbConn = '';
        return 'yes';
    }
}
