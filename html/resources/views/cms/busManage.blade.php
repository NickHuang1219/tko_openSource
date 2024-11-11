@extends('layouts.app')

@section('content')
<div class="container">
  {{-- <div class="pageTitleStyle row justify-content-center alert alert-dark"><div class="col-md-12 text-center" style="font-size:2vh;">{{$pageTitle}}</div></div> --}}
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed text-center justify-content-center" style="font-size:2vh;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="collapseOne">
          路線管理
        </button>
      </h2>
      <div id="panelsStayOpen-collapseOne" class="panelsStayOpen-collapseOne collapse {{$lineShow}}" aria-labelledby="panelsStayOpen-headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          @if($dataList==null)
            <div style="color:#f00;">未開啟縣市公車.</div>
          @endif
          @if($dataList!=null)
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{$seleTitle==null?'請選擇縣市':$seleTitle}}
              </button>
              <ul class="dropdown-menu">
              @foreach($dataList as $k=>$v)
                  <li><a class="dropdown-item" href="{{url('cityBusSele/'.$v->id.'/lineShow')}}" {{$cityCode==$v->id?'active':''}}>{{$v->name}}</a></li>
              @endforeach
              </ul>
            </div>
          @endif
          @if($BusD==null)
            <div style="color:#f00;">無路線資料.</div>
          @endif
          @if($BusD!=null)
            {{-- <div class="card" style="margin-top:2vh;"> --}}
              {{-- <div class="card-body"><div class="row" style="font-size:2vh;"><div class="col-7">路線名稱</div><div class="col-3">狀態</div><div class="col-2">修改狀態</div></div></div> --}}
              <div class="container">
              @foreach ($BusD as $v)
                {{-- <div class="card-body" style="background:rgb(186 186 186 / 21%);margin-bottom:1vh;"> --}}
                  <div class="row align-items-center" style="background:rgb(186 186 186 / 21%);margin-bottom:1vh;margin-top:2vh;padding:1.5vh;">
                    <div class="col-7 align-items-center" style="font-size:2.3vh;">
                      {{$v->nameZh}}
                    </div>
                    <div class="col-3 align-items-center" style="display:flex;">
                      @if($v->BusLineEnable==1)
                        <svg xmlns="http://www.w3.org/2000/svg" style="color:rgb(0, 226, 0);width:2.2vh;" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path title="111" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <span style="color:rgb(0, 226, 0);font-size:2vh;">可用</span>
                      @endif
                      @if($v->BusLineEnable==0)
                        <svg xmlns="http://www.w3.org/2000/svg" style="color:rgb(255, 0, 0);width:2.2vh;" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                        </svg>
                        <span style="color:rgb(255, 0, 0);font-size:2vh;">停用</span>
                      @endif
                    </div>
                    <div class="col-2 align-items-center" style="display:flex;">
                      <svg xmlns="http://www.w3.org/2000/svg" style="color:rgb(255 128 0);width:2.2vh;" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                        <title>修改狀態</title>
                      </svg>
                    </div>
                  </div>
                {{-- </div> --}}
              @endforeach
              </div>
            {{-- </div> --}}
          @endif
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed text-center justify-content-center" style="font-size:2vh;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          類別管理
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse {{$classShow}}" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          @if($dataList==null)
            <div style="color:#f00;">未開啟縣市公車.</div>
          @endif
          @if($dataList!=null)
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{$seleTitle==null?'請選擇縣市':$seleTitle}}
              </button>
              <ul class="dropdown-menu">
              @foreach($dataList as $k=>$v)
                  <li><a class="dropdown-item" href="{{url('cityBusSele/'.$v->id.'/classShow')}}" {{$cityCode==$v->id?'active':''}}>{{$v->name}}</a></li>
              @endforeach
              </ul>
            </div>
          @endif
          @if($BusD==null)
            <div style="color:#f00;">無路線資料.</div>
          @endif
          @if($bbm_class!=null)
            <div class="container">
              @foreach ($bbm_class as $v)
                <div class="row align-items-center" style="background:rgb(186 186 186 / 21%);margin-bottom:1vh;margin-top:2vh;padding:1.5vh;">
                  <div class="col-7 align-items-center" style="font-size:2.3vh;">
                    {{$v->linename}}
                  </div>
                  <div class="col-3 align-items-center" style="display:flex;">
                    @if($v->op==1)
                      <svg xmlns="http://www.w3.org/2000/svg" style="color:rgb(0, 226, 0);width:2.2vh;" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path title="111" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </svg>
                      <span style="color:rgb(0, 226, 0);font-size:2vh;">可用</span>
                    @endif
                    @if($v->op==0)
                      <svg xmlns="http://www.w3.org/2000/svg" style="color:rgb(255, 0, 0);width:2.2vh;" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                      </svg>
                      <span style="color:rgb(255, 0, 0);font-size:2vh;">停用</span>
                    @endif
                  </div>
                  <div class="col-2 align-items-center" style="display:flex;">
                    <svg xmlns="http://www.w3.org/2000/svg" style="color:rgb(255 128 0);width:2.2vh;" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                      <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                      <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                      <title>修改狀態</title>
                    </svg>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed text-center justify-content-center" style="font-size:2vh;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          取得路線
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          {{--  --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<script>
  function sele(id){
    jQuery.ajax({
      method: "GET",
      charset:"utf-8",
      cache:"true",
      dataType: "json",
      async:true,
      url: "/cityBusSele/"+id,
      success: function(Data){
        console.log(Data)
      },
      error: function(xhr, ajaxOptions, thrownError){}
    });
  }
</script>

@section('content_css')
  <link href="{{ URL::asset('/css/cms/cms_busList.css') }}" rel="stylesheet">
@endsection

@section('content_js')
  <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script>
  <script src="{{ URL::asset('/js/cms/cms_busList.js') }}"></script>
@endsection