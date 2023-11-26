<div class="select-label">
    <label for="balcony">
        بالکن
    </label>
    <select name="balcony" id="balcony" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("balcony")=="دارد"?"selected":"" }} value="دارد">دارد</option>
       <option  {{ $advertise && $advertise->show_option("balcony")=="ندارد"?"selected":"" }} value="ندارد">ندارد</option>
    </select>
</div>
