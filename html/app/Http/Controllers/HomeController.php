<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 20230908 add
use App\Http\Controllers\cmsDBSele\cmsDbSeleController;
use App\Http\Controllers\dbCRUD\seleDBController;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->cmsDbSele = new cmsDbSeleController;
        $this->dbCRUD = new seleDBController;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $counties = '';
        try{
            $dbArr = DB::table('counties')->orderBy('id')->get();
            if($dbArr->count()>0){ $counties = $dbArr; }
            else{ $counties = null; }
        }
        catch(\Exception $exception){
            $counties = null;
        }
        return view('home',['counties'=>$counties]);
    }
}
