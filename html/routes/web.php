<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TkoindexController;
use App\Http\Controllers\TkoBusLineController;
use App\Http\Controllers\TkoMrtController;
use App\Http\Controllers\TkoCityBikeController;
use App\Http\Controllers\TaiwanTRAController;
use App\Http\Controllers\TaiwanTHSRController;

// 20230908 add 後臺管理
use App\Http\Controllers\cmsController\transporController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//首頁
Route::get('/', [TkoindexController::class, 'Tkoindex']);

//公車首頁
Route::get('/Bus', [TkoBusLineController::class, 'Busindex']);
//公車分類查詢畫面
Route::get('/Bus/{id}', [TkoBusLineController::class, 'BusLine']);
//公車即時動態
Route::get('/BusCon/{id}', [TkoBusLineController::class, 'BusConinTime']);
//jQ ajax reGetBusConin
Route::get('/reGetBusTime/{id}/{type}', [TkoBusLineController::class, 'reGetBusTime']);

//捷運首頁
Route::get('/Mrt', [TkoMrtController::class, 'Mrtindex']);
//捷運分類查詢畫面
Route::get('/Mrt/{id}', [TkoMrtController::class, 'MrtLine']);
//jQ ajax getMConin
Route::get('/MrtConn/{id}/{type}', [TkoMrtController::class, 'MrtLineConn']);

//CityBike首頁
Route::get('/Bike/{id?}', [TkoCityBikeController::class, 'CityBikeindex']);
//YouBike分類查詢畫面
// Route::get('/Bike/{id}', [TkoCityBikeController::class, 'CityBikeLine']);
//jQ ajax getBikeConin
// Route::get('/BikeConn/{id}', 'TkoCityBikeController@BikeCon');
Route::get('/BikeConn/{StationUID}', [TkoCityBikeController::class, 'BikeCon']);

//台灣鐵路 
Route::get('/TaiwanTRA', [TaiwanTRAController::class, 'TaiwanTRAindex']);
//台鐵查詢縣市站台資訊畫面
Route::get('/TaiwanTRA/Trastationds/{id}', [TaiwanTRAController::class, 'getTrastationd']);
//jQ ajax getTra stationNow(站台列車進站即時資訊)、 stationToday(站台當天列車預計進站時間)
Route::get('/TaiwanTRA/TRAD/{seleStr?}/{stationID?}/{str?}', [TaiwanTRAController::class, 'TRAD']);
//查詢台鐵列車狀態
Route::get('/TaiwanTRA/TrainStatus/{TrainNo}', [TaiwanTRAController::class, 'TrainStatus']);

#js用↓
Route::get('/TaiwanTRA/Trastationd/{id}', 'TaiwanTRAController@Trastationd');
Route::get('/counties/{id?}', 'TaiwanTRAController@Counties');


// 台灣高鐵
Route::get('/TaiwanTHSR', [TaiwanTHSRController::class, 'TaiwanTHSRindex']);
Route::get('/TaiwanTHSR/{str}', [TaiwanTHSRController::class, 'sToday_goTo']);
Route::get('/thsrOD/{SID}/{EID}', [TaiwanTHSRController::class, 'thsrOD']);
// 高鐵起訖站查詢座位
Route::get('thsrTrainSeat/{SID}/{EID}/{TrainNo}', [TaiwanTHSRController::class, 'TrainSeatData']);
Route::get('stationToday/{StationID}', [TaiwanTHSRController::class, 'stationToday']);
// Route::get('/TaiwanTHSR/{str}', 'TaiwanTHSRController@sToday_goTo');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/register', function(){ return '404'; })->name('register');


// 20230908 add 後臺管理
Route::get('/countiesBBM/{city}', [transporController::class, 'index']);
// busManage
Route::get('/cityBus/{showType?}', [transporController::class, 'cityBus']);
Route::get('/cityBusSele/{cityCode}/{showType?}', [transporController::class, 'cityBusSele']);
// Route::get('/countiesBBM', [App\Http\Controllers\cmsController\transporController::class, 'index']);



