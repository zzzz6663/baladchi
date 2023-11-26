<div class="select-label">
    <label for="part_product_type">
        نوع کالا قطعات
    </label>
    <select name="part_product_type" id="part_product_type" class="nice-select select2" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="monitor"?"selected":"" }} value="monitor">مانیتور</option>
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="mouse"?"selected":"" }} value="mouse">موس</option>
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="keyboard"?"selected":"" }} value="keyboard">کیبورد</option>
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="hard"?"selected":"" }} value="hard">هارد و ابزار ذخیره اطلاعات</option>
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="headphone"?"selected":"" }} value="headphone">هدفون میکروفن و وبکم</option>
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="speeker"?"selected":"" }} value="speeker">اسپیکر</option>
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="cpu"?"selected":"" }} value="cpu">پردازنده و کارت گرافیک</option>
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="fan"?"selected":"" }} value="fan">فن و خنک کننده </option>
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="case"?"selected":"" }} value="case">قاب کیس</option>
        <option  {{ $advertise && $advertise->show_option("part_product_type")=="other"?"selected":"" }} value="other">سایر</option>
    </select>
</div>
