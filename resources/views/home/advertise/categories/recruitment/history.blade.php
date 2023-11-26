<div class="select-label">
    <label for="history">
    سابقه
    </label>
    <select name="history" id="history" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option   {{ $advertise && $advertise->show_option("history")=="  لطفا"?"selected":"" }} value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option   {{ $advertise && $advertise->show_option("history")=="no_history_required"?"selected":"" }} value="no_history_required"> بدون نیاز به سابقه</option>
        <option   {{ $advertise && $advertise->show_option("history")=="less_than_1_year"?"selected":"" }} value="less_than_1_year"> کم‌تر از 1 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_1_year"?"selected":"" }} value="at_least_1_year">        حداقل 1 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_2_year"?"selected":"" }} value="at_least_2_year">        حداقل 2 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_3_year"?"selected":"" }} value="at_least_3_year">        حداقل 3 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_4_year"?"selected":"" }} value="at_least_4_year">        حداقل 4 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_5_year"?"selected":"" }} value="at_least_5_year">        حداقل 5 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_6_year"?"selected":"" }} value="at_least_6_year">        حداقل 6 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_7_year"?"selected":"" }} value="at_least_7_year">        حداقل 7 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_8_year"?"selected":"" }} value="at_least_8_year">        حداقل 8 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_9_year"?"selected":"" }} value="at_least_9_year">        حداقل 9 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="at_least_10_year"?"selected":"" }} value="at_least_10_year">        حداقل 10 سال</option>
        <option   {{ $advertise && $advertise->show_option("history")=="more_than_10_year"?"selected":"" }} value="more_than_10_year"> بیشتر از 10 سال</option>
    </select>
</div>
