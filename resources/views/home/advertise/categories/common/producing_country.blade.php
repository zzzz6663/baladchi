
<div class="select-label">
    <label for="producing_country">
    کشور تولیدکننده
    </label>
    <select name="producing_country" id="producing_country" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("producing_country")=="iran_product"?"selected":"" }} value="iran_product">ایرانی</option>
       <option  {{ $advertise && $advertise->show_option("producing_country")=="foreign_product"?"selected":"" }} value="foreign_product"> خارجی</option>
    </select>
</div>


