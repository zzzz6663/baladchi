<div class="select-label">
    <label for="elevator">
        آسانسور
    </label>
    <select name="elevator" id="elevator" class="nice-select" data-place="  انتخاب کنید">

       {{-- <option value="">یک گزینه را انتخاب کنید </option> --}}
       <option  {{ $advertise && $advertise->show_option("elevator")=="دارد"?"selected":"" }} value="دارد">دارد</option>
       <option  {{ $advertise && $advertise->show_option("elevator")=="ندارد"?"selected":"" }} value="ندارد">ندارد</option>
    </select>
</div>
