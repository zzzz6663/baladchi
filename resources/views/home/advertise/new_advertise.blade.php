@extends('main.site')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <div id="register-ad">
                    <div class="top-title">
                        <h3 class="new_add pointer">
                            <span class="icon">
                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.98827 4.94467C5.98829 4.80743 5.96128 4.67154 5.90877 4.54474C5.85627 4.41794 5.7793 4.30271 5.68227 4.20566L1.78228 0.305664C1.58641 0.109802 1.32077 -0.000243733 1.04378 -0.000243708C0.76679 -0.000243684 0.501149 0.109802 0.305287 0.305665C0.109425 0.501527 -0.000621163 0.767169 -0.000621139 1.04416C-0.000621115 1.32115 0.109425 1.58679 0.305287 1.78265L2.70528 4.94666L0.305288 8.11066C0.109425 8.30652 -0.000620481 8.57216 -0.000620456 8.84915C-0.000620432 9.12614 0.109426 9.39182 0.305288 9.58768C0.50115 9.78354 0.766791 9.89356 1.04378 9.89356C1.32077 9.89356 1.58642 9.78354 1.78228 9.58768L5.68227 5.68765C5.77983 5.59016 5.85711 5.4743 5.90963 5.34677C5.96215 5.21924 5.98887 5.08259 5.98827 4.94467Z"
                                        fill="#2A2A2A" />
                                </svg>
                            </span>
                            <span>
                                برگشت
                            </span>

                            <span class="res_name"></span>
                        </h3>
                    </div>
                    <form action="" id="advertise_form">
                        <div class="section" id="form_advertise">
                        </div>
                        <div class="section pt30">
                            <div class="pair-button">
                                <button class="mid-button">
                                    انصراف
                                </button>
                                <span id="insert_advertise" class="icon-button green pointer">
                                    <span>انتشار آگهی</span>
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17 20H3C2.20435 20 1.44129 19.6839 0.87868 19.1213C0.316071 18.5587 0 17.7956 0 17V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H15C15.2652 0 15.5196 0.105357 15.7071 0.292893C15.8946 0.48043 16 0.734784 16 1V13H20V17C20 17.7956 19.6839 18.5587 19.1213 19.1213C18.5587 19.6839 17.7956 20 17 20ZM16 15V17C16 17.2652 16.1054 17.5196 16.2929 17.7071C16.4804 17.8946 16.7348 18 17 18C17.2652 18 17.5196 17.8946 17.7071 17.7071C17.8946 17.5196 18 17.2652 18 17V15H16ZM14 18V2H2V17C2 17.2652 2.10536 17.5196 2.29289 17.7071C2.48043 17.8946 2.73478 18 3 18H14ZM4 5H12V7H4V5ZM4 9H12V11H4V9ZM4 13H9V15H4V13Z"
                                                fill="#FFF4F2" />
                                        </svg>

                                    </span>
                                </span>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="cat_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" style="display: ">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title right" id="exampleModalLongTitle">انتخاب دسته بندی
                        <br>
                        <span id="selected_telic"></span>
                    </h5>
                    <button type="button" class="close close_popup" data-dismiss="modal" aria-label="Close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                fill="currentColor" />
                        </svg>

                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div class="pur-search-form">
              <form action="">
                  <input type="text" class="text" placeholder="چست وجوی استان و شهر">
                  <button class="search-button">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M9.58341 17.5C13.9557 17.5 17.5001 13.9555 17.5001 9.58329C17.5001 5.21104 13.9557 1.66663 9.58341 1.66663C5.21116 1.66663 1.66675 5.21104 1.66675 9.58329C1.66675 13.9555 5.21116 17.5 9.58341 17.5Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                          <path opacity="0.4" d="M18.3334 18.3333L16.6667 16.6666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>

                  </button>
              </form>
          </div> --}}
                    <div id="catbox">
                        @foreach ($categories as $category)
                            <div class="accord-box circ ">
                                <div class="top nob toggle1">
                                    <span class="cat-item ">
                                        <span class="icon">
                                            {!! $category->icon !!}
                                        </span>
                                        <span class="text">{{ $category->name }}</span>
                                    </span>
                                    <span class="toggle toggle1">
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
                                        <ul class="city-list sss">
                                            @foreach ($category->subsets as $subset)
                                                <li>
                                                    <div
                                                        class="accord-box    {{ $subset->telics()->count() > 0 ? 'sec1 toggle2' : 'active ' }} {{ $subset->telics()->count() }}">
                                                        @if ($subset->telics()->count())
                                                            <div class="top nob ">
                                                                <span class="text"> {{ $subset->name }}

                                                                </span>
                                                                <span class="toggle ">
                                                                    <svg width="10" height="6" viewBox="0 0 10 6"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </span>

                                                            </div>

                                                            <div class="accord-content">
                                                                <div>
                                                                    <ul class="city-list">
                                                                        @foreach ($subset->telics as $telic)
                                                                            <li>
                                                                                <div class="checkbox-row">
                                                                                    <input type="radio"
                                                                                        class="telic_option"
                                                                                        data-type="telic"
                                                                                        data-name="{{ $telic->name }}"
                                                                                        data-id="{{ $telic->id }}"
                                                                                        value="{{ $telic->id }}"
                                                                                        id="telic_{{ $telic->id }}"
                                                                                        name="telic">
                                                                                    <label for="telic_{{ $telic->id }}">
                                                                                        <span
                                                                                            class="title">{{ $telic->name }}</span>
                                                                                        <span class="check">
                                                                                            <svg width="8"
                                                                                                height="7"
                                                                                                viewBox="0 0 8 7"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
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
                                                        @else
                                                            {{-- <div class="top nob ">
                                            <span class="text"> {{ $subset->name }}

                                            </span>


                                        </div> --}}
                                                            <div class="accord-content active">
                                                                <div>
                                                                    <ul class="city-list">
                                                                        <li>
                                                                            <div class="checkbox-row">
                                                                                <input type="radio" class="telic_option"
                                                                                    data-id="{{ $subset->id }}"
                                                                                    data-type="subset"
                                                                                    data-name="{{ $subset->name }}"
                                                                                    value="{{ $subset->id }}"
                                                                                    id="subset_{{ $subset->id }}"
                                                                                    name="telic">
                                                                                <label for="subset_{{ $subset->id }}">
                                                                                    <span
                                                                                        class="title">{{ $subset->name }}</span>
                                                                                    <span class="check">
                                                                                        <svg width="8" height="7"
                                                                                            viewBox="0 0 8 7"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M3.00018 6.788L0 3.3936L0.999823 2.2624L3.00018 4.5256L6.99947 0L8 1.1312L3.00018 6.788Z"
                                                                                                fill="#029591" />
                                                                                        </svg>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-header">

                    </div>
                    <div class="pair-button">
                        <span id="new_telic" style="display:none" class="close_pop mid-button pointer">
                            انتخاب مجدد
                        </span>
                        <span id="select_telic" style="display:none" class="mid-button  pointer orange2">
                            تایید
                        </span>

                    
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
