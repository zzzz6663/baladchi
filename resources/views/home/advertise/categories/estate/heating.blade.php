<div class="select-label">
    <label for="heating">
        گرمایش
    </label>
    <select name="heating" id="heating" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("heating")=="heater"?"selected":"" }} value="heater">بخاری</option>
        <option  {{ $advertise && $advertise->show_option("heating")=="fireplace"?"selected":"" }} value="fireplace">شومینه</option>
        <option  {{ $advertise && $advertise->show_option("heating")=="floor"?"selected":"" }} value="floor">از کف</option>
       <option  {{ $advertise && $advertise->show_option("heating")=="ductsplit"?"selected":"" }} value="ductsplit">داکت اسپلیت</option>
       <option  {{ $advertise && $advertise->show_option("heating")=="split"?"selected":"" }} value="split">اسپلیت</option>
       <option  {{ $advertise && $advertise->show_option("heating")=="fan"?"selected":"" }} value="fan">فن کوئل</option>
    </select>
</div>
