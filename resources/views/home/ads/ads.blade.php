@extends('main.site')
@section('content')
    <div id="ids_li"></div>
    <div class="container">
        @if (request('vip'))
            <h1>
                آگهی های Vip
            </h1>
        @endif
        <div class="row">
            @include('home.ads.ads_sidebar')
            <div class="main-cats-nav d-flex d-xl-none">
                <a href="{{ route("baladchiha") }}" class="main-cat-nav">
                    <span class="icon">
                        <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 21C0 18.8783 0.842855 16.8434 2.34315 15.3431C3.84344 13.8429 5.87827 13 8 13C10.1217 13 12.1566 13.8429 13.6569 15.3431C15.1571 16.8434 16 18.8783 16 21H0ZM9 15.083V19H13.659C13.3015 17.9914 12.6812 17.0966 11.8621 16.408C11.0431 15.7193 10.055 15.2619 9 15.083ZM7 19V15.083C5.945 15.2619 4.95691 15.7193 4.13785 16.408C3.31879 17.0966 2.69847 17.9914 2.341 19H7ZM8 12C4.685 12 2 9.315 2 6C2 2.685 4.685 0 8 0C11.315 0 14 2.685 14 6C14 9.315 11.315 12 8 12ZM8 10C10.21 10 12 8.21 12 6C12 3.79 10.21 2 8 2C5.79 2 4 3.79 4 6C4 8.21 5.79 10 8 10Z" fill="#FD6245"></path>
                        </svg>
                    </span>
                    <span>بلدچی ها</span>
                </a>
                <a  href="{{ route("counsels") }}" class="main-cat-nav">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM9 13H11V15H9V13ZM11 11.355V12H9V10.5C9 10.2348 9.10536 9.98043 9.29289 9.79289C9.48043 9.60536 9.73478 9.5 10 9.5C10.2841 9.49998 10.5623 9.4193 10.8023 9.26733C11.0423 9.11536 11.2343 8.89837 11.3558 8.64158C11.4773 8.3848 11.5234 8.0988 11.4887 7.81684C11.454 7.53489 11.34 7.26858 11.1598 7.04891C10.9797 6.82924 10.7409 6.66523 10.4712 6.57597C10.2015 6.48671 9.91204 6.47587 9.63643 6.54471C9.36081 6.61354 9.11042 6.75923 8.91437 6.96482C8.71832 7.1704 8.58468 7.42743 8.529 7.706L6.567 7.313C6.68863 6.70508 6.96951 6.14037 7.38092 5.67659C7.79233 5.2128 8.31952 4.86658 8.90859 4.67332C9.49766 4.48006 10.1275 4.44669 10.7337 4.57661C11.3399 4.70654 11.9007 4.99511 12.3588 5.41282C12.8169 5.83054 13.1559 6.36241 13.3411 6.95406C13.5263 7.54572 13.5511 8.17594 13.4129 8.78031C13.2747 9.38467 12.9785 9.9415 12.5545 10.3939C12.1306 10.8462 11.5941 11.1779 11 11.355Z" fill="#029591"></path>
                        </svg>
                    </span>
                    <span>خرد جمعی</span>
                </a>
                <a  href="{{ route('login',['vip'=>1]) }}" class="main-cat-nav">
                    <span class="icon">
                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.49189 7.06484L3.77789 17.9998H18.2219L19.5079 7.06484L15.4979 9.73784L10.9999 3.44084L6.50189 9.73784L2.49189 7.06484ZM1.80089 4.19984L5.99989 6.99984L10.1859 1.13984C10.2784 1.01021 10.4005 0.904544 10.5421 0.83164C10.6837 0.758737 10.8406 0.720703 10.9999 0.720703C11.1591 0.720703 11.3161 0.758737 11.4577 0.83164C11.5993 0.904544 11.7214 1.01021 11.8139 1.13984L15.9999 6.99984L20.1999 4.19984C20.3588 4.09408 20.5447 4.03604 20.7356 4.03257C20.9265 4.0291 21.1144 4.08035 21.2771 4.18026C21.4398 4.28017 21.5705 4.42456 21.6537 4.59637C21.737 4.76819 21.7693 4.96024 21.7469 5.14984L20.1039 19.1168C20.0752 19.3601 19.9583 19.5844 19.7753 19.7471C19.5922 19.9099 19.3558 19.9998 19.1109 19.9998H2.88889C2.64395 19.9998 2.40755 19.9099 2.22451 19.7471C2.04148 19.5844 1.92454 19.3601 1.89589 19.1168L0.252885 5.14884C0.230685 4.95932 0.263171 4.76741 0.346506 4.59576C0.429842 4.4241 0.560548 4.27987 0.723196 4.1801C0.885845 4.08032 1.07364 4.02916 1.26442 4.03266C1.45521 4.03616 1.641 4.09417 1.79989 4.19984H1.80089ZM10.9999 13.9998C10.4695 13.9998 9.96074 13.7891 9.58567 13.4141C9.2106 13.039 8.99989 12.5303 8.99989 11.9998C8.99989 11.4694 9.2106 10.9607 9.58567 10.5856C9.96074 10.2106 10.4695 9.99984 10.9999 9.99984C11.5303 9.99984 12.039 10.2106 12.4141 10.5856C12.7892 10.9607 12.9999 11.4694 12.9999 11.9998C12.9999 12.5303 12.7892 13.039 12.4141 13.4141C12.039 13.7891 11.5303 13.9998 10.9999 13.9998Z" fill="#F2994A"></path>
                        </svg>

                    </span>
                    <span>آگهی های VIP</span>
                </a>
            </div>
            <div id="list-item">
                <div id="ad_li">
                    @include('home.ads.ads_list')
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade  " id="city_all_select" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title right" id="exampleModalLongTitle"> انتخاب شهر</h5>
                    <button type="button" class="close close_pops" data-dismiss="modal" aria-label="Close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                fill="currentColor"></path>
                        </svg>

                    </button>
                </div>
                <div class="modal-body">
                    <div class="pur-search-form" id="s_box">
                            <input type="text" class="text" id="search_city" placeholder="جست وجوی   شهر ">
                          <span class="icon_clo">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"></path>
                            </svg>
                          </span>

                    </div>
                    <form action="{{ route('ads') }}" method="get" id="city_form">
                        @csrf
                        @method('get')
                        <input type="text" name="check_city" value="1" hidden >

                        <div class="search-filters" id="city_box">
                            @foreach ($cities_all as $ke=>$va )
                            @php
                             $cit= App\Models\City::find($va)
                            @endphp
                            <span class="applied-filter gray pary" id="lable__{{ $cit ->id }}" >
                                <input type="text" value="{{ $cit ->id }}"  name="cities[]" hidden id="">
                                <span>{{ $cit->name }}</span>
                                <span class="remove-fil remove_all_ci" data-id="{{ $cit ->id }}" >
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM10 8.586L12.1206 6.46462C12.5113 6.07383 13.1448 6.07378 13.5355 6.4645C13.9262 6.85522 13.9262 7.48872 13.5354 7.87937L11.414 10L13.5354 12.1206C13.9262 12.5113 13.9262 13.1448 13.5355 13.5355C13.1448 13.9262 12.5113 13.9262 12.1206 13.5354L10 11.414L7.87937 13.5354C7.48872 13.9262 6.85522 13.9262 6.4645 13.5355C6.07378 13.1448 6.07383 12.5113 6.46463 12.1206L8.586 10L6.46462 7.87937C6.07383 7.48872 6.07378 6.85522 6.4645 6.4645C6.85522 6.07378 7.48872 6.07383 7.87937 6.46463L10 8.586Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </span>
                            @endforeach
                        </div>
                    </form>
{{--  ss  --}}
                    <div class="sliding-menu" id="search_parent">
                        <ul id="main_list" class="proli_all">
                            @foreach ($provinces as $pro)
                                <li style="line-height:45px" >
                                    <div class="top">
                                        <span class="cat-item">

                                            <span class="text">{{ $pro->name }}</span>
                                        </span>
                                        <span class="toggle">
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>

                                    </div>

                                    <div class="sub">
                                        <div class="back">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-arrow-right" width="18"
                                                    height="18" viewBox="0 0 24 24" stroke-width="2" stroke="#2c3e50"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="5" y1="12" x2="19" y2="12">
                                                    </line>
                                                    <line x1="13" y1="18" x2="19" y2="12">
                                                    </line>
                                                    <line x1="13" y1="6" x2="19" y2="12">
                                                    </line>
                                                </svg>
                                            </span>
                                            <span>بازگشت به همهٔ دسته‌ها</span>
                                        </div>
                                        <ul class="pro_item">
                                            <li>
                                                <div class="checkbox-row"
                                                 >
                                                    <input type="checkbox" {{ array_diff($pro->cities()->pluck("id")->toArray(), $cities_all)?"":"checked" }} class="all_city_status" id="all_city_{{ $pro->id }}"  class="">
                                                    <label for="all_city_{{ $pro->id }}">
                                                        <span class="title">
                                                            همه شهر های استان
                                                            {{ $pro->name }}
                                                        </span>
                                                        <span class="check">
                                                            <svg width="8" height="7" viewBox="0 0 8 7"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M3.00018 6.788L0 3.3936L0.999823 2.2624L3.00018 4.5256L6.99947 0L8 1.1312L3.00018 6.788Z"
                                                                    fill="#029591"></path>
                                                            </svg>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="sub">
                                                    <div class="back">
                                                        <span class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-arrow-right"
                                                                width="18" height="18" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="#2c3e50" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none"></path>
                                                                <line x1="5" y1="12" x2="19"
                                                                    y2="12"></line>
                                                                <line x1="13" y1="18" x2="19"
                                                                    y2="12"></line>
                                                                <line x1="13" y1="6" x2="19"
                                                                    y2="12"></line>
                                                            </svg>
                                                        </span>

                                                    </div>

                                                </div>
                                            </li>
                                            @foreach ($pro->cities as $city)
                                                <li class="ci_item">
                                                    <div class="checkbox-row" data-id="{{ $city->id }}"
                                                        data-name="{{ $city->name }}" data-type="city">
                                                        <input type="checkbox"  class="city_option" {{ in_array($city->id,$cities_all)?"checked":'' }}
                                                            data-id="{{ $city->id }}" id="city__{{ $city->id }}"
                                                            data-name="{{ $city->name }}" value="14" id="subset_14"
                                                            name="telic">
                                                        <label for="city__{{ $city->id }}">
                                                            <span class="title">{{ $city->name }}</span>
                                                            <span class="check">
                                                                <svg width="8" height="7" viewBox="0 0 8 7"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M3.00018 6.788L0 3.3936L0.999823 2.2624L3.00018 4.5256L6.99947 0L8 1.1312L3.00018 6.788Z"
                                                                        fill="#029591"></path>
                                                                </svg>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="back">
                                                            <span class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-arrow-right"
                                                                    width="18" height="18" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="#2c3e50" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <line x1="5" y1="12" x2="19"
                                                                        y2="12"></line>
                                                                    <line x1="13" y1="18" x2="19"
                                                                        y2="12"></line>
                                                                    <line x1="13" y1="6" x2="19"
                                                                        y2="12"></line>
                                                                </svg>
                                                            </span>
                                                            <span>بازگشت به همهٔ
                                                                {{ $pro->name }}
                                                            </span>
                                                        </div>

                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="pair-button">
                        <span class="mid-button" id="city_form_can">
                            انصراف
                        </span>
                        <span class="mid-button orange2 " id="city_form_btn">
                            تایید
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{--
    <div class="modal fade" id="city_all_select" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display:none">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">آگهی های کجا رو نمایش بدیم؟</h5>
                    <button type="button" class="close close_pops" data-dismiss="modal" aria-label="Close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                fill="currentColor" />
                        </svg>

                    </button>
                </div>
                <div class="modal-body">
                    <div class="pur-search-form">
                        <form action="">
                            <input type="text" class="text" placeholder="چست وجوی استان و شهر">
                            <button class="search-button">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.58341 17.5C13.9557 17.5 17.5001 13.9555 17.5001 9.58329C17.5001 5.21104 13.9557 1.66663 9.58341 1.66663C5.21116 1.66663 1.66675 5.21104 1.66675 9.58329C1.66675 13.9555 5.21116 17.5 9.58341 17.5Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path opacity="0.4" d="M18.3334 18.3333L16.6667 16.6666" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </button>
                        </form>
                    </div>
                    <div class="search-filters">

                        <span class="applied-filter gray">
                            <span>چهار محال و بختیاری</span>
                            <span class="remove-fil">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM10 8.586L12.1206 6.46462C12.5113 6.07383 13.1448 6.07378 13.5355 6.4645C13.9262 6.85522 13.9262 7.48872 13.5354 7.87937L11.414 10L13.5354 12.1206C13.9262 12.5113 13.9262 13.1448 13.5355 13.5355C13.1448 13.9262 12.5113 13.9262 12.1206 13.5354L10 11.414L7.87937 13.5354C7.48872 13.9262 6.85522 13.9262 6.4645 13.5355C6.07378 13.1448 6.07383 12.5113 6.46463 12.1206L8.586 10L6.46462 7.87937C6.07383 7.48872 6.07378 6.85522 6.4645 6.4645C6.85522 6.07378 7.48872 6.07383 7.87937 6.46463L10 8.586Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                        </span>
                    </div>
                    <div id="c_selecr" style="    max-height: 500px;
                overflow: auto;">



                        @foreach (App\Models\Province::all() as $pro)
                            <div class="accord-box  province_parent">
                                <div class="top nob">
                                    <h4>{{ $pro->name }} </h4>
                                    <span class="toggle">
                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>

                                </div>
                                <div class="accord-content">
                                    <div>
                                        <ul class="city-list">
                                            @foreach ($pro->cities as $city)
                                                <li>
                                                    <div class="checkbox-row">
                                                        <input type="checkbox" name="city_place"
                                                            id="city_{{ $city->id }}">
                                                        <label for="city_{{ $city->id }}">
                                                            <input type="text">
                                                            <span class="title">{{ $city->name }}</span>
                                                            <span class="check">
                                                                <svg width="8" height="7" viewBox="0 0 8 7"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M3.00018 6.788L0 3.3936L0.999823 2.2624L3.00018 4.5256L6.99947 0L8 1.1312L3.00018 6.788Z"
                                                                        fill="#029591" />
                                                                </svg>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="pair-button">
                        <button class="mid-button">
                            انصراف
                        </button>
                        <button class="mid-button orange">
                            تایید
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>  --}}



@endsection
