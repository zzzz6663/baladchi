<div class="select-label">
    <label for="tv_product_type">
        نوع کالا تلویزیون
    </label>
    <select name="tv_product_type" id="tv_product_type" class="nice-select  " data-place="  انتخاب کنید" >
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("tv_product_type")=="tv"?"selected":"" }} value="tv">تلویزیون</option>
        <option  {{ $advertise && $advertise->show_option("tv_product_type")=="projector"?"selected":"" }} value="projector">پروژکتور</option>
    </select>
</div>
