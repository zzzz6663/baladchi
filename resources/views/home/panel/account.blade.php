@extends('main.panel')
@section('content')
    <div class="dash-title">
        <h3>اطلاعات حساب کاربری</h3>
    </div>

    <div class="dash-main-content">
        @include('main.error')
        <form action="{{ route('panel.account') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="edit-profile">

                <div class="profile-pic">
                    <div class="upload-ad-pic avatar-pop">
                        <input type="file" name="avatar" accept="image/*" id="avat" class="path_img">
                        <label for="avat" class="">
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
                </div>




                <div class="input-label big">
                    <label for="">نام</label>
                    <input type="text" placeholder="" name="name" value="{{ old('name', $user->name) }}">
                    {{-- <button class="edit-input">
                    <span>تغییر</span>
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.16797 1.66675H7.5013C3.33464 1.66675 1.66797 3.33341 1.66797 7.50008V12.5001C1.66797 16.6667 3.33464 18.3334 7.5013 18.3334H12.5013C16.668 18.3334 18.3346 16.6667 18.3346 12.5001V10.8334" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.3675 2.51663L6.80088 9.0833C6.55088 9.3333 6.30088 9.82497 6.25088 10.1833L5.89254 12.6916C5.75921 13.6 6.40088 14.2333 7.30921 14.1083L9.81754 13.75C10.1675 13.7 10.6592 13.45 10.9175 13.2L17.4842 6.6333C18.6175 5.49997 19.1509 4.1833 17.4842 2.51663C15.8175 0.849966 14.5009 1.3833 13.3675 2.51663Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.4258 3.45825C12.9841 5.44992 14.5424 7.00825 16.5424 7.57492" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button> --}}
                </div>

                <div class="input-label big">
                    <label for="">نام و نام خانوادگی</label>
                    <input type="text" placeholder="" name="family" value="{{ old('family', $user->family) }}">
                    {{-- <button class="edit-input">
                    <span>تغییر</span>
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.16797 1.66675H7.5013C3.33464 1.66675 1.66797 3.33341 1.66797 7.50008V12.5001C1.66797 16.6667 3.33464 18.3334 7.5013 18.3334H12.5013C16.668 18.3334 18.3346 16.6667 18.3346 12.5001V10.8334" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.3675 2.51663L6.80088 9.0833C6.55088 9.3333 6.30088 9.82497 6.25088 10.1833L5.89254 12.6916C5.75921 13.6 6.40088 14.2333 7.30921 14.1083L9.81754 13.75C10.1675 13.7 10.6592 13.45 10.9175 13.2L17.4842 6.6333C18.6175 5.49997 19.1509 4.1833 17.4842 2.51663C15.8175 0.849966 14.5009 1.3833 13.3675 2.51663Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.4258 3.45825C12.9841 5.44992 14.5424 7.00825 16.5424 7.57492" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </button> --}}
                </div>


                <div class="input-label big">
                    <label for="">ایمیل</label>
                    <input type="email" placeholder="" name="email" value="{{ old('email', $user->email) }}">
                </div>


                <div class="input-label big">
                    <label for="">شماره موبایل</label>
                    <input type="text" disabled laceholder="" value="{{ $user->mobile }}">
                </div>


                <div class="input-label big">
                    <label for="">رمز عبور حساب کاربری</label>
                    <input type="password" placeholder="" name="password" value="{{ old('password', $user->password) }}">

                </div>

                <div class="select-label">
                    <label for="">شهر محل سکونت خود را انتخاب کنید</label>
                    <select name="city_id" id="" class="nice-select" data-place=" ">
                        @foreach (App\Models\City::all() as $city)
                            <option {{ old('city_id', $user->city_id) == $city->id ? 'selected' : '' }}
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
                                    <input type="radio" name="gender" value="male" id="male"
                                        {{ $user->gender == 'male' ? 'checked' : '' }}>
                                    <label for="male">
                                        <span>مرد</span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="label-containef">
                                    <input type="radio" name="gender" value="female" id="female"
                                        {{ $user->gender == 'female' ? 'checked' : '' }}>
                                    <label for="female">
                                        <span>زن</span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="input-section">

                    <h4>        باز دید در محل <span>(اختیاری)</span></h4>
                    <div class="genr-toggle">
                        <ul>
                            <li>
                                <div class="label-containef">
                                    <input type="radio" name="visit" value="1" id="yes"
                                        {{ $user->visit == '1' ? 'checked' : '' }}>
                                    <label for="yes">
                                        <span>بله</span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="label-containef">
                                    <input type="radio" name="visit" value="0" id="no"
                                        {{ $user->visit == '0' ? 'checked' : '' }}>
                                    <label for="no">
                                        <span>خیر</span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="input-section">
                    <h4>تاریخ تولد خود را وارد کنید <span>(اختیاری)</span></h4>
                    <div class="row">
                        <div class="col-4">
                            <div class="select-label">
                                <label for="day">روز</label>
                                <select name="day" id="day" class="nice-select" data-place="انتخاب کنید">
                                    @for ($i = 1; $i < 32; $i++)
                                        <option
                                            {{ old('day', Morilog\Jalali\Jalalian::forge($user->b_date)->getDay()) == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="select-label">
                                <label for="month">ماه</label>
                                <select name="month" id="month" class="nice-select" data-place="انتخاب کنید">
                                    @foreach ($month as $key => $val)
                                        <option
                                            {{ Morilog\Jalali\Jalalian::forge($user->b_date)->getYear() || old('month') == $i ? 'selected' : '' }}
                                            value="{{ $key }}"> {{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="select-label">
                                <label for="year">سال</label>
                                <select name="year" id="year" class="nice-select" data-place="انتخاب کنید">
                                    @for ($i = 1300; $i < 1386; $i++)
                                        <option
                                            {{ Morilog\Jalali\Jalalian::forge($user->b_date)->getYear() || old('year') == $i ? 'selected' : '' }}
                                            value="{{ $i }}"> {{ $i }} </option>
                                    @endfor


                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-section">
                    <h4>شبکه های اجتماعی  <span>(اختیاری)</span></h4>
                    <div class="row">
                        <div class="col-6 col-md-12">
                            <div class="">
                                <div class="input-label big">
                                    <label for="">   youtube</label>
                                    <input type="text" placeholder="youtube" id="youtube" name="youtube" value="{{ old('youtube',$user->youtube) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-12">
                            <div class="">
                                <div class="input-label big">
                                    <label for="">   linkedin</label>
                                    <input type="text" placeholder="linkedin" id="linkedin"   name="linkedin" value="{{ old('linkedin',$user->linkedin) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-12">
                            <div class="">
                                <div class="input-label big">
                                    <label for="">   instagram</label>
                                    <input type="text" placeholder="instagram" id="instagram"   name="instagram" value="{{ old('instagram',$user->instagram) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-12">
                            <div class="">
                                <div class="input-label big">
                                    <label for="">   facebook</label>
                                    <input type="text" placeholder="facebook" id="facebook"   name="facebook" value="{{ old('facebook',$user->facebook) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="select-label">
                    <label for="">مدرک تحصیلی</label>
                    <select name="degree" id="" class="nice-select">
                        <option {{ old('degree', $user->degree) == 'under_high_school' ? 'selected' : '' }}
                            value="under_high_school">زیر دیپلم</option>
                        <option {{ old('degree', $user->degree) == 'high_school' ? 'selected' : '' }} value="high_school">دیپلم
                        <option {{ old('degree', $user->degree) == 'high_school' ? 'selected' : '' }} value="high_school">دیپلم
                        </option>
                        <option {{ old('degree', $user->degree) == 'associate_degree' ? 'selected' : '' }}
                            value="associate_degree">کاردانی</option>
                        <option {{ old('degree', $user->degree) == 'master' ? 'selected' : '' }} value="master">کارشناسی</option>
                        <option {{ old('degree', $user->degree) == 'high_master' ? 'selected' : '' }} value="high_master">
                            کارشناسی ارشد</option>
                        <option {{ old('degree', $user->degree) == 'phd' ? 'selected' : '' }} value="phd">دکتری و بالاتر
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
                                {{-- @dump($val)
                    @dd($ex) --}}
                                <span class="applied-filter gray side par">
                                    <span> {{ $val }}</span>
                                    <input type="text" hidden value="{{ $val }}" name="experts[]">
                                    <span class="remove-fil close_expert">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM10 8.586L12.1206 6.46462C12.5113 6.07383 13.1448 6.07378 13.5355 6.4645C13.9262 6.85522 13.9262 7.48872 13.5354 7.87937L11.414 10L13.5354 12.1206C13.9262 12.5113 13.9262 13.1448 13.5355 13.5355C13.1448 13.9262 12.5113 13.9262 12.1206 13.5354L10 11.414L7.87937 13.5354C7.48872 13.9262 6.85522 13.9262 6.4645 13.5355C6.07378 13.1448 6.07383 12.5113 6.46463 12.1206L8.586 10L6.46462 7.87937C6.07383 7.48872 6.07378 6.85522 6.4645 6.4645C6.85522 6.07378 7.48872 6.07383 7.87937 6.46463L10 8.586Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </span>
                            @endforeach
                        @else
                            @foreach ($user->experts as $expert)
                                {{-- @dump($val)
                    @dd($ex) --}}
                                <span class="applied-filter gray side par">
                                    <span> {{ $expert->name }}</span>
                                    <input type="text" hidden value="{{ $expert->name }}" name="experts[]">
                                    <span class="remove-fil close_expert">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
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
                    <label for="">  درباره من </label>
                    <textarea name="info" id="info" cols="30" rows="10" placeholder="یک پاراگراف درباره  خود بنویسید">{{ old('info',$user->info) }}</textarea>

                </div>


                <div class="footer-section">
                    <div class="profile-name">
                        <h4>کاربر بلدچی</h4>
                        <span>عضو بلدچی از
                            {{ Morilog\Jalali\Jalalian::forge($user->created_at)->format(' %B Y') }}
                        </span>
                    </div>
                    <div class="pair-button">
                        {{-- <button class="mid-button">
                        انصراف
                    </button> --}}
                        <button class="mid-button blue">
                            ذخیره
                        </button>
                    </div>
                </div>

            </div>
        </form>

    </div>

@endsection
