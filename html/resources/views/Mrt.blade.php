@extends('layouts.tkoapp')

@section('content')
  <div style="padding-bottom:15vh;" align="center">
    <div class="btn-group " style="padding-top:7vh;padding-bottom:2vh;">
      <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{$mrtClass}}
      </button>
      @if($mrtMeun!=null)
      <div class="dropdown-menu dropdown-menu-center">
        @foreach ($mrtMeun as $v)
        <button class="dropdown-item" type="button"><a style="font-size:2.5vh;text-decoration:none;" href="{{url($v->webRoute)}}" style="font-size:2.5vh;">{{$v->linename}}</a></button>
        @endforeach
      </div>
      @endif
    </div>
    @if($mrt!=null)
      @foreach ($mrt as $v)
        <div class="container">
          <div class='alert alert-danger' align='left' id='' style="background-color:{{$dColor}};border-color:#0000;">
            <button class='btn btn-danger' typt='submit' onclick=ajaxMrtTime("{{$v->StationID}}") style='font-family:微軟正黑體;font-size:120%;color:{{$dColor}};border-color:{{$borColor}};background-color:{{$bColor}};'>{{$v->StationNameTw}}</button>
            <br>
            <div id="{{$v->StationID}}" class="" style="font-size:2vh;margin-top:1vh;"></div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/gotop.css') }}" rel="stylesheet">
@endsection

@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script>
  <script src="{{URL::asset('/js/mrt.js')}}"></script>
@endsection