<div class="select-label">
    <label for="suitable_for">مناسب برای
    </label>
    <select name="suitable_for" id="suitable_for" class="nice-select" data-place="  انتخاب کنید"  >
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("suitable_for")=="all"?"selected":"" }} value="all"> خانواده و مجرد</option>
        <option  {{ $advertise && $advertise->show_option("suitable_for")=="family"?"selected":"" }} value="family"> خانواده</option>
    </select>
</div>
