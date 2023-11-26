<div class="select-label">
    <label for="type_of_cooperation">
        نوع آگهی جنسیت
    </label>
    <select name="type_of_cooperation" id="type_of_cooperation" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("type_of_cooperation")=="full_time"?"selected":"" }} value="full_time"> تمام وقت</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cooperation")=="part_time"?"selected":"" }} value="part_time"> پاره وقت</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cooperation")=="for_project"?"selected":"" }} value="for_project"> پروژه‌ای</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cooperation")=="internship"?"selected":"" }} value="internship"> کارآموزی</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cooperation")=="agreement"?"selected":"" }} value="agreement"> توافقی</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cooperation")=="other"?"selected":"" }} value="other"> سایر</option>
    </select>
</div>
