<div class="select-label">
    <label for="product_type_jewellery">
        نوع کالا بدلیجات
    </label>
    <select name="product_type_jewellery" id="product_type_jewellery" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option {{ $advertise && $advertise->show_option("product_type_jewellery")=="ring"?"selected":"" }} value="ring"> انگشتر</option>
        <option {{ $advertise && $advertise->show_option("product_type_jewellery")=="earrings"?"selected":"" }} value="earrings">  گوشواره</option>
        <option {{ $advertise && $advertise->show_option("product_type_jewellery")=="bracelet"?"selected":"" }} value="bracelet"> دست بند</option>
        <option {{ $advertise && $advertise->show_option("product_type_jewellery")=="chains_and_necklaces"?"selected":"" }} value="chains_and_necklaces"> زنجیر و گردن بند</option>
        <option {{ $advertise && $advertise->show_option("product_type_jewellery")=="ankle_jewlery"?"selected":"" }} value="ankle_jewlery"> پابند</option>
        <option {{ $advertise && $advertise->show_option("product_type_jewellery")=="set_half_set"?"selected":"" }} value="set_half_set"> ست و نیم ست </option>
        <option {{ $advertise && $advertise->show_option("product_type_jewellery")=="other"?"selected":"" }} value="other"> سایر</option>

    </select>
</div>
