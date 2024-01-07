<div class="select-label">
    <label for="type_of_sewing_machine">   نوع دستگاه دوخت و دوز </label>
    <select name="type_of_sewing_machine" id="type_of_sewing_machine" class="nice-select     " data-place="انتخاب دستگاه">
        {{-- <option value="">لطفا یک مورد را ا نتخاب کنید </option> --}}

       <option  {{ $advertise && $advertise->show_option("type_of_sewing_machine")=="sewing_machine"?"selected":"" }} value="sewing_machine">چرخ خیاطی
    </option>
       <option  {{ $advertise && $advertise->show_option("type_of_sewing_machine")=="spinning_wheels"?"selected":"" }} value="spinning_wheels">چرخ ریسندگی</option>
    </select>
</div>
