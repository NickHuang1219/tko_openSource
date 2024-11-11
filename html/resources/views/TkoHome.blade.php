@extends('layouts.tkoapp')

@section('content')
  <div style="padding-bottom:15vh;">
    <div class="fs-3" style="margin-top:30vh;text-align:center;">
      全民防疫，台灣加油！<br>
      校正病毒，回歸日常！
    </div>
    <div class="fs-1" style="margin-top:15vh;text-align:center;">
      Welcome to Kaohsiung.
    </div>
  </div>
@endsection


@section('content_css')
@endsection
@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
@endsection