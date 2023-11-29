@extends('main.panel')
@section('content')

    <div id="register-stpes">
        <div class="dash-title">
            <h3>ویرایش خرد جمعی
                {{$counsel->title}}

            </h3>
        </div>
        <div id="register">

            <div class="form">
                <form action="" id="edit_counsel_form" method="post">
                    @csrf
                    @method('post')
                    <div class="input-label big">
                        <label for="title">
                            <span> عنوان </span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ $counsel->title }}">
                    </div>

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
                            <option value="">یک گزینه را انتخاب کنید </option>
                            <option {{ $counsel->gender=="male"?'selected':'' }} value="male">مرد</option>
                            <option {{ $counsel->gender=="female"?'selected':'' }} value="female">زن</option>
                        </select>
                    </div>


                    <div class="select-label">
                        <label for="star">تعداد ستاره ویژه</label>
                        <select name="star" id="" class="nice-select" data-place="تعداد ستاره ویژه">
                            <option value="">یک گزینه را انتخاب کنید </option>
                           <option {{ $counsel->star=="1"?'selected':'' }} value="1">1</option>
                           <option {{ $counsel->star=="2"?'selected':'' }} value="2">2</option>
                           <option {{ $counsel->star=="3"?'selected':'' }} value="3">3</option>
                           <option {{ $counsel->star=="4"?'selected':'' }} value="4">4</option>
                           <option {{ $counsel->star=="5"?'selected':'' }} value="5">5</option>
                        </select>
                    </div>
                    <div class="input-label big postion_relative mb-0">
                        <label for="new_op">
                            <span> کلید وازه  </span>
                        </label>
                        <input type="text" name="new_op" id="new_op">
                        <span class=" pointer postion_absolute" id="new_tag" value=" ">
                            اضافه
                        </span>
                    </div>
                    <div>
                        <ul id="listq" class="tlist">
                            @foreach ($counsel->tags as $tag)

                             <li class="parent_li">
                                <input type="text" name="tags[]" class="remove" value="{{  $tag->tag }}">
                                <span class="">
                               {{ $tag->tag}}
                                </span>
                                <span class="remove_pa">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.99999 4.58599L10.243 0.342987C10.6335 -0.0474781 11.2665 -0.0474791 11.657 0.342986C12.0475 0.733452 12.0475 1.36652 11.657 1.75699L7.41399 5.99999L11.657 10.243C12.0475 10.6335 12.0475 11.2665 11.657 11.657C11.2665 12.0475 10.6335 12.0475 10.243 11.657L5.99999 7.41399L1.75699 11.657C1.36652 12.0475 0.733452 12.0475 0.342986 11.657C-0.0474791 11.2665 -0.0474789 10.6335 0.342987 10.243L4.58599 5.99999L0.342987 1.75699C-0.0474782 1.36652 -0.0474791 0.733452 0.342986 0.342986C0.733452 -0.0474791 1.36652 -0.0474789 1.75699 0.342987L5.99999 4.58599Z" fill="currentColor"></path>
                                </svg>
                                </span>
                            </li>
                            @endforeach

                        </ul>
                    </div>



                    <div class="select-label">
                        <label for="skill_id"> تخصص</label>
                        <select name="skills[]" id="skill_id" multiple class="select2" data-place=" تخصص">
                            @foreach (App\Models\Skill::where('parent_id','!=',null)->get() as $skill)
                                <option value="{{ $skill->id }}" {{ in_array( $skill->id,$counsel->skills()->pluck("id")->toArray() )?"selected":"" }}>{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="select-label">
                        <label for="degree">مدرک تحصیلی</label>
                        <select name="degree" id="" class="nice-select" data-place="مدرک تحصیلی">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            <option {{ $counsel->degree=="under_high_school"?"selected":'' }} value="under_high_school">زیر دیپلم</option>
                            <option {{ $counsel->degree=="high_school"?"selected":'' }} value="high_school"> دیپلم</option>
                            <option {{ $counsel->degree=="associate_degree"?"selected":'' }} value="associate_degree">کاردانی </option>
                            <option {{ $counsel->degree=="master"?"selected":'' }} value="master"> کارشناسی</option>
                            <option {{ $counsel->degree=="high_master"?"selected":'' }} value="high_master">کارشناسی ارشد </option>
                            <option {{ $counsel->degree=="phd"?"selected":'' }} value="phd"> phd</option>
                            <option {{ $counsel->degree=="high_school"?"selected":'' }} value="high_school">دیپلم
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
                            <option value="">یک گزینه را انتخاب کنید </option>
                            @for ($i = 5; $i < 50; $i++)
                                <option  {{ $counsel->answers==$i?"selected":'' }} value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    {{--  <div class="select-label">
                        <label for="reward"> پاداش پرداختی </label>
                        <select name="reward" id="reward" class="nice-select" data-place="پاداش پرداختی">
                            <option {{ $counsel->reward=="no_reward"?"selected":'' }} value="no_reward"> بدون پاداش </option>
                            <option {{ $counsel->reward=="select_the_best_answer"?"selected":'' }} value="select_the_best_answer"> انتخاب پاسخ برتر </option>
                            <option {{ $counsel->reward=="divide_reward"?"selected":'' }} value="divide_reward"> تقسیم ین همه </option>
                        </select>
                    </div>


                    <div  class="input-label big" id="p_price" style="display:{{  $counsel->reward=="no_reward"?'none':'' }}">
                        <label for="price">
                            <span>قیمت برای پاسخ</span>
                        </label>
                        <input type="number" name="price" id="price" value={{ $counsel->price}}>
                    </div>  --}}
                    <div class="footer-section">
                        <div class="pair-button">
                            {{--  <a href="http://127.0.0.1:8000/panel/baladchi_form1" class="">
                                برگشت
                            </a>  --}}
                            <a href="{{route('panel.counsel')}}" class="mid-button">برگشت</a>



                            <span class="mid-button blue pointer" id="edit_counsel" data-id="{{ $counsel->id }}" >
                                ذخیره
                            </span>

                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
@endsection
