<div class="select-label">
    <label for="insurance">
    بیمه
    </label>
    <select name="insurance" id="insurance" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("insurance")=="on"?"selected":"" }} value="on"> {{ __("all_option.on") }}</option>
        <option  {{ $advertise && $advertise->show_option("insurance")=="off"?"selected":"" }} value="off"> {{ __("all_option.off") }}</option>
    </select>
</div>
