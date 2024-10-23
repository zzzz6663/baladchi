@extends('main.panel')
@section('content')

<div id="dashmain">

    <div id="register-stpes">
        <div class="dash-title">
            <h5 class="alert alert-warning">
                {{$setting8}}
            </h5>
            <h3>
                @if($user->baladchi)
                شما به عنوان بلد چی هستید
                <a href="{{ route("panel.resume") }}" class="mid-button blue">
                    تکمیل حساب
                </a>

                @endif

                    <a href="{{route("panel.resume")}}" class="icon-button theme">
                        <span>رزومه </span>
                        <span class="icon">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.8928 5.69696H4.23878L8.00877 1.95697C8.22073 1.73943 8.33936 1.44771 8.33936 1.14398C8.33936 0.84025 8.22073 0.548478 8.00877 0.330933C7.79409 0.118902 7.50451 0 7.20277 0C6.90104 0 6.61145 0.118902 6.39677 0.330933L0.664772 6.03094C0.459743 6.24904 0.345596 6.53709 0.345596 6.83643C0.345596 7.13576 0.459743 7.42387 0.664772 7.64197L6.39677 13.342C6.61145 13.554 6.90104 13.6729 7.20277 13.6729C7.50451 13.6729 7.79409 13.554 8.00877 13.342C8.21591 13.1263 8.33502 12.8409 8.34277 12.5419C8.33983 12.2402 8.22013 11.9513 8.00877 11.736L4.23878 7.98096H13.8928C14.1894 7.97217 14.471 7.84818 14.6777 7.63525C14.8844 7.42233 15 7.13722 15 6.84045C15 6.54369 14.8844 6.25858 14.6777 6.04565C14.471 5.83273 14.1894 5.70874 13.8928 5.69995V5.69696Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
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
