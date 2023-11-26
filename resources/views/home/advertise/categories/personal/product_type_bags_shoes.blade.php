<div class="select-label">
    <label for="product_type_bags_shoes">
        نوع کالا کیف و کفش
    </label>
    <select name="product_type_bags_shoes" id="product_type_bags_shoes" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("product_type_bags_shoes")=="bag"?"selected":"" }} value="bag"> کیف</option>
        <option  {{ $advertise && $advertise->show_option("product_type_bags_shoes")=="shoe"?"selected":"" }} value="shoe"> کفش</option>
        <option  {{ $advertise && $advertise->show_option("product_type_bags_shoes")=="belt"?"selected":"" }} value="belt"> کمربند</option>
        <option  {{ $advertise && $advertise->show_option("product_type_bags_shoes")=="set"?"selected":"" }} value="set"> ست</option>

    </select>
</div>
