<div class="select-label">
    <label for="drection_of_the_building">
        جهت ساختمان


    </label>
    <select name="drection_of_the_building" id="drection_of_the_building" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("drection_of_the_building")=="south"?"selected":"" }} value="south">جنوب</option>
       <option  {{ $advertise && $advertise->show_option("drection_of_the_building")=="north"?"selected":"" }} value="north">شمال</option>
       <option  {{ $advertise && $advertise->show_option("drection_of_the_building")=="east"?"selected":"" }} value="east">شرق</option>
       <option  {{ $advertise && $advertise->show_option("drection_of_the_building")=="west"?"selected":"" }} value="west">غرب</option>
    </select>
</div>
