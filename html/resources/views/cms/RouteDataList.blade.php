@extends('layouts.app')

@section('content')
<div class="container">
  @if(count($dataList)<1)
    <div class="alert alert-danger" role="alert">
      ※請先獲取路線資料.
    </div>
    @endif
  <div class="pageTitleStyle">{{$pageTitle}}</div>
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          資料存取開關
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <div class="form-check form-switch">
            <input class="form-check-input cityBBMChecked" type="checkbox" id="flexSwitchCheckChecked" {{count($dataList)<1?'disabled':''}} {{--,{{$checkBoxV}}--}}
            {{$checkBoxV==1?'checked':'unchecked'}} onchange="dataSwitch('{{$cityCode}}','{{$type}}','{{$pkey}}',{{$checkBoxV}})" value="{{$checkBoxV}}" name="checkbox" />
            <label class="form-check-label" id="labelText" for="flexSwitchCheckChecked">{{$checkBoxV==1?'資料取得已開啟.':'資料取得已關閉.'}}</label>
          </div>
        </div>
      </div>
    </div>
    @if($bbmClass!='err'&&count($bbmClass)>0)
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            路線類別
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            @foreach($bbmClass as $bbmK=>$bbmV)
              <div class="row align-items-center" style="padding:.6vh 0;margin:.6vh 0;">
                <div class="col-auto">
                  {{$bbmV->linename}}
                </div>
                <div class="col-auto {{$bbmV->key_index}}">
                  狀態修改:
                  <img onclick="lineStatusSwitch('{{$cityCode}}','{{$bbmV->key_index}}',{{$bbmV->op}},'{{$bbmV->linename}}','{{$pkey}}')" src="{{URL::asset($bbmV->op==1?'/img/acces_icon.png':'/img/close_icon.png')}}" style="max-width:5vh;padding-left:1vh;" />
                </div>
                <div class="col col-auto">
                  資料修改:
                  <a href="/cmsBBMDataE/{{$cityCode}}/{{$bbmV->key_index}}">
                    {{-- onclick="lineStatusSwitch('{{$cityCode}}','{{$bbmV->key_index}}',{{$bbmV->op}},'{{$bbmV->linename}}','{{$pkey}}')" --}}
                    <img src="{{URL::asset('/img/edit_icon.png')}}" style="max-width:3.5vh;"  />
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif
    @if($dataList!='err'&&count($dataList)>0)
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            資料列表
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            @foreach($dataList as $k=>$v)
              @if($type=='Bus')
                <div class="row align-items-center" id="list" style="padding:.75vh 0;margin:.75vh 0;">
                  <div class="col-7">{{$v->nameZh}}</div>
                  <div class="col-3">狀態:<img onclick="bbmSwitch({{$v->BusLineEnable}},'{{$cityCode}}','{{$v->RouteUID}}','{{$v->nameZh}}','{{$type}}','{{$pkey}}')" src="{{URL::asset($v->BusLineEnable==1?'/img/open_icon.png':'/img/close_icon.png')}}" style="max-width:5.5vh;padding-left:1vh;" /></div>
                  <div class="col-1"><a href="/cmsBusDataEdit/{{$cityCode}}/{{$v->ID}}"><img src="{{URL::asset('/img/edit_icon.png')}}" style="max-width:3.5vh;" /></a></div>
                  <div class="col-1"><img onclick="bbmDelete('{{$cityCode}}','{{$v->ID}}','{{$v->nameZh}}','{{$type}}')" src="{{URL::asset('/img/delect_icon.png')}}" style="max-width:4vh;" /></div>
                </div>
              @endif
              @if($type=='Mrt')
                <div class="row align-items-center" id="list" style="padding:.75vh 0;margin:.75vh 0;">
                  <div class="col-7">{{$v->StationNameTw}}</div>
                  <div class="col-3"></div>
                  <div class="col-1"><a href="/cmsMrtDataEdit/{{$cityCode}}/{{$v->StationUID}}"><img src="{{URL::asset('/img/edit_icon.png')}}" style="max-width:3.5vh;" /></a></div>
                  <div class="col-1"><img onclick="bbmDelete('{{$cityCode}}','{{$v->StationUID}}','{{$v->StationNameTw}}','{{$type}}')" src="{{URL::asset('/img/delect_icon.png')}}" style="max-width:4vh;" /></div>
                </div>
              @endif
              @if($type=='Bike')
                <div class="row align-items-center" id="list" style="padding:.75vh 0;margin:.75vh 0;">
                  <div class="col-7">{{$v->StationNameTW}}</div>
                  <div class="col-3">狀態:<img onclick="bbmSwitch({{$v->Enable}},'{{$cityCode}}','{{$v->StationID}}','{{$v->StationNameTW}}','{{$type}}','{{$pkey}}','{{$pkey}}')" src="{{URL::asset($v->Enable==1?'/img/open_icon.png':'/img/close_icon.png')}}" style="max-width:5.5vh;padding-left:1vh;" /></div>
                  <div class="col-1"><a href="/cmsBikeDataEdit/{{$cityCode}}/{{$v->StationUID}}"><img src="{{URL::asset('/img/edit_icon.png')}}" style="max-width:3.5vh;" /></a></div>
                  <div class="col-1"><img onclick="bbmDelete('{{$cityCode}}','{{$v->StationID}}','{{$v->StationNameTW}}','{{$type}}')" src="{{URL::asset('/img/delect_icon.png')}}" style="max-width:4vh;" /></div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    @endif
  </div>
</div>
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/cms/cms_RouteDataList.css') }}" rel="stylesheet">
  {{-- <link href="{{ URL::asset('/css/gotop.css') }}" rel="stylesheet"> --}}
@endsection

@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  {{-- <script src="{{URL::asset('/js/gotop.js')}}"></script> --}}
  <script src="{{ URL::asset('/js/cms/cms_RouteDataList.js') }}"></script>
@endsection