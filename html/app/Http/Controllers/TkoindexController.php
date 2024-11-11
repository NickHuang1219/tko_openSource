<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TkoindexController extends Controller
{
    public function Tkoindex()
	{
		$data = ['h'=>'私は髙雄がすきです'];
		$h = '私は髙雄がすきです';
		return view('TkoHome',[ 
								'tiImg'=>'/img/klog.png',
								'tiText'=>'大腳走高雄',
								'tiImgWid'=>'5vh',
								'tiImgHei'=>'5vh',
		]);
	}
}
