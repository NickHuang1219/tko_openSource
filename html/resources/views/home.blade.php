@extends('layouts.app')

@section('content')
<div class="container">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
            <h2 class="accordion-header" id="headingOne" style="border-radius:1vh;">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <span class="accordion-item-span-title">縣市交通工具</span>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body" id="counties">
                    <div class="row" style="margin-bottom:1.5vh;padding:1vh;">
                        <div class="col">
                            <a type="button" href="{{url('/cityBus/0')}}" class="btn btn-primary btn-md  countiesBtnA">公車</a>
                        </div>
                        <div class="col">
                            <a type="button" href="{{url('/cityMrt/0')}}" class="btn btn-primary btn-md  countiesBtnA">捷運</a>
                        </div>
                        <div class="col">
                            <a type="button" href="{{url('/cityBike/0')}}" class="btn btn-primary btn-md  countiesBtnA">腳踏車</a>
                        </div>
                    </div>
                    {{-- @if($counties!=null)
                        @foreach($counties as $counties_k=>$counties_v)
                            @if(($counties_k+1)%3==1)
                                <div class="row" style="margin-bottom:1.5vh;padding:1vh;"><div class="col">
                                    <a type="button" href="/countiesBBM/{{$counties_v->id}}" class="btn btn-primary btn-md  countiesBtnA">{{$counties_v->name}}</a>
                                </div>
                            @endif
                            @if(($counties_k+1)%3==2)
                                <div class="col">
                                    <a type="button" href="/countiesBBM/{{$counties_v->id}}" class="btn btn-primary btn-md  countiesBtnA">{{$counties_v->name}}</a>
                                </div>
                            @endif
                            @if(($counties_k+1)%3==0)
                                <div class="col">
                                    <a type="button" href="/countiesBBM/{{$counties_v->id}}" class="btn btn-primary btn-md  countiesBtnA">{{$counties_v->name}}</a>
                                </div></div>
                            @endif
                            @if(count($counties)==$counties_k+1)
                                @if(count($counties)%3==1)
                                    <div class="col"></div><div class="col"></div></div>
                                @endif
                                @if(count($counties)%3==2)
                                    <div class="col"></div></div>
                                @endif
                                @if(count($counties)%3==0)
                                @endif
                            @endif
                        @endforeach --}}
                    {{-- <div class="alert alert-light" align="left" id="" onclick="location.href='/public/cmsBusH/'" style="border-color:#9105a2;border-width:.23vh;border-style:solid;border-radius:.6vh;">
                        <font style="font-family:微軟正黑體;font-size:3.15vh;">公車</font>
                    </div> --}}
                    {{-- @else
                    <span style="color:#f00;">功能開發中...</span>
                    @endif --}}
                </div>
            </div>
        </div>
        <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
            <h2 class="accordion-header" id="headingTwo" style="border-radius:1vh;">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span class="accordion-item-span-title">跨縣市交通工具</span>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <span style="color:#f00;">功能開發中...</span>
                </div>
            </div>
        </div>
        <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
            <h2 class="accordion-header" id="headingThree" style="border-radius:1vh;">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <span class="accordion-item-span-title">其他</span>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <span style="color:#f00;">功能開發中...</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content_css')
    <link rel="stylesheet" href="{{URL::asset('/css/cms/cms_home.css')}}" />
@endsection

@section('content_js')
    <script src="{{URL::asset('/js/cms/cms_home.js')}}"></script>
@endsection
