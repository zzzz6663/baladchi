<div class="select-label">
    <label for="city_id">شهر</label>
    <select name="city_id" id="city_id" class="nice-select     " data-place="انتخاب شهر">
        {{-- <option value="">لطفا یک مورد را ا نتخاب کنید </option> --}}
        @foreach (App\Models\City::all() as $city)
            <option {{ $advertise &&  $advertise->city_id == $city->id?"selected":"" }}  data-lat="{{ $city->lat }}" data-lon="{{ $city->lon }}" value="{{ $city->id }}">
                {{ $city->name }}</option>
        @endforeach
    </select>
</div>


<div id="region_section" style="display: none">


    <div class="select-label">
        <label for="region_id">منطقه</label>
        <select name="region_id" id="region_id" class="select2     " data-place="انتخاب منطقه">
            @if ($advertise  && $advertise->city)
                @foreach ( $advertise->city->regions as $region)
                    <option {{ $region->id==$advertise->region_id?"selected":"" }} value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            @endif
        </select>
    </div>

</div>
