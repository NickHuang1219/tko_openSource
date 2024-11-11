@extends('layouts.app')

@section('content')
<div class="container">
  <div class="pageTitleStyle">{{$pageTitle}}</div>
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          資料存取開關
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" 
            {{$checkBoxV==1?'checked':'unchecked'}} onchange="busSwitch()" value="{{$checkBoxV}}" name="checkbox" />
            <label class="form-check-label" id="labelText" for="flexSwitchCheckChecked">{{$checkBoxV==1?'資料取得已開啟.':'資料取得已關閉.'}}</label>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          資料列表
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <!--  -->
          {{-- {{$dataList}} --}}
          @if($dataList=='err')
            <div>{{$dataList}}</div>
          @endif
          @if($dataList!='err')
            @foreach($dataList as $k=>$v)
              @if($type=='Bus')
                <div>{{$v->nameZh}}</div>
              @endif
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('content_css')
  <link href="{{ URL::asset('/css/cms/cms_busList.css') }}" rel="stylesheet">
@endsection

@section('content_js')
  {{-- <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}"></script>
  <script src="{{URL::asset('/js/gotop.js')}}"></script> --}}
  <script src="{{ URL::asset('/js/cms/cms_busList.js') }}"></script>
@endsection