@extends('main.panel')
@section('content')
    <div class="dash-main-content">
        <div class="tra-table">
            <div class="search-title">


                <h4 class="dash-in-title">اخرین خردجمعی ها </h4>
                <a class="icon-button red" href="{{ route('panel.new.counsel1') }}">
                    <span>  خردجمعی جدید</span>
                    <span class="icon">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 6V0H8V6H14V8H8V14H6V8H0V6H6Z" fill="currentColor"></path>
                        </svg>

                    </span>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>
                            <span class="tit">شماره</span>


                        </th>
                        <th>
                            <span class="tit"> عنوان</span>


                        </th>
                        <th>
                            <span class="tit">مهارت</span>


                        </th>
                        {{--  <th>
                            <span class="tit">وضعیت نمایش</span>
                        </th>  --}}
                        <th> <span class="tit"> وضعیت </span></th>
                        <th> <span class="tit"> پاسخ دهندگان</span></th>
                        <th> <span class="tit"> پاداش</span></th>
                        <th> <span class="tit"> تعداد سوال</span></th>
                        <th> <span class="tit"> تاریخ ایجاد</span></th>
                        <th> <span class="tit">  تایید ادمین </span></th>
                        <th>
                            <span class="tit"> عملکرد</span>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($counsels as $counsel)
                        {{--  @dd($counsel)  --}}
                        <tr>
                            <td><span>{{ $loop->iteration }}</span></td>
                            <td><span>{{ $counsel->title }}</span></td>
                            <td><span>{{implode( " ",$counsel->skills()->pluck("name")->toArray())}}</span></td>
                            {{--  <td><span>{{ $counsel->active ? 'در حال نمایش' : 'غیر فعال' }}</span></td>  --}}
                            <td><span>{{ __('arr.' . $counsel->status) }}</span></td>
                            <td><span>0 </span></td>
                            <td><span>{{ __('arr.' . $counsel->reward) }}</span></td>
                            <td><span>
                                    {{ $counsel->Counselquestions()->count() }}
                                </span></td>
                            <td><span>{{ Morilog\Jalali\Jalalian::forge($counsel->created_at)->format('Y-m-d') }}</span>
                            </td>
                            {{--  @dd($counsel->confirm)  --}}

                            <td><span {{ $counsel->confirm?'  orange ':'green   ' }}>{{ $counsel->confirm?'تایید شده ':'د رانتظار تایید ' }}</span></td>
                            <td>
                                @if($counsel->check_for_active() )
                                <form class="inline-block " action="{{ route('active.counsel', $counsel->id) }}"
                                    method="post" data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                                    @csrf
                                    @method('post')
                                    <button class="inline-block no_border heart">
                                         منتظر انتشار
                                    </button>
                                </form>
                                @endif

                                {{--  @if (in_array($counsel->reward, ['select_the_best_answer', 'divide_reward']) && $counsel->pay != 1)
                                    <form class="inline-block" action="{{ route('send.bill',$counsel->id) }}" method="post"
                                        data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                                        @csrf
                                        @method('post')
                                        <input type="text" value="{{ $counsel->id }}" hidden name="counsel_id">
                                        <input type="text" value="{{ $counsel->price }}" hidden name="amount">
                                        <input type="text" value="pay_counsel" name="type" hidden>
                                        <button class="inline-block stat-box green  no_border">
                                            پرداخت
                                        </button>
                                    </form>
                                @endif  --}}

                                @if($counsel->Counselquestions()->count()==0 )

                                <form class="inline-block" action="{{ route('destroy.counsel', $counsel->id) }}"
                                    method="post" data-message="بعد از تایید آگهی شما حذف  خواهد شد ">
                                    @csrf
                                    @method('post')
                                    <button class="inline-block no_border">
                                        <span class="icon inline-block no_border">
                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.9997 7.22998C20.9797 7.22998 20.9497 7.22998 20.9197 7.22998C15.6297 6.69998 10.3497 6.49998 5.11967 7.02998L3.07967 7.22998C2.65967 7.26998 2.28967 6.96998 2.24967 6.54998C2.20967 6.12998 2.50967 5.76998 2.91967 5.72998L4.95967 5.52998C10.2797 4.98998 15.6697 5.19998 21.0697 5.72998C21.4797 5.76998 21.7797 6.13998 21.7397 6.54998C21.7097 6.93998 21.3797 7.22998 20.9997 7.22998Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M8.50074 6.22C8.46074 6.22 8.42074 6.22 8.37074 6.21C7.97074 6.14 7.69074 5.75 7.76074 5.35L7.98074 4.04C8.14074 3.08 8.36074 1.75 10.6907 1.75H13.3107C15.6507 1.75 15.8707 3.13 16.0207 4.05L16.2407 5.35C16.3107 5.76 16.0307 6.15 15.6307 6.21C15.2207 6.28 14.8307 6 14.7707 5.6L14.5507 4.3C14.4107 3.43 14.3807 3.26 13.3207 3.26H10.7007C9.64074 3.26 9.62074 3.4 9.47074 4.29L9.24074 5.59C9.18074 5.96 8.86074 6.22 8.50074 6.22Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M15.2104 23.25H8.79039C5.30039 23.25 5.16039 21.32 5.05039 19.76L4.40039 9.68995C4.37039 9.27995 4.69039 8.91995 5.10039 8.88995C5.52039 8.86995 5.87039 9.17995 5.90039 9.58995L6.55039 19.66C6.66039 21.18 6.70039 21.75 8.79039 21.75H15.2104C17.3104 21.75 17.3504 21.18 17.4504 19.66L18.1004 9.58995C18.1304 9.17995 18.4904 8.86995 18.9004 8.88995C19.3104 8.91995 19.6304 9.26995 19.6004 9.68995L18.9504 19.76C18.8404 21.32 18.7004 23.25 15.2104 23.25Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M13.6581 17.75H10.3281C9.91813 17.75 9.57812 17.41 9.57812 17C9.57812 16.59 9.91813 16.25 10.3281 16.25H13.6581C14.0681 16.25 14.4081 16.59 14.4081 17C14.4081 17.41 14.0681 17.75 13.6581 17.75Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M14.5 13.75H9.5C9.09 13.75 8.75 13.41 8.75 13C8.75 12.59 9.09 12.25 9.5 12.25H14.5C14.91 12.25 15.25 12.59 15.25 13C15.25 13.41 14.91 13.75 14.5 13.75Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                                @endif

                                <a class="action inline-block" href="{{ route('panel.new.question', $counsel->id) }}">
                                    <span class="icon">
                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15 23.25H9C3.57 23.25 1.25 20.93 1.25 15.5V9.5C1.25 4.07 3.57 1.75 9 1.75H11C11.41 1.75 11.75 2.09 11.75 2.5C11.75 2.91 11.41 3.25 11 3.25H9C4.39 3.25 2.75 4.89 2.75 9.5V15.5C2.75 20.11 4.39 21.75 9 21.75H15C19.61 21.75 21.25 20.11 21.25 15.5V13.5C21.25 13.09 21.59 12.75 22 12.75C22.41 12.75 22.75 13.09 22.75 13.5V15.5C22.75 20.93 20.43 23.25 15 23.25Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M8.49935 18.1901C7.88935 18.1901 7.32935 17.9701 6.91935 17.5701C6.42935 17.0801 6.21935 16.3701 6.32935 15.6201L6.75935 12.6101C6.83935 12.0301 7.21935 11.2801 7.62935 10.8701L15.5093 2.99006C17.4993 1.00006 19.5193 1.00006 21.5093 2.99006C22.5993 4.08006 23.0893 5.19006 22.9893 6.30006C22.8993 7.20006 22.4193 8.08006 21.5093 8.98006L13.6293 16.8601C13.2193 17.2701 12.4693 17.6501 11.8893 17.7301L8.87935 18.1601C8.74935 18.1901 8.61935 18.1901 8.49935 18.1901ZM16.5693 4.05006L8.68935 11.9301C8.49935 12.1201 8.27935 12.5601 8.23935 12.8201L7.80935 15.8301C7.76935 16.1201 7.82935 16.3601 7.97935 16.5101C8.12935 16.6601 8.36935 16.7201 8.65935 16.6801L11.6693 16.2501C11.9293 16.2101 12.3793 15.9901 12.5593 15.8001L20.4393 7.92006C21.0893 7.27006 21.4293 6.69006 21.4793 6.15006C21.5393 5.50006 21.1993 4.81006 20.4393 4.04006C18.8393 2.44006 17.7393 2.89006 16.5693 4.05006Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M19.8515 10.33C19.7815 10.33 19.7115 10.32 19.6515 10.3C17.0215 9.56003 14.9315 7.47003 14.1915 4.84003C14.0815 4.44003 14.3115 4.03003 14.7115 3.91003C15.1115 3.80003 15.5215 4.03003 15.6315 4.43003C16.2315 6.56003 17.9215 8.25003 20.0515 8.85003C20.4515 8.96003 20.6815 9.38003 20.5715 9.78003C20.4815 10.12 20.1815 10.33 19.8515 10.33Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span> سوالات</span>
                                </a>
                                @if($counsel->viwecounsel_user()->count()==0)

                                <a class="action inline-block" href="{{ route('edit.counsel', $counsel->id) }}">
                                    <span> ویرایش</span>
                                </a>
                                @endif

                                <a class="action inline-block" href="{{ route('counsel.answers', $counsel->id) }}">
                                    <span> نتیجه</span>
                                </a>

                                <a class="action inline-block" href="{{ route('counsel.perview', $counsel->id) }}">
                                    <span> پیش نمایش</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach





                </tbody>

            </table>
        </div>
    </div>
    {{--  <div id="register-stpes">
        <div class="dash-title">
            <h3>تعریف خرد جمعی </h3>
        </div>
        <div id="register">

            <div class="form">
                <form action="" id="counsel_form" method="post">
                    @csrf
                    @method('post')
                    <div class="input-label big">
                        <label for="title">
                            <span> عنوان </span>
                        </label>
                        <input type="text" name="title" id="title">
                    </div>

                    <div class="select-label">
                        <label for="gender"> جنسیت</label>
                        <select name="gender" id="gender" class="nice-select" data-place=" جنسیت">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            <option value="male">مرد</option>
                            <option value="female">زن</option>
                        </select>
                    </div>

                    <div class="select-label">
                        <label for="star"> حداقل  ستاره ویژه</label>
                        <select name="star" id="" class="nice-select" data-place="تعداد ستاره ویژه">
                            <option value="">یک گزینه را انتخاب کنید </option>
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
                        <select name="skill_id" id="skill_id" class="nice-select" data-place=" تخصص">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            @foreach (App\Models\Skill::where('parent_id','!=',null)->get() as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-label">
                        <label for="degree">مدرک تحصیلی</label>
                        <select name="degree" id="" class="nice-select" data-place="مدرک تحصیلی">
                            <option value="">یک گزینه را انتخاب کنید </option>
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

                    <div class="select-label">
                        <label for="answers"> حداکثر پاسخ دهنده گان</label>
                        <select name="answers" id="answers" class="nice-select" data-place=" پاسخ دهنده گان   ">
                            <option value="">یک گزینه را انتخاب کنید </option>
                            @for ($i = 5; $i < 50; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="select-label">
                        <label for="reward"> پاداش پرداختی </label>
                        <select name="reward" id="reward" class="nice-select" data-place="پاداش پرداختی">
                            <option value="no_reward"> بدون پاداش </option>
                            <option value="select_the_best_answer"> انتخاب پاسخ برتر </option>
                            <option value="divide_reward"> تقسیم بین همه </option>
                        </select>
                    </div>




                    <div class="input-label big" id="p_price" style="display:none">
                        <label for="">قیمت برای پاسخ </label>
                        <input type="number" name="price" id="price" class="rtl_dir number_format amount_zero" placeholder="" value="0">
                        <div class="un">
                            <span>تومان</span>
                        </div>
                    </div>
                    <div class="footer-section">
                        <div class="pair-button">


                            <div id="save__b" style="display:">

                            <span class="mid-button blue pointer" id="save_counsel" value=" ">
                                ذخیره
                            </span>
                        </div>
                           <div id="pay_b" style="display:none">

                                <button form="pay_d" style="background:#" class="mid-button blue pointer">
                                    پرداخت
                                </button>
                           </div>

                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>  --}}


@endsection
