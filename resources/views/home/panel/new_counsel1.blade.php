@extends('main.panel')
@section('content')

<div id="dashmain">

    <div id="register-stpes">
        <div class="dash-title">
            <h3>خرد جمعی جدید</h3>
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
                        <h4>   تعریف خرد جمعی</h4>
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
            <div class="form">
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
                        <input type="file" name="img" placeholder="" accept="image/*">
                        <p style="color: red">
حداقل ابعاد : ارتفاع :300px -
عرض: 1500px -
حجم:1M


                        </p>
                        -
                    </div>
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
                        <label for="star"> حداقل  ستاره ویژه</label>
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
                            <span> کلید وازه جدید </span>
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



                    <div class="select-label">
                        <label for="skill_id"> تخصص</label>
                        <select name="skills[]" id="skill_id" multiple class="select2" data-place=" تخصص">
                            @foreach (App\Models\Skill::where('parent_id','!=',null)->get() as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
                            <option value="select_the_best_answer"> انتخاب پاسخ برتر </option>
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
                        <label for="">قیمت برای پاسخ </label>
                        <input type="number" name="price" id="price" class="rtl_dir number_format amount_zero" placeholder="" value="0">
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

@endsection
