@extends('layouts.app')

@section('content')
<div class="container">
  {{-- <div class="accordion" id="accordionExample">
    <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
        <h2 class="accordion-header" id="headingOne" style="border-radius:1vh;">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <span class="accordion-item-span-title">縣市交通工具</span>
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body" id="counties">
            </div>
        </div>
    </div>
  </div> --}}
  <div class="accordion" id="accordionExample">
    <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
      <h2 class="accordion-header" id="headingOne" style="border-radius:1vh;">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          {{$cityData[0]->name}} 大眾交通工具
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <div class="row" style="margin-bottom:1.5vh;padding:1vh;">
            <div class="col-4">
              <Button type="button" {{$cityData[0]->BUSop==1?'':'disabled'}} onclick="location.href='/cmsBusList/{{$cityCode}}'" class="btn btn-{{$cityData[0]->BUSop==1?'primary':'secondary'}} btn-md  countiesBtnA">公車系統</Button>
            </div>
            <div class="col-4">
                <Button type="button" {{$cityData[0]->MRTop==1?'':'disabled'}} onclick="location.href='/cmsMrtList/{{$cityCode}}'" class="btn btn-{{$cityData[0]->MRTop==1?'primary':'secondary'}} btn-md  countiesBtnA">捷運系統</Button>
            </div>
            <div class="col-4">
                <Button type="button" {{$cityData[0]->BIKEop==1?'':'disabled'}} onclick="location.href='/cmsBikeList/{{$cityCode}}'" class="btn btn-{{$cityData[0]->BIKEop==1?'primary':'secondary'}} btn-md  countiesBtnA">腳踏車</Button>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{--  --}}
  </div>
</div>
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/cms/cms_home.css') }}" rel="stylesheet">
@endsection

@section('content_js')
  {{-- <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script>
  <script src="{{ URL::asset('/js/Bike.js') }}"></script> --}}
@endsection