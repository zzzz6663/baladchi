@extends('main.site')
@section('content')
<div class="container">

    <div class="row">
        <div id="sidebar">
            <div id="filters">

                <div class="accord-box  active">
                    <div class="top nob">
                        <div class="side-filter-title">
                            <h4>
                                <span class="icon">
                                    <svg width="16" height="19" viewBox="0 0 16 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 11L0 2V0H16V2L10 11V17L6 19V11Z" fill="#828282" />
                                    </svg>
                                </span>
                                <span>فیلتر ها</span>
                            </h4>

                            <a href="{{ route('baladchiha') }}" class="remove-filters">
                                <span>حذف فیلتر ها</span>
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM10 8.586L12.1206 6.46462C12.5113 6.07383 13.1448 6.07378 13.5355 6.4645C13.9262 6.85522 13.9262 7.48872 13.5354 7.87937L11.414 10L13.5354 12.1206C13.9262 12.5113 13.9262 13.1448 13.5355 13.5355C13.1448 13.9262 12.5113 13.9262 12.1206 13.5354L10 11.414L7.87937 13.5354C7.48872 13.9262 6.85522 13.9262 6.4645 13.5355C6.07378 13.1448 6.07383 12.5113 6.46463 12.1206L8.586 10L6.46462 7.87937C6.07383 7.48872 6.07378 6.85522 6.4645 6.4645C6.85522 6.07378 7.48872 6.07383 7.87937 6.46463L10 8.586Z"
                                            fill="#BDBDBD" />
                                    </svg>
                                </span>
                            </a>
                        </div>

                    </div>
                </div>




                {{-- <div class="accord-box active">

                    <div class="accord-content">
                        <div class="input-toggle">
                            <input type="checkbox" id="online-view" name="online-view" checked>
                            <label for="online-view">
                                <span>فقط نمایش آنلاین ها</span>
                                <div class="togg">
                                    <span></span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div> --}}


                <form action="{{ route('baladchiha') }}" method="get" id="ba_f">
                    @csrf
                    @method('post')
                    @foreach (request()->all() as $inp => $ke)
                    <input type="text" name="{{ $inp }}" value="{{ $ke }}" hidden>
                    @endforeach
                    <input type="text" name="skill_id" id="skill_id" value="{{ request('skill_id') }}" hidden>
                    <input type="text" name="par_id" id="par_id" value="{{ request('par_id') }}" hidden>
                    <div class="accord-box  pointer all_skill  " style="dispaly: none">
                        <div class="top nob  pointer ">
                            <span class="backpage pointer ">
                                <span class="pointer ">

                                    <span class="icon">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.99999 4.9924C6.00001 4.85516 5.973 4.71927 5.92049 4.59247C5.86799 4.46567 5.79102 4.35044 5.69399 4.25339L1.794 0.353394C1.59813 0.157531 1.33249 0.0474858 1.0555 0.0474858C0.778509 0.0474858 0.512868 0.157531 0.317006 0.353394C0.121143 0.549257 0.0110976 0.814898 0.0110976 1.09189C0.0110976 1.36888 0.121144 1.63452 0.317006 1.83038L2.717 4.99439L0.317006 8.15839C0.121144 8.35425 0.0110983 8.61989 0.0110983 8.89688C0.0110983 9.17387 0.121144 9.43954 0.317007 9.63541C0.512869 9.83127 0.77851 9.94128 1.0555 9.94128C1.33249 9.94128 1.59813 9.83127 1.794 9.63541L5.69399 5.73538C5.79154 5.63789 5.86882 5.52203 5.92135 5.3945C5.97387 5.26697 6.00059 5.13032 5.99999 4.9924Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span> دسته بندی مهارتها </span>
                                </span>

                                <span class="close close_side">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                            </span>

                        </div>
                    </div>
                    @foreach (App\Models\Skill::where('parent_id', '=', null)->get() as $skill_par)
                    {{-- @if (!$skill_par->childs()->count())
                    @continue
                    @endif --}}

                    <div class="accord-box   par_c   {{ request('par_id') == $skill_par->id ? 'active select_p' : '' }} {{ request('par_id') ? 'dis_none' : ' ' }}  "
                        data-id="{{ $skill_par->id }}">
                        <div class="top nob">
                            <a href="#" class="cat-item toggle_p">
                                <span class="icon">
                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17 16H3V17C3 17.2652 2.89464 17.5196 2.70711 17.7071C2.51957 17.8946 2.26522 18 2 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V7L2.48 1.212C2.63432 0.852001 2.89096 0.545239 3.21805 0.32978C3.54515 0.114322 3.92832 -0.000347568 4.32 7.91365e-07H15.68C16.0713 4.4012e-05 16.4541 0.114897 16.7808 0.330331C17.1075 0.545765 17.3638 0.852314 17.518 1.212L20 7V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H18C17.7348 18 17.4804 17.8946 17.2929 17.7071C17.1054 17.5196 17 17.2652 17 17V16ZM18 9H2V14H18V9ZM2.176 7H17.824L15.681 2H4.32L2.177 7H2.176ZM4.5 13C4.10218 13 3.72064 12.842 3.43934 12.5607C3.15804 12.2794 3 11.8978 3 11.5C3 11.1022 3.15804 10.7206 3.43934 10.4393C3.72064 10.158 4.10218 10 4.5 10C4.89782 10 5.27936 10.158 5.56066 10.4393C5.84196 10.7206 6 11.1022 6 11.5C6 11.8978 5.84196 12.2794 5.56066 12.5607C5.27936 12.842 4.89782 13 4.5 13ZM15.5 13C15.1022 13 14.7206 12.842 14.4393 12.5607C14.158 12.2794 14 11.8978 14 11.5C14 11.1022 14.158 10.7206 14.4393 10.4393C14.7206 10.158 15.1022 10 15.5 10C15.8978 10 16.2794 10.158 16.5607 10.4393C16.842 10.7206 17 11.1022 17 11.5C17 11.8978 16.842 12.2794 16.5607 12.5607C16.2794 12.842 15.8978 13 15.5 13Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="text">
                                    {{ $skill_par->name }}
                                </span>
                            </a>
                        </div>
                        <div class="accord-content">
                            <div>
                                <ul class="sub-list">
                                    @foreach ($skill_par->childs() as $s_child)
                                    <li>
                                        <a href="#" data-id="{{ $s_child->id }}"
                                            class="sub-list-item select_kill_id  {{ request('skill_id') == $s_child->id ? 'active_ch' : '' }}">{{
                                            $s_child->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="accord-box active">

                        <div class="accord-content">
                            <div class="input-toggle">
                                <input type="text" class="" name="authenticated" hidden value="">
                                <input type="checkbox" id="ehrax" {{ request('authenticated') ? 'checked' : '' }}
                                    class="fom_action" name="authenticated">
                                <label for="ehrax">
                                    <span>فقط احراز شده ها</span>
                                    <div class="togg">
                                        <span></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="accord-box active">

                        <div class="accord-content">
                            <div class="input-toggle">
                                <input type="text" class="" name="report" hidden value="">
                                <input type="checkbox" id="oreport" {{ request('report') ? 'checked' : '' }}
                                    class="fom_action" name="report">
                                <label for="oreport">
                                    <span>فقط کاربران بدون گزارش</span>
                                    <div class="togg">
                                        <span></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="accord-box active">
                        <div class="top nob">
                            <h4>جنسیت</h4>
                            <span class="toggle">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z"
                                        fill="currentColor" />
                                </svg>
                            </span>

                        </div>
                        <div class="accord-content">
                            <div>
                                <div class="genr-toggle">
                                    <ul>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" {{ request('gender')=='' ? 'checked' : '' }}
                                                    name="gender" class="fom_action" value="" id="genderall">
                                                <label for="genderall">
                                                    <span>همه </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" {{ request('gender')=='male' ? 'checked' : '' }}
                                                    name="gender" class="fom_action" value="male" id="gendermale">
                                                <label for="gendermale">
                                                    <span>مرد</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" {{ request('gender')=='female' ? 'checked' : '' }}
                                                    name="gender" class="fom_action" value="female" id="genderfemale">
                                                <label for="genderfemale">
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
                            <h4>حداقل تعداد مشاوره</h4>
                            <span class="toggle">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z" fill="currentColor"></path>
                                </svg>
                            </span>

                        </div>
                        <div class="accord-content">
                            <div>

                                <div class="liner-toggle">
                                    <ul>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" name="talk" value="1" {{ request("talk")=="1"?"checked":"" }} class="fom_action" id="consult1" >
                                                <label for="consult1">
                                                    <span>1  مشاوره </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" name="talk" value="2" {{ request("talk")=="2"?"checked":"" }} class="fom_action" id="consult2">
                                                <label for="consult2">
                                                    <span>2  مشاوره </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" name="talk" value="3" {{ request("talk")=="3"?"checked":"" }} class="fom_action" id="consult3">
                                                <label for="consult3">
                                                    <span>3  مشاوره </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" name="talk" value="4" {{ request("talk")=="4"?"checked":"" }} class="fom_action" id="consult4">
                                                <label for="consult4">
                                                    <span>4  مشاوره </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="label-containef">
                                                <input type="radio" name="talk" value="5" {{ request("talk")=="5"?"checked":"" }} class="fom_action" id="consult5">
                                                <label for="consult5">
                                                    <span>5  مشاوره </span>
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
                            <h4>سن</h4>
                            <span class="toggle">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z" fill="currentColor"></path>
                                </svg>
                            </span>

                        </div>
                        <div class="accord-content">
                            <div>

                                <div class="input-label">
                                    <label for="">
                                        <span>حداقل سن</span>
                                    </label>
                                    <input type="text" class="fom_action left" name="b_date" value="{{ request("b_date") }}" placeholder="" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accord-box active">
                        <div class="top nob">
                            <h4>مدرک تحصیلی</h4>
                            <span class="toggle">
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z" fill="currentColor"></path>
                                </svg>
                            </span>
{{--  س  --}}
                        </div>
                        <div class="accord-content">
                            <div>
                                <ul>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action" name="degree" checked  value="">
                                            <label for="all_dd">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"></path>
                                                    </svg>
                                                </span>
                                                همه
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action"  name="degree" id="freex" {{ request("degree")=="under_high_school"?"checked":"" }}  value="under_high_school">
                                            <label for="freex">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"></path>
                                                    </svg>
                                                </span>
                                                زیر دیپلم
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action" name="degree" id="wgiftx" {{ request("degree")=="high_school"?"checked":"" }}  value="high_school">
                                            <label for="wgiftx">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"></path>
                                                    </svg>
                                                </span>
                                                دیپلم
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action" name="degree" id="master" {{ request("degree")=="master"?"checked":"" }}  value="master">
                                            <label for="master">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"></path>
                                                    </svg>
                                                </span>
                                                کارشناسی
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action" name="degree" id="high_master" {{ request("degree")=="high_master"?"checked":"" }}  value="high_master">
                                            <label for="high_master">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"></path>
                                                    </svg>
                                                </span>
                                                کارشناسی ارشد
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radiocontainer">
                                            <input type="radio" class="fom_action" name="degree" id="phd" {{ request("degree")=="phd"?"checked":"" }}  value="phd">
                                            <label for="phd">
                                                <span class="check">
                                                    <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.6665 7.11475L10.7945 0.986084L11.7378 1.92875L4.6665 9.00008L0.423828 4.75742L1.3665 3.81475L4.6665 7.11475Z" fill="white"></path>
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

                </form>


            </div>
        </div>
        <div id="list-item">
            <div class="bread-filter">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">صفحه اصلی</a></li>
                        <li class="sep">
                            <span>
                                <svg width="7" height="10" viewBox="0 0 7 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.943369 4.94888C0.94335 5.08612 0.970364 5.22202 1.02287 5.34882C1.07537 5.47561 1.15234 5.59084 1.24937 5.6879L5.14936 9.58789C5.34523 9.78375 5.61087 9.8938 5.88786 9.8938C6.16485 9.8938 6.43049 9.78375 6.62635 9.58789C6.82222 9.39203 6.93226 9.12639 6.93226 8.8494C6.93226 8.5724 6.82222 8.30676 6.62635 8.1109L4.22636 4.9469L6.62635 1.7829C6.82222 1.58704 6.93226 1.32139 6.93226 1.0444C6.93226 0.767412 6.82222 0.50174 6.62635 0.305878C6.43049 0.110015 6.16485 2.14471e-08 5.88786 0C5.61087 -2.1447e-08 5.34523 0.110015 5.14936 0.305878L1.24937 4.2059C1.15181 4.3034 1.07453 4.41925 1.02201 4.54678C0.969491 4.67431 0.942768 4.81096 0.943369 4.94888Z"
                                        fill="#A6A5AA" />
                                </svg>

                            </span>
                        </li>
                        <li><span>بازدید کننده ها</span></li>
                    </ul>
                </div>
                @if ($ad)
                <div class="breadcrumb">
                    <h1>
                        بلدچی های مرتبط با آگهی
                        <a href="{{ route('single.ad', $ad->id) }}" class="">
                            {{ $ad->title }}
                        </a>
                    </h1>

                </div>
                @endif


                <div class="result-order d-flex align-content-center">
                    <div class="filter-title">
                        <h4>
                            <span class="icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 7.75H3C2.59 7.75 2.25 7.41 2.25 7C2.25 6.59 2.59 6.25 3 6.25H21C21.41 6.25 21.75 6.59 21.75 7C21.75 7.41 21.41 7.75 21 7.75Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M18 12.75H6C5.59 12.75 5.25 12.41 5.25 12C5.25 11.59 5.59 11.25 6 11.25H18C18.41 11.25 18.75 11.59 18.75 12C18.75 12.41 18.41 12.75 18 12.75Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M14 17.75H10C9.59 17.75 9.25 17.41 9.25 17C9.25 16.59 9.59 16.25 10 16.25H14C14.41 16.25 14.75 16.59 14.75 17C14.75 17.41 14.41 17.75 14 17.75Z"
                                        fill="currentColor"></path>
                                </svg>

                            </span>
                            <span>نمایش بر اساس :</span>
                        </h4>
                    </div>
                    <div class="genr-toggle">
                        <ul>
                            {{-- <li>
                                <div class="label-containef">
                                    <input type="radio" {{ request("ordering")=="related" ?"checked":"" }} form="ba_f"
                                        class="fom_action" name="ordering" value="related" id="related">
                                    <label for="related">
                                        <span>مرتبط ترین</span>
                                    </label>
                                </div>
                            </li> --}}
                            <li>
                                <div class="label-containef">
                                    <input type="radio" {{ request('ordering')=='newest' ? 'checked' : '' }} form="ba_f"
                                        class="fom_action" name="ordering" value="newest" id="newest">
                                    <label for="newest">
                                        <span>جدیدترین</span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="label-containef">
                                    <input type="radio" {{ request('ordering')=='oldest' ? 'checked' : '' }} form="ba_f"
                                        class="fom_action" name="ordering" value="oldest" id="oldest">
                                    <label for="oldest">
                                        <span>قدیمی ترین</span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="label-containef">
                                    <input type="radio" {{ request('ordering')=='favourite' ? 'checked' : '' }}
                                        form="ba_f" class="fom_action" name="ordering" value="favourite" id="favourite">
                                    <label for="favourite">
                                        <span>محبوب ترین</span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-xxl-3 col-lg-4 col-md-6">
                    <div class="single-user">
                        <div class="top">
                            <div class="location">
                                <span class="icon">
                                    <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 13.4334L9.3 10.1334C9.9526 9.48078 10.397 8.64926 10.577 7.74403C10.7571 6.8388 10.6646 5.90051 10.3114 5.04781C9.95817 4.19512 9.36003 3.46632 8.59261 2.95356C7.82519 2.4408 6.92296 2.16711 6 2.16711C5.07704 2.16711 4.17481 2.4408 3.40739 2.95356C2.63997 3.46632 2.04183 4.19512 1.68861 5.04781C1.33539 5.90051 1.24294 6.8388 1.42297 7.74403C1.603 8.64926 2.04741 9.48078 2.7 10.1334L6 13.4334ZM6 15.3188L1.75734 11.0761C0.918228 10.237 0.346791 9.16789 0.115286 8.00401C-0.11622 6.84013 0.00260456 5.63373 0.456732 4.53738C0.91086 3.44103 1.6799 2.50396 2.66659 1.84467C3.65328 1.18539 4.81332 0.833496 6 0.833496C7.18669 0.833496 8.34672 1.18539 9.33342 1.84467C10.3201 2.50396 11.0891 3.44103 11.5433 4.53738C11.9974 5.63373 12.1162 6.84013 11.8847 8.00401C11.6532 9.16789 11.0818 10.237 10.2427 11.0761L6 15.3188ZM6 8.16678C6.35362 8.16678 6.69276 8.0263 6.94281 7.77625C7.19286 7.5262 7.33334 7.18707 7.33334 6.83344C7.33334 6.47982 7.19286 6.14068 6.94281 5.89064C6.69276 5.64059 6.35362 5.50011 6 5.50011C5.64638 5.50011 5.30724 5.64059 5.05719 5.89064C4.80715 6.14068 4.66667 6.47982 4.66667 6.83344C4.66667 7.18707 4.80715 7.5262 5.05719 7.77625C5.30724 8.0263 5.64638 8.16678 6 8.16678ZM6 9.50011C5.29276 9.50011 4.61448 9.21916 4.11438 8.71906C3.61429 8.21897 3.33334 7.54069 3.33334 6.83344C3.33334 6.1262 3.61429 5.44792 4.11438 4.94783C4.61448 4.44773 5.29276 4.16678 6 4.16678C6.70725 4.16678 7.38552 4.44773 7.88562 4.94783C8.38572 5.44792 8.66667 6.1262 8.66667 6.83344C8.66667 7.54069 8.38572 8.21897 7.88562 8.71906C7.38552 9.21916 6.70725 9.50011 6 9.50011Z"
                                            fill="#828282"></path>
                                    </svg>
                                </span>
                                <span class="state">تهران</span>
                                <span>،</span>
                                <span class="city">شهریار</span>
                            </div>

                            <div class="satis">
                                <span>
                                    رضایت ۸۹%
                                </span>
                            </div>
                        </div>

                        <div class="user-det">
                            <div class="img">
                                <img src="images/user1.jpg" alt="">
                            </div>
                            <h4 class="name">
                                <a href="#">فرزین فراهانی</a>
                            </h4>
                            <div class="ehrazus">
                                <span class="title">احراز هویت : </span>
                                <span class="val"> تایید شده</span>
                                <span class="icon active">
                                    <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="currentColor"
                                            d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="button">
                            <a href="#" class="icon-button theme">
                                <span>مشاهدهs پروفایل</span>
                                <span class="icon">
                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.8928 5.69696H4.23878L8.00877 1.95697C8.22073 1.73943 8.33936 1.44771 8.33936 1.14398C8.33936 0.84025 8.22073 0.548478 8.00877 0.330933C7.79409 0.118902 7.50451 0 7.20277 0C6.90104 0 6.61145 0.118902 6.39677 0.330933L0.664772 6.03094C0.459743 6.24904 0.345596 6.53709 0.345596 6.83643C0.345596 7.13576 0.459743 7.42387 0.664772 7.64197L6.39677 13.342C6.61145 13.554 6.90104 13.6729 7.20277 13.6729C7.50451 13.6729 7.79409 13.554 8.00877 13.342C8.21591 13.1263 8.33502 12.8409 8.34277 12.5419C8.33983 12.2402 8.22013 11.9513 8.00877 11.736L4.23878 7.98096H13.8928C14.1894 7.97217 14.471 7.84818 14.6777 7.63525C14.8844 7.42233 15 7.13722 15 6.84045C15 6.54369 14.8844 6.25858 14.6777 6.04565C14.471 5.83273 14.1894 5.70874 13.8928 5.69995V5.69696Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div> --}}
                @if ($baladchies->count())
                @if(request("advertise_id"))
                <div class="modal fade" id="note_visitor" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> نکته </h5>
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
                                <p>
                                    این افراد اماده بازدیدن،شما میتونید بعد از ارزشیابی باهاشون تماس بگیرید و با
                                    مبلغ توافقی برن کالای مورد نظر شما تو اون منطقه رو بررسی کنن، یادتون باشه ممکنه
                                    کارشناس نباشن و فقط میتونن وجود کالا رو به شما تایید بدن
                                </p>
                                <button class="icon-button red cook_e full close_pops">
                                    <span>متوجه شدم</span>

                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                @endif



                @foreach ($baladchies as $baladchi)
                @include('home.single_baladchi')
                @endforeach
                @else
                <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center">
                            <h1>
                                واسه بازدید کسی تو این منطقه اعلام آمادگی نکرده
                            </h1>
                            @auth

                            <b>
                                <a class="icon-button red" href="{{ route('panel.visitor') }}">
                                    <span> بازدیدکننده شو</span>
                                    <span class="icon">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 6V0H8V6H14V8H8V14H6V8H0V6H6Z" fill="currentColor"></path>
                                        </svg>

                                    </span>
                                </a>
                            </b>
                            @endauth
                        </div>

                    </div>
                </div>
                @endif



            </div>
            <div class="row">
                <div class="col-12">
                    <div class="load-more pagina d-flex">

                        {{-- <button class="vip-load">
                            <span>نمایش بیشتر</span>
                            <span class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 0C10.2652 0 10.5196 0.105357 10.7071 0.292893C10.8946 0.48043 11 0.734784 11 1V4C11 4.26522 10.8946 4.51957 10.7071 4.70711C10.5196 4.89464 10.2652 5 10 5C9.73478 5 9.48043 4.89464 9.29289 4.70711C9.10536 4.51957 9 4.26522 9 4V1C9 0.734784 9.10536 0.48043 9.29289 0.292893C9.48043 0.105357 9.73478 0 10 0ZM10 15C10.2652 15 10.5196 15.1054 10.7071 15.2929C10.8946 15.4804 11 15.7348 11 16V19C11 19.2652 10.8946 19.5196 10.7071 19.7071C10.5196 19.8946 10.2652 20 10 20C9.73478 20 9.48043 19.8946 9.29289 19.7071C9.10536 19.5196 9 19.2652 9 19V16C9 15.7348 9.10536 15.4804 9.29289 15.2929C9.48043 15.1054 9.73478 15 10 15ZM20 10C20 10.2652 19.8946 10.5196 19.7071 10.7071C19.5196 10.8946 19.2652 11 19 11H16C15.7348 11 15.4804 10.8946 15.2929 10.7071C15.1054 10.5196 15 10.2652 15 10C15 9.73478 15.1054 9.48043 15.2929 9.29289C15.4804 9.10536 15.7348 9 16 9H19C19.2652 9 19.5196 9.10536 19.7071 9.29289C19.8946 9.48043 20 9.73478 20 10ZM5 10C5 10.2652 4.89464 10.5196 4.70711 10.7071C4.51957 10.8946 4.26522 11 4 11H1C0.734784 11 0.48043 10.8946 0.292893 10.7071C0.105357 10.5196 0 10.2652 0 10C0 9.73478 0.105357 9.48043 0.292893 9.29289C0.48043 9.10536 0.734784 9 1 9H4C4.26522 9 4.51957 9.10536 4.70711 9.29289C4.89464 9.48043 5 9.73478 5 10ZM17.071 17.071C16.8835 17.2585 16.6292 17.3638 16.364 17.3638C16.0988 17.3638 15.8445 17.2585 15.657 17.071L13.536 14.95C13.3538 14.7614 13.253 14.5088 13.2553 14.2466C13.2576 13.9844 13.3628 13.7336 13.5482 13.5482C13.7336 13.3628 13.9844 13.2576 14.2466 13.2553C14.5088 13.253 14.7614 13.3538 14.95 13.536L17.071 15.656C17.164 15.7489 17.2377 15.8592 17.2881 15.9806C17.3384 16.102 17.3643 16.2321 17.3643 16.3635C17.3643 16.4949 17.3384 16.625 17.2881 16.7464C17.2377 16.8678 17.164 16.9781 17.071 17.071ZM6.464 6.464C6.27647 6.65147 6.02216 6.75679 5.757 6.75679C5.49184 6.75679 5.23753 6.65147 5.05 6.464L2.93 4.344C2.74236 4.15649 2.63689 3.90212 2.6368 3.63685C2.6367 3.37158 2.74199 3.11714 2.9295 2.9295C3.11701 2.74186 3.37138 2.63639 3.63665 2.6363C3.90192 2.6362 4.15636 2.74149 4.344 2.929L6.464 5.05C6.65147 5.23753 6.75679 5.49184 6.75679 5.757C6.75679 6.02216 6.65147 6.27647 6.464 6.464ZM2.93 17.071C2.74253 16.8835 2.63721 16.6292 2.63721 16.364C2.63721 16.0988 2.74253 15.8445 2.93 15.657L5.051 13.536C5.14325 13.4405 5.25359 13.3643 5.3756 13.3119C5.4976 13.2595 5.62882 13.2319 5.7616 13.2307C5.89438 13.2296 6.02606 13.2549 6.14895 13.3052C6.27185 13.3555 6.3835 13.4297 6.4774 13.5236C6.57129 13.6175 6.64554 13.7291 6.69582 13.852C6.7461 13.9749 6.7714 14.1066 6.77025 14.2394C6.7691 14.3722 6.74151 14.5034 6.6891 14.6254C6.63669 14.7474 6.56051 14.8578 6.465 14.95L4.345 17.071C4.25213 17.164 4.14184 17.2377 4.02044 17.2881C3.89904 17.3384 3.76892 17.3643 3.6375 17.3643C3.50608 17.3643 3.37596 17.3384 3.25456 17.2881C3.13316 17.2377 3.02287 17.164 2.93 17.071ZM13.536 6.464C13.3485 6.27647 13.2432 6.02216 13.2432 5.757C13.2432 5.49184 13.3485 5.23753 13.536 5.05L15.656 2.929C15.8435 2.74136 16.0979 2.63589 16.3631 2.6358C16.6284 2.6357 16.8829 2.74099 17.0705 2.9285C17.2581 3.11601 17.3636 3.37038 17.3637 3.63565C17.3638 3.90092 17.2585 4.15536 17.071 4.343L14.95 6.464C14.7625 6.65147 14.5082 6.75679 14.243 6.75679C13.9778 6.75679 13.7235 6.65147 13.536 6.464Z"
                                        fill="#697289" />
                                </svg>
                            </span>
                        </button> --}}

                        {{ $baladchies->appends(Request::all())->links('home.parts.pagination') }}

                        {{-- <div class="pagination">
                            <ul>
                                <li><a class="pagin" href="#">1</a></li>
                                <li class="active"><a class="pagin" href="#">2</a></li>
                                <li><a class="pagin" href="#">3</a></li>
                                <li><span class="dot3">...</span></li>
                                <li><a class="pagin" href="#">5</a></li>
                            </ul>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
