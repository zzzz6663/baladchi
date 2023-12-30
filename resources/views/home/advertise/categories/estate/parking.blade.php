<div class="select-label">
    <label for="parking">
        پارکینگ
    </label>
    <select name="parking" id="parking" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option {{ $advertise && $advertise->show_option("parking")=="on"?"selected":"" }} value="on">{{ __("all_option.on") }}</option>
       <option {{ $advertise && $advertise->show_option("parking")=="off"?"selected":"" }} value="off">{{ __("all_option.off") }}</option>
    </select>
</div>
