<div class="select-label">
    <label for="product_type_rhinestones">
        نوع کالا بدلیجات
    </label>
    <select name="product_type_rhinestones" id="product_type_rhinestones" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        {{--  <option value="bag"> کیف</option>
        <option value="shoe"> کفش</option>
        <option value="belt"> کمربند</option>
        <option value="set"> ست</option>  --}}

        <option {{ $advertise && $advertise->show_option("product_type_rhinestones")=="ring"?"selected":"" }} value="ring"> انگشتر</option>
        <option {{ $advertise && $advertise->show_option("product_type_rhinestones")=="earrings"?"selected":"" }} value="earrings">  گوشواره</option>
        <option {{ $advertise && $advertise->show_option("product_type_rhinestones")=="bracelet"?"selected":"" }} value="bracelet"> دست بند</option>
        <option {{ $advertise && $advertise->show_option("product_type_rhinestones")=="chains_and_necklaces"?"selected":"" }} value="chains_and_necklaces"> زنجیر و گردن بند</option>
        <option {{ $advertise && $advertise->show_option("product_type_rhinestones")=="ankle_jewlery"?"selected":"" }} value="ankle_jewlery"> پابند</option>
        <option {{ $advertise && $advertise->show_option("product_type_rhinestones")=="set_half_set"?"selected":"" }} value="set_half_set"> ست و نیم ست </option>
        <option {{ $advertise && $advertise->show_option("product_type_rhinestones")=="other"?"selected":"" }} value="other"> سایر</option>


    </select>
</div>
