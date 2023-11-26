<div class="select-label">
    <label for="hot_water_supplier">
        تأمین‌ کننده آب گرم
    </label>
    <select name="hot_water_supplier" id="hot_water_supplier" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("hot_water_supplier")=="water_heater"?"selected":"" }} value="water_heater">آبگرمکن</option>
        <option  {{ $advertise && $advertise->show_option("hot_water_supplier")=="powerhouse"?"selected":"" }} value="powerhouse">موتورخانه</option>
        <option  {{ $advertise && $advertise->show_option("hot_water_supplier")=="package"?"selected":"" }} value="package">پکیج  </option>
    </select>

</div>
