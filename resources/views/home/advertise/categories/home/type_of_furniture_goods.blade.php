<div class="select-label">
    <label for="type_of_furniture_goods">
        نوع کالا مبلمان
    </label>
    <select name="type_of_furniture_goods" id="type_of_furniture_goods" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("type_of_furniture_goods")=="furniture"?"selected":"" }} value="furniture">مبلمان</option>
        <option  {{ $advertise && $advertise->show_option("type_of_furniture_goods")=="front_sofa"?"selected":"" }} value="front_sofa">جلو مبلی و عسلی</option>
    </select>
</div>
