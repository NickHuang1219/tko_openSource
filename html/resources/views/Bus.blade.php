@extends('layouts.tkoapp')

@section('content')
  <div style="padding-bottom:15vh;">
    <div class="dropdown" align="center" style="padding-top:7vh;padding-bottom:2vh;">
      <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{$busClass}}
      </button>
      @if($busMeun!=null)
        <div class="dropdown-menu dropdown-menu-center">
          @foreach ($busMeun as $v)
            <button onclick="location.href='{{url($v['Addr'])}}'" class="dropdown-item" type="button"><a style="font-size:2.5vh;text-decoration:none;">{{$v['lineName']}}</a></button>
          @endforeach
        </div>
      @endif
    </div>
    @if($bus!=null)
      @foreach ($bus as $v)
        <div class="container">
          <div class='alert alert-light' align='left' id='' onclick="location.href='{{url('/BusCon/'.$v->ID)}}'" style="border-color:#9105a2;border-width:.23vh;border-style:solid;border-radius:.6vh;height:12vh;display:inline-table;width:100%;">
            <font style='font-family:微軟正黑體;font-size:3.15vh;overflow:hidden;text-overflow:ellipsis;display:-webkit-inline-box;-webkit-box-orient:vertical;-webkit-line-clamp:1;'>{{ $v->nameZh }}</font>
            <div>
              <font style='font-family:微軟正黑體; font-size:1.95vh;'>{{$v->ddesc}}</font>
            </div>
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
@endsection