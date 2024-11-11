<?php

namespace App\Http\Controllers\curlWeathers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;//20230904 add

class curlWeathersController extends Controller
{
	public function getWeathers($str, $chS, $chT){
		$D = array();

		$area = [];
        try{
            $area = DB::table('area')->where('AreaName', '=', $str)->get();
            $i = 1;
        }
        catch(\Exception $exception){}
        if(count($area)==0){
			$D['httpType'] = 'err';//成功失敗辨識
			$D['ErrCode'] = 'Weather500-';//前端錯誤代碼
			$D['ErrT'] = '氣象參數錯誤.';//前端錯誤顯示訊息
			return json_encode($D);
		}
		else{
			if($chS=='p' && $chT=='k900nh'){
				return json_encode($this->Weathers($str, $chT));
			}
			else{
				$D['httpType'] = 'err';//成功失敗辨識
				$D['ErrCode'] = 'Weather500-1-';//前端錯誤代碼
				$D['ErrT'] = '參數錯誤.';//前端錯誤顯示訊息
				return json_encode($D);
			}
		}
	}
	public function Weathers($str, $chS){
		#----------------------------
		#變數初始化
		#----------------------------
		$weatherD = array();
		$i=0;
		
		$url = 'https://opendata.cwa.gov.tw/api/v1/rest/datastore/F-D0047-067?Authorization=CWB-53EC0D7E-EC0C-4B29-A8F1-442D83FB5C4F&format=JSON&locationName='.$str.'&elementName=WeatherDescription&sort=time';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch , CURLOPT_URL , $url);
					
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					
		curl_setopt($ch, CURLOPT_USERAGENT, "Google Bot");
		$WeatherD = curl_exec($ch);
		$httpCode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
					
