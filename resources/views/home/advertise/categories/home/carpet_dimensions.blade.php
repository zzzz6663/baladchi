<div class="select-label">
    <label for="carpet_dimensions"> ابعاد فرش </label>
    <select name="carpet_dimensions" id="carpet_dimensions" class="nice-select     " data-place="انتخاب شهر">
        {{-- <option value="">لطفا یک مورد را ا نتخاب کنید </option> --}}
       <option  {{ $advertise && $advertise->show_option("carpet_dimensions")=="4_meter"?"selected":"" }} value="4_meter">4 متری</option>
       <option  {{ $advertise && $advertise->show_option("carpet_dimensions")=="6_meter"?"selected":"" }} value="6_meter">6 متری</option>
       <option  {{ $advertise && $advertise->show_option("carpet_dimensions")=="12_meter"?"selected":"" }} value="12_meter">12 متری</option>
       <option  {{ $advertise && $advertise->show_option("carpet_dimensions")=="24_meter"?"selected":"" }} value="24_meter">24 متری</option>
       <option  {{ $advertise && $advertise->show_option("carpet_dimensions")=="other"?"selected":"" }} value="other">سایر</option>
    </select>
</div>
