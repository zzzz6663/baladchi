<!DOCTYPE html>
<html lang="fa" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>   @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- BEGIN CSS -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

   <!-- Icons -->
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/fonts/boxicons.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/fonts/fontawesome.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/fonts/flag-icons.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/css/rtl/core.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/css/rtl/theme-default.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/css/demo.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/css/rtl/rtl.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/libs/typeahead-js/typeahead.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/libs/apex-charts/apex-charts.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/css/pages/page-auth.css") }}">
   <link rel="stylesheet" href="{{ asset("/admin/assets/vendor/css/pages/app-chat.css") }}">
   <link rel="stylesheet" href="{{ asset("/common/select2.min.css") }}">
   <link rel="stylesheet" href="{{ asset("/common/load.css") }}">
   <link rel="stylesheet" href="{{ asset("/common/modal-loading.css") }}">
   <link rel="icon" type="image/x-icon" href="/icon/favicon1.png">
   {{--  <link rel="stylesheet" href="{{ asset("/common/css.css") }}">  --}}

   <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
   <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>

   <script src="/admin/assets/vendor/js/helpers.js"></script>
   <script src="/admin/assets/js/config.js"></script>
   @vite('resources/css/app.css')
</head>
<body class="fix-header active-ripple theme-blue sidebar-extra">



<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
     @includeWhen( empty($sidebar),'admin.section.sidebar')
      @yield('login')
      @if(Request::url() != route( 'admin.login'))
        <div class="layout-page ">
            @includeWhen( empty($navbar),'admin.section.navbar')
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                @yield('content')
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script src="/admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/admin/assets/vendor/libs/popper/popper.js"></script>
<script src="/admin/assets/vendor/js/bootstrap.js"></script>
<script src="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/admin/assets/vendor/libs/hammer/hammer.js"></script>
<script src="/admin/assets/vendor/libs/i18n/i18n.js"></script>
<script src="/admin/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="/admin/assets/vendor/js/menu.js"></script>
<script src="/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="/admin/assets/js/main.js"></script>
<script src="/admin/assets/js/dashboards-analytics.js"></script>
{{--  <script src="/js/persian-date.min.js"></script>  --}}
{{--  <script src="/js/persian-datepicker.min.js"></script>  --}}
  {{--  <script src="/js/fun.js"></script>  --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script> --}}


  <script src="/common/modal-loading.js"></script>
  <script src="/common/select2.js"></script>
  <script src="/common/load.js"></script>
  <script src="/common/persian_number.js"></script>
  {{--  <script src="/common/js.js"></script>  --}}
  {{--  <script src="/home/js/js.js"></script>  --}}
  @vite('resources/js/app.js')
  @include('sweetalert::alert')
@yield('script')
</body>
</html>

