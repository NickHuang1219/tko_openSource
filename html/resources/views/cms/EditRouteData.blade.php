@extends('layouts.app')

@section('content')
  <div class="container">
    @if($type=='RouteData')
      {{$BBMClassData}}
      <div class="row align-items-center" style="margin-top:1vh;">
        <div class="col">路線狀態:
          <img onclick="BBM_RouteSwitch({{$BBMClassData->key_index}},'{{$cityCode}}','{{$BBMClassData->op}}')" src="{{URL::asset($data->BusLineEnable==1?'/img/open_icon.png':'/img/close_icon.png')}}" style="max-width:5.5vh;padding-left:1vh;" />
          <span class="RouteID_AlertText">※點擊圖示可修改狀態</span>
        </div>
      </div>
    @endif
    @if($type=='Bus'||$type=='Mrt'||$type=='Bike')
      <div class="pageTitleStyle">
        {{$pageTitle}}
      @if($type=='Bus')
        <div class="pageTitleRouteNameStyle">{{$data->nameZh}}</div><hr />
      </div>
        <div class="row align-items-center" style="margin-top:1vh;">
          <div class="col">路線狀態:
            <img onclick="LineStatusSwitch({{$data->BusLineEnable}},'{{$cityCode}}','{{$data->ID}}')" src="{{URL::asset($data->BusLineEnable==1?'/img/open_icon.png':'/img/close_icon.png')}}" style="max-width:5.5vh;padding-left:1vh;" />
            <span class="RouteID_AlertText">※點擊圖示可修改狀態</span>
          </div>
          <div class="col saveRouteDataBtn" style="text-align:right;">
            <button class="btn btn-danger" onclick="saveRouteData()">保存修改</button>
          </div>
        </div>
        <div class="row align-items-center" style="margin-top:1vh;">
          <div class="col">路線ID:&nbsp;{{$data->ID}}<span class="RouteID_AlertText">※路線ID禁止修改</span></div>
        </div>
        <div class="row align-items-center  rowStyle" id="list">
          <div class="col-6">
            <label for="basic-url" class="form-label">路線名稱</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="nameZh" value="{{$data->nameZh}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
        <div class="row align-items-center" id="list" style="margin-top:1vh;">
          <div class="col-6">
            <label for="basic-url" class="form-label">路線起迄站</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="ddesc" value="{{$data->ddesc}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
        <div class="row align-items-center" id="list" style="margin-top:1vh;">
          <div class="col-6">
            <label for="basic-url" class="form-label">路線起點站</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="departureZh" value="{{$data->departureZh}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
        <div class="row align-items-center" id="list" style="margin-top:1vh;">
          <div class="col-6">
            <label for="basic-url" class="form-label">路線終點站</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="destinationZh" value="{{$data->destinationZh}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
      @endif
      @if($type=='Mrt')
        <div class="pageTitleRouteNameStyle">{{$data->StationNameTw}}</div><hr />
      </div>
        <div class="row align-items-center" style="margin-top:1vh;">
          <div class="col">路線狀態:
            <img onclick="LineStatusSwitch({{$data->op}},'{{$cityCode}}','{{$data->StationUID}}')" src="{{URL::asset($data->op==1?'/img/open_icon.png':'/img/close_icon.png')}}" style="max-width:5.5vh;padding-left:1vh;" />
            <span class="RouteID_AlertText">※點擊圖示可修改狀態</span>
          </div>
          <div class="col saveRouteDataBtn" style="text-align:right;">
            <button class="btn btn-danger" onclick="saveRouteData()">保存修改</button>
          </div>
        </div>
        <div class="row align-items-center" style="margin-top:1vh;">
          <div class="col">路線ID:&nbsp;{{$data->StationUID}}<span class="RouteID_AlertText">※路線ID禁止修改</span></div>
        </div>
        <div class="row align-items-center  rowStyle" id="list">
          <div class="col-6">
            <label for="basic-url" class="form-label">站台名稱</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="nameZh" value="{{$data->StationNameTw}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
        <div class="row align-items-center" id="list" style="margin-top:1vh;">
          <div class="col-6">
            <label for="basic-url" class="form-label">站台地址</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="ddesc" value="{{$data->StationAddress}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
      @endif
      @if($type=='Bike')
        <div class="pageTitleRouteNameStyle">{{$data->StationNameTW}}</div><hr />
      </div>
        <div class="row align-items-center" style="margin-top:1vh;">
          <div class="col">
            <span style="font-size:110%;">路線狀態:</span>
            <img onclick="LineStatusSwitch({{$data->Enable}},'{{$cityCode}}','{{$data->StationUID}}')" src="{{URL::asset($data->Enable==1?'/img/open_icon.png':'/img/close_icon.png')}}" style="max-width:5.5vh;padding-left:1vh;" />
            <span class="RouteID_AlertText">※點擊圖示可修改狀態</span>
          </div>
          <div class="col saveRouteDataBtn" style="text-align:right;">
            <button class="btn btn-danger" onclick="saveRouteData()">保存修改</button>
          </div>
        </div>
        <div class="row align-items-center" style="margin-top:1vh;">
          <div class="col">
            <span style="font-size:110%;">路線ID:&nbsp;</span>
            {{$data->StationUID}}<span class="RouteID_AlertText">※路線ID禁止修改</span></div>
        </div>
        <div class="row align-items-center  rowStyle" id="list">
          <div class="col-8">
            <label for="basic-url" class="form-label" style="font-size:110%;">站台名稱</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="nameZh" value="{{$data->StationNameTW}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
        <div class="row align-items-center" id="list" style="margin-top:1vh;">
          <div class="col-6">
            <label for="basic-url" class="form-label" style="font-size:110%;">站台地址</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="ddesc" value="{{$data->StationAddressTW}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
        <div class="row align-items-center" id="list" style="margin-top:1vh;">
          <label for="basic-url" class="form-label" style="font-size:110%;">站台經緯度</label>
          <div class="col-4">
            {{-- <label for="basic-url" class="form-label">經度</label> --}}
            <div class="input-group mb-3 align-items-center">
              經度:&nbsp;&nbsp;<input type="text" class="form-control" id="departureZh" value="{{$data->PositionLon}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
        <div class="row align-items-center" id="list">
          <div class="col-4">
            {{-- <label for="basic-url" class="form-label">緯度</label> --}}
            <div class="input-group mb-3 align-items-center">
              緯度:&nbsp;&nbsp;<input type="text" class="form-control" id="departureZh" value="{{$data->PositionLat}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div>
        {{-- <div class="row align-items-center" id="list" style="margin-top:1vh;">
          <div class="col-6">
            <label for="basic-url" class="form-label">路線終點站</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="destinationZh" value="{{$data->destinationZh}}" aria-describedby="basic-addon3">
            </div>
          </div>
        </div> --}}
      @endif
    @endif
  </div>
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/cms/cms_EditRouteData.css') }}" rel="stylesheet">
@endsection

@section('content_js')
  {{-- <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script> --}}
  <script src="{{ URL::asset('/js/cms/cms_EditRouteData.js') }}"></script>
@endsection