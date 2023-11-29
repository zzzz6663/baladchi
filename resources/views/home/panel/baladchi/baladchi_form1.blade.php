@extends('main.panel')
@section('content')

<div id="dashmsain">

    <div id="register-stpes">
        <div class="dash-title">
            <h3>ثبت نام به عنوان بلدچی</h3>
        </div>
        <div id="register">
            <div class="stepes">
                <ul>
                    {{-- <li class="step step1 active">
                        <span class="num">.۱</span>
                        <h4>اطلاعات کاربری</h4>
                    </li> --}}
                    <li class="step step2 active">
                        <span class="num">.1</span>
                        <h4>تایید قوانین</h4>
                    </li>
                    <li class="step step3">
                        <span class="num">.2</span>
                        <h4>احراز هویت</h4>
                    </li>
                    <li class="step step4">
                        <span class="num">.3</span>
                        <h4>انتخاب دسته بندی</h4>
                    </li>
                </ul>
            </div>
                <div class="dash-title">
                    <h3>ثبت نام به عنوان بلدچی</h3>
                </div>
            <div class="form">
                <div class="txt">
                    <h4>ماده ۱ - تعاریف و اصطلاحات</h4>
                    <ol>
                    </ol>
                </div>
                <div class="footer-section">
                    <div class="pair-button">
                        <a href="route('panel.dashboard')" class="mid-button">
                            انصراف
                        </a>
                        <form action=" {{ route('baladchi.form1') }}" method="post">
                            @csrf
                            @method('post')
                            <input class="mid-button blue" type="submit" value="می پذیرم">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
