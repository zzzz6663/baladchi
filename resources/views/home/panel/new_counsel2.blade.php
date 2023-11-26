@extends('main.panel')
@section('content')
    <div id="dashmain">

        <div id="register-stpes">
            <div class="dash-title">
                <h3>خرد جمعی جدید</h3>
            </div>
            <div id="register">

                <div class="stepes">
                    <ul>
                        {{-- <li class="step step1 active">
                        <span class="num">.۱</span>
                        <h4>اطلاعات کاربری</h4>
                    </li> --}}
                        <li class="step step2 ">
                            <span class="num">.1</span>
                            <h4> تعریف خرد جمعی</h4>
                        </li>
                        <li class="step step3 active">
                            <span class="num">.2</span>
                            <h4>پرداخت </h4>
                        </li>
                        <li class="step step4">
                            <span class="num">.3</span>
                            <h4> سوالات </h4>
                        </li>
                    </ul>
                </div>
                <div class="form">
                    @if ($counsel->reward == 'no_reward')
                        <p>
                            حالا وقتشه که سوال ها رو ثبت کنی
                        </p>
                        <a class="mid-button blue pointer" href="{{ route('panel.new.counsel3', $counsel->id) }}">ثبت سوالات
                        </a>
                    @else

                        @if($counsel->pay)
                        <h1>
                            پرداخت با موفقیت انجام شد 
                        </h1>
                        <p>
                            حالا وقتشه که سوال ها رو ثبت کنی
                        </p>
                        <a class="mid-button blue pointer" href="{{ route('panel.new.counsel3', $counsel->id) }}">ثبت سوالات
                        </a>
                        @else
                        <h1>
                            حالا وقتشه که پرداخت روانجام بدی
                            <br />
                            {{ number_format($counsel->price) }}
                        </h1>
                        <form class="inline-block" id="pay_d" action="{{ route('send.bill') }}" method="post"
                        data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                        @csrf
                        @method('post')
                        <input type="text" value="{{ $counsel->id }}" hidden name="counsel_id" id="counsel_id">
                        <input type="text" value="{{$counsel->price}}" hidden name="amount" id="amount">
                        <input type="text" value="pay_counsel" name="type" hidden>
                        <button form="pay_d" style="background:#" class="mid-button blue pointer">
                            پرداخت
                        </button>
                    </form>
                        @endif
                    @endif

                </div>


            </div>
        </div>
    </div>
@endsection
