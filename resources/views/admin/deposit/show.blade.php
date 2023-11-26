
@extends('main.manager')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet   ">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-frane"></i>
                          جزئیات
                          خردجمعی
                        {{ $counsel->title }}

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
                                                    <span class="fw-semibold mx-2"> سازنده :</span>
                                                    <span>
                                                        {{ $counsel->user->name }}
                                                        {{ $counsel->user->family }} -


                                                    </span>

                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> نوع :</span>
                                                    <span>
                                                        {{ __('arr.'. $counsel->reward) }}

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
                                                    <span class="fw-semibold mx-2"> تعداد شرکت کننده  :</span>
                                                    <span>
                                                        {{ $counsel->answers_count() }}

                                                    </span>

                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> بهترین جواب دهنده      :</span>
                                                    <span>
                                                        @if($counsel->select_id)
                                                            @php
                                                                $inv= User::find($counsel->select_id)
                                                            @endphp
                                                            {{ $inv->name }}
                                                            {{ $inv->family }}
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
                                        

                                        </h2>



                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>
    </div>

    <div class="breadcrumb-box border shadow">
        <ul class="breadcrumb">
            <a href="{{ route('counsel.index') }}" class="btn btn-danger">برگشت</a>
        </ul>

    </div><!-- /.breadcrumb-left -->
    </div>
@endsection
