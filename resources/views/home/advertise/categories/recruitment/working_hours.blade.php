<div class="select-label">
    <label for="working_hours">
    ساعات کاری
    </label>
    <select name="working_hours" id="working_hours" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}

        <option  {{ $advertise && $advertise->show_option("working_hours")=="flexible"?"selected":"" }} value="flexible"> منعطف</option>
        <option  {{ $advertise && $advertise->show_option("working_hours")=="morning_shift"?"selected":"" }} value="morning_shift"> شیفت صبح</option>
        <option  {{ $advertise && $advertise->show_option("working_hours")=="evening_shift"?"selected":"" }} value="evening_shift"> شیفت عصر</option>
        <option  {{ $advertise && $advertise->show_option("working_hours")=="night_shift"?"selected":"" }} value="night_shift"> شیفت شب</option>
        <option  {{ $advertise && $advertise->show_option("working_hours")=="morning_and_evening_shift"?"selected":"" }} value="morning_and_evening_shift"> شیفت صبح و عصر</option>
        <option  {{ $advertise && $advertise->show_option("working_hours")=="rotary_shifts"?"selected":"" }} value="rotary_shifts"> شیفت‌های چرخشی</option>
        <option  {{ $advertise && $advertise->show_option("working_hours")=="boarding"?"selected":"" }} value="boarding"> شبانه روزی</option>
        <option  {{ $advertise && $advertise->show_option("working_hours")=="other"?"selected":"" }} value="other"> سایر</option>
    </select>
</div>
