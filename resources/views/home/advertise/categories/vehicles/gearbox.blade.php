<div class="select-label">
    <label for="gearbox">
        گیربکس

    </label>
    <select name="gearbox" id="gearbox" class="nice-select" data-place="  انتخاب کنید">
            {{-- <option value="">یک مورد  را انتخاب کنید </option> --}}
       <option {{ $advertise && $advertise->show_option("gearbox")=="manual"?"selected":"" }} value="manual">دنده ای</option>
       <option {{ $advertise && $advertise->show_option("gearbox")=="auto"?"selected":"" }} value="auto"> اتوماتیک</option>
    </select>
</div>
