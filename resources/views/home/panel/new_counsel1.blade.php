@extends('main.panel')
@section('content')
    <div id="">

        <div id="register-stpes">
            <div class="dash-title">
                <h3>خرد جمعی جدید</h3>
            </div>
            <div id="register">

                <div class="stepes ss">
                    <ul>
                        {{-- <li class="step step1 active">
                        <span class="num">.۱</span>
                        <h4>اsطلاعات کاربsری</h4>
                    </li> --}}
                        <li class="step step2 active">
                            <span class="num">.1</span>
                            <h4> تعریف خرد جمعی</h4>
                        </li>
                        <li class="step step3">
                            <span class="num">.2</span>
                            <h4>پرداخت </h4>
                        </li>
                        <li class="step step4">
                            <span class="num">.3</span>
                            <h4> سوالات </h4>
                        </li>
                    </ul>
                </div>
                <div class="form par2">
                    <form action="" id="counsel_form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="input-label big">
                            <label for="title">
                                <span> عنوان </span>
                            </label>
                            <input type="text" name="title" id="title">
                        </div>



                        <div class="input-label textarea big">
                            <label for=""> توضیحات </label>
                            <textarea name="info" id="" cols="30" rows="10"></textarea>

                        </div>
                        <div class="input-label big">
                            <label for="">تصویر </label>
                            <input type="file" name="img" placeholder="" class="path_img" accept="image/*">
                            <p style="color: red">
                                حداقل ابعاد : ارتفاع :300px -
                                عرض: 1500px -
                                حجم:1M


                            </p>
                            -
                        </div>
                        <div class="avatar-pop" style="display:none; height: 200px"></div>
                        <br>
                        {{--  <div class="select-label">
                        <label for="question"> تعداد سوالات</label>
                        <select name="question" id="question" class="nice-select" data-place=" تعداد  سوالات">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            @for ($i = 1; $i < 50; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>  --}}

                        <div class="select-label">
                            <label for="gender"> جنسیت</label>
                            <select name="gender" id="gender" class="nice-select" data-place=" جنسیت">
                                <option value="">هر دو </option>
                                <option value="male">مرد</option>
                                <option value="female">زن</option>
                            </select>
                        </div>

                        <div class="select-label">
                            <label for="star"> حداقل ستاره ویژه</label>
                            <select name="star" id="" class="nice-select" data-place="تعداد ستاره ویژه">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="input-label big postion_relative mb-0">
                            <label for="new_op">
                                <span> کلید واژه </span>
                            </label>
                            <input type="text" name="new_op" id="new_op">
                            <span class=" pointer postion_absolute" id="new_tag" value=" ">
                                اضافه
                            </span>
                        </div>
                        <div>
                            <ul id="listq" class="tlist">

                            </ul>
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

                        </div>

                        {{--  <div class="select-label">
                        <label for="skill_id"> تخصص</label>
                        <select name="skills[]" id="skill_id" multiple class="select2" data-place=" تخصص">
                            @foreach (App\Models\Skill::where('parent_id', '!=', null)->get() as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>  --}}
                        <div class="select-label">
                            <label for="degree">مدرک تحصیلی</label>
                            <select name="degree" id="" class="nice-select" data-place="مدرک تحصیلی">
                                <option value="under_high_school">زیر دیپلم</option>
                                <option value="high_school"> دیپلم</option>
                                <option value="associate_degree">کاردانی </option>
                                <option value="master"> کارشناسی</option>
                                <option value="high_master">کارشناسی ارشد </option>
                                <option value="phd"> phd</option>
                                <option value="high_school">دیپلم
                                </option>
                            </select>
                        </div>
                        {{--  <div class="select-label">
                        <label for="qtype">نوع سوال </label>
                        <select name="qtype" id="" class="nice-select" data-place="نوع سوال">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            <option value="descriptive"> تشریحی</option>
                            <option value="2_option"> دو گزینه </option>
                            <option value="3_option"> سه گزینه </option>
                            <option value="4_option"> چهار گزینه </option>
                            <option value="5_option"> پنج گزینه </option>
                        </select>
                    </div>  --}}
                        <div class="select-label">
                            <label for="answers"> حداکثر پاسخ دهنده گان</label>
                            <select name="answers" id="answers" class="nice-select" data-place=" پاسخ دهنده گان   ">
                                @for ($i = 5; $i < 50; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="input-label big" id="url" style="display:">
                            <label for="price">
                                <span>لینک </span>
                            </label>
                            <input type="text" name="url" id="url" value="{{ $url }}">
                        </div>


                        <div class="select-label">
                            <label for="reward"> پاداش پرداختی </label>
                            <select name="reward" id="reward" class="nice-select" data-place="پاداش پرداختی">
                                <option value="no_reward"> بدون پاداش </option>
                                <option value="select_the_best_answer"> پاداش بهترین جواب </option>
                                <option value="divide_reward"> تقسیم بین همه </option>
                            </select>
                        </div>


                        {{--  <div class="input-label big" id="p_price" style="display:none">
                        <label for="price">
                            <span>قیمت برای پاسخ</span>
                        </label>
                        <input type="number" name="price" id="price">
                    </div>  --}}

                        <div class="input-label big" id="p_price" style="display:none">
                            <label for="">پاداش پاسخ دهندگان </label>
                            <input type="number" name="price" id="price"
                                class="rtl_dir number_format amount_zero" placeholder="" value="0">
                            <div class="un">
                                <span>تومان</span>
                            </div>
                        </div>
                        <div class="footer-section">
                            <div class="pair-button">
                                {{--  <a href="http://127.0.0.1:8000/panel/baladchi_form1" class="mid-button">
                                برگشت
                            </a>  --}}

                                <div id="save__b" style="display:">

                                    <span class="mid-button blue pointer" id="save_counsel" value=" ">
                                        ذخیره
                                    </span>
                                </div>
                                {{--  <div id="pay_b" style="display:none">

                                <button form="pay_d" style="background:#" class="mid-button blue pointer">
                                    پرداخت
                                </button>
                           </div>  --}}

                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>




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
                                                <li class="select_skill">
                                                    <div class="sub_sk animate__animated" data-id="{{ $s_child->id }}"
                                                        id="sub_sk{{ $s_child->id }}" data-name="{{ $s_child->name }}">
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
