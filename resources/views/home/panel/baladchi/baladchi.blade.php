@extends('main.panel')
@section('content')

<div id="dashmain">

    <div id="register-stpes">
        <div class="dash-title">
            <h3>
                @if($user->baladchi)
                شما به عنوان بلد چی هستید
                <a href="{{ route("panel.resume") }}" class="mid-button blue">
                    تکمیل حساب
                </a>
                @endif
            </h3>

            <div class="footer-section">

                <div class="pair-button">

                    <a href="{{ route('baladchi.form1') }}" class="mid-button blue">
                        ویرایش
                    </a>
                    @if($user->baladchi)

                    @foreach ($user->telics as $telic )
                        {{$telic->name}}
                    @endforeach
---------
                    @foreach ($user->subsets as $subset )
                    {{$subset->name}}
                    @endforeach
                    <br>
                    تاریخ :
                    {{Morilog\Jalali\Jalalian::forge( $user->baladchi)->format('d-m-Y')}}
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
