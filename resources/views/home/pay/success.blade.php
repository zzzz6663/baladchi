@extends('main.site')
@section('content')
    <div id="main">
        <div class="container">

            <div id="pay-result">
                <div class="row">
                    <div class="col-lg-6">


                        <div class="cont">
                            <div class="vline">
                                <div class="line"></div>
                            </div>
                            <h3>پرداخت شما موفق بود</h3>
                            <h4>جزئیات</h4>
                            <ul>
                                <li>
                                    <span class="tit">مبلغ پرداخت</span>
                                    <span class="val">
                                        {{ number_format($bill->amount) }}
                                        تومان</span>
                                </li>
                                <li>
                                    <span class="tit">سریال پرداخت</span>
                                    <span class="val">{{ $bill->id }}</span>
                                </li>
                                <li>
                                    <span class="tit">وضعیت </span>
                                    <span class="val">

                                        {{ __('arr.' . $bill->status) }}
                                    </span>
                                </li>
                            </ul>
                            @switch($bill->type)
                                @case('counsel')
                                    @php($route = route('panel.new.counsel2', $bill->counsel->id))
                                @break

                                @case('promotion')
                                    @php($route = route('ad.logs',$bill->advertise->id))
                                @break

                                @default
                                    @php($route = route('panel.wallet'))
                            @endswitch





                            <a href="{{ $route }}" class="icon-button green full">
                                <span> بازگشت به پنل</span>
                            </a>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img">

                            <img src="{{ asset('/home/images/success.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
