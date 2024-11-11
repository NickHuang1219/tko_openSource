@extends('layouts.app')

@section('content')
  @if($cityBBMStrD=='err')
    <div class="container" style="z-index:1;position:relative;">
      資料庫連線異常...
    </div>
    @else
    {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> --}}
    <div class="getPtx" style="margin-top:5vh;">
      <div class="loading"></div>
      <div class="container" style="z-index:1;position:relative;">
        <div class="accordion" id="accordionExample">
          {{-- <button onclick="getD()">loadingUI</button> --}}
          {{-- <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
            <h2 class="accordion-header" id="headingOne" style="border-radius:1vh;">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <span class="accordion-item-span-title">更新(取得)Ptx資料</span>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row" style="margin-bottom:1.5vh;padding:1vh;">
                  <div class="col-6">
                    <a type="button" onClick='getLineDatas("{{$cityCode}}","Bus","{{$pkey}}")' class="btn btn-primary btn-md  countiesBtnA">取得公車資料</a>
                  </div>
                  <div class="col-6">
                      <a type="button" onClick='getLineDatas("{{$cityCode}}","Mrt","{{$pkey}}")' class="btn btn-primary btn-md  countiesBtnA">取得捷運資料</a>
                  </div>
                  <div class="col-6" style="margin-top:2.5vw;">
                      <a type="button" onClick='getLineDatas("{{$cityCode}}","Lrt","{{$pkey}}")' class="btn btn-primary btn-md  countiesBtnA">取得輕軌資料</a>
                  </div>
                  <div class="col-6" style="margin-top:2.5vw;">
                      <a type="button" onClick='getLineDatas("{{$cityCode}}","Bike","{{$pkey}}")' class="btn btn-primary btn-md  countiesBtnA">取得Bike資料</a>
                  </div>
                </div>
                <hr />
                <div>
                  @if($cityBBMStrD=='0'||count($cityBBMStrD)<4)
                    <div class="text-right" style="margin-bottom:2.5vw;"><span><img src="{{URL::asset('/img/add_icon.png')}}" style="width:5vh;">Add url</span></div>
                  @endif
                  @if($cityBBMStrD!='0')
                    @foreach($cityBBMStrD as $v)
                        <div class="row" style="margin-bottom:2vw;">
                          <div class="col-8">{{$v['bbmName']}}</div>
                          <div class="col-2">
                            <img src="{{URL::asset('/img/edit_icon.png')}}" style="max-width:3.5vh;"  />
                          </div>
                          <div class="col-2">
                            <img src="{{URL::asset('/img/delect_icon.png')}}" style="max-width:3.5vh;"  />
                          </div>
                          <div class="col-12">
                            /{{$v['urlStr']}}
                          </div>
                        </div>
                    @endforeach
                  @endif
                  @if($cityBBMStrD=='0')
                  請Add url 字串再使用取得資料...
                  @endif
                </div>
              </div>
            </div>
          </div> --}}
          <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
            <h2 class="accordion-header" id="headingT" style="border-radius:1vh;">
              <button onclick="window.location.href='/cmsBusList/{{$cityCode}}';" class="accordion-button accordion-buttons collapsed" type="button">
                公車資料類別管理
              </button>
            </h2>
          </div>
          <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
            <h2 class="accordion-header" id="headingT" style="border-radius:1vh;">
              <button onclick="window.location.href='/cmsMrtList/{{$cityCode}}';" class="accordion-button accordion-buttons collapsed" type="button">
                捷運資料類別管理
              </button>
            </h2>
          </div>
          <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
            <h2 class="accordion-header" id="headingT" style="border-radius:1vh;">
              <button onclick="window.location.href='/cmsBikeList/{{$cityCode}}';" class="accordion-button accordion-buttons collapsed" type="button">
                Bike資料類別管理
              </button>
            </h2>
          </div>
          {{-- <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
              <h2 class="accordion-header" id="headingTwo" style="border-radius:1vh;">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <span class="accordion-item-span-title">公車</span>
                  </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    @foreach($bus_BBM as $busK=>$busV)
                      <div class="row align-items-center" style="padding:.6vh 0;margin:.6vh 0;">
                        <div class="col-auto">
                          {{$busV->linename}}
                        </div>
                        <div class="col-auto {{$busV->key_index}}">
                          狀態修改:
                          <img onclick="lineStatusSwitch('{{$cityCode}}','{{$busV->key_index}}',{{$busV->op}},'{{$busV->linename}}','{{$pkey}}')" src="{{URL::asset($busV->op==1?'/img/acces_icon.png':'/img/close_icon.png')}}" style="max-width:5vh;padding-left:1vh;" />
                        </div>
                        <div class="col col-auto">
                          資料修改:
                          <a href="/cmsBBMDataE/{{$cityCode}}/{{$busV->key_index}}">
                            <img src="{{URL::asset('/img/edit_icon.png')}}" style="max-width:3.5vh;"  />
                          </a>
                        </div>
                      </div>
                    @endforeach
                  </div>
              </div>
          </div>
          <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
              <h2 class="accordion-header" id="headingThree" style="border-radius:1vh;">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <span class="accordion-item-span-title">捷運</span>
                  </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    @foreach($mrt_BBM as $mrtK=>$mrtV)
                      <div class="row align-items-center" style="padding:.6vh 0;margin:.6vh 0;">
                        <div class="col-auto">
                          {{$mrtV->linename}}
                        </div>
                        <div class="col-auto {{$mrtV->key_index}}">
                          狀態修改:
                          <img onclick="lineStatusSwitch('{{$cityCode}}','{{$mrtV->key_index}}',{{$mrtV->op}},'{{$mrtV->linename}}','{{$pkey}}')" src="{{URL::asset($mrtV->op==1?'/img/acces_icon.png':'/img/close_icon.png')}}" style="max-width:5vh;padding-left:1vh;" />
                        </div>
                        <div class="col col-auto">
                          資料修改:
                          <a href="/cmsBBMDataE/{{$cityCode}}/{{$mrtV->key_index}}">
                            <img src="{{URL::asset('/img/edit_icon.png')}}" style="max-width:3.5vh;"  />
                          </a>
                        </div>
                      </div>
                    @endforeach
                  </div>
              </div>
          </div>
          <div class="accordion-item" style="border-radius:1vh;border-top-style:solid;border-width:0.25vh;border-color:#9105a2;margin-bottom:2vh;">
              <h2 class="accordion-header" id="headingFour" style="border-radius:1vh;">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <span class="accordion-item-span-title">CityBike</span>
                  </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    @foreach($bike_BBM as $bikeK=>$bikeV)
                      <div class="row align-items-center" style="padding:.6vh 0;margin:.6vh 0;">
                        <div class="col-auto">
                          {{$bikeV->linename}}
                        </div>
                        <div class="col-auto {{$bikeV->key_index}}">
                          狀態修改:
                          <img onclick="lineStatusSwitch('{{$cityCode}}','{{$bikeV->key_index}}',{{$bikeV->op}},'{{$bikeV->linename}}','{{$pkey}}')" src="{{URL::asset($bikeV->op==1?'/img/acces_icon.png':'/img/close_icon.png')}}" style="max-width:5vh;padding-left:1vh;" />
                        </div>
                        <div class="col col-auto">
                          資料修改:
                          <a href="/cmsBBMDataE/{{$cityCode}}/{{$bikeV->key_index}}">
                            <img src="{{URL::asset('/img/edit_icon.png')}}" style="max-width:3.5vh;"  />
                          </a>
                        </div>
                      </div>
                    @endforeach
                  </div>
              </div>
          </div> --}}
        </div>
      </div>
    </div>
  @endif
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/cms/cms_getPtx.css') }}" rel="stylesheet">
  {{-- <link href="{{ URL::asset('/css/gotop.css') }}" rel="stylesheet"> --}}
@endsection

@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  {{-- <script src="{{URL::asset('/js/gotop.js')}}"></script> --}}
  <script src="{{ URL::asset('/js/cms/cms_getPtx.js') }}"></script>
@endsection