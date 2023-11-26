<div class="select-label">
    <label for="type_of_gender">
        زنانه/مردانه
    </label>
    <select name="type_of_gender" id="type_of_gender" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("type_of_gender")=="for_men"?"selected":"" }} value="for_men"> مردانه</option>
        <option  {{ $advertise && $advertise->show_option("type_of_gender")=="for_women"?"selected":"" }} value="for_women"> زنانه</option>
        <option  {{ $advertise && $advertise->show_option("type_of_gender")=="for_men_women"?"selected":"" }} value="for_men_women">  زنانه , مردانه</option>

    </select>
</div>
