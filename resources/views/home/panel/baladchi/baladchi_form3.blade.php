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
                        <li class="step step3 active">
                            <span class="num">.2</span>
                            <h4>احراز هویت</h4>
                        </li>
                        <li class="step step4 active">
                            <span class="num">.3</span>
                            <h4>انتخاب دسته بندی</h4>
                        </li>
                    </ul>
                </div>
                <div class="dash-title">
                    <h3>ثبت نام به عنوان بلدچی</h3>
                </div>
                @include('main.error')
                <br>
                <div class="form">
                    <form action="{{ route('baladchi.form3') }}" method="post">
                        @csrf
                        @method('post')
                        {{--
                        <div class="select-label">
                            <label for="">انتخاب شهر محل فعالیت </label>
                            <label for="">شهر محل سکونت خود را انتخاب کنید</label>
                            <select name="city_id" id="choise_city" class="nice-select" data-place=" ">
                                @foreach (App\Models\City::all() as $city)
                                    <option {{ old('city_id', $user->city_id) == $city->id ? 'selected' : '' }}
                                        value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>  --}}

                        <div class="input-label big active">
                            <label for="">دستمزد شما برای یک ساعت مشاوره</label>
                            <input type="tell" value="{{ old('salary', $user->salary) }}" name="salary"
                                class="number_format" placeholder=" دستمزد شما برای یک ساعت مشاوره">
                        </div>



                        <div class="choose-cat-title">
                            <h4>انتخاب مهارت<span>(انتخاب حداکثر 2 مورد) </span></h4>
                            <span class="add add_new_skill_group pointer ">
                                + افزودن
                            </span>
                        </div>
                        <br>
                        <br>

                        <div class="skill_all_list">
                            @foreach ($user->skills as $ski)
                                <div class="choose-cat pare">
                                    <span class="cat-item">
                                        <span class="icon">
                                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 18V4.70002C1.99994 4.49474 2.06305 4.29442 2.18077 4.12625C2.29849 3.95809 2.4651 3.83022 2.658 3.76002L12.329 0.244017C12.4045 0.216523 12.4856 0.20765 12.5653 0.218151C12.645 0.228651 12.721 0.258216 12.7869 0.304337C12.8527 0.350459 12.9065 0.411778 12.9436 0.483095C12.9807 0.554413 13 0.633625 13 0.714017V5.66702L19.316 7.77202C19.5152 7.83837 19.6885 7.96573 19.8112 8.13607C19.934 8.3064 20.0001 8.51105 20 8.72102V18H22V20H0V18H2ZM4 18H11V2.85502L4 5.40102V18ZM18 18V9.44202L13 7.77502V18H18Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <input type="text" name="skills[]" value="{{ $ski->id }}" hidden>
                                        <span class="text">
                                            {{ $ski->name }}
                                        </span>
                                    </span>

                                    <div class="left-sec">
                                        <span class="edit-cat pointer remove_cat_item" data-id="{{ $ski->id }}">
                                            <span class="">حذف</span>
                                            <span class="icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M16.0418 3.01976L8.16183 10.8998C7.86183 11.1998 7.56183 11.7898 7.50183 12.2198L7.07183 15.2298C6.91183 16.3198 7.68183 17.0798 8.77183 16.9298L11.7818 16.4998C12.2018 16.4398 12.7918 16.1398 13.1018 15.8398L20.9818 7.95976C22.3418 6.59976 22.9818 5.01976 20.9818 3.01976C18.9818 1.01976 17.4018 1.65976 16.0418 3.01976Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M14.9102 4.1499C15.5802 6.5399 17.4502 8.4099 19.8502 9.0899"
                                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>

                                            </span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{--  <div class="select-label">
                            <label for="">انتخاب مهارت</label>
                            <select name="skills[]" id="" class="select2" multiple data-place="انتخاب مهارت">
                                <option value=""> یک مورد را انتخاب کنید </option>
                                @foreach (App\Models\Skill::where('parent_id', '!=', null)->get() as $skill)
                                    <option
                                        {{ in_array($skill->id,old('skills',$user->skills()->pluck('id')->toArray()))? 'selected': '' }}
                                        value="{{ $skill->id }}"> {{ $skill->name }} </option>
                                @endforeach
                            </select>
                        </div>  --}}

                        <div class="choose-cat-title">
                            <h4>به مخاطبین کدام دسته از آگهی ها معرفی شوید؟<span>(انتخاب حداکثر 2 مورد) </span></h4>
                            <span class="add add_new_cat_group pointer ">
                                + افزودن
                            </span>
                        </div>

                        <div class="cat_all_list">
                            @foreach ($user->telics as $user_telic)
                                <div class="choose-cat pare">
                                    <span class="cat-item">
                                        <span class="icon">
                                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 18V4.70002C1.99994 4.49474 2.06305 4.29442 2.18077 4.12625C2.29849 3.95809 2.4651 3.83022 2.658 3.76002L12.329 0.244017C12.4045 0.216523 12.4856 0.20765 12.5653 0.218151C12.645 0.228651 12.721 0.258216 12.7869 0.304337C12.8527 0.350459 12.9065 0.411778 12.9436 0.483095C12.9807 0.554413 13 0.633625 13 0.714017V5.66702L19.316 7.77202C19.5152 7.83837 19.6885 7.96573 19.8112 8.13607C19.934 8.3064 20.0001 8.51105 20 8.72102V18H22V20H0V18H2ZM4 18H11V2.85502L4 5.40102V18ZM18 18V9.44202L13 7.77502V18H18Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <input type="text" name="catlist[]" value="{{ $user_telic->id }}|telic" hidden>
                                        <span class="text">
                                            {{ $user_telic->name }}
                                        </span>
                                    </span>

                                    <div class="left-sec">
                                        <span class="edit-cat pointer remove_cat_item" data-id="{{ $user_telic->id }}">
                                            <span class="">حذف</span>
                                            <span class="icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M16.0418 3.01976L8.16183 10.8998C7.86183 11.1998 7.56183 11.7898 7.50183 12.2198L7.07183 15.2298C6.91183 16.3198 7.68183 17.0798 8.77183 16.9298L11.7818 16.4998C12.2018 16.4398 12.7918 16.1398 13.1018 15.8398L20.9818 7.95976C22.3418 6.59976 22.9818 5.01976 20.9818 3.01976C18.9818 1.01976 17.4018 1.65976 16.0418 3.01976Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M14.9102 4.1499C15.5802 6.5399 17.4502 8.4099 19.8502 9.0899"
                                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>

                                            </span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach


                            @foreach ($user->subsets as $user_subset)
                                <div class="choose-cat pare">
                                    <span class="cat-item">
                                        <span class="icon">
                                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 18V4.70002C1.99994 4.49474 2.06305 4.29442 2.18077 4.12625C2.29849 3.95809 2.4651 3.83022 2.658 3.76002L12.329 0.244017C12.4045 0.216523 12.4856 0.20765 12.5653 0.218151C12.645 0.228651 12.721 0.258216 12.7869 0.304337C12.8527 0.350459 12.9065 0.411778 12.9436 0.483095C12.9807 0.554413 13 0.633625 13 0.714017V5.66702L19.316 7.77202C19.5152 7.83837 19.6885 7.96573 19.8112 8.13607C19.934 8.3064 20.0001 8.51105 20 8.72102V18H22V20H0V18H2ZM4 18H11V2.85502L4 5.40102V18ZM18 18V9.44202L13 7.77502V18H18Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <input type="text" name="catlist[]" value="{{ $user_subset->id }}|subset"
                                            hidden>
                                        <span class="text">{{ $user_subset->name }}</span>
                                    </span>

                                    <div class="left-sec">


                                        <span class="edit-cat pointer remove_cat_item" data-id="{{ $user_subset->id }}">
                                            <span class="">حذف</span>
                                            <span class="icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M16.0418 3.01976L8.16183 10.8998C7.86183 11.1998 7.56183 11.7898 7.50183 12.2198L7.07183 15.2298C6.91183 16.3198 7.68183 17.0798 8.77183 16.9298L11.7818 16.4998C12.2018 16.4398 12.7918 16.1398 13.1018 15.8398L20.9818 7.95976C22.3418 6.59976 22.9818 5.01976 20.9818 3.01976C18.9818 1.01976 17.4018 1.65976 16.0418 3.01976Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M14.9102 4.1499C15.5802 6.5399 17.4502 8.4099 19.8502 9.0899"
                                                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>

                                            </span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="footer-section">
                            <div class="pair-button">
                                <a href="{{ route('baladchi.form2') }}" class="mid-button">
                                    برگشت
                                </a>
                                <form action=" {{ route('baladchi.form3') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <input id="sebd_da"
                                        style="display: {{ $user->subsets()->count() || $user->telics()->count() ? '' : '' }}"
                                        class="mid-button blue" type="submit" value="ذخیره اطلاعات ">
                                </form>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>










    <div class="modal fade new_at_list" id="search-modal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title right" id="exampleModalLongTitle"> انتخاب دسته بندی</h5>
                    <button type="button" class="close close_pops" data-dismiss="modal" aria-label="Close">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body" style="padding: 0">
                    {{--  <div class="pur-search-form">
                        <form action="">
                            <input type="text" class="text" id="search_brand" placeholder="جست وجوی   برند ">
                            <button class="search-button">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.58341 17.5C13.9557 17.5 17.5001 13.9555 17.5001 9.58329C17.5001 5.21104 13.9557 1.66663 9.58341 1.66663C5.21116 1.66663 1.66675 5.21104 1.66675 9.58329C1.66675 13.9555 5.21116 17.5 9.58341 17.5Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path opacity="0.4" d="M18.3334 18.3333L16.6667 16.6666" stroke="white"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                        </button>
                        </form>
                    </div>  --}}

                    <div class="sliding-menu" id="search_parent">
                        <ul id="main_list">
                            @foreach (App\Models\Category::all() as $cate)
                                <li>
                                    <div class="top">
                                        <span class="cat-item">
                                            <span class="icon">
                                                {!! $cate->icon !!}
                                            </span>
                                            <span class="text">{{ $cate->name }}</span>
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
                                        <ul>
                                            @foreach ($cate->subsets as $subset)
                                                <li>
                                                    <div class="sub-slid  {{ $subset->telics()->count() > 0 ? '' : 'no_subs_check' }}"
                                                        data-id="{{ $subset->id }}" data-name="{{ $subset->name }}"
                                                        data-type="subset">
                                                        <span> {{ $subset->name }}</span>
                                                        <span
                                                            class="icon  {{ $subset->telics()->count() > 0 ? '' : 'dis_none' }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-chevron-left"
                                                                width="18" height="18" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <polyline points="15 6 9 12 15 18"></polyline>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="sub">
                                                        <div class="back">
                                                            <span class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-arrow-right"
                                                                    width="18" height="18" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="#2c3e50" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <line x1="5" y1="12" x2="19"
                                                                        y2="12"></line>
                                                                    <line x1="13" y1="18" x2="19"
                                                                        y2="12"></line>
                                                                    <line x1="13" y1="6" x2="19"
                                                                        y2="12"></line>
                                                                </svg>
                                                            </span>
                                                            <span>بازگشت به همهٔ
                                                                {{ $subset->name }}

                                                            </span>
                                                        </div>
                                                        @if ($subset->telics()->count() > 0)
                                                            <ul>
                                                                @foreach ($subset->telics as $telic)
                                                                    <li>
                                                                        <div data-id="{{ $telic->id }}"
                                                                            data-name="{{ $telic->name }}"
                                                                            data-type="telic"
                                                                            class="sub-slid-end no_subs_check">
                                                                            <span>{{ $telic->name }} </span>

                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif

                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- <div class="pair-button">
                    <span class="mid-button" >
                        انصراف
                    </span>
                    <span class="mid-button orange2 new_bra" >
                        تایید
                    </span>
                </div> --}}
                </div>

            </div>
        </div>
    </div>
    {{--
    @foreach (App\Models\Skill::where('parent_id', '=', null)->get() as $skill_par)
    @if ($skill_par->childs()->count())
    @dd($skill_par->childs() )
    @endif
    @endforeach  --}}


    <div class="modal fade new_skill_list" id="search-modal" tabindex="-1" role="dialog" style="display: none"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: block;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title right" id="exampleModalLongTitle">انتخاب دسته بندی</h5>
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
                    {{--  <div class="pur-search-form">
                        <form action="">
                            <input type="text" class="text" placeholder="چست وجوی استان و شهر">
                            <button class="search-button">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.58341 17.5C13.9557 17.5 17.5001 13.9555 17.5001 9.58329C17.5001 5.21104 13.9557 1.66663 9.58341 1.66663C5.21116 1.66663 1.66675 5.21104 1.66675 9.58329C1.66675 13.9555 5.21116 17.5 9.58341 17.5Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path opacity="0.4" d="M18.3334 18.3333L16.6667 16.6666" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>

                            </button>
                        </form>
                    </div>  --}}

                    <div class="sliding-menu">
                        <ul>
                            @foreach (App\Models\Skill::where('parent_id', '=', null)->get() as $skill_par)
                                <li>
                                    <div class="top" style="display: flex;">
                                        <span class="cat-item">
                                            <span class="icon">
                                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2 18V4.70002C1.99994 4.49474 2.06305 4.29442 2.18077 4.12625C2.29849 3.95809 2.4651 3.83022 2.658 3.76002L12.329 0.244017C12.4045 0.216523 12.4856 0.20765 12.5653 0.218151C12.645 0.228651 12.721 0.258216 12.7869 0.304337C12.8527 0.350459 12.9065 0.411778 12.9436 0.483095C12.9807 0.554413 13 0.633625 13 0.714017V5.66702L19.316 7.77202C19.5152 7.83837 19.6885 7.96573 19.8112 8.13607C19.934 8.3064 20.0001 8.51105 20 8.72102V18H22V20H0V18H2ZM4 18H11V2.85502L4 5.40102V18ZM18 18V9.44202L13 7.77502V18H18Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <span class="text">{{ $skill_par->name }}</span>
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

                                    <div class="sub" style="display: none;">
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
                                        <ul>
                                            @foreach ($skill_par->childs() as $s_child)
                                                <li class="select_skill"  >
                                                    <div class="sub_sk animate__animated" data-id="{{ $s_child->id }}" id="sub_sk{{ $s_child->id}}"
                                                        data-name="{{ $s_child->name }}">
                                                        <span>{{ $s_child->name }}</span>
                                                        {{--  <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-chevron-left" width="18"
                                                        height="18" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <polyline points="15 6 9 12 15 18"></polyline>
                                                    </svg>
                                                </span>  --}}
                                                    </div>
                                                    <div class="sub">
                                                        <div class="back">
                                                            <span class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-arrow-right"
                                                                    width="18" height="18" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="#2c3e50" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <line x1="5" y1="12" x2="19"
                                                                        y2="12"></line>
                                                                    <line x1="13" y1="18" x2="19"
                                                                        y2="12"></line>
                                                                    <line x1="13" y1="6" x2="19"
                                                                        y2="12"></line>
                                                                </svg>
                                                            </span>
                                                            <span>بازگشت به همهٔ
                                                                {{ $skill_par->name }}
                                                            </span>
                                                        </div>
                                                        {{--  <ul>
                                                    <li>
                                                        <div class="sub-slid-end">
                                                            <span>زیر منو</span>

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sub-slid-end">
                                                            <span>زیر منو</span>

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sub-slid-end">
                                                            <span>زیر منو</span>

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="sub-slid-end">
                                                            <span>زیر منو</span>

                                                        </div>
                                                    </li>
                                                </ul>  --}}
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
                        <button class="mid-button close_pops">
                            انصراف
                        </button>
                        {{--  <button class="mid-button orange2">
                            تایید
                        </button>  --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
