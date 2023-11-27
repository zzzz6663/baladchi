<input type="text" name="type" value="{{ $type }}" hidden>
@if ($subset)
    <input type="text" name="subset" value="{{ $subset->id }}" hidden>
    @foreach ($subset->questions as $question)
        @if (Illuminate\Support\Facades\View::exists('home.advertise.categories.common.' . $question->en))
            @include('home.advertise.categories.common.' . $question->en)
        @else
            @include('home.advertise.categories.' . $category_name . '.' . $question->en)
        @endif
    @endforeach
@endif

@if ($telic)
    <input type="text" name="telic" value="{{ $telic->id }}" hidden>

    @foreach ($telic->questions as $question)
        @if (Illuminate\Support\Facades\View::exists('home.advertise.categories.common.' . $question->en))
            @include('home.advertise.categories.common.' . $question->en)
        @else
            @include('home.advertise.categories.' . $category_name . '.' . $question->en)
        @endif

        {{-- @include('home.advertise.categories.'.$category_name.'.'.$question->en) --}}
    @endforeach
@endif




@if (!$advertise->id)
    <div class="input-toggle text red">
        <input type="text" name="active_release" value="0">
        <input type="checkbox" id="active_release" name="active_release" value="1">
        <label for="active_release">
            <div class="right-sec">
                <h4>
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM11 10H15V12H9V5H11V10Z"
                                fill="#828282"></path>
                        </svg>

                    </span>
                    زمان بندی انتشار آگهی
                </h4>
            </div>
            <div class="togg">
                <span></span>
            </div>
        </label>
    </div>

    @php
    $month = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
@endphp

<div id="select_ime" style="display: none">
    <h5>
        زمان بندی انتشار
    </h5>
    <div class="row">
        <div class="col-4">
            <div class="select-label">
                <label for="">روز</label>
                <select name="day" id="" class="nice-select" data-place="انتخاب کنید">
                    <option value="" selected></option>
                    @for ($a = 1; $a < 10; $a++)
                        <option value="{{ Carbon\Carbon::now()->addDays($a)->format('Y-m-d') }}">
                            {{ Morilog\Jalali\Jalalian::forge(Carbon\Carbon::now()->addDays($a))->format('Y-m-d') }}
                        </option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="select-label">
                <label for="hour">ساعت</label>
                <select name="hour" id="" class="nice-select" data-place="انتخاب کنید"
                    style="display: none;">
                    <option value="" selected></option>
                    @for ($b = 1; $b < 25; $b++)
                        <option value="{{ $b }}">{{ $b }} </option>
                    @endfor
                </select>


            </div>
        </div>
        <div class="col-4">
            <div class="select-label">
                <label for="min">دقیقه</label>
                <select name="min" id="" class="nice-select" data-place="انتخاب کنید"
                    style="display: none;">
                    <option value="" selected></option>
                    @for ($c = 1; $c < 60; $c++)
                        <option value="{{ $c }}">{{ $c }} </option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
</div>
    <div class="input-toggle text red">
        <input type="text" name="vip" value="0">
        <input type="checkbox" id="vip" name="vip" value="1">
        <label for="vip">
            <div class="right-sec">
                <h4>
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM11 10H15V12H9V5H11V10Z"
                                fill="#828282"></path>
                        </svg>

                    </span>

                    آگهی vip
                </h4>
            </div>
            <div class="togg">
                <span></span>
            </div>
        </label>
    </div>

    <div class="input-label big" style="display: none" id="least_box">
        <label for="title">حداقل قیمت </label>
        <input type="number" name="least_price" id="least_price" value="0"
            placeholder=" حداقل موجودی کیف پول برای دیدن آگهی">
        <p>
            با اضافه کردن این گزینه مثلا به میزان ۵۰ هزارتومان فقط افرادی که حداقل ۵۰ هرارتومان موجودی دارند امکان
            مشاهده این آگهی را خواهند داشت
        </p>
    </div>
    <br>
    <br>
@else

{{--  @if($advertise->notif)

    <div class="text-title">
        <h4>
            توضیحات تغییر در آگهی

        </h4>
        <p>
            در صورتیکه مایلید کسانیکه آگهی شما را ذخیره کرده اند از آخرین تغییرات با خیر بشوند تغییرات خود را در کادر
            زیر بنویسید
        </p>
    </div>

    <div class="input-label big textarea">
        <label for="">توضیحات</label>
        <textarea name="memo" id="memo" cols="30" rows="10" placeholder=""></textarea>
    </div>
@endif  --}}

    <div class="section pt30">
        <div class="">

            <span id="insert_advertise" data-id="{{ $advertise->id }}" class="icon-button green pointer">
                <span>ویرایش آگهی</span>
                <span class="icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17 20H3C2.20435 20 1.44129 19.6839 0.87868 19.1213C0.316071 18.5587 0 17.7956 0 17V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H15C15.2652 0 15.5196 0.105357 15.7071 0.292893C15.8946 0.48043 16 0.734784 16 1V13H20V17C20 17.7956 19.6839 18.5587 19.1213 19.1213C18.5587 19.6839 17.7956 20 17 20ZM16 15V17C16 17.2652 16.1054 17.5196 16.2929 17.7071C16.4804 17.8946 16.7348 18 17 18C17.2652 18 17.5196 17.8946 17.7071 17.7071C17.8946 17.5196 18 17.2652 18 17V15H16ZM14 18V2H2V17C2 17.2652 2.10536 17.5196 2.29289 17.7071C2.48043 17.8946 2.73478 18 3 18H14ZM4 5H12V7H4V5ZM4 9H12V11H4V9ZM4 13H9V15H4V13Z"
                            fill="#FFF4F2"></path>
                    </svg>

                </span>
            </span>
        </div>
    </div>
@endif

{{--  <div  id="select_ime" style="display: none">
    <div class="text-title">

        <p>
         درصورت انتخاب زمان و تاریخ آگهی بعد از تایید در زمان دلخواه شما انتشار  داده خواهد شد
        </p>
    </div>
    <div class="input-label big">
        <label for="national_Code"> زمان و تاریخ </label>
        <input type="number"  name="time_for_release"  placeholder=" برای انتخاب کلیک کنید">
    </div>

</div>  --}}


{{--  <h5>
    انتخاب تاریخ
</h5>  --}}

{{--  <div class="row">
    <div class="col-4">
        <div class="select-label">
            <label for="">روز</label>
            <select name="" id="" class="nice-select" data-place="انتخاب کنید">
                @for ($i = 1; $i < 31; $i++)
                <option value="{{ $i }}">{{ $i }}  </option>
                @endfor
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="select-label">
            <label for="">ماه</label>
            <select name="" id="" class="nice-select" data-place="انتخاب کنید">
               @foreach ($month as $key => $val)
                <option value="{{ $key }}">{{ $val }}</option>
               @endforeach
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="select-label">
            <label for="">سال</label>
            <select name="" id="" class="nice-select" data-place="انتخاب کنید">
                    <option value="1401" selected>1401</option>
            </select>
        </div>
    </div>
</div>  --}}


{{-- {{ $telic->id }}
{{ $telic->name }} --}}
