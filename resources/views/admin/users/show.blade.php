
@extends('main.manager')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet   ">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-frane"></i>
                          پروفای کاربر
                            {{ $user->id }}
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
                                                        {{ $user->name }}
                                                        {{ $user->family }} -


                                                    </span>

                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> شهر :</span>
                                                    <span>
                                                        @if($user->city)
                                                        {{ $user->city->name }}
                                                        {{ $user->city->province->name }}
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
                                            <ul class="list-unstyled mt-3 mb-0">
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> تاریخ عضویت :</span>
                                                    <span>
                                                        {{  Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y-m-d') }}
                                                    </span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> آگهی ها  :</span>
                                                    <span>
                                                        {{ $user->advertises()->count() }}
                                                        <a href="{{ route('advertise.index',['user_id'=>$user->id])}}" class="btn btn-success">آگهی ها </a>
                                                    </span>
                                                </li>
                                                <li class="d-flex align-items-center mb-3">
                                                    <span class="fw-semibold mx-2"> پرداخت  ها  :</span>
                                                    <span>
                                                        {{-- {{ $user->advertise()->count() }} --}}
                                                        {{-- <a href="{{ route('advertise.index',['user_id',$user->id]) }}}}" class="btn btn-success">آگهی ها </a> --}}
                                                    </span>
                                                </li>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <p>
                                           دسته بندی  هایی که به عنوان بلدچی ثبت شده:

                                            </p>
                                            <h2>

                                            @if($user->baladchi)

                                            @foreach ($user->telics as $telic )
                                                {{$telic->name}}
                                            @endforeach
                        ---------
                                            @foreach ($user->subsets as $subset )
                                            {{$subset->name}}
                                            @endforeach
                                        </h2>

                                            <br>
                                            تاریخ عضویت بلدچی :
                                            {{Morilog\Jalali\Jalalian::forge( $user->baladchi)->format('d-m-Y')}}
                                            @endif


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
            <a href="{{ route('user.index') }}" class="btn btn-danger">برگشت</a>
        </ul>

    </div><!-- /.breadcrumb-left -->
    </div>
@endsection
