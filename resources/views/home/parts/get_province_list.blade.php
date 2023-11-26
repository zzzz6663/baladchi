@foreach (App\Models\Province::all() as $pro)
<li style="line-height:45px" >
    <div class="top">
        <span class="cat-item">
            {{--  <span class="icon">
            {!! $brand->icon !!}
        </span>  --}}
            <span class="text">{{ $pro->name }}</span>
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
            @foreach ($pro->cities as $city)
                <li>
                    <div class="checkbox-row" data-id="{{ $city->id }}"
                        data-name="{{ $city->name }}" data-type="city">
                        <input type="checkbox"  class="city_option" {{ in_array($city->id,$cities_all)?"checked":'' }}
                            data-id="{{ $city->id }}" id="city__{{ $city->id }}"
                            data-name="{{ $city->name }}" value="14" id="subset_14"
                            name="telic">
                        <label for="city__{{ $city->id }}">
                            <span class="title">{{ $city->name }}</span>
                            <span class="check">
                                <svg width="8" height="7" viewBox="0 0 8 7"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.00018 6.788L0 3.3936L0.999823 2.2624L3.00018 4.5256L6.99947 0L8 1.1312L3.00018 6.788Z"
                                        fill="#029591"></path>
                                </svg>
                            </span>
                        </label>
                    </div>
                    <div class="sub">
                        <div class="back">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-right"
                                    width="18" height="18" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="#2c3e50" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"
                                        fill="none"></path>
                                    <line x1="5" y1="12" x2="19"
                                        y2="12"></line>
                                    <line x1="13" y1="18" x2="19"
                                        y2="12"></line>
                                    <line x1="13" y1="6" x2="19"
                                        y2="12"></line>
                                </svg>
                            </span>
                            <span>بازگشت به همهٔ
                                {{ $pro->name }}
                            </span>
                        </div>

                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</li>
@endforeach
