<div class="select-label">
    <label for="texture">بافت</label>
    <select name="texture" id="texture" class="nice-select     " data-place="انتخاب بافت">
        {{-- <option value="">لطفا یک مورد را ا نتخاب کنید </option> --}}
        <option  {{ $advertise && $advertise->show_option("texture")=="hand_knit"?"selected":"" }} value="hand_knit">
            دست‌باف
            </option>

            <option  {{ $advertise && $advertise->show_option("texture")=="machin"?"selected":"" }} value="machin">
                ماشینی</option>
    </select>
</div>
