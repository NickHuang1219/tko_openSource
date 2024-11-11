@extends('layouts.tkoapp')

@section('content')
  <script> let stationD = @json($stationD); </script>
  <div class="container">
    @if($type=='i')
    <div class="row justify-content-center align-middle" style="margin-top:15vh;">
        <div class="col-5">
            <a href="TaiwanTHSR/goTo" style="text-decoration:none;">
                <div class="alert alert-primary listDiv">起訖時刻表</div>
            </a>
        </div>
        <div class="col-5">
            <a href="TaiwanTHSR/sToday" style="text-decoration:none;">
                <div class="alert alert-primary listDiv">站台時刻表</div>
            </a>
        </div>
      </div>
      @else
        {{-- <div class="thsr"> --}}
          <div class="myUI"></div>
          @if($type=='sToday')
            <div class="row align-self-center" style="margin:0.5vh 0;">
              <div class="col-12 justify-content-right align-self-center" style="font-size:3.2vh;margin-bottom:1.5vh;text-align:center;">站台時刻表</div>  
            </div>
            @if($stationD!=null)
            <div style="text-align:center;">
              {{-- <div class="row align-self-center" style="text-align:center;"> --}}
                {{-- <div class="col-5 align-self-center" style="text-align:center;"> --}}
                  <select class="btn btn-outline-primary" id="stationID" style="text-align:left;">
                    <option selected style="background:#FFD1A4;color:#000;" value="">請 選 車 站</option>
                    @foreach ($stationD as $v)
                      <option value="{{$v['StationID']}}" style="background:#FFD1A4;color:#000;">{{$v['name']}}</option>
                    @endforeach
                  </select>
                {{-- </div>
                <div class="col-5 justify-content-left"> --}}
                  <button class="btn" style="background:#FFC78E;margin-left:2vh;" onclick="queD()">查詢</button>
                {{-- </div> --}}
              {{-- </div> --}}
            </div>
            @else
               <div class="row justify-content-center alert alert-danger" style="width:92%;margin-left:4%;"><div class="col-12">伺服器異常</div></div>
            @endif
          @endif
          @if($type=='goTo')
            <div class="row align-self-center" style="text-align:center;">
              <div class="col-12 justify-content-right align-self-end" style="font-size:3.2vh;margin-bottom:1.5vh;">起訖時刻表</div>
            </div>
            @if($stationD!=null)
              <div class="row align-self-center" style="margin-bottom:2vh;">
                <div class="col-12 align-self-center" style="text-align:center;font-size:2.3vh;">
                  起點站：
                  <select class="btn btn-outline-primary" id="start" style="text-align:left;">
                    <option selected style="background:#FFD1A4;color:#000;" value=''>請 選 車 站</option>
                    @foreach ($stationD as $v)
                      <option value="{{$v['StationID']}}" style="background:#FFD1A4;color:#000;">{{$v['name']}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
                <div class="row align-self-center" style="margin-bottom:2vh;">
                <div class="col-12 align-self-end" style="text-align:center;font-size:2.3vh;">
                  終點站：
                  <select class="btn btn-outline-primary" id="final" style="text-align:left;">
                    <option selected style="background:#FFD1A4;color:#000;" value=''>請 選 車 站</option> 
                    @foreach ($stationD as $v)
                      <option value="{{$v['StationID']}}" style="background:#FFD1A4;color:#000;">{{$v['name']}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
                {{-- </div>
                <div class="col-3 justify-content-left align-self-end"> --}}
                <div class="row align-self-center">
                  <div class="col-12 align-self-end" style="text-align:center;font-size:2.3vh;">
                  <button class="btn" onclick="queD()" style="background:#FFC78E;">查詢</button>
                </div>
              </div>
            @else
              <div class="row justify-content-md-center alert alert-danger" style="width:92%;margin-left:4%;"><div class="col-12">伺服器異常</div></div>
            @endif
          @endif
        <div id="TRABtn"></div>
        <div id="Mline" class="container" align='center' style="margin-top:.5vh;margin-bottom:15vh;{{-- background:#FFE4CA;height:58%; --}}">
          <div class="row justify-content-md-center" style="padding-top:1.5vh;"></div>
        </div>
        <div id="QueLineD" align='center' style="display:none;margin-top:2vh;background:#FFAF60;"></div>
      {{-- </div> --}}
    @endif
  </div>
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/gotop.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('/css/thsr.css') }}" rel="stylesheet">
  @if($type=='sToday' || $type=='goTo')
    <link href="{{ URL::asset('/css/loadingUI_css.css') }}" rel="stylesheet">
  @endif
@endsection

@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script>
  @if($type=='sToday' || $type=='goTo')
    <script src="{{ URL::asset('/js/loadingUI.js') }}"></script>
    <script src="{{ URL::asset('/js/Apublic.js') }}"></script>
    <script src="{{ URL::asset('/js/gobackUI.js') }}"></script>
  @endif
  @if($type=='sToday')
    <script src="{{ URL::asset('/js/thsrTodayJs.js') }}"></script>
  @endif
  @if($type=='goTo')
    <script src="{{ URL::asset('/js/thsr_goToJs.js') }}"></script>
  @endif
@endsection