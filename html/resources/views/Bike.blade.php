@extends('layouts.tkoapp')

@section('content')
  <div style="padding-bottom:15vh;">
    <div class="dropdown" align="center" style="padding-top:7vh;padding-bottom:2vh;">
      <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{$bikeClass}}
      </button>
      @if($bikeMeun!=null)
        <div class="dropdown-menu dropdown-menu-center">
          @foreach ($bikeMeun as $v)
          <button class="dropdown-item" type="button"><a style="font-size:2.5vh;text-decoration:none;" href="{{url($v->webRoute)}}" style="font-size:2.5vh;">{{$v->linename}}</a></button>
          {{-- <button onclick="location.href='{{$v->webRoute}}'" class="dropdown-item" type="button"><a style="font-size:2.5vh;text-decoration:none;">{{$v->linename}}</a></button> --}}
          @endforeach
          {{-- @foreach ($bikeMeun as $v)
            <button onclick="location.href='{{$v['Addr']}}'" class="dropdown-item" type="button"><a style="font-size:2.5vh;text-decoration:none;">{{$v['lineName']}}</a></button>
          @endforeach --}}
        </div>
      @endif
    </div>
    @if($bike!=null)
      @foreach ($bike as $v)
        <div class="alert alert-primary container" role="alert" style="width:90%" id="BikeStop">
          <div id="stopName" style="font-size:2.8vh; overflow:hidden;">
            {{-- {{$v->StationNameTW}} --}}
            {{count(explode("YouBike2.0_",$v->StationNameTW))==2?explode("YouBike2.0_",$v->StationNameTW)[1]:$v->StationNameTW}}
            {{-- {{strpos($v['StationNameTW'], "YouBike2.0_", 0)!==false?mb_split("YouBike2.0_", $v['StationNameTW'])[1]:$v->StationNameTW}} --}}
            <?php
              // if(strpos($v['StationNameTW'], "YouBike2.0_", 0) !== false){
              //   $str = mb_split("YouBike2.0_", $v['StationNameTW']);
              //   echo $str[1];
              // }
              // else{
              //   echo $v['StationNameTW'];
              // }
            ?>
          </div>
          <div id="addText" style="font-size:2.2vh;margin-bottom:1.5%;">位置：
            <a href="https://maps.google.com/?q={{$v->PositionLat}},{{$v->PositionLon}}" target="_blank" class="fw-bold" style="text-decoration:none;">
                {{$v->StationAddressTW}}
            </a>
          </div>
          <div style="width:100%;">
            <button type="button" class="btn btn-outline-primary" onclick="BorRetBike('{{$v->StationUID}}')" style="font-size:100%;" id="btnlign">可借可還</button>
          </div>
          <div id="{{$v->StationUID}}" class="" style="font-size:2vh;margin-top:1vh;"></div>
        </div>
      @endforeach
    @else
      @if($bike==null&&$num!=0)
        <div class="alert alert-primary container" role="alert" style="width:90%">來源錯誤.</div>
      @endIf
    @endif

    @if($bike==null)
    @endif

  </div>
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/gotop.css') }}" rel="stylesheet">
@endsection

@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script>
  <script src="{{ URL::asset('/js/Bike.js') }}"></script>
@endsection