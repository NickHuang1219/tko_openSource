<html>
    <head>
        <title>{{$tiText}}</title>
        <link rel="shortcut icon" href="{{URL::asset('/img/ks.ico')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- CSS only -->
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
        @yield('content_css')
        <style> img{display:none;} </style>
    </head>
    <body style="height:100%;">
      <div id="app">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand fs-3">
              <img src="{{URL::asset($tiImg)}}" style="width:{{$tiImgWid}};height:{{$tiImgHei}};display:inline;">{{$tiText}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
              <ul class="navbar-nav" style="font-size:3vh;">
                <li class="nav-item"><!-- active -->
                  <a class="nav-link fw-bolder" aria-current="page" href="{{ url('/Bus') }}">高雄公車</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bolder" href="{{ url('/Mrt') }}">高雄捷運</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bolder" href="{{ url('/Bike') }}" >高雄YouBike</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bolder" href="{{ url('/TaiwanTRA') }}" tabindex="-1">台灣鐵路</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bolder" href="{{ url('/TaiwanTHSR') }}" tabindex="-1">台灣高鐵</a>
                </li>
              </ul>
            </div>
            <div class="offcanvas offcanvas-Top" style="height:60%;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header" style="padding-top:0.8rem;padding-bottom:0;">
                <img src="{{URL::asset('/img/klog.png')}}" style="height:7.5vh;" />
                <h5 class="offcanvas-title fw-bolder" id="offcanvasExampleLabel" style="font-size:2.8vh;">大腳走高雄</h5>
                <button type="button" class="btn-close text-reset fs-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav" style="padding-top:1vw;padding-left:2.5vw;">
                  <li class="nav-item">
                    <a class="nav-link fw-bolder" style="font-size:2.8vh;padding-top:1rem;" href="{{ url('/Bus') }}">高雄公車</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fw-bolder" style="font-size:2.8vh;padding-top:1rem;" href="{{ url('/Mrt') }}">高雄捷運</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fw-bolder" style="font-size:2.8vh;padding-top:1rem;" href="{{ url('/Bike') }}" >高雄YouBike</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link fw-bolder" style="font-size:2.8vh;padding-top:1rem;" href="{{ url('/TaiwanTRA') }}" tabindex="-1">台灣鐵路</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fw-bolder" style="font-size:2.8vh;padding-top:1rem;" href="{{ url('/TaiwanTHSR') }}" tabindex="-1">台灣高鐵</a>
                  </li> --}}
                  <li class="nav-item">
                    <a class="nav-link fw-bolder" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:2.8vh;padding-top:1rem;">台灣雙鐵</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="border:none;padding-left:3vh;padding-top:0;">
                      <li><a class="nav-link fw-bolder" style="font-size:2.5vh;padding-top:0;" href="{{ url('/TaiwanTRA') }}" tabindex="-1">台灣鐵路</a></li>
                      <li><a class="nav-link fw-bolder" style="font-size:2.5vh;padding-top:0;" href="{{ url('/TaiwanTHSR') }}" tabindex="-1">高速鐵路</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav><br>
        <button type="button" id="BackTop" class="toTop-arrow"></button>

        <main class="py-4" style="margin-top:3vh;"> 
          @yield('content')
        </main>
        <footer id="fh5co-footer" class="footer fixed-bottom" role="contentinfo" style="width:100%;background:#fff;margin-top:1vh;z-index:0;">
          <div class="col-md-12 text-center">
            <small class="block" id='fdiv'>
              <font style="font-size:2.8vh;">
                <img src="{{URL::asset('/img/klog.png')}}" style="width:4.5vh;display:inline;">
                <I style="font-size:2.8vh;">旅遊台灣&ensp;首選高雄</I>
              </font><br>
              <font style="font-size:2vh;">大腳走高雄 power by Laravel 10</font><br>
            </small> 
          </div>
        </footer>
      </div>
    </body>
    
    @yield('content_js')
    <script src="{{URL::asset('/js/1.8.2_jquery_min.js')}}" defer></script>
    <script src="{{URL::asset('/js/gotop.js')}}"></script>
    <script>$(document).ready(function(){/*chrome*/$('body').css('zoom','reset');$(document).keydown(function(event){/*event.metaKey mac的command键*/if((event.ctrlKey===true||event.metaKey===true)&&(event.which===61||event.which===107||event.which===173||event.which===109||event.which===187||event.which===189)){event.preventDefault();}});/*firfox*/$(window).bind('mousewheel DOMMouseScroll',function(event){if(event.ctrlKey===true||event.metaKey){event.preventDefault();}});});</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</html>