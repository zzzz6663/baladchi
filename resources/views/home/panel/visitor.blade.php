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
                    <input type="checkbox" id="show_visitor" name="show_visitor" {{ $user->show_visitor ? 'checked' : '' }}
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
                    </label>
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
