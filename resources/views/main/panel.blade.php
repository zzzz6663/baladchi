<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{csrf_token()}}">
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
    <link rel="stylesheet" href="/common/google.css">
    <link rel="stylesheet" href="/common/leaf.css">
        <link rel="stylesheet" href="/common/modal-loading.css">
        <link rel="icon" type="image/x-icon" href="/icon/favicon1.png">
    {{--  <link rel="stylesheet" href="/common/css.css">  --}}
    @vite('resources/css/app.css')

    {{-- <link rel="shortcut icon" href="/home/images/logo.png"> --}}
    {{-- <link rel="apple-touch-icon" href="/home/images/logo.png"> --}}
    {{-- <link rel="stylesheet" href="/common/select2.min.css"> --}}

</head>

<body>
<div id="dashboard">
    @include('home.panel.parts.sidebar')

    <div id="dashborad-content">
    @include('home.panel.parts.header')
        <div id="dashmain" class="full">
            @yield('content')
        </div>
    @include('home.panel.parts.mobile_footer')
    </div>

</div>


{{--    @includeWhen((Route::currentRouteName()==''),'home.teacher.sidebar')--}}


{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
<script src="/home/js/jquery-2.2.0.min.js"></script>
{{-- <script src="/home/js/owl.carousel.min.js"></script> --}}
{{-- <script src="/home/js/aos.js"></script> --}}
{{-- <script src="/home/js/persian-date.min.js"></script>
<script src="/home/js/persian-datepicker.min.js"></script> --}}
{{-- <script src="/home/js/glightbox.min.js"></script> --}}
{{-- <script src="/home/js/nouislider.min.js"></script> --}}
{{-- <script src="/home/js/wNumb.min.js"></script> --}}
{{-- <script src="/home/js/jquery.mmenu.min.all.js"></script> --}}
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




<script src="/common/persian_number.js"></script>
<script src="/common/iziToast.js"></script>
<script src="/common/leaf.js"></script>
<script src="/home/js/template.js"></script>
<script src="/common/modal-loading.js"></script>
{{--  <script src="/js/app.js"></script>  --}}
<script src="/common/cookie.js"></script>
{{--  <script src="/build/assets/app.865cf6b5.js"></script>  --}}
{{--  <script src="/build/assets/app.9d7899cc.js"></script>  --}}
{{--  @vite( 'resources/js/app.js')  --}}
{{--  <script src="/common/js.js"></script>  --}}
@vite( 'resources/js/app.js')
@yield('script')
{{-- {!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!} --}}
</body>
@include('sweetalert::alert')
</html>
