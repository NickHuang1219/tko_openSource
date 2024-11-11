<?php

namespace App\Http\Controllers\dbCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use DB;
use Illuminate\Support\Facades\DB; //20230903 add

class seleDBController extends Controller
{
    public function dbSele($dbName,$whereStrArr, $orderbyStr){
        if($dbName!=''){
            try{
                $dbArr = DB::table($dbName)->where($whereStrArr)//->get();
                                            ->orderByRaw($orderbyStr)->get();
                if($dbArr->count()>0){ return $dbArr; }
				else{ return null; }
            }
            catch(\Exception $exception){
                return 0;
            }
        }
    }

    public function khhMrtData($dbName,$whereStrArr, $orderbyStr){
        if($dbName!=''){
			$mrtDataChe = null;
            try{
                $mrtDataChe = DB::table('mrtdata')->where('StasionID like "%O%"')
                ->orderBy('sort', 'ASC')->orderBy('StationID', 'ASC')->get();
                return $mrtDataChe;
            }
            catch(\Exception $exception){
                return $mrtDataChe;
            }
        }
    }
}
