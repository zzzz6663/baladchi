@foreach($cities as $city)

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
            </span>
        </div>

    </div>
</li>
@endforeach
