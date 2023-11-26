<div class="select-label">
    <label for="cooling">
        سرمایش
    </label>
    <select name="cooling" id="cooling" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("cooling")=="water_cooler"?"selected":"" }} value="water_cooler">کولر آبی</option>
       <option  {{ $advertise && $advertise->show_option("cooling")=="air_conditioner"?"selected":"" }} value="air_conditioner">کولر گازی</option>
       <option  {{ $advertise && $advertise->show_option("cooling")=="ductsplit"?"selected":"" }} value="ductsplit">داکت اسپلیت</option>
       <option  {{ $advertise && $advertise->show_option("cooling")=="split"?"selected":"" }} value="split">اسپلیت</option>
       <option  {{ $advertise && $advertise->show_option("cooling")=="fan"?"selected":"" }} value="fan">فن کوئل</option>
    </select>
</div>
