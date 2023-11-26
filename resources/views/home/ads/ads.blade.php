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
