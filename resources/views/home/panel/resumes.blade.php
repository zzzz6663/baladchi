@extends('main.panel')
@section('content')
    <div id="dashmsain">
        <div class="dash-title">
            <h3>اطلاعات حساب کاربری</h3>
        </div>

        <div id="dash-profile-edit">
            <div class="profile-header-edit">
                <form id="cover_form" action="{{ route('change.head') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="profile-header">
                        <div class="head"><img src="{{ $user->cover ? $user->cover() : '/home/images/balad.jpg' }}"
                                alt=""></div>
                        <div class="header-upload">
                            <input type="file" id="header-upload" name="cover" accept="image/*">
                            <label for="header-upload">
                                <span class="icon">
                                    <svg width="26" height="24" viewBox="0 0 26 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.25 0.75H16.75L19.25 3.25H24.25C24.5815 3.25 24.8995 3.3817 25.1339 3.61612C25.3683 3.85054 25.5 4.16848 25.5 4.5V22C25.5 22.3315 25.3683 22.6495 25.1339 22.8839C24.8995 23.1183 24.5815 23.25 24.25 23.25H1.75C1.41848 23.25 1.10054 23.1183 0.866116 22.8839C0.631696 22.6495 0.5 22.3315 0.5 22V4.5C0.5 4.16848 0.631696 3.85054 0.866116 3.61612C1.10054 3.3817 1.41848 3.25 1.75 3.25H6.75L9.25 0.75ZM13 20.75C14.9891 20.75 16.8968 19.9598 18.3033 18.5533C19.7098 17.1468 20.5 15.2391 20.5 13.25C20.5 11.2609 19.7098 9.35322 18.3033 7.9467C16.8968 6.54018 14.9891 5.75 13 5.75C11.0109 5.75 9.10322 6.54018 7.6967 7.9467C6.29018 9.35322 5.5 11.2609 5.5 13.25C5.5 15.2391 6.29018 17.1468 7.6967 18.5533C9.10322 19.9598 11.0109 20.75 13 20.75ZM13 18.25C11.6739 18.25 10.4021 17.7232 9.46447 16.7855C8.52678 15.8479 8 14.5761 8 13.25C8 11.9239 8.52678 10.6521 9.46447 9.71447C10.4021 8.77678 11.6739 8.25 13 8.25C14.3261 8.25 15.5979 8.77678 16.5355 9.71447C17.4732 10.6521 18 11.9239 18 13.25C18 14.5761 17.4732 15.8479 16.5355 16.7855C15.5979 17.7232 14.3261 18.25 13 18.25Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <span>
                                    آپلود تصویر کاور
                                </span>
                            </label>
                        </div>
                    </div>
                    {{--  <div class="profile-avatar">
                    <div class="upload-ad-pic">
                        <input type="file" id="ad-upload">
                        <label for="ad-upload">
                            <div class="icon">
                                <svg width="36" height="30" viewBox="0 0 36 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.998 21L17.998 15L11.998 21" stroke="black" stroke-opacity="0.4"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M17.998 15V28.5" stroke="black" stroke-opacity="0.4" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M30.5832 24.585C32.0462 23.7874 33.202 22.5253 33.868 20.9979C34.5341 19.4705 34.6726 17.7648 34.2615 16.15C33.8505 14.5352 32.9135 13.1032 31.5982 12.0801C30.283 11.057 28.6645 10.5011 26.9982 10.5H25.1082C24.6542 8.74384 23.808 7.11348 22.6332 5.73147C21.4583 4.34945 19.9855 3.25175 18.3254 2.52089C16.6653 1.79002 14.8611 1.44501 13.0484 1.5118C11.2358 1.57858 9.46183 2.05543 7.86 2.90647C6.25816 3.75752 4.8701 4.96063 3.80016 6.42535C2.73023 7.89007 2.00627 9.57828 1.6827 11.3631C1.35914 13.1479 1.44439 14.9828 1.93205 16.7299C2.41971 18.477 3.29709 20.0908 4.49823 21.45"
                                        stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M23.998 21L17.998 15L11.998 21" stroke="black" stroke-opacity="0.4"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <span>
                                آپلود تصویر
                            </span>
                            <span class="exp">
                                png, jpg, jpeg 250 x 250
                            </span>
                        </label>
                    </div>
                </div>  --}}
                </form>

            </div>

            <div class="tab-contentn">

                <div class="tab-nav">
                    <ul>
                        <li class="active"><span>اطلاعات حساب کاربری</span></li>
                        <li><span>رزومه</span></li>
                    </ul>
                </div>
                <div class="tab-container">
                    <ul>
                        <li class="active">
                            <div class="dash-main-content">
                                @include('main.error')
                                <form action="{{ route('panel.account') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="edit-profile">

                                        <div class="profile-pic">
                                            <div class="upload-ad-pic avatar-pop">
                                                <input type="file" name="avatar" accept="image/*" id="avat"
                                                    class="path_img">
                                                <label for="avat" class=""  style="background: url('{!!  asset($user->avatar()) !!}'); background-size:cover">
                                                    <div class="icon">
                                                        <svg width="36" height="30" viewBox="0 0 36 30"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M23.998 21L17.998 15L11.998 21" stroke="black"
                                                                stroke-opacity="0.4" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M17.998 15V28.5" stroke="black" stroke-opacity="0.4"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M30.5832 24.585C32.0462 23.7874 33.202 22.5253 33.868 20.9979C34.5341 19.4705 34.6726 17.7648 34.2615 16.15C33.8505 14.5352 32.9135 13.1032 31.5982 12.0801C30.283 11.057 28.6645 10.5011 26.9982 10.5H25.1082C24.6542 8.74384 23.808 7.11348 22.6332 5.73147C21.4583 4.34945 19.9855 3.25175 18.3254 2.52089C16.6653 1.79002 14.8611 1.44501 13.0484 1.5118C11.2358 1.57858 9.46183 2.05543 7.86 2.90647C6.25816 3.75752 4.8701 4.96063 3.80016 6.42535C2.73023 7.89007 2.00627 9.57828 1.6827 11.3631C1.35914 13.1479 1.44439 14.9828 1.93205 16.7299C2.41971 18.477 3.29709 20.0908 4.49823 21.45"
                                                                stroke="black" stroke-opacity="0.4" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M23.998 21L17.998 15L11.998 21" stroke="black"
                                                                stroke-opacity="0.4" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                    <span>
                                                        آپلود تصویر
                                                    </span>
                                                    <span class="exp">
                                                        png, jpg, jpeg 250 x 250
                                                    </span>
                                                </label>
                                            </div>
                                        </div>




                                        <div class="input-label big">
                                            <label for="">نام</label>
                                            <input type="text" placeholder="" name="name"
                                                value="{{ old('name', $user->name) }}">

                                        </div>

                                        <div class="input-label big">
                                            <label for="">نام و نام خانوادگی</label>
                                            <input type="text" placeholder="" name="family"
                                                value="{{ old('family', $user->family) }}">

                                        </div>


                                        <div class="input-label big">
                                            <label for="">ایمیل</label>
                                            <input type="email" placeholder="" name="email"
                                                value="{{ old('email', $user->email) }}">
                                        </div>


                                        <div class="input-label big">
                                            <label for="">شماره موبایل</label>
                                            <input type="text" disabled laceholder="" value="{{ $user->mobile }}">
                                        </div>


                                        <div class="input-label big">
                                            <label for="">رمز عبور حساب کاربری</label>
                                            <input type="password" placeholder="" name="password"
                                                value="{{ old('password', $user->password) }}">

                                        </div>

                                        <div class="select-label">
                                            <label for="">شهر محل سکونت خود را انتخاب کنید</label>
                                            <select name="city_id" id="" class="nice-select" data-place=" ">
                                                @foreach (App\Models\City::all() as $city)
                                                    <option
                                                        {{ old('city_id', $user->city_id) == $city->id ? 'selected' : '' }}
                                                        value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="input-section">

                                            <h4>جنسیت خود را انتخاب کنید <span>(اختیاری)</span></h4>
                                            <div class="genr-toggle">
                                                <ul>
                                                    <li>
                                                        <div class="label-containef">
                                                            <input type="radio" name="gender" value="male"
                                                                id="male"
                                                                {{ $user->gender == 'male' ? 'checked' : '' }}>
                                                            <label for="male">
                                                                <span>مرد</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="label-containef">
                                                            <input type="radio" name="gender" value="female"
                                                                id="female"
                                                                {{ $user->gender == 'female' ? 'checked' : '' }}>
                                                            <label for="female">
                                                                <span>زن</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
{{--
                                        <div class="input-section">

                                            <h4> باز دید در محل <span>(اختیاری)</span></h4>
                                            <div class="genr-toggle">
                                                <ul>
                                                    <li>
                                                        <div class="label-containef">
                                                            <input type="radio" name="visit" value="1"
                                                                id="yes" {{ $user->visit == '1' ? 'checked' : '' }}>
                                                            <label for="yes">
                                                                <span>بله</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="label-containef">
                                                            <input type="radio" name="visit" value="0"
                                                                id="no" {{ $user->visit == '0' ? 'checked' : '' }}>
                                                            <label for="no">
                                                                <span>خیر</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>  --}}
                {{--  @dd(Morilog\Jalali\Jalalian::forge($user->b_date)->getMonth())  --}}

                                        <div class="input-section" id="bnr">
                                            <h4>تاریخ تولد خود را وارد کنید <span>(اختیاری)</span></h4>
                                            <div class="row">
                                                <div class="col-4  ">
                                                    <div class="select-label">
                                                        <label for="day">روز</label>
                                                        <select name="day" id="day" class="nice-select"
                                                            data-place="انتخاب کنید">
                                                            @for ($i = 1; $i < 32; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ old('day', Morilog\Jalali\Jalalian::forge($user->b_date)->getDay()) == $i ? 'selected' : '' }}>
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-4  ">
                                                    <div class="select-label">
                                                        <label for="month">ماه</label>
                                                        <select name="month" id="month" class="nice-select"
                                                            data-place="انتخاب کنید">
                                                            @foreach ($month as $key => $val)
                                                                <option
                                                                    {{   old('month' ,Morilog\Jalali\Jalalian::forge($user->b_date)->getMonth())   == $key  ? 'selected' : '' }}
                                                                    value="{{ $key }}"> {{ $val }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4  ">
                                                    <div class="select-label">
                                                        <label for="year">سال</label>
                                                        <select name="year" id="year" class="nice-select"
                                                            data-place="انتخاب کنید">
                                                            @for ($i = 1300; $i < 1386; $i++)
                                                                <option
                                                                    {{  old('year' ,Morilog\Jalali\Jalalian::forge($user->b_date)->getYear())    == $i ? 'selected' : '' }}
                                                                    value="{{ $i }}"> {{ $i }}
                                                                </option>
                                                            @endfor


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-section">
                                            <h4>شبکه های اجتماعی <span>(اختیاری)</span></h4>
                                            <div class="row">
                                                <div class="col-12 s col-md-12">
                                                    <div class="">
                                                        <div class="input-label big">
                                                            <label for=""> youtube</label>
                                                            <input type="text" placeholder="youtube" id="youtube"
                                                                name="youtube"
                                                                value="{{ old('youtube', $user->youtube) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 s col-md-12">
                                                    <div class="">
                                                        <div class="input-label big">
                                                            <label for=""> linkedin</label>
                                                            <input type="text" placeholder="linkedin" id="linkedin"
                                                                name="linkedin"
                                                                value="{{ old('linkedin', $user->linkedin) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 s col-md-12">
                                                    <div class="">
                                                        <div class="input-label big">
                                                            <label for=""> instagram</label>
                                                            <input type="text" placeholder="instagram" id="instagram"
                                                                name="instagram"
                                                                value="{{ old('instagram', $user->instagram) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 s col-md-12">
                                                    <div class="">
                                                        <div class="input-label big">
                                                            <label for=""> facebook</label>
                                                            <input type="text" placeholder="facebook" id="facebook"
                                                                name="facebook"
                                                                value="{{ old('facebook', $user->facebook) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="select-label">
                                            <label for="">مدرک تحصیلی</label>
                                            <select name="degree" id="" class="nice-select">
                                                <option
                                                    {{ old('degree', $user->degree) == 'under_high_school' ? 'selected' : '' }}
                                                    value="under_high_school">زیر دیپلم</option>
                                                <option
                                                    {{ old('degree', $user->degree) == 'high_school' ? 'selected' : '' }}
                                                    value="high_school">دیپلم
                                                </option>
                                                <option
                                                    {{ old('degree', $user->degree) == 'associate_degree' ? 'selected' : '' }}
                                                    value="associate_degree">کاردانی</option>
                                                <option {{ old('degree', $user->degree) == 'master' ? 'selected' : '' }}
                                                    value="master">کارشناسی</option>
                                                <option
                                                    {{ old('degree', $user->degree) == 'high_master' ? 'selected' : '' }}
                                                    value="high_master">
                                                    کارشناسی ارشد</option>
                                                <option {{ old('degree', $user->degree) == 'phd' ? 'selected' : '' }}
                                                    value="phd">دکتری و بالاتر
                                                </option>
                                            </select>
                                        </div>

                                        <div class="select-jiob">

                                            <div class="input-label big">
                                                <label for=""> تخصص شما</label>
                                                <input type="text" placeholder="" id="new_expert">

                                                <span class="edit-input pointer" id="add_expert">
                                                    <span>اضافه</span>
                                                    <span class="icon">

                                                    </span>
                                                </span>

                                            </div>

                                            <div class="search-filters" id="expert_list">
                                                @if (old('experts'))
                                                    @foreach (old('experts') as $ex => $val)
                                                        <span class="applied-filter gray side par">
                                                            <span> {{ $val }}</span>
                                                            <input type="text" hidden value="{{ $val }}"
                                                                name="experts[]">
                                                            <span class="remove-fil close_expert">
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM10 8.586L12.1206 6.46462C12.5113 6.07383 13.1448 6.07378 13.5355 6.4645C13.9262 6.85522 13.9262 7.48872 13.5354 7.87937L11.414 10L13.5354 12.1206C13.9262 12.5113 13.9262 13.1448 13.5355 13.5355C13.1448 13.9262 12.5113 13.9262 12.1206 13.5354L10 11.414L7.87937 13.5354C7.48872 13.9262 6.85522 13.9262 6.4645 13.5355C6.07378 13.1448 6.07383 12.5113 6.46463 12.1206L8.586 10L6.46462 7.87937C6.07383 7.48872 6.07378 6.85522 6.4645 6.4645C6.85522 6.07378 7.48872 6.07383 7.87937 6.46463L10 8.586Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    @endforeach
                                                @else
                                                    @foreach ($user->experts as $expert)
                                                        <span class="applied-filter gray side par">
                                                            <span> {{ $expert->name }}</span>
                                                            <input type="text" hidden value="{{ $expert->name }}"
                                                                name="experts[]">
                                                            <span class="remove-fil close_expert">
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM10 8.586L12.1206 6.46462C12.5113 6.07383 13.1448 6.07378 13.5355 6.4645C13.9262 6.85522 13.9262 7.48872 13.5354 7.87937L11.414 10L13.5354 12.1206C13.9262 12.5113 13.9262 13.1448 13.5355 13.5355C13.1448 13.9262 12.5113 13.9262 12.1206 13.5354L10 11.414L7.87937 13.5354C7.48872 13.9262 6.85522 13.9262 6.4645 13.5355C6.07378 13.1448 6.07383 12.5113 6.46463 12.1206L8.586 10L6.46462 7.87937C6.07383 7.48872 6.07378 6.85522 6.4645 6.4645C6.85522 6.07378 7.48872 6.07383 7.87937 6.46463L10 8.586Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                        <div class="input-label textarea big">
                                            <label for=""> درباره من </label>
                                            <textarea name="info" id="info" cols="30" rows="10"
                                                placeholder="یک پاراگراف درباره  خود بنویسید">{{ old('info', $user->info) }}</textarea>

                                        </div>


                                        <div class="footer-section">
                                            <div class="profile-name">
                                                <h4>کاربر بلدچی</h4>
                                                <span>عضو بلدچی از
                                                    {{ Morilog\Jalali\Jalalian::forge($user->created_at)->format(' %B Y') }}
                                                </span>
                                            </div>
                                            <div class="pair-button">

                                                <button class="mid-button blue">
                                                    ذخیره
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </li>
                        <li class="">
                            <div class="resume-edit-section">

                                <div class="tab-nav">
                                    <ul>
                                        <li class="active"><span>رزومه</span></li>
                                        <li><span>دست آورد</span></li>
                                    </ul>
                                    <span class="mid-button pointer new_resume orange2">+ افزودن </span>
                                </div>
                                <div class="tab-container">
                                    <ul>
                                        <li class="active">
                                            @foreach ($user->resumes()->whereType('resume')->latest()->get() as $resume)
                                                <div class="single-resume-edit" id="resume_{{ $resume->id }}">
                                                    <div class="resume-content">
                                                        <h4>{{ $resume->title }}</h4>
                                                        <p>
                                                            {{ $resume->info }}
                                                        </p>
                                                        <span class="date"> {{ $resume->from }} -
                                                            {{ $resume->to }}</span>
                                                    </div>

                                                    <div class="actions">
                                                        <span data-id="{{ $resume->id }}"
                                                            class="mid-button pointer force_remove gray"
                                                            data-id="{{ $resume->id }}">
                                                            <span class="icon">
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M17.5 4.98332C14.725 4.70832 11.9333 4.56665 9.15 4.56665C7.5 4.56665 5.85 4.64998 4.2 4.81665L2.5 4.98332"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.34"
                                                                        d="M7.08203 4.14175L7.26536 3.05008C7.3987 2.25841 7.4987 1.66675 8.90703 1.66675H11.0904C12.4987 1.66675 12.607 2.29175 12.732 3.05841L12.9154 4.14175"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path
                                                                        d="M15.7096 7.6167L15.168 16.0084C15.0763 17.3167 15.0013 18.3334 12.6763 18.3334H7.3263C5.0013 18.3334 4.9263 17.3167 4.83464 16.0084L4.29297 7.6167"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.34" d="M8.60938 13.75H11.3844"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.34" d="M7.91797 10.4167H12.0846"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                            <span>حذف</span>
                                                        </span>
                                                        <a class="mid-button gray"
                                                            href="{{ route('resume.edit', $resume->id) }}">
                                                            <span class="icon">
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.4"
                                                                        d="M9.16797 1.6665H7.5013C3.33464 1.6665 1.66797 3.33317 1.66797 7.49984V12.4998C1.66797 16.6665 3.33464 18.3332 7.5013 18.3332H12.5013C16.668 18.3332 18.3346 16.6665 18.3346 12.4998V10.8332"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path
                                                                        d="M13.3675 2.51688L6.80088 9.08354C6.55088 9.33354 6.30088 9.82521 6.25088 10.1835L5.89254 12.6919C5.75921 13.6002 6.40088 14.2335 7.30921 14.1085L9.81754 13.7502C10.1675 13.7002 10.6592 13.4502 10.9175 13.2002L17.4842 6.63354C18.6175 5.50021 19.1509 4.18354 17.4842 2.51688C15.8175 0.850211 14.5009 1.38354 13.3675 2.51688Z"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path opacity="0.4"
                                                                        d="M12.4258 3.4585C12.9841 5.45016 14.5424 7.0085 16.5424 7.57516"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>

                                                            </span>
                                                            <span>ویرایش</span>
                                                        </a>
                                                    </div>
                                                </div>


                                                <div style="display: none;" class=" fade box_remove modal "
                                                    id="modal_fave_{{ $resume->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">


                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title right" id="exampleModalLongTitle">
                                                                    حذف رزومه</h5>
                                                                <button type="button" class="close close_modal"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <svg width="12" height="12"
                                                                        viewBox="0 0 12 12" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>

                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <p>
                                                                    بعد از تایید این رزومه حذف خواهد شد
                                                                </p>


                                                                <div class="pair-button">
                                                                    <span class="mid-button pointer close_modal">
                                                                        انصراف
                                                                    </span>
                                                                    <button form="f_{{ $resume->id }}"
                                                                        class="mid-button pointer icon-button yellow remove_resume">
                                                                        حذف
                                                                        <span class="icon">
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM9 13H11V15H9V13ZM11 11.355V12H9V10.5C9 10.2348 9.10536 9.98043 9.29289 9.79289C9.48043 9.60536 9.73478 9.5 10 9.5C10.2841 9.49998 10.5623 9.4193 10.8023 9.26733C11.0423 9.11536 11.2343 8.89837 11.3558 8.64158C11.4773 8.3848 11.5234 8.0988 11.4887 7.81684C11.454 7.53489 11.34 7.26858 11.1598 7.04891C10.9797 6.82924 10.7409 6.66523 10.4712 6.57597C10.2015 6.48671 9.91204 6.47587 9.63643 6.54471C9.36081 6.61354 9.11042 6.75923 8.91437 6.96482C8.71832 7.1704 8.58468 7.42743 8.529 7.706L6.567 7.313C6.68863 6.70508 6.96951 6.14037 7.38092 5.67659C7.79233 5.2128 8.31952 4.86658 8.90859 4.67332C9.49766 4.48006 10.1275 4.44669 10.7337 4.57661C11.3399 4.70654 11.9007 4.99511 12.3588 5.41282C12.8169 5.83054 13.1559 6.36241 13.3411 6.95406C13.5263 7.54572 13.5511 8.17594 13.4129 8.78031C13.2747 9.38467 12.9785 9.9415 12.5545 10.3939C12.1306 10.8462 11.5941 11.1779 11 11.355Z"
                                                                                    fill="currentColor"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    <form id="f_{{ $resume->id }}"
                                                                        action="{{ route('resume.destroy', $resume->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')


                                                                    </form>

                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </li>
                                        <li class="">
                                            @foreach ($user->resumes()->whereType('result')->latest()->get() as $result)
                                                <div class="single-resume-edit" id="resume_{{ $result->id }}">
                                                    <div class="resume-content">
                                                        <h4>{{ $result->title }}</h4>
                                                        <p>
                                                            {{ $result->info }}
                                                        </p>
                                                        <span class="date"> {{ $result->from }} -
                                                            {{ $result->to }}</span>
                                                    </div>

                                                    <div class="actions">
                                                        <span data-id="{{ $result->id }}"
                                                            class="mid-button pointer force_remove gray"
                                                            data-id="{{ $result->id }}">
                                                            <span class="icon">
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M17.5 4.98332C14.725 4.70832 11.9333 4.56665 9.15 4.56665C7.5 4.56665 5.85 4.64998 4.2 4.81665L2.5 4.98332"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.34"
                                                                        d="M7.08203 4.14175L7.26536 3.05008C7.3987 2.25841 7.4987 1.66675 8.90703 1.66675H11.0904C12.4987 1.66675 12.607 2.29175 12.732 3.05841L12.9154 4.14175"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path
                                                                        d="M15.7096 7.6167L15.168 16.0084C15.0763 17.3167 15.0013 18.3334 12.6763 18.3334H7.3263C5.0013 18.3334 4.9263 17.3167 4.83464 16.0084L4.29297 7.6167"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.34" d="M8.60938 13.75H11.3844"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.34" d="M7.91797 10.4167H12.0846"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </span>
                                                            <span>حذف</span>
                                                        </span>
                                                        <a class="mid-button gray"
                                                            href="{{ route('resume.edit', $result->id) }}">
                                                            <span class="icon">
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.4"
                                                                        d="M9.16797 1.6665H7.5013C3.33464 1.6665 1.66797 3.33317 1.66797 7.49984V12.4998C1.66797 16.6665 3.33464 18.3332 7.5013 18.3332H12.5013C16.668 18.3332 18.3346 16.6665 18.3346 12.4998V10.8332"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path
                                                                        d="M13.3675 2.51688L6.80088 9.08354C6.55088 9.33354 6.30088 9.82521 6.25088 10.1835L5.89254 12.6919C5.75921 13.6002 6.40088 14.2335 7.30921 14.1085L9.81754 13.7502C10.1675 13.7002 10.6592 13.4502 10.9175 13.2002L17.4842 6.63354C18.6175 5.50021 19.1509 4.18354 17.4842 2.51688C15.8175 0.850211 14.5009 1.38354 13.3675 2.51688Z"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path opacity="0.4"
                                                                        d="M12.4258 3.4585C12.9841 5.45016 14.5424 7.0085 16.5424 7.57516"
                                                                        stroke="#636379" stroke-width="1.5"
                                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>

                                                            </span>
                                                            <span>ویرایش</span>
                                                        </a>
                                                    </div>
                                                </div>


                                                <div style="display: none;" class=" fade box_remove modal "
                                                    id="modal_fave_{{ $result->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">


                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title right" id="exampleModalLongTitle">
                                                                    حذف رزومه</h5>
                                                                <button type="button" class="close close_modal"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <svg width="12" height="12"
                                                                        viewBox="0 0 12 12" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>

                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <p>
                                                                    بعد از تایید این رزومه حذف خواهد شد
                                                                </p>


                                                                <div class="pair-button">
                                                                    <span class="mid-button pointer close_modal">
                                                                        انصراف
                                                                    </span>
                                                                    <button form="f_{{ $result->id }}"
                                                                        class="mid-button pointer icon-button yellow remove_resume">
                                                                        حذف
                                                                        <span class="icon">
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM9 13H11V15H9V13ZM11 11.355V12H9V10.5C9 10.2348 9.10536 9.98043 9.29289 9.79289C9.48043 9.60536 9.73478 9.5 10 9.5C10.2841 9.49998 10.5623 9.4193 10.8023 9.26733C11.0423 9.11536 11.2343 8.89837 11.3558 8.64158C11.4773 8.3848 11.5234 8.0988 11.4887 7.81684C11.454 7.53489 11.34 7.26858 11.1598 7.04891C10.9797 6.82924 10.7409 6.66523 10.4712 6.57597C10.2015 6.48671 9.91204 6.47587 9.63643 6.54471C9.36081 6.61354 9.11042 6.75923 8.91437 6.96482C8.71832 7.1704 8.58468 7.42743 8.529 7.706L6.567 7.313C6.68863 6.70508 6.96951 6.14037 7.38092 5.67659C7.79233 5.2128 8.31952 4.86658 8.90859 4.67332C9.49766 4.48006 10.1275 4.44669 10.7337 4.57661C11.3399 4.70654 11.9007 4.99511 12.3588 5.41282C12.8169 5.83054 13.1559 6.36241 13.3411 6.95406C13.5263 7.54572 13.5511 8.17594 13.4129 8.78031C13.2747 9.38467 12.9785 9.9415 12.5545 10.3939C12.1306 10.8462 11.5941 11.1779 11 11.355Z"
                                                                                    fill="currentColor"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    <form id="f_{{ $result->id }}"
                                                                        action="{{ route('resume.destroy', $result->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')


                                                                    </form>

                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>


    </div>









    <div class="modal fade" id="resume-modal" style="display: none;" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title right" id="exampleModalLongTitle">افزودن رزومه|دستاورد جدید</h5>
                    <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                fill="currentColor"></path>
                        </svg>

                    </button>

                </div>
                <form id="resume_form"   enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form">

                            <div class="img">
                                <svg width="342" height="258" viewBox="0 0 342 258" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M250.932 53.8106C279.498 63.4724 306.704 90.0189 307.508 124.31C308.312 158.601 298.83 193.543 246.803 207.116C197.897 219.858 81.7878 224.531 50.8796 181.922C21.6899 141.76 30.9923 76.5146 82.0016 55.6249C117.758 40.9824 195.135 34.932 250.932 53.8106Z"
                                        fill="#E6E6E6"></path>
                                    <path d="M110.738 57.5591H59.6602V97.0963H110.738V57.5591Z" fill="#E6E6E6"></path>
                                    <path d="M110.738 49.8999H59.6602V57.5592H110.738V49.8999Z" fill="#24285B"></path>
                                    <g opacity="0.12">
                                        <path opacity="0.12"
                                            d="M83.2266 88.4015C81.5859 88.1045 80.0285 87.4564 78.6609 86.5017C78.2078 86.9723 77.7546 87.4345 77.3186 87.9137C77.0963 88.1619 76.9424 88.1362 76.7201 87.9137C75.9933 87.1692 75.2495 86.4332 74.4971 85.7058C74.2833 85.4918 74.309 85.3635 74.4971 85.1666C74.9588 84.7131 75.4034 84.2338 75.8309 83.7974C75.4547 83.0528 75.0272 82.3169 74.6937 81.5467C74.4452 80.9058 74.2423 80.248 74.0867 79.5784C74.0268 79.3302 73.9328 79.2617 73.7019 79.2703C73.1376 79.2703 72.5648 79.2703 71.9919 79.2703C71.7183 79.2703 71.6328 79.1676 71.6328 78.9023C71.6328 77.8497 71.6328 76.7885 71.6328 75.7273C71.6328 75.4535 71.7354 75.3593 72.0005 75.3679C72.5819 75.3679 73.1547 75.3679 73.7105 75.3679C73.8216 75.3679 74.0012 75.2566 74.0183 75.1711C74.3408 73.6337 74.972 72.1779 75.8736 70.8921C75.4034 70.4215 74.9417 69.9508 74.4543 69.5058C74.2406 69.3004 74.2491 69.172 74.4543 68.9666C75.2153 68.2307 75.9591 67.4861 76.703 66.733C76.9082 66.5276 77.0535 66.5362 77.2502 66.733C77.6862 67.2123 78.1052 67.6744 78.6011 68.1536C78.9431 67.9397 79.2338 67.76 79.533 67.5888C80.5876 66.9789 81.7384 66.5535 82.9359 66.3308C83.1839 66.3308 83.2779 66.2025 83.2694 65.9286C83.2694 65.3723 83.2694 64.8246 83.2694 64.2684C83.2694 64.0031 83.3549 63.9004 83.637 63.9004C84.7058 63.9004 85.7745 63.9004 86.8347 63.9004C87.134 63.9004 87.2195 64.0202 87.2195 64.2941C87.2195 64.9359 87.2195 65.5692 87.2195 66.2538C88.8625 66.552 90.4224 67.1999 91.7937 68.1536C92.2554 67.6744 92.7086 67.2123 93.1532 66.733C93.3584 66.502 93.5123 66.5191 93.726 66.733C94.4528 67.4776 95.1966 68.2221 95.949 68.941C96.1799 69.1635 96.1542 69.3004 95.949 69.5058C95.4873 69.9508 95.0427 70.4129 94.5639 70.8921C94.6836 71.0804 94.8204 71.2858 94.9401 71.4912C95.6239 72.5754 96.1021 73.7764 96.3509 75.0341C96.4107 75.3422 96.539 75.3936 96.8126 75.385C97.3427 75.385 97.8728 75.385 98.4029 75.385C98.6936 75.385 98.8218 75.4706 98.8133 75.7787C98.8133 76.8142 98.8133 77.8497 98.8133 78.8766C98.8133 79.1847 98.7192 79.296 98.4114 79.2874C97.8386 79.2874 97.2572 79.2874 96.7014 79.2874C96.6386 79.2981 96.5793 79.324 96.5286 79.3627C96.478 79.4015 96.4375 79.452 96.4107 79.5099C96.0966 81.047 95.471 82.5033 94.5725 83.7888C95.0342 84.2509 95.4788 84.7216 95.949 85.1666C96.1799 85.3806 96.2055 85.5261 95.949 85.7571C95.1966 86.476 94.4613 87.2205 93.726 87.9565C93.5294 88.1619 93.384 88.179 93.1874 87.9565C92.7428 87.4773 92.3324 87.0151 91.8194 86.5273C90.4446 87.473 88.8859 88.1175 87.2451 88.4186C87.2451 89.0861 87.2451 89.7194 87.2451 90.3612C87.2451 90.6522 87.1682 90.7806 86.8518 90.7806C85.8002 90.7806 84.74 90.7806 83.6798 90.7806C83.3634 90.7806 83.2865 90.6522 83.295 90.3698C83.2352 89.7023 83.2266 89.069 83.2266 88.4015ZM85.2273 70.7467C83.9271 70.7534 82.6579 71.1454 81.58 71.8732C80.502 72.601 79.6635 73.632 79.1702 74.8362C78.6769 76.0403 78.5509 77.3637 78.8081 78.6395C79.0653 79.9152 79.6941 81.0862 80.6153 82.0047C81.5365 82.9232 82.7089 83.548 83.9844 83.8005C85.26 84.053 86.5817 83.9217 87.7828 83.4233C88.984 82.9248 90.0108 82.0816 90.7337 80.9998C91.4566 79.918 91.8433 78.6462 91.845 77.3448C91.8439 76.4764 91.6718 75.6169 91.3385 74.8152C91.0052 74.0135 90.5173 73.2854 89.9027 72.6726C89.2881 72.0598 88.5588 71.5743 87.7565 71.2438C86.9543 70.9134 86.0948 70.7444 85.2273 70.7467Z"
                                            fill="black"></path>
                                    </g>
                                    <path d="M272.771 47.4863H195.316V125.012H272.771V47.4863Z" fill="#E6E6E6"></path>
                                    <path d="M295.497 55.8306H220.898V88.6927H295.497V55.8306Z" fill="#CCCCCC"></path>
                                    <path
                                        d="M183.534 185.953H122.29C115.604 185.953 110.184 191.378 110.184 198.071C110.184 204.763 115.604 210.188 122.29 210.188H183.534C190.22 210.188 195.641 204.763 195.641 198.071C195.641 191.378 190.22 185.953 183.534 185.953Z"
                                        fill="#E6E6E6"></path>
                                    <path
                                        d="M224.542 159.055H163.298C156.612 159.055 151.191 164.481 151.191 171.173C151.191 177.866 156.612 183.291 163.298 183.291H224.542C231.228 183.291 236.649 177.866 236.649 171.173C236.649 164.481 231.228 159.055 224.542 159.055Z"
                                        fill="#E6E6E6"></path>
                                    <path
                                        d="M265.546 132.158H204.302C197.616 132.158 192.195 137.583 192.195 144.276C192.195 150.968 197.616 156.394 204.302 156.394H265.546C272.232 156.394 277.653 150.968 277.653 144.276C277.653 137.583 272.232 132.158 265.546 132.158Z"
                                        fill="#E6E6E6"></path>
                                    <path d="M104.439 159.928H59.5V208.896H104.439V159.928Z" fill="#E6E6E6"></path>
                                    <path d="M74.221 166.03H66.4062V173.852H74.221V166.03Z" fill="#A8A8A8"></path>
                                    <path d="M68.6836 170.018L69.8036 171.695L71.83 168.674" stroke="white"
                                        stroke-width="2.03" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M96.5808 168.588H78.4805V171.695H96.5808V168.588Z" fill="white"></path>
                                    <path d="M74.221 180.244H66.4062V188.066H74.221V180.244Z" fill="#A8A8A8"></path>
                                    <path d="M68.6836 184.232L69.8036 185.918L71.83 182.897" stroke="white"
                                        stroke-width="2.03" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M96.5808 182.812H78.4805V185.918H96.5808V182.812Z" fill="white"></path>
                                    <path d="M74.221 193.535H66.4062V201.357H74.221V193.535Z" fill="#A8A8A8"></path>
                                    <path d="M68.6836 197.523L69.8036 199.209L71.83 196.179" stroke="white"
                                        stroke-width="2.03" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M96.5808 196.094H78.4805V199.2H96.5808V196.094Z" fill="white"></path>
                                    <path
                                        d="M219.82 69.2576C220.938 68.6213 221.991 67.8791 222.967 67.0411C223.497 66.365 224.386 62.7621 225.096 62.0262C225.805 61.2902 227.242 61.3415 227.421 61.9577C227.528 62.5219 227.548 63.099 227.481 63.6693C227.481 63.6693 228.276 62.7022 228.336 63.1387C228.068 65.0404 227.304 66.8379 226.122 68.3504C224.412 70.507 221.496 73.4851 221.496 73.4851L219.82 69.2576Z"
                                        fill="#F4A28C"></path>
                                    <path
                                        d="M120.356 128.808L90.6641 118.465L83.8488 138.064L113.54 148.408L120.356 128.808Z"
                                        fill="#FFD200"></path>
                                    <path
                                        d="M163.578 72.1759C163.578 72.1759 204.003 78.9451 220.957 67.897L223.462 71.8678C223.462 71.8678 216.511 82.4966 196.718 87.1607C176.925 91.8247 165.451 89.4884 165.451 89.4884L163.578 72.1759Z"
                                        fill="#029591"></path>
                                    <path opacity="0.46"
                                        d="M163.578 72.1759C163.578 72.1759 204.003 78.9451 220.957 67.897L223.462 71.8678C223.462 71.8678 216.511 82.4966 196.718 87.1607C176.925 91.8247 165.451 89.4884 165.451 89.4884L163.578 72.1759Z"
                                        fill="white"></path>
                                    <path
                                        d="M126.445 177.549C126.445 177.549 125.479 179.791 126.864 181.331C128.249 182.872 127.266 184.754 125.547 183.839C123.829 182.923 121.965 177.908 121.965 177.908L124.684 175.264L126.445 177.549Z"
                                        fill="#029591"></path>
                                    <path
                                        d="M187.811 155.469C187.811 155.469 189.914 156.684 191.616 155.469C193.317 154.254 195.036 155.469 193.941 157.07C192.847 158.67 187.648 159.945 187.648 159.945L185.34 156.933L187.811 155.469Z"
                                        fill="#029591"></path>
                                    <path
                                        d="M161.808 54.5468C161.458 56.8488 160.802 59.0936 159.859 61.2219C159.729 61.4659 159.552 61.6818 159.338 61.857C159.124 62.0322 158.878 62.1634 158.613 62.243C158.348 62.3225 158.071 62.3489 157.796 62.3205C157.521 62.2921 157.254 62.2096 157.012 62.0777C156.193 61.7048 155.5 61.1018 155.018 60.3422C154.535 59.5826 154.283 58.699 154.293 57.7988L153.934 53.9478C153.943 53.1675 154.195 52.4095 154.655 51.7792C155.115 51.1489 155.759 50.6775 156.499 50.4305C159.166 49.4121 162.313 52.0308 161.808 54.5468Z"
                                        fill="#F4A28C"></path>
                                    <path
                                        d="M154.004 54.6924L148.746 67.3666L155.937 69.7627L156.869 59.5789L154.004 54.6924Z"
                                        fill="#F4A28C"></path>
                                    <path
                                        d="M160.74 54.4698C159.474 54.2141 158.24 53.815 157.064 53.2803C157.294 53.9207 157.331 54.6146 157.172 55.2762C157.012 55.9378 156.663 56.5381 156.166 57.003C155.693 57.4619 155.076 57.7426 154.42 57.7972C153.763 57.8518 153.108 57.677 152.566 57.3025L153.9 52.0908C154.066 51.3383 154.431 50.6446 154.958 50.0827C155.484 49.5209 156.153 49.1118 156.893 48.8987C157.531 48.7072 158.183 48.5613 158.842 48.4622C160.484 48.2226 162.45 49.7545 164.041 49.0613C164.201 48.9925 164.377 48.9665 164.55 48.9859C164.724 49.0054 164.889 49.0695 165.03 49.1722C165.172 49.2748 165.284 49.4124 165.356 49.5714C165.428 49.7305 165.458 49.9056 165.443 50.0797C165.297 51.7228 164.417 54.1618 162.023 54.5126C161.596 54.5694 161.162 54.5549 160.74 54.4698Z"
                                        fill="#24285B"></path>
                                    <path
                                        d="M156.645 56.9856C156.645 56.9856 156.996 55.411 155.79 55.2741C154.585 55.1371 154.08 57.3878 155.619 57.9783L156.645 56.9856Z"
                                        fill="#F4A28C"></path>
                                    <path
                                        d="M161.28 57.1143L162.041 58.9542C162.084 59.0584 162.101 59.1719 162.088 59.2841C162.076 59.3963 162.036 59.5036 161.971 59.596C161.906 59.6883 161.819 59.7627 161.717 59.8121C161.616 59.8615 161.504 59.8843 161.391 59.8784L159.758 59.7929L161.28 57.1143Z"
                                        fill="#F4A28C"></path>
                                    <path opacity="0.31"
                                        d="M156.757 61.8211C155.911 61.3638 155.216 60.6712 154.756 59.8271C154.756 59.8271 154.269 62.2918 156.372 65.3384L156.757 61.8211Z"
                                        fill="#CE8172"></path>
                                    <path
                                        d="M148.77 67.3837L153.661 69.0097C154.851 69.4162 156.065 69.7506 157.295 70.011C161.228 70.8667 172.685 74.2899 174.856 87.1266C177.49 102.702 155.73 123.857 155.73 123.857L130.396 117.866C130.396 117.866 112.518 60.0411 148.77 67.3837Z"
                                        fill="#029591"></path>
                                    <path
                                        d="M130.37 117.806C130.37 117.806 126.95 133.903 139.091 136.043C151.232 138.182 172.068 128.7 184.774 157.438L189.245 154.802C189.245 154.802 186.278 128.563 158.465 120.964L130.37 117.806Z"
                                        fill="#24285B"></path>
                                    <path
                                        d="M134.373 124.824C134.373 124.824 150.182 149.539 123.121 173.004L126.49 177.549C126.49 177.549 155.628 164.19 152.798 126.955L134.373 124.824Z"
                                        fill="#24285B"></path>
                                    <path opacity="0.08"
                                        d="M148.772 81.4526C148.772 81.4526 148.892 87.811 141.137 95.9496C133.382 104.088 144.206 119.347 144.206 119.347L130.407 117.806C130.407 117.806 125.054 98.902 126.132 86.6129C127.209 74.3239 148.096 81.4782 148.096 81.4782L148.772 81.4526Z"
                                        fill="black"></path>
                                    <path
                                        d="M134.953 66.8702C119.709 67.7859 87.7659 74.6664 101.369 117.524L108.115 116.925C108.115 116.925 106.114 84.6791 134.235 85.92C135.283 85.9885 136.334 85.9885 137.382 85.92C142.075 85.5263 153.293 83.6265 148.608 74.4781C147.316 72.0197 145.337 69.991 142.912 68.64C140.487 67.2889 137.722 66.674 134.953 66.8702Z"
                                        fill="#029591"></path>
                                    <path opacity="0.46"
                                        d="M134.953 66.8702C119.709 67.7859 87.7659 74.6664 101.369 117.524L108.115 116.925C108.115 116.925 106.114 84.6791 134.235 85.92C135.283 85.9885 136.334 85.9885 137.382 85.92C142.075 85.5263 153.293 83.6265 148.608 74.4781C147.316 72.0197 145.337 69.991 142.912 68.64C140.487 67.2889 137.722 66.674 134.953 66.8702Z"
                                        fill="white"></path>
                                    <path
                                        d="M106.917 117.019C107.517 119.169 107.517 121.442 106.917 123.591C105.865 126.647 103.633 127.391 101.675 126.356C99.7174 125.32 103.539 120.16 103.539 120.16L102.317 117.421L106.917 117.019Z"
                                        fill="#F4A28C"></path>
                                    <path d="M245.375 63.6694H230.113V78.9452H245.375V63.6694Z" fill="#E6E6E6"></path>
                                    <path d="M287.639 64.4395H251.293V69.1377H287.639V64.4395Z" fill="#E6E6E6"></path>
                                    <path d="M281.312 73.5024H251.293V78.2007H281.312V73.5024Z" fill="#E6E6E6"></path>
                                    <path d="M279.926 201.947H209.191V205.935H279.926V201.947Z" fill="#E6E6E6"></path>
                                    <path d="M241.964 196.017H226.129V211.866H241.964V196.017Z" fill="#CCCCCC"></path>
                                    <path d="M284.656 183.128H238.965V185.704H284.656V183.128Z" fill="#E6E6E6"></path>
                                    <path d="M276.652 179.294H266.426V189.53H276.652V179.294Z" fill="#CCCCCC"></path>
                                </svg>
                            </div>
                            <div class="left-sec">
                                <div class="input-label big">
                                    <label for="">عنوان </label>
                                    <input type="text" name="title" placeholder="">
                                </div>
                                <div class="input-label big">
                                    <label for="">مکان</label>
                                    <input type="text" name="location"
                                        placeholder="محل رزومه خود را بنویسید، مثلا شرکت بلدچی">

                                </div>
                                <div class="input-label textarea big">
                                    <label for="">توضیحات </label>
                                    <textarea name="info" id="" cols="30" rows="10" name="info"
                                        placeholder="یک پاراگراف مرتبط با عنوان رزومه خود بنویسید"></textarea>

                                </div>
                                <div class="select-label">
                                    <label for="">نوع</label>
                                    <select name="type" id="" class="nice-select"
                                        data-place="انتخاب نوع (دستاورد  یا رزومه)">
                                        <option value="result">دستاورد</option>
                                        <option value="resume">رزومه</option>
                                    </select>
                                </div>
                                <div class="input-label big">
                                    <label for="">مدرک </label>
                                    <input type="file" name="attach" placeholder="">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-label big">
                                            <label for="">تاریخ شروع</label>
                                            <input type="text" name="from" placeholder="برای مثال 1394/05/13">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-label big">
                                            <label for="">تاریخ پایان</label>
                                            <input type="text" name="to" placeholder="برای مثال 1394/05/13">

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">

                                    <div class="pair-button">
                                        <span class="mid-button pointer close_modal">
                                            انصراف
                                        </span>
                                        <span class="mid-button pointer blue" id="insert_resume">
                                            ذخیره
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
