<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--  <link rel="stylesheet" href="/home/css/style.css">  --}}
    {{-- <link rel="stylesheet" href="/css/iziToast.css"> --}}
    {{-- <link rel="stylesheet" href="/css/persian-datepicker.min.css"> --}}
    {{-- <link rel="stylesheet" href="/css/jquery.loadingModal.css"> --}}
    {{-- <link href="/admin/assets/css/lightbox.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="/css/select2.min.css"> --}}
    <link rel="stylesheet" href="/common/load.css">
    <link rel="stylesheet" href="/common/iziToast.css">
    <link rel="stylesheet" href="/common/leaf.css">
    <link rel="stylesheet" href="/common/persian-datepicker.css">
    <link rel="stylesheet" href="/common/nouislider.min.css">
    {{--  <link rel="stylesheet" href="/common/css.css">  --}}
    <link rel="stylesheet" href="/common/map.css">
    <link rel="stylesheet" href="/common/share.css">
    <link rel="stylesheet" href="/common/modal-loading.css">
    <link rel="icon" type="image/x-icon" href="/icon/favicon1.png">

    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{--  <script src="https://cdn.socket.io/4.4.1/socket.io.esm.min.js" type="text/javascript"></script>  --}}
    {{-- <link rel="shortcut icon" href="/home/images/logo.png"> --}}
    {{-- <link rel="apple-touch-icon" href="/home/images/logo.png"> --}}
    {{-- <link rel="stylesheet" href="/common/select2.min.css"> --}}

</head>

<body>
    @include('home.parts.header')

    <div id="main">
        <div class=" d- ">
            @yield('content')
        </div>
    </div>

    @include('home.parts.footer')
    {{--    @includeWhen((Route::currentRouteName()==''),'home.teacher.sidebar') --}}


    {{-- <script src="https://unpkg.com/axsios/dist/axios.min.js"></script> --}}

    {{-- <script src="/home/js/owl.carousel.min.js"></script> --}}
    {{-- <script src="/home/js/aos.js"></script> --}}
    {{-- <script src="/home/js/persian-date.min.js"></script>
<script src="/home/js/persian-datepicker.min.js"></script> --}}
    {{-- <script src="/home/js/glightbox.min.js"></script> --}}
    {{-- <script src="/home/js/nouislider.min.js"></script> --}}
    {{-- <script src="/home/js/wNumb.min.js"></script> --}}
    {{-- <script src="/home/js/jquery.mmenu.min.all.js"></script> --}}
    <script src="/common/tooltipster.bundle.min.js"></script>
    <script src="/common/load.js"></script>
    <script src="/home/js/nice-select2.js"></script>
    <script src="/common/sweet.js"></script>
    <script src="/common/select2.js"></script>

    {{-- <script src="/js/iziToast.js"></script> --}}
    {{-- <script src="/js/persian-date.min.js"></script> --}}
    {{-- <script src="/js/persian-datepicker.min.js"></script> --}}
    {{-- <script src="/js/jquery.loadingModal.min.js"></script> --}}
    {{-- <script src="/admin/assets/js/lightbox.min.js"></script> --}}
    {{-- <script src="/js/fun.js"></script> --}}
    {{-- <script src="/js/simpleupload.js"></script> --}}
    {{-- <script src="/js/jquery.validate.min.js"></script> --}}
    {{-- <script src="/js/select2.full.min.js"></script> --}}



    <script src="/home/js/jquery.spinner.min.js"></script>
    <script src="/home/js/lc_lightbox.lite.min.js"></script>
    <script src="/home/js/jquery.fullscreen.min.js"></script>
    <script src="/home/js/editor.js"></script>

    <script src="/common/persian_number.js"></script>
    <script src="/common/iziToast.js"></script>
    <script src="/common/leaf.js"></script>
    <script src="/home/js/template.js"></script>
    <script src="/home/js/apexcharts.min.js"></script>
    <script src="/common/persian-date.min.js"></script>
    <script src="/common/persian-datepicker.min.js"></script>
    <script src="/common/modal-loading.js"></script>
    {{--  <script src="/js/app.js"></script>  --}}

    <script src="/common/wNumb.min.js"></script>
    <script src="/common/nouislider.min.js"></script>
    <script src="/common/cookie.js"></script>
    {{--  <script src="/build/assets/app.9d7899cc.js"></script>  --}}

    {{--  <script src="/build/assets/app.9d1780cd.js"></script>  --}}
    <script src="/common/map.js"></script>
    <script src="/common/share.js"></script>
    {{--  <script src="/common/js.js"></script>  --}}
    @vite('resources/js/app.js')

    {{--  @vite( 'resources/js/app.js')  --}}

    {{-- {!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!} --}}
    <div id="m_se">
        <div>
            <span class="close close_se">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M18 6l-12 12"></path>
                    <path d="M6 6l12 12"></path>
                </svg>
            </span>
            <div id="search">

                <div class="search-form">
                    <form action="{{ route("ads") }}" method("get")>
                        @csrf
                        @method('get')
                        <input class="text filter_class search_box" type="text" name="search" value="{{ request("search") }}"
                            placeholder="جست و جو در بین آگهی ها">
                        <button class="search-button">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.58332 17.5C13.9556 17.5 17.5 13.9555 17.5 9.58329C17.5 5.21104 13.9556 1.66663 9.58332 1.66663C5.21107 1.66663 1.66666 5.21104 1.66666 9.58329C1.66666 13.9555 5.21107 17.5 9.58332 17.5Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path opacity="0.4" d="M18.3333 18.3333L16.6667 16.6666" stroke="white"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</body>
@include('sweetalert::alert')

</html>
