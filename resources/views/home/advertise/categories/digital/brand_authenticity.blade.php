
<div class="select-label">
    <label for="brand_authenticity">
        اصالت برند
    </label>
    <select name="brand_authenticity" id="brand_authenticity" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("brand_authenticity")=="original"?"selected":"" }} value="original">اصل</option>
       <option  {{ $advertise && $advertise->show_option("brand_authenticity")=="fake"?"selected":"" }} value="fake">غیراصل</option>
    </select>
</div>


