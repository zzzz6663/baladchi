@extends('main.manager')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box border shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-frane"></i>
                            جزئیات آگهی شماره
                            {{ $advertise->id }}
                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box">

                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-5 col-md-5">
                            <!-- About User -->
                            <!-- Profile Overview -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            {{-- <small class="text-muted text-uppercase">نمای کلی</small> --}}
                                            <ul class="list-unstyled mt-3 mb-0">
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> نام :</span>
                                                    <span>
                                                        {{ $advertise->user->name }}
                                                        {{ $advertise->user->family }} -
                                                    </span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> شهر :</span>
                                                    <span>
                                                        {{ $advertise->city->name }}
                                                        {{ $advertise->city->province->name }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <ul class="list-unstyled mt-3 mb-0">
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> عنوان :</span>
                                                    <span>
                                                        {{ $advertise->title }}
                                                    </span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> توضیحات :</span>
                                                    <span>
                                                        {{ $advertise->info }}
                                                    </span>
                                                </li>
                                                      <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> دسته بندی :</span>
                                                    <span>
                                                        {{ $advertise->category->name }} -
                                                        {{ $advertise->subset->name }}
                                                        @if($advertise->telic)
                                                      -  {{ $advertise->telic->name }}

                                                        @endif
                                                    </span>
                                                </li>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            {{-- <div id="map"></div>

                                            <script type="text/javascript">
                                                var myMap = new L.Map('map', {
                                                    key: 'web.RGcOLl7H7iw24EcC3dFhkr3QkcbvP0eA6JwqI3SD'
                                                    , maptype: 'dreamy'
                                                    , poi: true
                                                    , traffic: false
                                                    , center: [{{ $advertise->latitude }}, {{ $advertise->longitude }}]
                                                    , zoom: 6
                                                , });
                                                L.marker([35.7340453, 51.5374258]).addTo(myMap);
                                            </script> --}}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div id="map" style="height: 400px"></div>

                                            <script type="text/javascript">
                                                var myMap = new L.Map('map', {
                                                    key: 'web.RGcOLl7H7iw24EcC3dFhkr3QkcbvP0eA6JwqI3SD'
                                                    , maptype: 'dreamy'
                                                    , poi: true
                                                    , traffic: false
                                                    // , center: [35.49326765635331, 51.35407325084074]
                                                    , center: [{{ $advertise->show_option('latitude') }}, {{ $advertise->show_option('longitude') }}]
                                                     , zoom: 17
                                                , });
                                                L.marker( [{{ $advertise->show_option('latitude') }}, {{ $advertise->show_option('longitude') }}]).addTo(myMap);
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Profile Overview -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <small class="text-muted text-uppercase">اطلاعات بیشتر</small>
                                    <div class="row">
                                        @foreach ($advertise->options as $option )
                                        <div class="col-lg-3">
                                            <i class="bx bx-user"></i><span class="fw-semibold mx-2">  {{ __('questions.'.$option->name) }}:</span>
                                            <span>
                                                {{-- @dd( __('all_option')) --}}
                                                @if(array_key_exists($option->val, __('all_option')))
                                                {{ __('all_option.'.$option->val )}}
                                                    @else
                                                {{$option->val}}
                                                @endif
                                            </span>
                                        </div>
                                        @endforeach


                                    </div>

                                </div>
                            </div>
                            <!--/ About User -->

                        </div>

                    </div>

                    <div class="row">
                        @foreach ($advertise->images as $img )
                        <div class="col-lg-4">
                            <img src="{{ $img->ad_img()}}" alt="">

                        </div>

                        @endforeach
                    </div>

                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>
    </div>

    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <a href="{{ route('advertise.index') }}" class="btn btn-danger">برگشت</a>
        </ul>

    </div><!-- /.breadcrumb-left -->
    </div>
@endsection
