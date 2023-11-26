<div class="select-label">
    <label for="number_of_rooms">
        تعداد اتاق
    </label>
    <select name="number_of_rooms" id="number_of_rooms" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option {{ $advertise && $advertise->show_option("number_of_rooms")=="1"?"selected":"" }} value="1">یک  </option>
        <option {{ $advertise && $advertise->show_option("number_of_rooms")=="2"?"selected":"" }} value="2">دو </option>
        <option {{ $advertise && $advertise->show_option("number_of_rooms")=="3"?"selected":"" }} value="3"> سه</option>
        <option {{ $advertise && $advertise->show_option("number_of_rooms")=="4"?"selected":"" }} value="4"> چهار</option>
        <option {{ $advertise && $advertise->show_option("number_of_rooms")=="more_5"?"selected":"" }} value="more_5"> پنج و بیشتر</option>
    </select>
</div>
