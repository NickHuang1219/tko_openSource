@extends('layouts.tkoapp')

@section('content')
  <div style="padding-bottom:15vh;background:#9A0000;">
    
    <div class="container" style="padding-top:7vh;padding-bottom:2vh;">
      <div class="row">
        <div class="col-lg-8 col-md-18 mx-auto">
          <div class="site-heading" align="center" style="padding-top:2vh;">
            <font style='color:#fff;font-size:3.5vh;'>
              {{$lineName}}<br>
              @if(!$err)
                <font style='font-size:4.5vh;' align="center">即時動態</font>
              @endif
            </font><br>
            <ul style='display:inline;' align='center' id='uul'>
              <li style='display:inline; font-family:微軟正黑體;' id="current">
                <a href="javascript://" onclick="Togo();" style='text-decoration:none;'>
                  <span style='color:#FF0; font-size:18pt;'><h1  class="h1"></h1>&emsp;去&nbsp;&nbsp;程&emsp;&nbsp;&nbsp;</span>
                </a>
              </li>&nbsp;&nbsp;&nbsp;
              <li style='display:inline; font-family:微軟正黑體;'>
                <a href="javascript://" onclick="Toback();" style='text-decoration:none;'>
                  <span style='color:#FF0; font-size:18pt;'>返&nbsp;&nbsp;程&emsp;</h1></span></span>
                </a>
              </li>
            </ul>
            <div id="tabsC">
              <div id="S1" style="display:inline;">
                <!--ToGo-->
                <font style='color:#fff;' align="center">
                  {{$goName}}&nbsp;&nbsp;@if($goName!=''AND$backName!='')至@endif&nbsp;&nbsp;{{$backName}}
                </font><br><br>
                @if($togo!=null)
                  <ToGo id="togo">
                    <table style="float:center; width:100%;" style="color:#000;">
                    <tr><td style="width:25%;"><span style="color:#FFF;">狀態</span></td>
                    <td style="width:55%;"><span style="color:#FFF;">站牌名稱</span></td>
                    <td style="width:20%;" align="right"><span style="color:#FFF;">車牌</span></td></tr>
                    @foreach($togo as $v)
                      <tr><td style="width:25%;"><span style="color:#FFF;font-size:1.9vh;">{{$v['time']}}</span></td>
                      <td style="width:55%;"><span style="color:#FFF;font-size:55%*95%;">{{$v['StopName']}}</span></td>
                      <td style="width:20%;" align="right"><span style="color:#FFF;font-size:76%;">{{$v['busCarId']}}</span></td></tr>
                    @endforeach
                    </table>
                  </ToGo>
                @endif
                @if($togo==null)
                  <ToGo>
                    <div id="togo" style="color:#FFF;margin-top:5vh;font-size:3.5vh;">無去程</div>
                  </ToGo>
                @endif
              </div>
              <div id="S2" style="display:none;">
                <!--ToBack-->
                <font style='color:#fff;' align="center">
                  {{$backName}}&nbsp;&nbsp;至&nbsp;&nbsp;{{$goName}}
                </font><br><br>
                @if($toback!=null)
                  <ToBack id="toback">
                    <table style="float:center; width:100%;" style="color:#000;">
                      <tr>
                        <td style="width:25%;"><span style="color:#FFF;">狀態</span></td>
                        <td style="width:55%;"><span style="color:#FFF;">站牌名稱</span></td>
                        <td style="width:20%;" align="right"><span style="color:#FFF;">車牌</span></td>
                      </tr>
                      @foreach($toback as $v)
                        <tr>
                          <td style="width:25%;"><span style="color:#FFF;font-size:1.9vh;">{{$v['time']}}</span></td>
                          <td style="width:55%;"><span style="color:#FFF;font-size:55%*95%;">{{$v['StopName']}}</span></td>
                          <td style="width:20%;" align="right"><span style="color:#FFF;font-size:80%;">{{$v['busCarId']}}</span></td>
                        </tr>
                      @endforeach
                    </table>
                  </ToBack>
                @endif
                @if($toback==null)
                  <ToBack>
                    <div id="toback" style="color:#FFF;margin-top:5vh;font-size:3.5vh;">無返程</div>
                  </ToBack>
                @endif
              </div>
            </div> 
            @if($err!=true)
            <svg xmlns="http://www.w3.org/2000/svg" onclick="regetbustime('{{$lineId}}')" style="width:5.5vh;display:flex;position:fixed;top:50%;right:0%;padding-right:1%;color:rgb(8, 250, 41)" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
              <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
              <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
            </svg>
              {{-- <i class="bi bi-arrow-repeat" onclick="regetbustime('{{$lineId}}')" style="width:5.5vh;display:flex;position:fixed;top:40%;right:0%;padding-right:1%;"></i> --}}
              {{-- <img id='share_up' class="myMOUSE" src="{{ URL::asset('/img/remove.png') }}" style="width:5.5vh;display:flex;position:fixed;top:50%;right:0%;padding-right:1%;" onclick="regetbustime('{{$lineId}}')" /> --}}
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/gotop.css') }}" rel="stylesheet">
@endsection

@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script>
  @if($err!=true)
  <script src="{{URL::asset('/js/BusCon.js')}}"></script>
  <script>
    var timer = setTimeout(function(){
            this.regetbustime({{$lineId}});
            return '';
    }, 20000)
  </script>
  @endif
  @if($toback!=null&&$toback==null)
  @endif
@endsection