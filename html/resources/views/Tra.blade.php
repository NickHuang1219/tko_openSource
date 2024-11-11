@extends('layouts.tkoapp')

@section('content')
  <div style="padding-bottom:15vh;" id='traBody'>
    <!-- <div align='center' style="margin-top:10vh;"> -->
      <div class="container">
        <div class="row justify-content-md-center" style="margin-top:10vh;">
          <div class="col col-lg-2" style="text-align:center;">
            @if($Counties!=null)
              <select onchange="location=this.value;" class="btn btn-outline-primary" style="text-align:left;">
                @if($CountiesID=='')
                  <option selected>請 選 縣 市</option>
                  @else
                  <option>請 選 縣 市</option>
                @endif
                @foreach ($Counties as $v)
                  <option value="{{url($v['addr'])}}" {{$v['sele']}}>{{$v['name']}}</option>
                @endforeach
              </select>
            @endif
          </div>
          <!-- <div class="col-6" id='Trastationd' align="left"></div> -->
          <div class="col col-lg-2" style="text-align:center;">
            @if($Trastationd!=null)
            <select onchange="createBtn(this.value)" class="btn btn-outline-primary" style="text-align:left;">
              <option value="z" selected>請 選 站 別</option>
              @foreach ($Trastationd as $v)
                <option value="&apos;{{$v->StationID}}&apos;">{{$v->StationNameTW}}</option>
              @endforeach
            </select>
            @endif
          </div>
      </div>
      <div id="TRABtn"></div>
      <div id="Mline" align='center' style="margin-top:.5vh;background:#c8e7ff;"></div>
      <div id="QueLineD" align='center' style="display:none;margin-top:2vh;background:#c8e7ff;"></div>
      <div id="Err"></div>
    <!-- </div> -->
  </div>
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/gotop.css') }}" rel="stylesheet">
@endsection

@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script>
  <script src="{{ URL::asset('/js/traJs.js') }}"></script>
@endsection