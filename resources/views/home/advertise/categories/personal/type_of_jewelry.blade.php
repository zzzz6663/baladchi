<div class="select-label">
    <label for="type_of_jewelry">
    جنس جواهر
    </label>
    <select name="type_of_jewelry" id="type_of_jewelry" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("type_of_jewelry")=="gold"?"selected":"" }} value="gold"> طلا</option>
        <option  {{ $advertise && $advertise->show_option("type_of_jewelry")=="silver"?"selected":"" }} value="silver"> نقره</option>
        <option  {{ $advertise && $advertise->show_option("type_of_jewelry")=="gold_plating"?"selected":"" }} value="gold_plating"> آبکاری طلا</option>
        <option  {{ $advertise && $advertise->show_option("type_of_jewelry")=="gemstone"?"selected":"" }} value="gemstone"> سنگ قیمتی</option>
        <option  {{ $advertise && $advertise->show_option("type_of_jewelry")=="other"?"selected":"" }} value="other"> سایر</option>

    </select>
</div>
