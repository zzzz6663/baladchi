@extends('main.site')
@section('title')
{{ $counsel->title }}
@endsection
@section('desc')
{{ $counsel->info }}
@endsection
@section('content')
    <div id="main">
        <div class="container">

            <div class="row">
                <div class="bread-filter">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ route('login') }}">صفحه اصلی</a></li>
                            <li class="sep">
                                <span>
                                    <svg width="7" height="10" viewBox="0 0 7 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.943369 4.94888C0.94335 5.08612 0.970364 5.22202 1.02287 5.34882C1.07537 5.47561 1.15234 5.59084 1.24937 5.6879L5.14936 9.58789C5.34523 9.78375 5.61087 9.8938 5.88786 9.8938C6.16485 9.8938 6.43049 9.78375 6.62635 9.58789C6.82222 9.39203 6.93226 9.12639 6.93226 8.8494C6.93226 8.5724 6.82222 8.30676 6.62635 8.1109L4.22636 4.9469L6.62635 1.7829C6.82222 1.58704 6.93226 1.32139 6.93226 1.0444C6.93226 0.767412 6.82222 0.50174 6.62635 0.305878C6.43049 0.110015 6.16485 2.14471e-08 5.88786 0C5.61087 -2.1447e-08 5.34523 0.110015 5.14936 0.305878L1.24937 4.2059C1.15181 4.3034 1.07453 4.41925 1.02201 4.54678C0.969491 4.67431 0.942768 4.81096 0.943369 4.94888Z"
                                            fill="#A6A5AA"></path>
                                    </svg>

                                </span>
                            </li>
                            <li><a href="{{ route('counsels') }}">خردجمعی</a></li>
                            <li class="sep">
                                <span>
                                    <svg width="7" height="10" viewBox="0 0 7 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.943369 4.94888C0.94335 5.08612 0.970364 5.22202 1.02287 5.34882C1.07537 5.47561 1.15234 5.59084 1.24937 5.6879L5.14936 9.58789C5.34523 9.78375 5.61087 9.8938 5.88786 9.8938C6.16485 9.8938 6.43049 9.78375 6.62635 9.58789C6.82222 9.39203 6.93226 9.12639 6.93226 8.8494C6.93226 8.5724 6.82222 8.30676 6.62635 8.1109L4.22636 4.9469L6.62635 1.7829C6.82222 1.58704 6.93226 1.32139 6.93226 1.0444C6.93226 0.767412 6.82222 0.50174 6.62635 0.305878C6.43049 0.110015 6.16485 2.14471e-08 5.88786 0C5.61087 -2.1447e-08 5.34523 0.110015 5.14936 0.305878L1.24937 4.2059C1.15181 4.3034 1.07453 4.41925 1.02201 4.54678C0.969491 4.67431 0.942768 4.81096 0.943369 4.94888Z"
                                            fill="#A6A5AA"></path>
                                    </svg>

                                </span>
                            </li>
                            <li><span>{{ $counsel->title }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="answer-sec">
                <div class="d-flex">
                    <div class="right-sec">
                        <div class="user-naswe">
                            <div class="img">

                                <a href="{{ $counsel->user->avatar() }}" data-lightbox="roadtrip{{ $counsel->user->id }}">
                                    <img src="{{ $counsel->user->avatar() }}" alt="">
                                    </a>

                                {{--  <img src="{{ $counsel->user->avatar() }}" alt="">  --}}
                                <span class="onl green"></span>
                            </div>
                            <h4 class="name">
                                <a href="{{route("single.user",$counsel->user->id)}}">
                                    {{ $counsel->user->name }}
                                    {{ $counsel->user->family }}
                                  </a>
                            </h4>
                            <div class="stat red">پرسشنامه</div>
                        </div>
                    </div>
                    <div class="left-sec">
                        <div class="user-full-messg">
                            @if ($counsel->img)
                                <div class="balad-box">
                                    <div class="balad-pic">
                                        <div class="head">
                                            <a href="{{ $counsel->img() }}" data-lightbox="gallerysss" class="">
                                                <img src="{{ $counsel->img() }}" alt="">

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="top">
                                <div class="rights">
                                    <div class="time">
                                        <span class="icon">
                                            <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.9987 14.1667C3.3167 14.1667 0.332031 11.182 0.332031 7.50004C0.332031 3.81804 3.3167 0.833374 6.9987 0.833374C10.6807 0.833374 13.6654 3.81804 13.6654 7.50004C13.6654 11.182 10.6807 14.1667 6.9987 14.1667ZM6.9987 12.8334C8.41319 12.8334 9.76974 12.2715 10.7699 11.2713C11.7701 10.2711 12.332 8.91453 12.332 7.50004C12.332 6.08555 11.7701 4.729 10.7699 3.7288C9.76974 2.72861 8.41319 2.16671 6.9987 2.16671C5.58421 2.16671 4.22766 2.72861 3.22746 3.7288C2.22727 4.729 1.66536 6.08555 1.66536 7.50004C1.66536 8.91453 2.22727 10.2711 3.22746 11.2713C4.22766 12.2715 5.58421 12.8334 6.9987 12.8334ZM7.66536 7.50004H10.332V8.83337H6.33203V4.16671H7.66536V7.50004Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span>
                                            {{ Carbon\Carbon::parse($counsel->created_at)->ago() }}
                                        </span>
                                        {{-- <a href="#" class="green">({{ __('arr.'.$counsel) }} )</a> --}}
                                        {{-- <a href="#" class="green">({{ $counsel->skill->name }} )</a> --}}
                                        {{--  <a href="#" class="green">(
                                            {{ implode(' - ', $counsel->skills()->pluck('name')->toArray()) }}

                                            )</a>  --}}
                                    </div>
                                    <h3>
                                        {{ $counsel->title }}
                                        <br>
                                        @if ($counsel->url)
                                            <span class="pointer" id="showlink">
                                                نمایش لینک
                                            </span>
                                            <br>
                                            <a style="display: none" id="link"
                                                href="{{ route('go.to', ['url' => $counsel->url]) }}">{{ $counsel->url }}</a>
                                        @endif
                                    </h3>
                                </div>
                                <div class="lefts">
                                    <div class="answ-stat">
                                        <span class="num">{{ $counsel->answers_count() }}</span>
                                        <span>
                                            جواب
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <p>
                                    {{ $counsel->info }}
                                </p>
                            </div>
                            {{-- سس سس --}}
                            <div class="circle-line">
                                <span></span>
                            </div>
                            <div class="user-messg-foter">
                                @auth
                                    {{--  <a href="{{ route('counsel.quiz', $counsel->id) }}" class="icon-button green">
                                @if ($user->answers()->where('counsel_id', $counsel->id)->count())
                                <span>ویرایش جواب ها </span>
                                @else
                                <span>پاسخ دادن</span>
                                @endif
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.99902 0H11.999C14.1208 0 16.1556 0.842855 17.6559 2.34315C19.1562 3.84344 19.999 5.87827 19.999 8C19.999 10.1217 19.1562 12.1566 17.6559 13.6569C16.1556 15.1571 14.1208 16 11.999 16V19.5C6.99902 17.5 -0.000976562 14.5 -0.000976562 8C-0.000976562 5.87827 0.841878 3.84344 2.34217 2.34315C3.84246 0.842855 5.87729 0 7.99902 0ZM9.99902 14H11.999C12.787 14 13.5672 13.8448 14.2951 13.5433C15.0231 13.2417 15.6845 12.7998 16.2417 12.2426C16.7988 11.6855 17.2408 11.0241 17.5423 10.2961C17.8438 9.56815 17.999 8.78793 17.999 8C17.999 7.21207 17.8438 6.43185 17.5423 5.7039C17.2408 4.97595 16.7988 4.31451 16.2417 3.75736C15.6845 3.20021 15.0231 2.75825 14.2951 2.45672C13.5672 2.15519 12.787 2 11.999 2H7.99902C6.40772 2 4.8816 2.63214 3.75638 3.75736C2.63116 4.88258 1.99902 6.4087 1.99902 8C1.99902 11.61 4.46102 13.966 9.99902 16.48V14Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>  --}}
                                    {{--  @if (!($counsel->gender != $user->gender || $counsel->degree != $user->degree || $counsel->star <= $user->comment_log()['av'] || $counsel->answers_count() >= $counsel->answers))  --}}
                                    {{--  @dump($counsel->check_condition($user))  --}}
                                    {{--  @dd($counsel->check_condition($user))  --}}
                                    @if ($counsel->check_condition($user)['pass'])
                                        {{--  @dd(auth()->user()->id != $counsel->user_id)  --}}
                                        @if (true)
                                            <a href="{{ route('counsel.quiz', $counsel->id) }}" class="icon-button green">
                                                @if ($user->answers()->where('counsel_id', $counsel->id)->count())
                                                    <span>ویرایش جواب ها </span>
                                                @else
                                                    <span>پاسخ دادن</span>
                                                @endif
                                                <span class="icon">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.99902 0H11.999C14.1208 0 16.1556 0.842855 17.6559 2.34315C19.1562 3.84344 19.999 5.87827 19.999 8C19.999 10.1217 19.1562 12.1566 17.6559 13.6569C16.1556 15.1571 14.1208 16 11.999 16V19.5C6.99902 17.5 -0.000976562 14.5 -0.000976562 8C-0.000976562 5.87827 0.841878 3.84344 2.34217 2.34315C3.84246 0.842855 5.87729 0 7.99902 0ZM9.99902 14H11.999C12.787 14 13.5672 13.8448 14.2951 13.5433C15.0231 13.2417 15.6845 12.7998 16.2417 12.2426C16.7988 11.6855 17.2408 11.0241 17.5423 10.2961C17.8438 9.56815 17.999 8.78793 17.999 8C17.999 7.21207 17.8438 6.43185 17.5423 5.7039C17.2408 4.97595 16.7988 4.31451 16.2417 3.75736C15.6845 3.20021 15.0231 2.75825 14.2951 2.45672C13.5672 2.15519 12.787 2 11.999 2H7.99902C6.40772 2 4.8816 2.63214 3.75638 3.75736C2.63116 4.88258 1.99902 6.4087 1.99902 8C1.99902 11.61 4.46102 13.966 9.99902 16.48V14Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        @endif
                                    @else
                                        <span class="icon-button green pointer" id="show_modwl_coun">
                                            پاسخ دادن
                                            <span class="icon">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.99902 0H11.999C14.1208 0 16.1556 0.842855 17.6559 2.34315C19.1562 3.84344 19.999 5.87827 19.999 8C19.999 10.1217 19.1562 12.1566 17.6559 13.6569C16.1556 15.1571 14.1208 16 11.999 16V19.5C6.99902 17.5 -0.000976562 14.5 -0.000976562 8C-0.000976562 5.87827 0.841878 3.84344 2.34217 2.34315C3.84246 0.842855 5.87729 0 7.99902 0ZM9.99902 14H11.999C12.787 14 13.5672 13.8448 14.2951 13.5433C15.0231 13.2417 15.6845 12.7998 16.2417 12.2426C16.7988 11.6855 17.2408 11.0241 17.5423 10.2961C17.8438 9.56815 17.999 8.78793 17.999 8C17.999 7.21207 17.8438 6.43185 17.5423 5.7039C17.2408 4.97595 16.7988 4.31451 16.2417 3.75736C15.6845 3.20021 15.0231 2.75825 14.2951 2.45672C13.5672 2.15519 12.787 2 11.999 2H7.99902C6.40772 2 4.8816 2.63214 3.75638 3.75736C2.63116 4.88258 1.99902 6.4087 1.99902 8C1.99902 11.61 4.46102 13.966 9.99902 16.48V14Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </span>
                                    @endif


                                @endauth
                                @if ($counsel->price)
                                    <div class="credit">
                                        <span class="icon">
                                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.5 1C13.0906 0.999802 13.6717 1.14908 14.1892 1.43393C14.7066 1.71879 15.1435 2.12995 15.4592 2.62914C15.7749 3.12832 15.9592 3.69929 15.9948 4.28886C16.0305 4.87843 15.9163 5.46743 15.663 6.001L19 6C19.2652 6 19.5196 6.10536 19.7071 6.2929C19.8946 6.48043 20 6.73479 20 7V11C20 11.2652 19.8946 11.5196 19.7071 11.7071C19.5196 11.8946 19.2652 12 19 12H18V20C18 20.2652 17.8946 20.5196 17.7071 20.7071C17.5196 20.8946 17.2652 21 17 21H3C2.73478 21 2.48043 20.8946 2.29289 20.7071C2.10536 20.5196 2 20.2652 2 20V12H1C0.734784 12 0.48043 11.8946 0.292893 11.7071C0.105357 11.5196 0 11.2652 0 11V7C0 6.73479 0.105357 6.48043 0.292893 6.2929C0.48043 6.10536 0.734784 6 1 6L4.337 6.001C3.98076 5.25268 3.90163 4.40221 4.1137 3.601C4.32577 2.7998 4.81529 2.09985 5.4951 1.62576C6.17491 1.15167 7.0009 0.934199 7.82603 1.01207C8.65116 1.08994 9.42189 1.4581 10.001 2.051C10.326 1.71753 10.7147 1.45268 11.1439 1.27215C11.5732 1.09162 12.0343 0.999076 12.5 1ZM16 12H4V19H16V12ZM18 8H2V10H18V8ZM7.5 3C7.11478 3.00019 6.74441 3.14858 6.46561 3.41441C6.18682 3.68025 6.02099 4.04315 6.00248 4.42792C5.98396 4.81269 6.11419 5.18984 6.36618 5.48121C6.61816 5.77257 6.97258 5.95583 7.356 5.993L7.5 6H9V4.5C8.99998 4.12712 8.86108 3.76761 8.61038 3.49158C8.35968 3.21556 8.01516 3.0428 7.644 3.007L7.5 3ZM12.5 3L12.356 3.007C12.0094 3.04021 11.6851 3.19298 11.4388 3.43911C11.1925 3.68525 11.0395 4.0094 11.006 4.356L11 4.5V6H12.5L12.644 5.993C13.015 5.95703 13.3594 5.7842 13.6099 5.50819C13.8605 5.23218 13.9993 4.87277 13.9993 4.5C13.9993 4.12724 13.8605 3.76783 13.6099 3.49182C13.3594 3.21581 13.015 3.04297 12.644 3.007L12.5 3Z"
                                                    fill="#FD6245"></path>
                                            </svg>
                                        </span>
                                        <span class="num">
                                            {{ number_format($counsel->price) }}
                                        </span>
                                        <span class="un">
                                            تومان
                                        </span>
                                        <span class="txt">
                                            {{ __('arr.' . $counsel->reward) }}
                                        </span>
                                    </div>
                                @endif

                                <div class="view">
                                    <span>
                                        {{ $counsel->viwecounsel_user()->count() }}
                                    </span>
                                    <span class="icon">
                                        <svg width="22" height="18" viewBox="0 0 22 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.0006 0C16.3926 0 20.8786 3.88 21.8196 9C20.8796 14.12 16.3926 18 11.0006 18C5.60864 18 1.12264 14.12 0.181641 9C1.12164 3.88 5.60864 0 11.0006 0ZM11.0006 16C13.0401 15.9996 15.019 15.3068 16.6135 14.0352C18.208 12.7635 19.3235 10.9883 19.7776 9C19.3219 7.0133 18.2056 5.24 16.6113 3.97003C15.017 2.70005 13.0389 2.00853 11.0006 2.00853C8.96234 2.00853 6.98433 2.70005 5.39002 3.97003C3.7957 5.24 2.67941 7.0133 2.22364 9C2.67774 10.9883 3.79331 12.7635 5.38778 14.0352C6.98225 15.3068 8.96117 15.9996 11.0006 16ZM11.0006 13.5C9.80717 13.5 8.66257 13.0259 7.81866 12.182C6.97475 11.3381 6.50064 10.1935 6.50064 9C6.50064 7.80653 6.97475 6.66193 7.81866 5.81802C8.66257 4.97411 9.80717 4.5 11.0006 4.5C12.1941 4.5 13.3387 4.97411 14.1826 5.81802C15.0265 6.66193 15.5006 7.80653 15.5006 9C15.5006 10.1935 15.0265 11.3381 14.1826 12.182C13.3387 13.0259 12.1941 13.5 11.0006 13.5ZM11.0006 11.5C11.6637 11.5 12.2996 11.2366 12.7684 10.7678C13.2372 10.2989 13.5006 9.66304 13.5006 9C13.5006 8.33696 13.2372 7.70107 12.7684 7.23223C12.2996 6.76339 11.6637 6.5 11.0006 6.5C10.3376 6.5 9.70171 6.76339 9.23287 7.23223C8.76403 7.70107 8.50064 8.33696 8.50064 9C8.50064 9.66304 8.76403 10.2989 9.23287 10.7678C9.70171 11.2366 10.3376 11.5 11.0006 11.5Z"
                                                fill="#4F4F4F"></path>
                                        </svg>

                                    </span>
                                </div>
                            </div>

                        </div>


                        <div class="user-messg-keuwords" style="display: block">
                            <h1 class="all_con">
                                شرایط کامل این خرد جمعی

                                (کلیک کنید)
                            </h1>
                            <div class="par_s" style="display: none">
                               <ul>
                                <li>
                                    <h4>شرایط پاسخ دهنده این خرد جمعی :</h4>
                                    <div class="tag-list">

                                        <ul class="cond">
                                            {{--  @dd($counsel->gender)  --}}
                                            <li>
                                                @if ($counsel->gender)
                                                    به این خرید جمعی فقط
                                                    <span class="alert alert-success">{{ __('arr.' . $counsel->gender) }} ها
                                                    </span>
                                                    میتوانند پاسخ دهند
                                                @else
                                                    همه جنسیت ها
                                                @endif
                                            </li>



                                            <li>
                                                @if ($counsel->star)
                                                    حداقل ستاره برای پاسخ دادن به این خردجمعی
                                                    <span class="alert alert-success">{{ $counsel->star }} </span>
                                                    می باشد
                                                @else
                                                    همه ستاره ها
                                                @endif
                                            </li>

                                            <li>
                                                @if ($counsel->degree)
                                                    مدرک مورد نیاز برای پاسخ گویی به این
                                                    خرد جمعی باید
                                                    <span class="alert alert-success">{{ __('arr.' . $counsel->degree) }}
                                                    </span>
                                                    باشد
                                                @else
                                                    همه مدارک
                                                @endif

                                            </li>
                                            @if ($counsel->answers)
                                                <li>
                                                    حداکثر پاسخ دهندگان به این خردجمعی
                                                    <span class="alert alert-success">{{ $counsel->answers }} نفر</span>
                                                    می باشد
                                                </li>
                                            @endif

                                        </ul>

                                    </div>
                                </li>
                                <li>
                                    <div class="rights">
                                        <h4>کلید واژه ها :</h4>
                                        <div class="tag-list">

                                            @foreach ($counsel->tags as $tag)
                                                <a href="{{ route('counsels', ['tag_id', $tag->id]) }}"
                                                    class="single-tag">{{ $tag->tag }} </a>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="lefts">
                                        <button class="share-btn">
                                            <svg width="19" height="22" viewBox="0 0 19 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.1202 16.023L6.92121 13.733C6.373 14.319 5.66119 14.7266 4.87828 14.9028C4.09537 15.0791 3.27756 15.0157 2.53113 14.721C1.7847 14.4263 1.14417 13.9139 0.692774 13.2504C0.241381 12.5869 0 11.803 0 11.0005C0 10.198 0.241381 9.41402 0.692774 8.75051C1.14417 8.08701 1.7847 7.57461 2.53113 7.27992C3.27756 6.98523 4.09537 6.92187 4.87828 7.09807C5.66119 7.27428 6.373 7.6819 6.92121 8.26796L11.1212 5.97796C10.8828 5.03403 10.9968 4.03555 11.4418 3.16966C11.8869 2.30378 12.6325 1.62994 13.5389 1.27446C14.4452 0.918981 15.4501 0.906264 16.3652 1.23869C17.2803 1.57112 18.0427 2.22588 18.5095 3.08022C18.9764 3.93457 19.1156 4.92985 18.9011 5.8795C18.6866 6.82916 18.1332 7.668 17.3444 8.23877C16.5557 8.80954 15.5859 9.07307 14.6168 8.97995C13.6477 8.88684 12.7458 8.44347 12.0802 7.73296L7.88021 10.023C8.04141 10.6643 8.04141 11.3356 7.88021 11.977L12.0792 14.267C12.7448 13.5564 13.6467 13.1131 14.6158 13.02C15.5849 12.9268 16.5547 13.1904 17.3434 13.7611C18.1322 14.3319 18.6856 15.1708 18.9001 16.1204C19.1146 17.0701 18.9754 18.0654 18.5085 18.9197C18.0417 19.774 17.2793 20.4288 16.3642 20.7612C15.4491 21.0937 14.4442 21.0809 13.5379 20.7255C12.6315 20.37 11.8859 19.6961 11.4408 18.8303C10.9958 17.9644 10.8818 16.9659 11.1202 16.022V16.023ZM4.00021 13C4.53064 13 5.03935 12.7892 5.41442 12.4142C5.78949 12.0391 6.00021 11.5304 6.00021 11C6.00021 10.4695 5.78949 9.96082 5.41442 9.58575C5.03935 9.21067 4.53064 8.99996 4.00021 8.99996C3.46977 8.99996 2.96107 9.21067 2.58599 9.58575C2.21092 9.96082 2.00021 10.4695 2.00021 11C2.00021 11.5304 2.21092 12.0391 2.58599 12.4142C2.96107 12.7892 3.46977 13 4.00021 13ZM15.0002 6.99996C15.5306 6.99996 16.0393 6.78925 16.4144 6.41417C16.7895 6.0391 17.0002 5.53039 17.0002 4.99996C17.0002 4.46953 16.7895 3.96082 16.4144 3.58575C16.0393 3.21067 15.5306 2.99996 15.0002 2.99996C14.4698 2.99996 13.9611 3.21067 13.586 3.58575C13.2109 3.96082 13.0002 4.46953 13.0002 4.99996C13.0002 5.53039 13.2109 6.0391 13.586 6.41417C13.9611 6.78925 14.4698 6.99996 15.0002 6.99996ZM15.0002 19C15.5306 19 16.0393 18.7892 16.4144 18.4142C16.7895 18.0391 17.0002 17.5304 17.0002 17C17.0002 16.4695 16.7895 15.9608 16.4144 15.5857C16.0393 15.2107 15.5306 15 15.0002 15C14.4698 15 13.9611 15.2107 13.586 15.5857C13.2109 15.9608 13.0002 16.4695 13.0002 17C13.0002 17.5304 13.2109 18.0391 13.586 18.4142C13.9611 18.7892 14.4698 19 15.0002 19Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </li>
                                <li>
                                    <div class="rights">
                                        <h4>مهارتهای مورد نیاز :</h4>
                                        <div class="tag-list">
                                            @if ($counsel->skills()->count())
                                                {{ implode(' - ', $counsel->skills()->pluck('name')->toArray()) }}
                                            @else
                                                همه مهارت ها
                                            @endif
                                        </div>
                                    </div>
                                    <div class="lefts">
                                        {{--  <button class="share-btn">  --}}
                                    </div>
                                </li>
                                <li></li>
                               </ul>
                            </div>
                            <br>

                        </div>





                        @if ($counsel->show_answer)
                            <div class="user-messg-keuwords">
                                <div class="">
                                    <h4>سوالات  :</h4>
                                    @foreach ($counsel->Counselquestions as $question)
                                        <h5>
                                            {{ $loop->iteration }}-
                                            {{ $question->question }}
                                        </h5>
                                        <ul>
                                            @foreach ($question->answers as $answer)
                                            <h6 class="d-flex ffd" >

                                                <a href="{{ $answer->user->avatar() }}" data-lightbox="roadtrip{{ $answer->user->id }}">
                                                    <img class="avatar" src="{{ $answer->user->avatar() }}" alt="">
                                                    </a>



                                                {{--  <img class="avatar" src="{{$answer->user->avatar()}}" alt="">  --}}
                                               <span class="ti">
                                                <a href="{{route("single.user",$answer->user->id)}}">
                                                    {{ $answer->user->name }}
                                                    {{ $answer->user->family }}
                                                  </a>
                                               </span>
                                            </h6>
                                                @if ($question->type == 'multi')
                                                    <ul>
                                                        @foreach ($counsel->Counselquestions()->whereType('multi')->get() as $question)
                                                            <li style="border-bottom:1px solid red ">
                                                                <h5 class="h5_m">
                                                                    {{ $question->question }}
                                                                </h5>
                                                                @if ($question->type == 'multi')
                                                                    @for ($i = 1; $i <= $question->options(); $i++)
                                                                        @php
                                                                            $one = $counsel
                                                                                ->answers()
                                                                                ->where('question_id', $question->id)
                                                                                ->where('answer', 'a' . $i)
                                                                                ->count();
                                                                            $all = $counsel
                                                                                ->answers()
                                                                                ->whereType('multi')
                                                                                ->where('question_id', $question->id)
                                                                                ->count();
                                                                        @endphp
                                                                        {{-- $all= $counsel->answers()->whereType('multi')->count(); --}}
                                                                        {{-- {{ $question->answers()->where("answer","a.$i")->count() }} --}}
                                                                        {{-- {{ $question->answers()->pluck('id') }} --}}
                                                                        <span class="ans" style="">
                                                                            گزینه {{ $i }} :
                                                                            @if ($one > 0)
                                                                                ({{ ($one * 100) / $all }})
                                                                            @endif
                                                                            %
                                                                        </span>

                                                                        <ul style="margin-bottom:10px">
                                                                            <h5 class="h5_m">
                                                                                پاسخ دهنده گان
                                                                            </h5>
                                                                            @foreach ($counsel->answers()->where('question_id', $question->id)->where('answer', 'a' . $i)->get() as $ua)
                                                                                <li style="display:inline-block">
                                                                                    ({{ $ua->user->name }}
                                                                                    {{ $ua->user->family }})
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endfor
                                                                    {{-- ---- {{ $question->answers()->whereAnswer("$question->answer")->count() }} s---- --}}
                                                                @endif




                                                                {{-- {{ $question->options() }} --}}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <li class="an_li">
                                                        {{ $loop->iteration }}-
                                                        {!! nl2br(e($answer->answer)) !!}

                                                    </li>
                                                @endif


                                                @if ($answer->sound_clip())
                                                    <div class="user-messg-keuwords">
                                                        <div class="rights">
                                                            <h4>  صوت ارسالی متخصص :</h4>
                                                        </div>
                                                        <div>
                                                            <audio class="sound_c" controls>
                                                                <source src="{{ $answer->sound_clip() }}"
                                                                    type="audio/mpeg">
                                                                مرورگر شما از پخش صوت پشتیبانی نمی‌کند.
                                                            </audio>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($answer->video_clip())
                                                    <div class="user-messg-keuwords">
                                                        <div class="rights">
                                                            <h4> ویدئو ارسالی متخصص :</h4>
                                                        </div>
                                                        <div>
                                                            <video class="video_c" width="600" height="200" title="{{$counsel->title}}"
                                                                controls>
                                                                <source src="{{ $answer->video_clip() }}"
                                                                    type="video/mp4">
                                                                مرورگر شما از پخش ویدئو پشتیبانی نمی‌کند.
                                                            </video>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </div>
                                <div class="">

                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>



        </div>
    </div>



    <div style="display: none" class="modal fade " id="quest-modal-no" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title right" id="exampleModalLongTitle">عدم امکان پاسخ گویی برای شما</h5>
                    <span type="button" class="close close_pops" data-dismiss="modal" aria-label="Close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                </div>
                <div class="modal-body">
                    <div class="img">
                        <svg width="180" height="136" viewBox="0 0 180 136" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M68.4977 58.6792H52.952C51.1089 58.6794 49.2883 59.0836 47.6183 59.8635C45.9483 60.6435 44.4697 61.78 43.2865 63.1932C42.1033 64.6064 41.2443 66.2618 40.7701 68.0429C40.2959 69.824 40.218 71.6873 40.5418 73.5018L51.6703 135.329H92.8382L80.9079 69.0583C80.3839 66.148 78.8542 63.5142 76.5859 61.6172C74.3175 59.7201 71.4548 58.6802 68.4977 58.6792Z"
                                fill="white"></path>
                            <path
                                d="M92.8393 135.678H51.6713C51.5935 135.679 51.5177 135.652 51.4575 135.603C51.3974 135.554 51.3566 135.485 51.3426 135.408L40.2142 73.5805C39.8861 71.7196 39.9694 69.8093 40.458 67.9839C40.9467 66.1585 41.829 64.4622 43.0429 63.014C44.2568 61.5658 45.773 60.4008 47.485 59.6008C49.197 58.8009 51.0634 58.3853 52.9531 58.3833H68.4987C71.5332 58.382 74.4714 59.448 76.7991 61.3948C79.1269 63.3415 80.6957 66.045 81.231 69.0319L93.1942 135.29C93.2029 135.337 93.201 135.386 93.1889 135.432C93.1767 135.479 93.1545 135.522 93.1238 135.559C93.093 135.596 93.0546 135.626 93.0111 135.646C92.9676 135.667 92.9202 135.677 92.8721 135.678H92.8393ZM51.9408 135.02H92.4449L80.6131 69.1173C80.0989 66.2823 78.6032 63.7188 76.3881 61.8763C74.173 60.0338 71.3799 59.0299 68.4987 59.0406H52.9531C51.1554 59.0399 49.3795 59.4339 47.7508 60.1949C46.1221 60.9558 44.6803 62.0651 43.5274 63.4444C42.3744 64.8237 41.5384 66.4393 41.0783 68.1771C40.6183 69.9149 40.5454 71.7326 40.865 73.5017L51.9408 135.02Z"
                                fill="#231F20"></path>
                            <path
                                d="M98.5188 97.8227C98.5188 97.8227 99.7545 115.025 100.997 115.439C102.239 115.853 114.847 117.095 114.847 117.095L113.532 123.708C113.532 123.708 89.2111 124.95 87.9951 120.507C86.779 116.063 85.3066 94.5361 85.3066 94.5361L98.5188 97.8227Z"
                                fill="white"></path>
                            <path
                                d="M106.096 124.187C98.7081 124.187 88.5064 123.629 87.6519 120.566C86.4162 116.135 85.0227 95.4296 84.9569 94.5488C84.9513 94.4981 84.9586 94.4468 84.9781 94.3997C84.9977 94.3526 85.0288 94.3111 85.0687 94.2793C85.108 94.2458 85.1546 94.2218 85.2048 94.2092C85.255 94.1967 85.3074 94.1959 85.3579 94.207L98.5963 97.4936C98.6637 97.5094 98.724 97.5469 98.7679 97.6004C98.8119 97.6538 98.837 97.7202 98.8395 97.7894C99.4245 105.842 100.437 114.531 101.134 115.129C102.087 115.445 111.381 116.405 114.878 116.753C114.925 116.757 114.97 116.77 115.011 116.793C115.052 116.815 115.087 116.847 115.115 116.885C115.141 116.922 115.159 116.965 115.168 117.011C115.178 117.056 115.177 117.102 115.167 117.147L113.853 123.76C113.837 123.831 113.8 123.894 113.745 123.942C113.691 123.989 113.622 124.018 113.55 124.023C112.689 124.049 109.731 124.187 106.096 124.187ZM85.6405 94.9563C85.8574 98.072 87.1655 116.378 88.2698 120.388C89.2229 123.786 106.353 123.675 113.248 123.366L114.464 117.358C112.347 117.147 102.06 116.109 100.904 115.721C99.7466 115.333 98.6949 104.593 98.2151 98.0589L85.6405 94.9563Z"
                                fill="#231F20"></path>
                            <path
                                d="M87.0952 72.7725C87.2727 73.1997 94.845 76.9004 98.2697 86.2081C101.694 95.5157 101.839 100.63 101.839 100.63H82.4414L87.0952 72.7725Z"
                                fill="#FFAA35"></path>
                            <path
                                d="M70.6401 71.3856C70.6401 71.3856 63.5345 73.397 62.0949 76.7034C60.6554 80.0097 63.5871 124.51 63.5871 124.51L96.8738 125.542C96.8738 125.542 91.7072 104.245 93.3571 98.6644C95.007 93.0838 93.5674 81.7121 92.943 78.6096C92.3185 75.507 86.12 72.6148 84.056 71.3791C81.992 70.1433 70.6401 71.3856 70.6401 71.3856Z"
                                fill="#FFAA35"></path>
                            <path
                                d="M81.4803 125.431H81.4277C81.3426 125.416 81.2666 125.369 81.2161 125.298C81.1657 125.228 81.1449 125.141 81.1582 125.056C85.5688 97.8625 83.2879 78.5504 83.2617 78.3861C83.2524 78.2999 83.2776 78.2135 83.3318 78.1458C83.386 78.078 83.4647 78.0345 83.5509 78.0246C83.5934 78.0181 83.6367 78.0204 83.6783 78.0313C83.7198 78.0422 83.7587 78.0615 83.7926 78.0879C83.8264 78.1144 83.8545 78.1475 83.8751 78.1852C83.8957 78.2229 83.9084 78.2644 83.9124 78.3072C83.9124 78.4978 86.2327 97.8954 81.809 125.187C81.7887 125.258 81.7455 125.321 81.686 125.365C81.6266 125.409 81.5543 125.432 81.4803 125.431Z"
                                fill="#231F20"></path>
                            <path
                                d="M72.6854 60.2503C72.6131 60.1057 72.5277 59.9019 72.4225 59.593C72.1004 58.7648 71.4431 58.2784 71.0487 57.4699C70.2928 56.004 70.5623 54.6039 70.4834 53.0395C70.3605 51.0804 70.743 49.1225 71.5943 47.3537C71.9185 46.5736 72.4677 45.9077 73.1719 45.4409C73.5274 45.2205 73.9439 45.119 74.361 45.1509C74.7781 45.1828 75.1743 45.3465 75.4922 45.6184C75.3289 45.2162 75.2848 44.7754 75.3652 44.3488C75.4457 43.9222 75.6472 43.5277 75.9458 43.2126C76.5545 42.5934 77.2996 42.1252 78.1215 41.8454C79.3644 41.2849 80.7032 40.9681 82.0654 40.912C82.7494 40.8894 83.4309 41.004 84.0699 41.249C84.7088 41.4939 85.2923 41.8643 85.7858 42.3384C86.7127 43.3046 87.1005 44.6521 87.7578 45.8024C88.4151 46.9527 89.7298 47.9979 91.005 47.6298C92.0435 47.3406 92.6351 46.2626 93.0295 45.2569C93.2862 46.145 93.3203 47.0827 93.1288 47.9872C92.9374 48.8916 92.5263 49.7351 91.9318 50.4431C92.8209 50.1195 93.6221 49.5928 94.2718 48.905C94.253 50.0038 93.8293 51.057 93.0821 51.8629C92.2055 52.6749 91.172 53.299 90.0453 53.6968C89.434 53.9598 88.8424 54.065 88.5992 54.65C88.356 55.235 88.6452 56.0961 88.3954 56.76C87.9934 57.8558 87.3817 58.8628 86.5943 59.7245C85.3312 61.0163 83.6855 61.8668 81.9011 62.15C80.1238 62.4263 78.3112 62.3795 76.5505 62.012C75.6256 61.8745 74.7341 61.567 73.9212 61.1048C73.093 60.6184 72.9615 60.8025 72.6854 60.2503Z"
                                fill="white"></path>
                            <path
                                d="M79.8041 62.7021C78.7011 62.6954 77.6009 62.5876 76.5175 62.38C75.5392 62.2394 74.596 61.916 73.7371 61.4269C73.5274 61.2957 73.3076 61.1814 73.0798 61.0851C72.9207 61.0308 72.7745 60.9445 72.6501 60.8314C72.5257 60.7183 72.4259 60.581 72.3567 60.4278C72.2526 60.214 72.1604 59.9945 72.0806 59.7705C71.8991 59.3692 71.6623 58.9953 71.3773 58.6596C71.1283 58.3565 70.9083 58.0308 70.72 57.6868C70.235 56.6188 70.0335 55.4438 70.135 54.2753C70.135 53.9006 70.135 53.5128 70.135 53.1118C70.0159 51.0958 70.4118 49.0826 71.2853 47.2617C71.6398 46.4242 72.2345 45.7105 72.9943 45.2108C73.2892 45.0383 73.6161 44.9277 73.9552 44.8859C74.2943 44.8441 74.6383 44.8719 74.9663 44.9676C74.9641 44.2621 75.2188 43.5798 75.6827 43.0483C76.3275 42.3886 77.1176 41.8889 77.9899 41.589C79.2824 41.015 80.672 40.6916 82.085 40.6359C82.8113 40.6157 83.5343 40.7408 84.2115 41.0038C84.8888 41.2668 85.5067 41.6624 86.029 42.1675C86.6187 42.8511 87.0938 43.6258 87.4356 44.4615C87.6328 44.8756 87.8366 45.3029 88.0929 45.6973C88.6977 46.7227 89.8546 47.6692 90.9589 47.3734C91.6885 47.1631 92.2735 46.4729 92.7599 45.1977C92.785 45.1321 92.8305 45.0763 92.8897 45.0385C92.9488 45.0006 93.0185 44.9827 93.0886 44.9873C93.1586 44.9888 93.2263 45.0125 93.2818 45.055C93.3374 45.0976 93.3779 45.1568 93.3975 45.224C93.8208 46.7029 93.6633 48.2877 92.9571 49.6543C93.3644 49.3978 93.7377 49.0908 94.068 48.7407C94.1141 48.6897 94.1748 48.6542 94.2419 48.6389C94.3089 48.6236 94.379 48.6293 94.4427 48.6552C94.5044 48.6819 94.5572 48.7258 94.5945 48.7818C94.6318 48.8378 94.6522 48.9034 94.653 48.9707C94.6414 50.1554 94.1864 51.2928 93.3778 52.1587C92.4693 53.0054 91.3981 53.6584 90.2292 54.0781L89.8414 54.2293C89.3616 54.4133 89.0855 54.5251 88.954 54.8406C88.8705 55.1352 88.8459 55.4435 88.8817 55.7477C88.9217 56.1508 88.8792 56.5578 88.7568 56.944C88.3417 58.0816 87.7074 59.1268 86.8901 60.0203C85.5751 61.3651 83.8631 62.2522 82.0062 62.5509C81.2781 62.6666 80.5412 62.7172 79.8041 62.7021ZM72.9877 60.0729C73.106 60.3161 73.1389 60.3292 73.3887 60.441C73.636 60.5514 73.8754 60.6788 74.1052 60.8222C74.8931 61.2681 75.7586 61.5603 76.6556 61.6833C78.3725 62.0456 80.141 62.0923 81.8747 61.8213C83.588 61.5524 85.1691 60.7388 86.3839 59.501C87.1424 58.672 87.7319 57.703 88.1192 56.6482C88.2019 56.3422 88.2264 56.0233 88.1915 55.7082C88.1494 55.309 88.1943 54.9053 88.323 54.5251C88.4488 54.2755 88.6284 54.057 88.849 53.8853C89.0695 53.7137 89.3254 53.5932 89.5982 53.5325L89.9532 53.3945C91.0343 53.008 92.0284 52.4115 92.8782 51.6394C93.3465 51.1288 93.6808 50.51 93.8511 49.8384C93.3165 50.2621 92.7172 50.5973 92.0763 50.8309C92.0051 50.8568 91.9273 50.8583 91.8552 50.8352C91.7831 50.8121 91.7206 50.7656 91.6778 50.7032C91.6349 50.6407 91.6139 50.5658 91.6183 50.4902C91.6226 50.4146 91.6519 50.3425 91.7016 50.2853C92.6024 49.2087 93.0397 47.8188 92.9177 46.4203C92.7399 46.7933 92.4896 47.1272 92.1816 47.4025C91.8735 47.6779 91.5137 47.8892 91.1232 48.0242C89.6705 48.4383 88.2507 47.3274 87.4882 46.0522C87.2384 45.6315 87.0347 45.1846 86.8309 44.7376C86.5095 43.9679 86.0655 43.2553 85.5163 42.6276C85.0569 42.1888 84.5143 41.8464 83.9205 41.6206C83.3266 41.3948 82.6936 41.2902 82.0587 41.3129C80.7362 41.3705 79.4363 41.676 78.2266 42.2135C77.4501 42.4864 76.748 42.9365 76.1757 43.5281C75.9261 43.7955 75.7557 44.1271 75.6838 44.4858C75.6118 44.8445 75.641 45.2162 75.7682 45.5592C75.8051 45.6312 75.8148 45.714 75.7955 45.7925C75.7762 45.871 75.7291 45.9399 75.663 45.9865C75.5964 46.0319 75.5161 46.0528 75.4358 46.0456C75.3554 46.0384 75.2801 46.0036 75.2226 45.947C74.9591 45.7265 74.6319 45.5961 74.2889 45.5748C73.946 45.5535 73.6052 45.6425 73.3164 45.8287C72.668 46.2581 72.1658 46.8749 71.8769 47.5969C71.0793 49.2997 70.7244 51.1762 70.8449 53.0527C70.8449 53.4602 70.8449 53.8612 70.8449 54.2556C70.7535 55.3142 70.9298 56.3789 71.3576 57.3515C71.5257 57.6595 71.7239 57.9502 71.9492 58.2192C72.2764 58.6046 72.5445 59.0366 72.7445 59.501C72.8497 59.7705 72.9286 59.9611 72.9943 60.0991L72.9877 60.0729Z"
                                fill="#231F20"></path>
                            <path
                                d="M86.0892 68.7888L86.7466 73.0483C86.7466 73.0483 86.0892 79.2402 81.396 78.1556C79.9821 77.7989 78.6623 77.14 77.5276 76.2243C76.3928 75.3085 75.47 74.1577 74.8228 72.8511L74.2246 61.6043C74.2246 61.6043 77.669 59.7244 76.5844 52.2178C80.4297 53.8259 84.6377 54.3664 88.7645 53.7822C88.7645 53.7822 90.4341 61.5189 89.9017 65.1407C89.8193 66.1087 89.3865 67.0133 88.6846 67.685C87.9827 68.3566 87.0599 68.7491 86.0892 68.7888Z"
                                fill="white"></path>
                            <path
                                d="M82.4531 78.622C82.07 78.6196 81.6885 78.5732 81.3159 78.484C79.8543 78.1165 78.4908 77.4336 77.3212 76.4831C76.1516 75.5327 75.2042 74.3377 74.5455 72.9822C74.5381 72.9431 74.5381 72.903 74.5455 72.8639L73.9539 61.6237C73.9494 61.5595 73.9638 61.4954 73.9953 61.4393C74.0269 61.3832 74.0742 61.3376 74.1314 61.3082C74.1314 61.3082 77.3457 59.4085 76.3137 52.2635C76.304 52.2022 76.3118 52.1395 76.3362 52.0825C76.3607 52.0255 76.4007 51.9766 76.4518 51.9414C76.5035 51.9107 76.5625 51.8945 76.6227 51.8945C76.6828 51.8945 76.7418 51.9107 76.7936 51.9414C80.571 53.51 84.6982 54.0432 88.7502 53.4861C88.8361 53.4743 88.9232 53.4955 88.994 53.5456C89.0648 53.5956 89.1139 53.6707 89.1315 53.7556C89.1972 54.0711 90.8011 61.5843 90.2686 65.2258C90.1807 66.2059 89.7607 67.1266 89.0782 67.8355C88.3956 68.5443 87.4914 68.9988 86.5153 69.1237L87.1135 73.0282C87.12 73.0563 87.12 73.0855 87.1135 73.1136C87.1135 73.2517 86.7257 76.512 84.6748 77.9712C84.0221 78.4185 83.244 78.6464 82.4531 78.622ZM75.2226 72.7653C75.8522 74.0049 76.738 75.0965 77.8213 75.968C78.9047 76.8394 80.1608 77.4707 81.5066 77.8201C81.9723 77.9571 82.4625 77.9893 82.9422 77.9143C83.4218 77.8392 83.8788 77.6589 84.2804 77.3862C85.9698 76.1833 86.3904 73.4423 86.4365 73.0479L85.7791 68.8411C85.7716 68.7931 85.7747 68.7441 85.7883 68.6975C85.802 68.6509 85.8258 68.6079 85.858 68.5716C85.8901 68.535 85.9295 68.5056 85.9737 68.4853C86.0178 68.4649 86.0658 68.454 86.1144 68.4533C87.0036 68.4129 87.8475 68.0493 88.4877 67.4309C89.128 66.8125 89.5205 65.9816 89.5916 65.0943C90.0517 61.9786 88.8225 55.6289 88.5202 54.1697C84.6414 54.6502 80.704 54.167 77.0565 52.763C77.7993 59.0404 75.3475 61.2687 74.631 61.7814L75.2226 72.7653Z"
                                fill="#231F20"></path>
                            <path
                                d="M83.6899 58.3179C83.6899 58.3179 85.9116 62.3933 85.2412 63.0046C84.5707 63.6159 82.8945 63.0046 82.8945 63.0046"
                                fill="white"></path>
                            <path
                                d="M84.3073 63.6424C83.7894 63.6297 83.2768 63.5343 82.7889 63.3597C82.7074 63.3313 82.6403 63.2719 82.6021 63.1944C82.564 63.117 82.5579 63.0276 82.5852 62.9456C82.615 62.8636 82.6756 62.7964 82.7541 62.7583C82.8327 62.7203 82.923 62.7143 83.0058 62.7418C83.5843 62.9456 84.636 63.1428 85.0172 62.7944C85.2276 62.4789 84.4717 60.4741 83.4002 58.5087C83.3584 58.432 83.3487 58.3418 83.3734 58.258C83.3981 58.1742 83.455 58.1036 83.5317 58.0617C83.6084 58.0199 83.6986 58.0102 83.7824 58.0349C83.8662 58.0595 83.9368 58.1165 83.9787 58.1932C84.8529 59.8036 86.2136 62.5972 85.4642 63.2808C85.1369 63.5409 84.7245 63.6697 84.3073 63.6424Z"
                                fill="#231F20"></path>
                            <path
                                d="M81.5267 58.6232C81.7806 58.6125 81.9666 58.1334 81.9422 57.5531C81.9177 56.9728 81.6921 56.511 81.4382 56.5217C81.1843 56.5324 80.9983 57.0115 81.0227 57.5918C81.0472 58.1721 81.2728 58.6339 81.5267 58.6232Z"
                                fill="#231F20"></path>
                            <path
                                d="M87.4056 58.8609C87.6597 58.8507 87.8469 58.3716 87.8236 57.7908C87.8004 57.2099 87.5756 56.7473 87.3215 56.7575C87.0673 56.7676 86.8802 57.2468 86.9034 57.8276C86.9266 58.4084 87.1515 58.8711 87.4056 58.8609Z"
                                fill="#231F20"></path>
                            <path
                                d="M77.2606 59.6975C76.8459 58.9907 76.2992 58.3703 75.6501 57.8701C75.3158 57.5745 74.8976 57.3907 74.4538 57.3443C74.0878 57.3428 73.7292 57.4478 73.4218 57.6466C72.9613 57.9174 72.5629 58.2821 72.2526 58.7169C71.9423 59.1518 71.727 59.6472 71.6208 60.1707C71.5185 60.6567 71.5388 61.1604 71.6799 61.6366C71.9454 62.3727 72.4591 62.9933 73.1326 63.3916C73.8045 63.7797 74.5192 64.0885 75.2623 64.3119"
                                fill="white"></path>
                            <path
                                d="M75.2613 64.6214C75.2265 64.6279 75.1909 64.6279 75.1561 64.6214C74.3859 64.3834 73.6467 64.0546 72.9541 63.642C72.2094 63.2029 71.6419 62.5168 71.3502 61.7029C71.1979 61.1725 71.1776 60.6129 71.2911 60.0728C71.4086 59.5012 71.6449 58.9607 71.9846 58.4863C72.3243 58.0119 72.7598 57.614 73.263 57.3186C73.6248 57.0897 74.0444 56.9688 74.4725 56.9702C74.987 57.0233 75.4731 57.232 75.866 57.5684C76.5482 58.0952 77.1219 58.7493 77.5553 59.4943C77.5872 59.5707 77.5903 59.6561 77.564 59.7346C77.5377 59.8131 77.4838 59.8794 77.4123 59.9211C77.3409 59.9629 77.2566 59.9773 77.1754 59.9617C77.0941 59.946 77.0212 59.9014 76.9703 59.8361C76.5763 59.1702 76.0587 58.5856 75.4453 58.114C75.1631 57.8642 74.8131 57.7041 74.4396 57.6538C74.1376 57.6581 73.8432 57.7494 73.5917 57.9168C73.1731 58.1628 72.811 58.4942 72.529 58.8895C72.247 59.2847 72.0514 59.7349 71.955 60.2108C71.8615 60.6461 71.8773 61.0978 72.001 61.5255C72.2439 62.184 72.7088 62.7372 73.3156 63.0899C73.9655 63.4629 74.6557 63.7606 75.373 63.9773C75.4158 63.9913 75.4553 64.0138 75.4891 64.0434C75.523 64.073 75.5506 64.1091 75.5702 64.1495C75.5898 64.19 75.6011 64.2341 75.6034 64.279C75.6056 64.3239 75.5988 64.3688 75.5834 64.4111C75.5578 64.475 75.5131 64.5294 75.4555 64.5671C75.3979 64.6047 75.3301 64.6237 75.2613 64.6214Z"
                                fill="#231F20"></path>
                            <path
                                d="M86.0886 68.7888C83.3993 69.1957 80.6502 68.7352 78.2402 67.4741C78.2402 67.4741 82.2433 73.6266 86.7065 72.7327L86.0886 68.7888Z"
                                fill="#231F20"></path>
                            <path
                                d="M85.8255 73.1932C81.6055 73.1932 78.1217 67.9347 77.9376 67.6783C77.8944 67.6204 77.8711 67.5501 77.8711 67.4779C77.8711 67.4056 77.8944 67.3353 77.9376 67.2774C77.9851 67.224 78.049 67.188 78.1192 67.1749C78.1894 67.1618 78.262 67.1724 78.3255 67.2051C80.6743 68.422 83.3481 68.8638 85.9635 68.4671C86.0525 68.452 86.144 68.4708 86.2199 68.5197C86.2568 68.5457 86.288 68.579 86.3117 68.6174C86.3354 68.6558 86.3511 68.6986 86.3579 68.7432L86.9692 72.7331C86.981 72.8173 86.9605 72.9028 86.9117 72.9723C86.8628 73.0419 86.7894 73.0903 86.7063 73.1078C86.4157 73.1617 86.121 73.1903 85.8255 73.1932ZM79.2523 68.3159C80.5669 69.9198 83.3342 72.858 86.3316 72.5096L85.8189 69.1705C83.593 69.4471 81.3333 69.153 79.2523 68.3159Z"
                                fill="#231F20"></path>
                            <path
                                d="M80.1534 61.3546C79.4055 61.3559 78.6742 61.1353 78.0517 60.7208C77.4293 60.3063 76.9439 59.7165 76.6568 59.0259C76.3697 58.3354 76.2939 57.5753 76.439 56.8417C76.5841 56.1081 76.9436 55.434 77.4719 54.9048C78.0002 54.3755 78.6737 54.0149 79.407 53.8685C80.1403 53.7221 80.9006 53.7966 81.5916 54.0825C82.2827 54.3684 82.8733 54.8528 83.2889 55.4745C83.7045 56.0962 83.9264 56.8272 83.9264 57.575C83.9264 58.5763 83.5291 59.5366 82.8217 60.2453C82.1143 60.9539 81.1546 61.3529 80.1534 61.3546ZM80.1534 54.479C79.5392 54.4777 78.9384 54.6587 78.4272 54.9991C77.916 55.3396 77.5173 55.8241 77.2817 56.3912C77.046 56.9584 76.984 57.5828 77.1035 58.1852C77.223 58.7877 77.5187 59.3411 77.953 59.7754C78.3872 60.2097 78.9407 60.5053 79.5431 60.6248C80.1456 60.7443 80.7699 60.6823 81.3371 60.4467C81.9043 60.2111 82.3888 59.8124 82.7292 59.3011C83.0696 58.7899 83.2506 58.1892 83.2493 57.575C83.2476 56.7544 82.9209 55.968 82.3406 55.3877C81.7604 54.8075 80.9739 54.4808 80.1534 54.479Z"
                                fill="#231F20"></path>
                            <path
                                d="M87.5667 61.3546C86.8192 61.3546 86.0884 61.1329 85.4669 60.7176C84.8453 60.3023 84.3609 59.712 84.0748 59.0214C83.7887 58.3308 83.7139 57.5708 83.8597 56.8376C84.0056 56.1045 84.3655 55.431 84.8941 54.9024C85.4227 54.3738 86.0962 54.0139 86.8293 53.868C87.5625 53.7222 88.3225 53.797 89.0131 54.0831C89.7037 54.3692 90.294 54.8536 90.7093 55.4752C91.1246 56.0967 91.3463 56.8275 91.3463 57.575C91.3463 58.5774 90.9481 59.5388 90.2393 60.2476C89.5305 60.9564 88.5691 61.3546 87.5667 61.3546ZM87.5667 54.479C86.9525 54.4777 86.3518 54.6587 85.8405 54.9992C85.3293 55.3396 84.9306 55.8241 84.695 56.3913C84.4594 56.9584 84.3974 57.5828 84.5169 58.1852C84.6364 58.7877 84.932 59.3411 85.3663 59.7754C85.8006 60.2097 86.354 60.5053 86.9565 60.6248C87.5589 60.7443 88.1833 60.6823 88.7505 60.4467C89.3176 60.2111 89.8021 59.8124 90.1425 59.3012C90.483 58.7899 90.664 58.1892 90.6627 57.575C90.6609 56.7544 90.3342 55.968 89.754 55.3877C89.1737 54.8075 88.3873 54.4808 87.5667 54.479Z"
                                fill="#231F20"></path>
                            <path
                                d="M84.128 65.2458L82.1561 64.2861C82.1561 64.2861 81.6434 65.9163 82.465 66.2581C83.2867 66.5999 84.128 65.2458 84.128 65.2458Z"
                                fill="#231F20"></path>
                            <path
                                d="M82.7228 66.6526C82.5805 66.6515 82.4398 66.6225 82.3087 66.5671C81.2438 66.1201 81.7565 64.3848 81.8157 64.1876C81.8313 64.1431 81.8556 64.1022 81.8872 64.0672C81.9188 64.0322 81.957 64.0039 81.9997 63.9838C82.0431 63.9642 82.0902 63.9541 82.1378 63.9541C82.1854 63.9541 82.2324 63.9642 82.2758 63.9838L84.2478 64.9435C84.2898 64.9641 84.3269 64.9935 84.3564 65.0298C84.3859 65.0662 84.4072 65.1085 84.4187 65.1539C84.4364 65.1954 84.4455 65.2401 84.4455 65.2853C84.4455 65.3305 84.4364 65.3752 84.4187 65.4168C84.3201 65.568 83.597 66.6526 82.7228 66.6526ZM82.3547 64.7595C82.2692 65.2262 82.2495 65.8309 82.565 65.9624C82.8805 66.0938 83.3472 65.706 83.6299 65.3708L82.3547 64.7595Z"
                                fill="#231F20"></path>
                            <path
                                d="M57.7842 97.4211C57.7842 97.4211 54.6817 121.742 56.3907 123.714C58.0997 125.686 88.8755 121.275 92.1358 121.118C95.3961 120.96 101.825 122.938 101.667 119.527C101.509 116.115 93.2401 115.859 91.0709 116.944C88.9018 118.028 67.7098 116.286 67.7098 116.286L68.3276 97.4146L57.7842 97.4211Z"
                                fill="white"></path>
                            <path
                                d="M60.0315 124.588C57.8295 124.588 56.5082 124.385 56.1336 123.931C54.3851 121.867 57.1393 99.8666 57.4482 97.3688C57.4592 97.2892 57.4985 97.2162 57.5588 97.1631C57.6191 97.1101 57.6965 97.0804 57.7769 97.0796H68.294C68.3828 97.0798 68.4679 97.1153 68.5306 97.1782C68.5617 97.2103 68.5859 97.2485 68.6017 97.2903C68.6175 97.3321 68.6247 97.3767 68.6227 97.4214L68.0114 115.978C74.1047 116.471 89.2099 117.496 90.8927 116.635C92.5754 115.774 97.7682 115.701 100.391 117.233C100.827 117.442 101.202 117.761 101.478 118.158C101.753 118.556 101.92 119.019 101.962 119.501C101.99 119.792 101.952 120.086 101.852 120.361C101.752 120.637 101.592 120.886 101.384 121.091C100.259 122.156 97.7354 121.887 95.2901 121.631C94.2376 121.492 93.1768 121.426 92.1153 121.433C91.3199 121.473 88.7695 121.782 85.5421 122.17C73.4737 123.668 64.7445 124.588 60.0315 124.588ZM58.0595 97.7501C56.8303 107.465 55.4302 122.137 56.6266 123.524C57.8229 124.911 77.2007 122.551 85.4829 121.552C88.855 121.144 91.2871 120.848 92.1021 120.809C93.2011 120.8 94.2993 120.868 95.3887 121.013C97.5776 121.243 100.056 121.499 100.963 120.645C101.102 120.503 101.207 120.332 101.271 120.144C101.335 119.957 101.355 119.757 101.331 119.56C101.292 119.189 101.156 118.834 100.937 118.532C100.718 118.229 100.423 117.99 100.082 117.838C97.7485 116.464 92.7726 116.477 91.2148 117.259C89.0193 118.35 69.8518 116.799 67.6761 116.602C67.5918 116.597 67.5129 116.559 67.4564 116.496C67.3998 116.434 67.3702 116.351 67.3738 116.267L67.9785 97.7369L58.0595 97.7501Z"
                                fill="#231F20"></path>
                            <path
                                d="M65.7309 74.685C65.5732 74.7836 62.911 75.5263 62.773 75.6841C60.2423 78.4251 58.8291 80.3445 57.7839 83.8809C56.4215 88.7855 55.6405 93.8333 55.457 98.9204C55.457 98.9204 65.8493 102.647 70.3453 100.452C70.3453 100.452 72.9746 81.8432 70.3453 76.7292C69.3988 74.9085 67.9133 73.2586 65.7309 74.685Z"
                                fill="#FFAA35"></path>
                            <path
                                d="M70.6805 98.1248H70.6082C70.566 98.1162 70.526 98.0993 70.4905 98.0751C70.455 98.0508 70.4248 98.0197 70.4015 97.9836C70.3782 97.9474 70.3624 97.907 70.355 97.8646C70.3476 97.8223 70.3487 97.7789 70.3584 97.737C70.3978 97.5529 74.2497 79.6015 69.4841 75.9468C69.4169 75.8925 69.3731 75.8144 69.3621 75.7286C69.3511 75.6429 69.3736 75.5562 69.425 75.4867C69.4782 75.418 69.5566 75.3731 69.6428 75.3621C69.7291 75.351 69.8162 75.3745 69.8851 75.4275C74.9793 79.332 71.1669 97.1191 71.0025 97.875C70.9848 97.9468 70.9433 98.0105 70.8849 98.0559C70.8265 98.1012 70.7544 98.1255 70.6805 98.1248Z"
                                fill="#231F20"></path>
                            <path
                                d="M122.62 19.5287C122.616 23.7272 121.235 27.8085 118.688 31.1462C116.141 34.484 112.569 36.8938 108.521 38.006C108.31 45.4403 101.639 50.666 101.218 50.9881C104.991 46.4263 105.346 41.9171 104.82 38.6239C104.367 38.6633 103.913 38.6831 103.453 38.6831H88.7026C83.6191 38.6831 78.7438 36.6636 75.1492 33.069C71.5546 29.4744 69.5352 24.5991 69.5352 19.5156C69.5352 14.4321 71.5546 9.55676 75.1492 5.96216C78.7438 2.36757 83.6191 0.348145 88.7026 0.348145H103.453C105.971 0.348144 108.465 0.84436 110.791 1.80844C113.117 2.77251 115.231 4.18555 117.011 5.96681C118.791 7.74807 120.203 9.86262 121.165 12.1896C122.128 14.5167 122.622 17.0105 122.62 19.5287Z"
                                fill="white"></path>
                            <path
                                d="M101.219 51.3236C101.156 51.3243 101.094 51.307 101.041 51.2738C100.987 51.2406 100.945 51.1928 100.918 51.1361C100.891 51.0794 100.881 51.0162 100.889 50.9539C100.896 50.8916 100.922 50.8328 100.962 50.7846C104.63 46.3542 104.959 41.9699 104.545 38.9528C104.176 38.9528 103.822 38.9922 103.453 38.9922H88.7031C83.5325 38.9922 78.5735 36.9382 74.9173 33.282C71.2611 29.6257 69.207 24.6668 69.207 19.4961C69.207 14.3254 71.2611 9.36652 74.9173 5.71028C78.5735 2.05405 83.5325 4.91916e-06 88.7031 4.91916e-06H103.453C108.155 -0.00333331 112.699 1.69247 116.25 4.775C119.8 7.85754 122.116 12.1191 122.773 16.7747C123.429 21.4303 122.381 26.1662 119.821 30.11C117.261 34.0538 113.363 36.9398 108.843 38.2363C108.482 45.7692 101.705 51.0081 101.416 51.2315C101.363 51.2842 101.293 51.3167 101.219 51.3236ZM104.821 38.3021C104.899 38.3024 104.975 38.3302 105.035 38.3806C105.095 38.431 105.135 38.5009 105.149 38.5781C105.71 42.0637 105.033 45.6357 103.236 48.6746C105.294 46.4857 108.061 42.6864 108.193 37.9997C108.195 37.9297 108.22 37.8623 108.264 37.8078C108.308 37.7532 108.368 37.7144 108.436 37.6973C112.831 36.4864 116.638 33.7236 119.151 29.9207C121.665 26.1178 122.715 21.5327 122.107 17.0148C121.499 12.497 119.274 8.35276 115.844 5.34994C112.414 2.34712 108.012 0.689286 103.453 0.683619H88.7031C86.2292 0.683619 83.7795 1.1709 81.4939 2.11764C79.2082 3.06437 77.1315 4.45203 75.3821 6.20137C73.6328 7.95072 72.2451 10.0275 71.2984 12.3131C70.3516 14.5987 69.8644 17.0485 69.8644 19.5224C69.8644 21.9964 70.3516 24.4461 71.2984 26.7317C72.2451 29.0173 73.6328 31.0941 75.3821 32.8435C77.1315 34.5928 79.2082 35.9805 81.4939 36.9272C83.7795 37.8739 86.2292 38.3612 88.7031 38.3612H103.453C103.907 38.3612 104.347 38.3612 104.768 38.3021H104.821Z"
                                fill="#231F20"></path>
                            <path d="M87.8323 124.615H132.793V121.782H87.8323V124.615Z" fill="white"></path>
                            <path
                                d="M132.793 124.937H87.8326C87.7454 124.937 87.6618 124.902 87.6002 124.84C87.5385 124.779 87.5039 124.695 87.5039 124.608V121.775C87.5056 121.688 87.5408 121.606 87.602 121.544C87.6633 121.483 87.7459 121.448 87.8326 121.446H132.793C132.88 121.448 132.963 121.483 133.024 121.544C133.085 121.606 133.12 121.688 133.122 121.775V124.608C133.122 124.695 133.087 124.779 133.026 124.84C132.964 124.902 132.88 124.937 132.793 124.937ZM88.1612 124.279H132.465V122.077H88.1612V124.279Z"
                                fill="#231F20"></path>
                            <path d="M111.435 95.6201H139.122L132.614 121.834H104.928L111.435 95.6201Z" fill="white">
                            </path>
                            <path
                                d="M132.613 122.163H104.927C104.876 122.162 104.826 122.149 104.781 122.127C104.735 122.104 104.695 122.071 104.664 122.031C104.636 121.992 104.616 121.947 104.605 121.9C104.595 121.852 104.595 121.803 104.605 121.755L111.119 95.5413C111.135 95.47 111.176 95.4065 111.233 95.3611C111.29 95.3157 111.361 95.2911 111.435 95.2915H139.121C139.17 95.2912 139.219 95.3024 139.264 95.324C139.308 95.3457 139.347 95.3773 139.377 95.4164C139.409 95.4554 139.431 95.5014 139.441 95.5506C139.451 95.5997 139.45 95.6506 139.436 95.699L132.929 121.913C132.913 121.984 132.872 122.048 132.815 122.093C132.758 122.139 132.687 122.163 132.613 122.163ZM105.348 121.505H132.357L138.7 95.9488H111.665L105.348 121.505Z"
                                fill="#231F20"></path>
                            <path d="M178.942 124.608H0.328125V128.776H178.942V124.608Z" fill="white"></path>
                            <path
                                d="M178.942 129.105H0.32866C0.242021 129.103 0.159399 129.068 0.0981239 129.006C0.0368491 128.945 0.00168279 128.862 0 128.776V124.608C0.00168279 124.522 0.0368491 124.439 0.0981239 124.378C0.159399 124.317 0.242021 124.281 0.32866 124.28H178.942C179.029 124.28 179.113 124.314 179.175 124.376C179.236 124.438 179.271 124.521 179.271 124.608V128.776C179.271 128.863 179.236 128.947 179.175 129.008C179.113 129.07 179.029 129.105 178.942 129.105ZM0.65732 128.447H178.614V124.937H0.65732V128.447Z"
                                fill="#231F20"></path>
                            <path d="M175.006 128.775H4.27344V135.335H175.006V128.775Z" fill="white"></path>
                            <path
                                d="M174.846 135.664H4.11382C4.02665 135.664 3.94305 135.629 3.88142 135.567C3.81978 135.506 3.78516 135.422 3.78516 135.335V128.762C3.78516 128.675 3.81978 128.591 3.88142 128.529C3.94305 128.468 4.02665 128.433 4.11382 128.433H174.846C174.933 128.433 175.017 128.468 175.079 128.529C175.14 128.591 175.175 128.675 175.175 128.762V135.335C175.175 135.422 175.14 135.506 175.079 135.567C175.017 135.629 174.933 135.664 174.846 135.664ZM4.44248 135.006H174.518V129.09H4.44248V135.006Z"
                                fill="#231F20"></path>
                        </svg>

                    </div>
                    @auth


                    <p>
                        شما شرایط زیر را برای پاسخ گویی به سوال ندارید
                        <br>
                        @if (!$counsel->check_condition($user)['gender'])
                            جنسیت هماهنگ نمی باشد
                            <br>
                        @endif

                        @if (!$counsel->check_condition($user)['degree'])
                            مدرک هماهنگ نمی باشد
                            <br>
                        @endif

                        @if (!$counsel->check_condition($user)['star'])
                            ستاره ها هماهنگ نمی باشد
                            <br>
                        @endif


                        @if (!$counsel->check_condition($user)['skill'])
                       مهارت شما با مهارتهای مورد نیاز این خرد جمعی  هماهنگ نمی باشد
                        <br>
                        مهارت های شما:
                        @if($user)
                        {{ implode(' - ', $user->skills()->pluck('name')->toArray()) }}

                        @endif
                        مهارت مورد نیاز :
                        <br>
                        @if ($counsel->skills()->count())
                                                {{ implode(' - ', $counsel->skills()->pluck('name')->toArray()) }}
                                            @else
                                                همه مهارت ها
                                            @endif
                    @endif




                        @if (!$counsel->check_condition($user)['answer'])
                            تعداد جواب دهنده ها بیشتراز ظرفیت تعریف شده می باشد
                            <br>
                        @endif
                    </p>

                    @endauth

                    <div class="pair-button">
                        <button class="mid-button close_pops">
                            انصراف
                        </button>
                        <button class="mid-button close_pops icon-button yellow">
                            مطالعه راهنما
                            <span class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM9 13H11V15H9V13ZM11 11.355V12H9V10.5C9 10.2348 9.10536 9.98043 9.29289 9.79289C9.48043 9.60536 9.73478 9.5 10 9.5C10.2841 9.49998 10.5623 9.4193 10.8023 9.26733C11.0423 9.11536 11.2343 8.89837 11.3558 8.64158C11.4773 8.3848 11.5234 8.0988 11.4887 7.81684C11.454 7.53489 11.34 7.26858 11.1598 7.04891C10.9797 6.82924 10.7409 6.66523 10.4712 6.57597C10.2015 6.48671 9.91204 6.47587 9.63643 6.54471C9.36081 6.61354 9.11042 6.75923 8.91437 6.96482C8.71832 7.1704 8.58468 7.42743 8.529 7.706L6.567 7.313C6.68863 6.70508 6.96951 6.14037 7.38092 5.67659C7.79233 5.2128 8.31952 4.86658 8.90859 4.67332C9.49766 4.48006 10.1275 4.44669 10.7337 4.57661C11.3399 4.70654 11.9007 4.99511 12.3588 5.41282C12.8169 5.83054 13.1559 6.36241 13.3411 6.95406C13.5263 7.54572 13.5511 8.17594 13.4129 8.78031C13.2747 9.38467 12.9785 9.9415 12.5545 10.3939C12.1306 10.8462 11.5941 11.1779 11 11.355Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>

                        </button>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
