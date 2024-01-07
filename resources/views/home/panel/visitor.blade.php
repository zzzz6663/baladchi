@extends('main.panel')
@section('content')
    <div id="dasshmain">
        <div class="dash-title">
            <h3>بازدید کننده بشو </h3>
        </div>

    </div>
    <div id="register">

        <div class="dash-title">
            <h3>ثبت نام به عنوان باز دید کننده</h3>
            <p>

جهت بازدید کننده شدن نیازی به مهارت و تخصص خاص ندارید فقط بعداز توافق بر مبلغ و نحوه پرداخت دستمزد، وجود کالا رو به خریدار تایید میدین.
            </p>
        </div>
        <div class="form">
            @include('main.error')
            <form action="{{ route('panel.visitor') }}" method="post">
                @csrf
                @method('post')


                <div class="select-label">
                    <label for="city_id">
                        شهر
                    </label>
                    <select name="city_id" id="city_id" class="nice-select" data-place="  انتخاب کنید">
                        <option value=""></option>
                        @foreach (App\Models\City::all() as $city)
                            <option {{ $user->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>



                <div class="select-label">
                    <label for="region_id">
                        منطقه
                    </label>
                    <select name="region_id" id="region_id" name="region_id" class="select_normal" data-place="  انتخاب کنید">
                        <option value=""></option>
                        @if ($user->city_id)
                            @foreach (App\Models\City::find($user->city_id)->regions as $region_c)
                                <option {{ $user->region_id == $region_c->id ? 'selected' : '' }}
                                    value="{{ $region_c->id }}">
                                    {{ $region_c->name }}
                                </option>
                            @endforeach
                        @elseif($user->region_id)
                            @foreach (App\Models\Region::where('city_id')->get() as $region)
                                <option {{ $user->region_id == $region->id ? 'selected' : '' }} value="{{ $region->id }}">
                                    {{ $region->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>



                </div>

                <div class="input-toggle text red">
                    <input type="text" name="show_visitor"    value="">
                    در صورت تایید، شما به عنوان بازدید کننده در آگهی های آن منطقه معرفی خواهید شد،
                    <div class="genr-toggle">
                        <ul>
                            <li>
                                <div class="label-containef">
                                    <input type="radio"   value="1" name="show_visitor" id="consult-text" {{ $user->show_visitor ? 'checked' : '' }}>
                                    <label for="consult-text">
                                        <span>آماده بازدید  </span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="label-containef">
                                    <input type="radio" name="show_visitor"  id="consult-phone"   value=""  {{ !$user->show_visitor ? 'checked' : '' }}>
                                    <label for="consult-phone">
                                        <span>آماده نیستم </span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>


                    {{--  <input type="checkbox" id="show_visitor" name="show_visitor" {{ $user->show_visitor ? 'checked' : '' }}
                        value="1">
                    <label for="show_visitor">
                        <div class="right-sec">
                            <h4> وضعیت به عنوان  </h4>
                            <p class="light">

                                در صورت تایید، شما به عنوان بازدید کننده در آگهی های آن منطقه معرفی خواهید شد،
                        </div>

                        <div class="togg">
                            <span></span>
                        </div>
                    </label>  --}}
                </div>

                <div class="footer-section">

                    <div class="pair-button">

                        <input class="mid-button blue" type="submit" value="می پذیرم">
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
