@extends('main.panel')
@section('content')
    <div id="dashmdain">

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
                        <li class="step step3 active">
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
                        @include('main.error')
                        <form action="{{route('baladchi.form2')}}" method="post">
                        @csrf
                        @method('post')

                            <div class="input-label big">
                                <label for="">کد ملی</label>
                                <input type="tell" value="{{old('melli_code',$user->melli_code)}}" name="melli_code" placeholder="کد ملی با شماره موبایل مطابقت داشته باشد">
                            </div>
                            <div class="input-label big  active">
                                <label for="">شماره شبا</label>
                                <input type="tell"  value="{{old('shaba',$user->shaba)}}"  name="shaba" placeholder="شماره شبا با کد ملی مطابقت داشته باشد" value="">

                            </div>
                            <div class="footer-section">
                                <div class="pair-button">
                                    <a href="{{ route('baladchi.form1') }}" class="mid-button">
                                        برگشت
                                    </a>
                                    <form action=" {{ route('baladchi.form2') }}" method="post">
                                        @csrf
                                        @method('post')
                                        <input class="mid-button blue" type="submit" value="ذخیره ">
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>


            </div>
        </div>
    </div>
@endsection
