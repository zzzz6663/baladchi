<div class="select-label">
    <label for="parking">
        پارکینگ
    </label>
    <select name="parking" id="parking" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option {{ $advertise && $advertise->show_option("parking")=="دارد"?"selected":"" }} value="دارد">دارد</option>
       <option {{ $advertise && $advertise->show_option("parking")=="ندارد"?"selected":"" }} value="ندارد">ندارد</option>
    </select>
</div>
