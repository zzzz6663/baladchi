<div class="select-label">
    <label for="warehouse">
        انباری
    </label>
    <select name="warehouse" id="warehouse" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("warehouse")=="دارد"?"selected":"" }} value="دارد">دارد</option>
       <option  {{ $advertise && $advertise->show_option("warehouse")=="ندارد"?"selected":"" }} value="ندارد">ندارد</option>
    </select>
</div>