		$tt = json_decode($WeatherD);
		if($httpCode=='200' && count($tt->records->locations[0]->location[0]->weatherElement[0]->time)>0){
			$D = $tt->records->locations[0]->location[0]->weatherElement[0]->time[0]->elementValue[0]->value;
			$v=explode('。', $D);
			if(count($v)==7){
				$wea=explode('至', $v[2]);
				$weaMin=explode('溫度攝氏', $wea[0]);
				$weaMax=explode('度', $wea[1]);
				
				$vD = $v[0];
				$weatherD['ImgCode'] = $this->getImgCodeType($vD,'imgCode');
				if($chS=='k900nh'){
					$weatherD['ImgCode'] = $this->getImgCodeType($vD,'imgCode');
				}/**/
				$weatherD['weatherT'] = $v[0];
				$weatherD['Rainfall'] = $v[1];
				$weatherD['temperaHight'] = $weaMax[0];
				$weatherD['temperaLow'] = $weaMin[1];
				$weatherD['todayWeather'] = $this->getWeatherTData($str);
				$weatherD['httpType'] = 'success';
				$weatherD['ErrCode'] = '0';
				$weatherD['ErrT'] = '';
				return $weatherD;
			}
			else{
				$weatherD['weatherT'] = '';
				$weatherD['Rainfall'] = '';
				$weatherD['httpType'] = 'err';
				$weatherD['ErrCode'] = 'D404-'.count($v);
				$weatherD['ErrT'] = '氣象局無資料回傳.';
				return $weatherD;
			}
		}
		else{
			$weatherD['weatherT'] = '';
			$weatherD['Rainfall'] = '';
			$weatherD['httpType'] = 'err';
			$weatherD['ErrCode'] = 'C404';
			$weatherD['ErrT'] = '氣象局Server異常.';
			return $weatherD;
		}
    }
	private function getWeatherTData($s){
		$url = 'https://opendata.cwa.gov.tw/api/v1/rest/datastore/F-D0047-067?Authorization=CWB-53EC0D7E-EC0C-4B29-A8F1-442D83FB5C4F&format=JSON&locationName='.$s.'&elementName=T&sort=time';

		$WeatherTData = curl_init();
		curl_setopt($WeatherTData, CURLOPT_URL,$url);
		curl_setopt($WeatherTData , CURLOPT_URL , $url);
					
		curl_setopt($WeatherTData, CURLOPT_RETURNTRANSFER, true);
					
		curl_setopt($WeatherTData, CURLOPT_USERAGENT, "Google Bot");
		$TD = curl_exec($WeatherTData);
		$THttpCode=curl_getinfo($WeatherTData,CURLINFO_HTTP_CODE);
		curl_close($WeatherTData);
		
		$TR = json_decode($TD);
		$T = $TR->records->locations[0]->location[0]->weatherElement[0]->time[0]->elementValue[0]->value;
		return $T;
	}
	private function getImgCodeType($weatherStr, $cheStr){
		$sun = preg_match('/晴/i', $weatherStr);
		$cloudy = preg_match('/多雲/i', $weatherStr);
		$yin = preg_match('/陰/i', $weatherStr);
		$rain = preg_match('/雨/i', $weatherStr);
		$fog = preg_match('/霧/i', $weatherStr);
		$mine = preg_match('/雷/i', $weatherStr);
		$imgNumS = (string)$sun.(string)$cloudy.(string)$yin.(string)$rain.(string)$fog.(string)$mine;
			
		if($cheStr=='imgType'){
			return $imgNumS;
		}
		else if($cheStr=='imgCode'){
			if($sun){#晴
				if($cloudy){#多雲
					#晴 多雲
					if($yin){#陰
						#晴 多雲 陰
						if($rain){#雨
							#晴 多雲 陰 雨
							if($fog){#霧
								#晴 多雲 陰 雨 霧
								if($mine){#雷
									#晴 多雲 陰 雨 霧 雷V
									return '1';
								}
								else{
									#晴 多雲 陰 雨 霧V
									return '2';
								}
							}
							else if($mine){#雷
								#晴 多雲 陰 雨 雷V
								return '1';
							}
							else{
								#晴 多雲 陰 雨V
								return '2';
							}
						}
						else if($fog){#霧
							#晴 多雲 陰 霧
							if($mine){#雷
								#晴 多雲 陰 霧 雷V
								return '3';
							}
							else{
								#晴 多雲 陰 霧V
								return '4';
							}
						}
						else if($mine){#雷
							#晴 多雲 陰 雷V
							return '3';
						}
						else{
							#晴 多雲 陰V
							return '4';
						}
					}
					else if($rain){#雨
						#晴 多雲 雨
						if($fog){#霧
							#晴 多雲 雨 霧
							if($mine){#雷
								#晴 多雲 雨 雷V
								return '5';
							}
							else{
								#晴 多雲 雨 霧V
								return '6';
							}
						}
						else if($mine){#雷
							#晴 多雲 雨 雷V
							return '5';
						}
						else{
							#晴 多雲 雨V
							return '6';
						}
					}
					else if($fog){#霧
						#晴 多雲 霧
						if($mine){#雷
							#晴 多雲 霧 雷V
							return '7';
						}
						else{
							#晴 多雲 霧V
							return '8';
						}
					}
					else if($mine){#雷
						#晴 多雲 雷V
						return '7';
					}
					else{
						#晴 多雲V
						return '8';
					}
				}
				else if($yin){#陰
					#晴 陰
					if($rain){#雨
						#晴 陰 雨
						if($fog){#霧
							#晴 陰 雨 霧
							if($mine){#雷
								#晴 陰 雨 霧 雷V
								return '9';
							}
							else{
								#晴 陰 雨 霧V
								return '10';
							}
						}
						else if($mine){#雷
							#晴 陰 雨 雷V
							return '9';
						}
						else{
							#晴 陰 雨V
							return '10';
						}
					}
					else if($fog){#霧
						#晴 陰 霧
						if($mine){#雷
							#晴 陰 霧 雷V
							return '11';
						}
						else{
							#晴 陰 霧V
							return '12';
						}
					}
					else if($mine){#雷
						#晴 陰 雷V
						return '11';
					}
					else{
						#晴 陰V
						return '12';
					}
				}
				else if($rain){#雨
					#晴 雨
					if($fog){#霧
						#晴 雨 霧
						if($mine){#雷
							#晴 雨 霧 雷(一片雲)V
							return '13';
						}
						else{
							#晴 雨 霧(一片雲)V
							return '14';
						}
					}
					else if($mine){#雷
						#晴 雨 雷(一片雲)V
						return '13';
					}
					else{
						#晴 雨(一片雲)V
						return '14';
					}
				}
				else if($fog){#霧
					# 晴 霧
					if($mine){#雷
						# 晴 霧 雷(一片雲)V
						return '15';
					}
					else{
						# 晴 霧V
						return '16';
					}
				}
				else if($mine){#雷
					#晴 雷(一片雲)V
					return '15';
				}
				else{
					#晴V
					return '16';
				}
			}
			else if($cloudy){#多雲
				if($yin){#陰
					#多雲 陰
					if($rain){#雨
						#多雲 陰 雨
						if($fog){#霧
							#多雲 陰 雨 霧
							if($mine){#雷
								#多雲 陰 雨 霧 雷V
								return '17';
							}
							else{
								#多雲 陰 雨 霧V
								return '18';
							}
						}
						else if($mine){#雷
							#多雲 陰 雨 雷V
							return '17';
						}
						else{
							#多雲 陰 雨V
							return '18';
						}
					}
					else if($fog){#霧
						#多雲 陰 霧
						if($mine){#雷
							#多雲 陰 霧 雷V
							return '19';
						}
						else{
							#多雲 陰 霧V
							return '20';
						}
					}
					else if($mine){#雷
						#多雲 陰 雷V
						return '19';
					}
					else{
						#多雲 陰
						return '20';
					}
				}
				else if($rain){#雨
					#多雲 雨
					if($fog){#霧
						#多雲 雨 霧
						if($mine){#雷
							#多雲 雨 霧 雷V
							return '21';
						}
						else{
							#多雲 雨 霧V
							return '22';
						}
					}
					else if($mine){#雷
						#多雲 雨 雷V
						return '21';
					}
					else{
						#多雲 雨V
						return '22';
					}
				}
				else if($fog){#霧
					# 多雲 霧
					if($mine){#雷
						# 多雲 霧 雷V
						return '23';
					}
					else{
						# 多雲 霧V
						return '24';
					}
				}
				else if($mine){#雷
					#多雲 雷V
					return '23';
				}
				else{
					#多雲V
					return '24';
				}
			}
			else if($yin){#陰
				if($rain){#雨
					#陰 雨
					if($fog){#霧
						#陰 雨 霧
						if($mine){#雷
							#陰 雨 霧 雷V
							return '25';
						}
						else{
							#陰 雨 霧V
							return '26';
						}
					}
					else if($mine){#雷
						#陰 雨 雷V
						return '25';
					}
					else{
						#陰 雨V
						return '26';
					}
				}
				else if($fog){#霧
					#陰 霧
					if($mine){#雷
						#陰 霧 雷V
						return '27';
					}
					else{
						#陰 霧V
						return '28';
					}
				}
				else if($mine){#雷
					#陰 雷V
					return '27';
				}
				else{
					#陰V
					return '28';
				}
			}
			else if($rain){#雨
				if($fog){#霧
					#雨* 霧
					if($mine){#雷
						#雨 霧 雷(一片雲)V
						return '29';
					}
					else{
						#雨 霧(一片雲)V
						return '30';
					}
				}
				else if($mine){#雷
					#雨 雷(一片雲)V
					return '29';
				}
				else{
					#雨(一片雲)V
					return '30';
				}
			}
			else if($fog){#霧
				if($mine){#雷
					#霧 雷V
					return '31';
				}
				else{
					#霧V
					return '24';
				}
			}
			else if($mine){#雷(一片雲)V
				return '31';
			}
			else{
				$weatherD['ImgCode'] = '0';
			}
		}
		else{
			return null;
		}
	}
	
}
