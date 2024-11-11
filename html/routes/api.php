<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#App API
#取得路線資料 20230904 add
use App\Http\Controllers\appAPI\LineDataController;
#取得天氣 20230904 add
use App\Http\Controllers\curlWeathers\curlWeathersController;

#20230904 add
use App\Http\Controllers\TkoBusLineController;
use App\Http\Controllers\TkoMrtController;
use App\Http\Controllers\TkoCityBikeController;
use App\Http\Controllers\TaiwanTRAController;
use App\Http\Controllers\TaiwanTHSRController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// #App取得路線資料
Route::get('LineData/{weatherOC?}/{cityCode?}', [LineDataController::class, 'AppRouteData']);
//取的版本號查詢
Route::get('/cheVer/{cityStr}/{AppVersion}/{versionCode}/{key?}/{WeatherCode?}', [LineDataController::class, 'cheVerD']);
//氣象查詢
Route::get('/getWeather/{sele}/{chS}/{chT}', [curlWeathersController::class, 'getWeathers']);


//公車
Route::get('/reGetBusTime/{id}/{type}', [TkoBusLineController::class, 'reGetBusTime']);

//捷運輕軌 站點列車即時資訊查詢
Route::get('/MrtConnAPI/{id}/{type}', [TkoMrtController::class, 'MrtLineConnAPI']);


//Bike 站台租還車輛查詢
Route::get('/BikeConn/{StationUID}', [TkoCityBikeController::class, 'BikeConAPI']);


//台鐵 jQ ajax getTra stationNow(站台列車進站即時資訊)、 stationToday(站台當天列車預計進站時間)
Route::get('/TaiwanTRA/TRADAPI/{seleStr?}/{stationID?}/{str?}', [TaiwanTRAController::class, 'TRADAPI']);
//查詢台鐵列車狀態
Route::get('/TaiwanTRA/TrainStatusAPI/{TrainNo}', [TaiwanTRAController::class, 'TrainStatusAPI']);


//高鐵起訖站查詢
Route::get('thsrODAPI/{SID}/{EID}', [TaiwanTHSRController::class, 'thsrODAPI']);
// 高鐵起訖站查詢座位
Route::get('thsrTrainSeat/{SID}/{EID}/{TrainNo}', [TaiwanTHSRController::class, 'TrainSeatDataAPI']);
//高鐵站 當日進站列車查詢
Route::get('stationToday/{StationID}', [TaiwanTHSRController::class, 'stationToday']);


