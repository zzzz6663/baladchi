<div class="select-label">
    <label for="warehouse">
        انباری
    </label>
    <select name="warehouse" id="warehouse" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("warehouse")=="on"?"selected":"" }} value="on">{{ __("all_option.on") }}</option>
       <option  {{ $advertise && $advertise->show_option("warehouse")=="off"?"selected":"" }} value="off">{{ __("all_option.off") }}</option>
    </select>
</div>
