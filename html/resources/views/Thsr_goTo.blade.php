@extends('layouts.tkoapp')

@section('content')
  <script> let stationD = @json($stationD); </script>
  @if($type=='i')
  <div class="row justify-content-center align-middle" style="margin-top:15vh;">
      <div class="col-5">
          <a href="TaiwanTHSR\goTo" style="text-decoration:none;">
              <div class="alert alert-primary listDiv">起訖時刻表</div>
          </a>
      </div>
      <div class="col-5">
          <a href="TaiwanTHSR\sToday" style="text-decoration:none;">
              <div class="alert alert-primary listDiv">站台時刻表</div>
          </a>
      </div>
    </div>
    @else
      {{--  --}}
  @endif
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/gotop.css') }}" rel="stylesheet">
  {{-- <link href="resources/css/thsr.css'" rel="stylesheet"> --}}
  <link href="{{ URL::asset('/css/thsr.css') }}" rel="stylesheet">
@endsection

@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script>
  <script src="{{ URL::asset('/js/thsrJs.js') }}"></script>
@endsection