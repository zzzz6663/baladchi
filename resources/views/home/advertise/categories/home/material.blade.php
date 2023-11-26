<div class="select-label">
    <label for="material">جنس</label>
    <select name="material" id="material" class="nice-select     " data-place="انتخاب شهر">
        {{-- <option value="">لطفا یک مورد را ا نتخاب کنید </option> --}}
       <option  {{ $advertise && $advertise->show_option("material")=="wool"?"selected":"" }} value="wool">پشم</option>
       <option  {{ $advertise && $advertise->show_option("material")=="cotton"?"selected":"" }} value="cotton">پنبه</option>
       <option  {{ $advertise && $advertise->show_option("material")=="silk"?"selected":"" }} value="silk">ابریشم</option>
       <option  {{ $advertise && $advertise->show_option("material")=="other"?"selected":"" }} value="other">سایر</option>
    </select>
</div>
