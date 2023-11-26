<div class="select-label">
    <label for="gender_ad_type">
        نوع آگهی جنسیت
    </label>
    <select name="gender_ad_type" id="gender_ad_type" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("gender_ad_type")=="for_girls"?"selected":"" }} value="for_girls"> دخترانه</option>
        <option  {{ $advertise && $advertise->show_option("gender_ad_type")=="for_boys"?"selected":"" }} value="for_boys"> پسرانه</option>

    </select>
</div>
