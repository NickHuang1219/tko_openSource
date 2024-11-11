<?php

namespace App\Http\Controllers\cmsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 20230908 add
use App\Http\Controllers\cmsDBSele\cmsDbSeleController;
use App\Http\Controllers\dbCRUD\seleDBController;
use DB;

class transporController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->cmsDbSele = new cmsDbSeleController;
        $this->dbCRUD = new seleDBController;
    }

    public function index($city){
        $cityData = '';
        try{
            $dbArr = DB::table('counties')->where('id','=',$city)->get();
            if($dbArr->count()>0){ $cityData = $dbArr; }
            else{ $cityData = null; }
        }
        catch(\Exception $exception){
            $cityData = null;
        }
        return view('cms/countiesBBM',['cityData'=>$cityData, 'cityCode'=>$city]);
    }
    
    public function cityBus($showType){
        $dataList = $this->countiesDB('BUSop');
        $lineShow = $showType=='lineShow'?'show':null;
        $classShow = $showType=='classShow'?'show':null;
        $routeShow = $showType=='routeShow'?'show':null;
        return view('cms/busManage',['dataList'=>$dataList, 
                                        'BusD'=>null, 
                                        'bbm_class'=>null,
                                        'cityCode'=>null, 
                                        'pageTitle'=>'公車路線管理',
                                        'seleTitle'=>'請選擇縣市',
                                        'lineShow'=>$lineShow,
                                        'classShow'=>$classShow,
                                        'routeShow'=>$routeShow,
                                    ]);
    }
    public function cityBusSele($cityCode, $showType){
        $dataList = null;
        $countiesList = $this->countiesDB('BUSop');
        $seleTitle = null;
        $bbm_class = null;
        $lineShow = $showType=='lineShow'?'show':null;
        $classShow = $showType=='classShow'?'show':null;
        $routeShow = $showType=='routeShow'?'show':null;
        if($countiesList!=null){ foreach($countiesList as $v){ $v->id==$cityCode?$seleTitle=$v->name:null; } }
        try{
            $data = DB::table('busdata')->where([['cityCode','=',$cityCode]])->orderBy('nameZh')->orderBy('seRounts')->orderBy('BClass')->get();
            if($data->count()>0){ $dataList = $data; }
        }
        catch(\Exception $exception){}
        try{
            $bbm_classD = DB::table('bbm_class')->where([['cityCode','=',$cityCode],['class','=','bus']])->orderBy('adesc')->get();
            if($bbm_classD->count()>0){ $bbm_class = $bbm_classD; }
        }
        catch(\Exception $exception){}
        return view('cms/busManage',['dataList'=>$countiesList, 
                                        'BusD'=>$dataList,
                                        'bbm_class'=>$bbm_class,
                                        'cityCode'=>$cityCode, 
                                        'pageTitle'=>'公車路線管理',
                                        'seleTitle'=>$seleTitle,
                                        'lineShow'=>$lineShow,
                                        'classShow'=>$classShow,
                                        'routeShow'=>$routeShow,
                    ]);
    }
    public function countiesDB($opType){
        try{
            $datas = DB::table('counties')->where($opType,'=',1)->get();
            if($datas->count()>0){ return $datas; }
            else{ return null; }
        }
        catch(\Exception $exception){
            return null;
        }
    }
}
