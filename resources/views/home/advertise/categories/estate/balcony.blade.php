<div class="select-label">
    <label for="balcony">
        بالکن
    </label>
    <select name="balcony" id="balcony" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("balcony")=="on"?"selected":"" }} value="on">{{ __("all_option.on") }}</option>
       <option  {{ $advertise && $advertise->show_option("balcony")=="off"?"selected":"" }} value="off">{{ __("all_option.off") }}</option>
    </select>
</div>
