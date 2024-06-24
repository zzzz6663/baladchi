@extends('main.site')
@section('content')





<div id="main">
    <div class="container">

        <div class="row">

            <div id="sidebar">
                <form action="{{ route("counsels") }}"  id="ba_f">
                    @method('get')

                    @csrf
                <div id="filters">

                    <div class="accord-box  active">
                        <div class="top nob">
                            <div class="side-filter-title">
                                <h4>
                                    <span class="icon">
                                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 11L0 2V0H16V2L10 11V17L6 19V11Z" fill="#828282"/>
                                        </svg>
                                    </span>
                                    <span>فیلتر ها</span>
                                </h4>

                                <a class="remove-filters"  href="{{ route('counsels') }}">
                                    <span>حذف فیلتر ها</span>
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM10 8.586L12.1206 6.46462C12.5113 6.07383 13.1448 6.07378 13.5355 6.4645C13.9262 6.85522 13.9262 7.48872 13.5354 7.87937L11.414 10L13.5354 12.1206C13.9262 12.5113 13.9262 13.1448 13.5355 13.5355C13.1448 13.9262 12.5113 13.9262 12.1206 13.5354L10 11.414L7.87937 13.5354C7.48872 13.9262 6.85522 13.9262 6.4645 13.5355C6.07378 13.1448 6.07383 12.5113 6.46463 12.1206L8.586 10L6.46462 7.87937C6.07383 7.48872 6.07378 6.85522 6.4645 6.4645C6.85522 6.07378 7.48872 6.07383 7.87937 6.46463L10 8.586Z" fill="#BDBDBD"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="accord-box  active">

                        <div class="top nob">
                            <h4>موضوع</h4>
                            <span class="toggle">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z" fill="currentColor"/>
                                </svg>
                            </span>
                        </div>
                        <div class="accord-content">
                            <div>

                                <div class="pur-search-form side">
                                        <input type="text" class="text" name="search" id="tag_filter" value="{{ request("search") }}" placeholder="جست وجو و انتخاب کنید">
                                        <span class="search-button pointer" id="new_tag_filter">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <path d="M8.625 15.75C12.56 15.75 15.75 12.56 15.75 8.625C15.75 4.68997 12.56 1.5 8.625 1.5C4.68997 1.5 1.5 4.68997 1.5 8.625C1.5 12.56 4.68997 15.75 8.625 15.75Z" stroke="#C7C7C7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path opacity="0.4" d="M16.5 16.5L15 15" stroke="#C7C7C7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                </div>
                                <div class="search-filters" id="tag_list">

                                    {{--  <span class="applied-filter gray side">
                                        <span>PHP</span>
                                        <span class="remove-fil">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM10 8.586L12.1206 6.46462C12.5113 6.07383 13.1448 6.07378 13.5355 6.4645C13.9262 6.85522 13.9262 7.48872 13.5354 7.87937L11.414 10L13.5354 12.1206C13.9262 12.5113 13.9262 13.1448 13.5355 13.5355C13.1448 13.9262 12.5113 13.9262 12.1206 13.5354L10 11.414L7.87937 13.5354C7.48872 13.9262 6.85522 13.9262 6.4645 13.5355C6.07378 13.1448 6.07383 12.5113 6.46463 12.1206L8.586 10L6.46462 7.87937C6.07383 7.48872 6.07378 6.85522 6.4645 6.4645C6.85522 6.07378 7.48872 6.07383 7.87937 6.46463L10 8.586Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </span>  --}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="accord-box active">
                        <div class="top nob">
                            <h4>نوع</h4>
                            <span class="toggle">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z" fill="currentColor"/>
                                </svg>
                            </span>

                        </div>
                        <div class="accord-content">
                            <div>
                                <div class="genr-toggle">
                                    <ul>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" {{ request('gender')==""? "checked":'' }} name="gender" value="" id="allkind"  class="fom_action">
                                                <label for="allkind">
                                                    <span>همه</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" {{ request('gender')=="male"? "checked":'' }} name="gender" value="male" id="public" class="fom_action">
                                                <label for="public">
                                                    <span>مرد</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" {{ request('gender')=="femail"? "checked":'' }}   name="gender"  value="femail" id="expert" class="fom_action">
                                                <label for="expert">
                                                    <span>زن</span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accord-box active">
                        <div class="top nob">
                            <h4>پاداش</h4>
                            <span class="toggle">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z" fill="currentColor"/>
                                </svg>
                            </span>

                        </div>
                        <div class="accord-content">
                            <div>

                                <ul>
                                    <li>
                                        <div class="checkcontainer">
                                            <input type="radio" {{ request('reward')==""? "checked":'' }}  class="fom_action" name="reward" value="" id="all_r">
                                            <label for="all_r">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                همه
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkcontainer">
                                            <input type="radio" {{ request('reward')=="no_reward"? "checked":'' }}  class="fom_action" name="reward" value="no_reward" id="free">
                                            <label for="free">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                رایگان
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkcontainer">
                                            <input type="radio" {{ request('reward')=="select_the_best_answer"? "checked":'' }}  class="fom_action"  name="reward" value="select_the_best_answer"  id="wgift">
                                            <label for="wgift">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>

                                                پاداش بهترین جواب
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkcontainer">
                                            <input type="radio" {{ request('reward')=="divide_reward"? "checked":'' }}  class="fom_action" name="reward" value="divide_reward" id="giftansw">
                                            <label for="giftansw">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                    تقسیم پاداش
                                            </label>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="accord-box active">
                        <div class="top nob">
                            <h4>مدرک تحصیلی</h4>
                            <span class="toggle">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z" fill="currentColor"/>
                                </svg>
                            </span>

                        </div>
                        <div class="accord-content">
                            <div>


                                <ul>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action"  {{ request('degree')==""? "checked":'' }} name="degree" id="all_dd" value="">
                                            <label for="all_dd">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                همه
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action"  {{ request('degree')=="under_high_school"? "checked":'' }} name="degree" id="freex" value="under_high_school">
                                            <label for="freex">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                زیر دیپلم
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action"  {{ request('degree')=="high_school"? "checked":'' }} name="degree" id="wgiftx"  value="high_school">
                                            <label for="wgiftx">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                دیپلم
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action"  {{ request('degree')=="master"? "checked":'' }} name="degree" id="master"  value="master">
                                            <label for="master">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                کارشناسی
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action"  {{ request('degree')=="high_master"? "checked":'' }} name="degree" id="high_master"  value="high_master">
                                            <label for="high_master">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                کارشناسی ارشد
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action"  {{ request('degree')=="phd"? "checked":'' }} name="degree" id="phd"  value="phd">
                                            <label for="phd">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"/>
                                                    </svg>
                                                </span>
                                                phd
                                            </label>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <div id="list-item">
                <div class="bread-filter">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">صفحه اصلی</a></li>
                            <li class="sep">
                                <span>
                                    <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.943369 4.94888C0.94335 5.08612 0.970364 5.22202 1.02287 5.34882C1.07537 5.47561 1.15234 5.59084 1.24937 5.6879L5.14936 9.58789C5.34523 9.78375 5.61087 9.8938 5.88786 9.8938C6.16485 9.8938 6.43049 9.78375 6.62635 9.58789C6.82222 9.39203 6.93226 9.12639 6.93226 8.8494C6.93226 8.5724 6.82222 8.30676 6.62635 8.1109L4.22636 4.9469L6.62635 1.7829C6.82222 1.58704 6.93226 1.32139 6.93226 1.0444C6.93226 0.767412 6.82222 0.50174 6.62635 0.305878C6.43049 0.110015 6.16485 2.14471e-08 5.88786 0C5.61087 -2.1447e-08 5.34523 0.110015 5.14936 0.305878L1.24937 4.2059C1.15181 4.3034 1.07453 4.41925 1.02201 4.54678C0.969491 4.67431 0.942768 4.81096 0.943369 4.94888Z" fill="#A6A5AA"/>
                                    </svg>

                                </span>
                            </li>
                            <li><span>سوالات خرد کمعی</span></li>
                        </ul>
                    </div>

                    <div class="result-order d-flex align-content-center">
                        <div class="filter-title">
                            <h4>
                                <span class="icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 7.75H3C2.59 7.75 2.25 7.41 2.25 7C2.25 6.59 2.59 6.25 3 6.25H21C21.41 6.25 21.75 6.59 21.75 7C21.75 7.41 21.41 7.75 21 7.75Z" fill="currentColor"></path>
                                        <path d="M18 12.75H6C5.59 12.75 5.25 12.41 5.25 12C5.25 11.59 5.59 11.25 6 11.25H18C18.41 11.25 18.75 11.59 18.75 12C18.75 12.41 18.41 12.75 18 12.75Z" fill="currentColor"></path>
                                        <path d="M14 17.75H10C9.59 17.75 9.25 17.41 9.25 17C9.25 16.59 9.59 16.25 10 16.25H14C14.41 16.25 14.75 16.59 14.75 17C14.75 17.41 14.41 17.75 14 17.75Z" fill="currentColor"></path>
                                    </svg>

                                </span>
                                <span>نمایش بر اساس :</span>
                            </h4>
                        </div>
                        <div class="genr-toggle">
                            <ul>
                                <li>
                                    <div class="label-containef">
                                        <input type="radio"  {{ request('ordering')=='oldest' ? 'checked' : '' }} class="fom_action" form="ba_f" name="ordering" value="oldest" id="oldest">
                                        <label for="oldest">
                                            <span>قدبمی</span>
                                        </label>
                                    </div>
                                </li>
                                {{--  s  --}}
                                <li>
                                    <div class="label-containef">
                                        <input type="radio"  {{ request('ordering')=='newest' ? 'checked' : '' }} class="fom_action" form="ba_f" name="ordering" value="newest" id="newest" checked="">
                                        <label for="newest">
                                            <span>جدیدترین</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="label-containef">
                                        <input type="radio"  {{ request('ordering')=='favourite' ? 'checked' : '' }} class="fom_action" form="ba_f" name="ordering" value="favourite" id="favourite">
                                        <label for="favourite">
                                            <span>محبوب ترین</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="label-containef">
                                        <input type="radio"  {{ request('ordering')=='point' ? 'checked' : '' }} class="fom_action" form="ba_f" name="ordering" value="point" id="point">
                                        <label for="point">
                                            <span>امتیاز</span>
                                        </label>
                                {{--    --}}

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @foreach ($counsels as $counsel)

                        <div class="hor-single-user {{ $counsel->check_seen() }}">
                            <div class="right">
                                <div class="img">
                                    <img src="{{ $counsel->user->avatar() }}" alt="">
                                    <span class="onl"></span>
                                </div>
                                <div class="infor">
                                    <h4>
                                        {{--    --}}
                                        {{ $counsel->remove }}-
                                        {{ $counsel->user->name }}
                                        {{ $counsel->user->family }}

                                    </h4>
                                    @if( $counsel->skills()->count())
                                    <span class="stat">تخصصی</span>
                                    {{--  <span class="stat">

                                        {{implode( " - ",$counsel->skills()->pluck("name")->toArray()) }}
                                    </span>  --}}
                                    @else
                                    <span class="stat">عمومی</span>

                                    @endif

                                </div>
                            </div>
                            <div class="left">
                                <div class="left-info">
                                    <div class="top">
                                        <div class="date">
                                            <span class="icon">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.99967 13.6667C3.31767 13.6667 0.333008 10.682 0.333008 7.00004C0.333008 3.31804 3.31767 0.333374 6.99967 0.333374C10.6817 0.333374 13.6663 3.31804 13.6663 7.00004C13.6663 10.682 10.6817 13.6667 6.99967 13.6667ZM6.99967 12.3334C8.41416 12.3334 9.77072 11.7715 10.7709 10.7713C11.7711 9.77108 12.333 8.41453 12.333 7.00004C12.333 5.58555 11.7711 4.229 10.7709 3.2288C9.77072 2.22861 8.41416 1.66671 6.99967 1.66671C5.58519 1.66671 4.22863 2.22861 3.22844 3.2288C2.22824 4.229 1.66634 5.58555 1.66634 7.00004C1.66634 8.41453 2.22824 9.77108 3.22844 10.7713C4.22863 11.7715 5.58519 12.3334 6.99967 12.3334ZM7.66634 7.00004H10.333V8.33337H6.33301V3.66671H7.66634V7.00004Z" fill="#828282"/>
                                                </svg>
                                            </span>
                                            <span>
                                               {{Carbon\Carbon::parse($counsel->created_at)->ago()}}
                                            </span>
                                        </div>
                                        <div class="view">
                                            <span class="icon">
                                                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.99978 0C11.5944 0 14.5851 2.58667 15.2124 6C14.5858 9.41333 11.5944 12 7.99978 12C4.40511 12 1.41444 9.41333 0.787109 6C1.41378 2.58667 4.40511 0 7.99978 0ZM7.99978 10.6667C9.35942 10.6664 10.6787 10.2045 11.7417 9.35678C12.8047 8.50901 13.5484 7.32552 13.8511 6C13.5473 4.67554 12.8031 3.49334 11.7402 2.64668C10.6773 1.80003 9.35865 1.33902 7.99978 1.33902C6.64091 1.33902 5.32224 1.80003 4.25936 2.64668C3.19648 3.49334 2.45229 4.67554 2.14844 6C2.45117 7.32552 3.19489 8.50901 4.25787 9.35678C5.32085 10.2045 6.64013 10.6664 7.99978 10.6667ZM7.99978 9C7.20413 9 6.44107 8.68393 5.87846 8.12132C5.31585 7.55871 4.99978 6.79565 4.99978 6C4.99978 5.20435 5.31585 4.44129 5.87846 3.87868C6.44107 3.31607 7.20413 3 7.99978 3C8.79543 3 9.55849 3.31607 10.1211 3.87868C10.6837 4.44129 10.9998 5.20435 10.9998 6C10.9998 6.79565 10.6837 7.55871 10.1211 8.12132C9.55849 8.68393 8.79543 9 7.99978 9ZM7.99978 7.66667C8.4418 7.66667 8.86573 7.49107 9.17829 7.17851C9.49085 6.86595 9.66644 6.44203 9.66644 6C9.66644 5.55797 9.49085 5.13405 9.17829 4.82149C8.86573 4.50893 8.4418 4.33333 7.99978 4.33333C7.55775 4.33333 7.13383 4.50893 6.82127 4.82149C6.5087 5.13405 6.33311 5.55797 6.33311 6C6.33311 6.44203 6.5087 6.86595 6.82127 7.17851C7.13383 7.49107 7.55775 7.66667 7.99978 7.66667Z" fill="#828282"/>
                                                </svg>
                                            </span>
                                            <span>
                                                {{  $counsel->viwecounsel_user()->count() }}
                                            </span>
                                        </div>
                                        @if($counsel->url)
                                        <div class="view" style="margin-right:10px">

                                            <a href=" {{ $counsel->url}}">
                                        لینک
                                            </a>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="title">
                                        <h3><a href="{{ route('single.counsel',$counsel->id) }}">
                                        {{$counsel->title  }}
                                        </a></h3>
                                    </div>
                                    <div class="tag-list">
                                        <ul>
                                            @foreach ($counsel->tags as  $tag)
                                            <li><a href="{{ route('counsels',['tag_id',$tag->id]) }}" class="single-tag">{{  $tag->tag }}  </a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <br>
                                    <div class="tag-list">
                                        @if($counsel->price)
                                        <div class="credit">
                                            <span class="icon">
                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.5 1C13.0906 0.999802 13.6717 1.14908 14.1892 1.43393C14.7066 1.71879 15.1435 2.12995 15.4592 2.62914C15.7749 3.12832 15.9592 3.69929 15.9948 4.28886C16.0305 4.87843 15.9163 5.46743 15.663 6.001L19 6C19.2652 6 19.5196 6.10536 19.7071 6.2929C19.8946 6.48043 20 6.73479 20 7V11C20 11.2652 19.8946 11.5196 19.7071 11.7071C19.5196 11.8946 19.2652 12 19 12H18V20C18 20.2652 17.8946 20.5196 17.7071 20.7071C17.5196 20.8946 17.2652 21 17 21H3C2.73478 21 2.48043 20.8946 2.29289 20.7071C2.10536 20.5196 2 20.2652 2 20V12H1C0.734784 12 0.48043 11.8946 0.292893 11.7071C0.105357 11.5196 0 11.2652 0 11V7C0 6.73479 0.105357 6.48043 0.292893 6.2929C0.48043 6.10536 0.734784 6 1 6L4.337 6.001C3.98076 5.25268 3.90163 4.40221 4.1137 3.601C4.32577 2.7998 4.81529 2.09985 5.4951 1.62576C6.17491 1.15167 7.0009 0.934199 7.82603 1.01207C8.65116 1.08994 9.42189 1.4581 10.001 2.051C10.326 1.71753 10.7147 1.45268 11.1439 1.27215C11.5732 1.09162 12.0343 0.999076 12.5 1ZM16 12H4V19H16V12ZM18 8H2V10H18V8ZM7.5 3C7.11478 3.00019 6.74441 3.14858 6.46561 3.41441C6.18682 3.68025 6.02099 4.04315 6.00248 4.42792C5.98396 4.81269 6.11419 5.18984 6.36618 5.48121C6.61816 5.77257 6.97258 5.95583 7.356 5.993L7.5 6H9V4.5C8.99998 4.12712 8.86108 3.76761 8.61038 3.49158C8.35968 3.21556 8.01516 3.0428 7.644 3.007L7.5 3ZM12.5 3L12.356 3.007C12.0094 3.04021 11.6851 3.19298 11.4388 3.43911C11.1925 3.68525 11.0395 4.0094 11.006 4.356L11 4.5V6H12.5L12.644 5.993C13.015 5.95703 13.3594 5.7842 13.6099 5.50819C13.8605 5.23218 13.9993 4.87277 13.9993 4.5C13.9993 4.12724 13.8605 3.76783 13.6099 3.49182C13.3594 3.21581 13.015 3.04297 12.644 3.007L12.5 3Z" fill="#FD6245"></path>
                                                </svg>
                                            </span>
                                            <span class="num">
                                                {{ number_format($counsel->price) }}
                                            </span>
                                            <span class="un">
                                                تومان
                                            </span>
                                            <span class="txt">
                                                {{ __('arr.'.$counsel->reward) }}
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="answ-stat">
                                    <span class="num">{{  $counsel->answers_count() }}</span>
                                    <span>
                                    جواب
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="load-more pagina d-flex">
                            {{ $counsels->appends(Request::all())->links('home.parts.pagination') }}
                            {{--  <button class="vip-load">
                                <span>نمایش بیشتر</span>
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0C10.2652 0 10.5196 0.105357 10.7071 0.292893C10.8946 0.48043 11 0.734784 11 1V4C11 4.26522 10.8946 4.51957 10.7071 4.70711C10.5196 4.89464 10.2652 5 10 5C9.73478 5 9.48043 4.89464 9.29289 4.70711C9.10536 4.51957 9 4.26522 9 4V1C9 0.734784 9.10536 0.48043 9.29289 0.292893C9.48043 0.105357 9.73478 0 10 0ZM10 15C10.2652 15 10.5196 15.1054 10.7071 15.2929C10.8946 15.4804 11 15.7348 11 16V19C11 19.2652 10.8946 19.5196 10.7071 19.7071C10.5196 19.8946 10.2652 20 10 20C9.73478 20 9.48043 19.8946 9.29289 19.7071C9.10536 19.5196 9 19.2652 9 19V16C9 15.7348 9.10536 15.4804 9.29289 15.2929C9.48043 15.1054 9.73478 15 10 15ZM20 10C20 10.2652 19.8946 10.5196 19.7071 10.7071C19.5196 10.8946 19.2652 11 19 11H16C15.7348 11 15.4804 10.8946 15.2929 10.7071C15.1054 10.5196 15 10.2652 15 10C15 9.73478 15.1054 9.48043 15.2929 9.29289C15.4804 9.10536 15.7348 9 16 9H19C19.2652 9 19.5196 9.10536 19.7071 9.29289C19.8946 9.48043 20 9.73478 20 10ZM5 10C5 10.2652 4.89464 10.5196 4.70711 10.7071C4.51957 10.8946 4.26522 11 4 11H1C0.734784 11 0.48043 10.8946 0.292893 10.7071C0.105357 10.5196 0 10.2652 0 10C0 9.73478 0.105357 9.48043 0.292893 9.29289C0.48043 9.10536 0.734784 9 1 9H4C4.26522 9 4.51957 9.10536 4.70711 9.29289C4.89464 9.48043 5 9.73478 5 10ZM17.071 17.071C16.8835 17.2585 16.6292 17.3638 16.364 17.3638C16.0988 17.3638 15.8445 17.2585 15.657 17.071L13.536 14.95C13.3538 14.7614 13.253 14.5088 13.2553 14.2466C13.2576 13.9844 13.3628 13.7336 13.5482 13.5482C13.7336 13.3628 13.9844 13.2576 14.2466 13.2553C14.5088 13.253 14.7614 13.3538 14.95 13.536L17.071 15.656C17.164 15.7489 17.2377 15.8592 17.2881 15.9806C17.3384 16.102 17.3643 16.2321 17.3643 16.3635C17.3643 16.4949 17.3384 16.625 17.2881 16.7464C17.2377 16.8678 17.164 16.9781 17.071 17.071ZM6.464 6.464C6.27647 6.65147 6.02216 6.75679 5.757 6.75679C5.49184 6.75679 5.23753 6.65147 5.05 6.464L2.93 4.344C2.74236 4.15649 2.63689 3.90212 2.6368 3.63685C2.6367 3.37158 2.74199 3.11714 2.9295 2.9295C3.11701 2.74186 3.37138 2.63639 3.63665 2.6363C3.90192 2.6362 4.15636 2.74149 4.344 2.929L6.464 5.05C6.65147 5.23753 6.75679 5.49184 6.75679 5.757C6.75679 6.02216 6.65147 6.27647 6.464 6.464ZM2.93 17.071C2.74253 16.8835 2.63721 16.6292 2.63721 16.364C2.63721 16.0988 2.74253 15.8445 2.93 15.657L5.051 13.536C5.14325 13.4405 5.25359 13.3643 5.3756 13.3119C5.4976 13.2595 5.62882 13.2319 5.7616 13.2307C5.89438 13.2296 6.02606 13.2549 6.14895 13.3052C6.27185 13.3555 6.3835 13.4297 6.4774 13.5236C6.57129 13.6175 6.64554 13.7291 6.69582 13.852C6.7461 13.9749 6.7714 14.1066 6.77025 14.2394C6.7691 14.3722 6.74151 14.5034 6.6891 14.6254C6.63669 14.7474 6.56051 14.8578 6.465 14.95L4.345 17.071C4.25213 17.164 4.14184 17.2377 4.02044 17.2881C3.89904 17.3384 3.76892 17.3643 3.6375 17.3643C3.50608 17.3643 3.37596 17.3384 3.25456 17.2881C3.13316 17.2377 3.02287 17.164 2.93 17.071ZM13.536 6.464C13.3485 6.27647 13.2432 6.02216 13.2432 5.757C13.2432 5.49184 13.3485 5.23753 13.536 5.05L15.656 2.929C15.8435 2.74136 16.0979 2.63589 16.3631 2.6358C16.6284 2.6357 16.8829 2.74099 17.0705 2.9285C17.2581 3.11601 17.3636 3.37038 17.3637 3.63565C17.3638 3.90092 17.2585 4.15536 17.071 4.343L14.95 6.464C14.7625 6.65147 14.5082 6.75679 14.243 6.75679C13.9778 6.75679 13.7235 6.65147 13.536 6.464Z" fill="#697289"/>
                                    </svg>
                                </span>
                            </button>

                            <div class="pagination">
                                <ul>
                                    <li><a class="pagin" href="#">1</a></li>
                                    <li class="active"><a class="pagin" href="#">2</a></li>
                                    <li><a class="pagin" href="#">3</a></li>
                                    <li><span class="dot3">...</span></li>
                                    <li><a class="pagin" href="#">5</a></li>
                                </ul>
                            </div>  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>





@endsection
