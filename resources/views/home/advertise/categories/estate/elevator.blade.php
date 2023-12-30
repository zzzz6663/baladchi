<div class="select-label">
    <label for="elevator">
        آسانسور
    </label>
    <select name="elevator" id="elevator" class="nice-select" data-place="  انتخاب کنید">

       {{-- <option value="">یک گزینه را انتخاب کنید </option> --}}
       <option  {{ $advertise && $advertise->show_option("elevator")=="on"?"selected":"" }} value="on">{{ __("all_option.on") }}</option>
       <option  {{ $advertise && $advertise->show_option("elevator")=="off"?"selected":"" }} value="off">{{ __("all_option.off") }}</option>
    </select>
</div>
