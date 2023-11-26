<div class="select-label">
    <label for="military_service_situation">
        وضعیت سربازی
    </label>
    <select name="military_service_situation" id="military_service_situation" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("military_service_situation")=="end_military_service"?"selected":"" }} value="end_military_service">    اتمام یا معافیت الزامی است</option>
        <option  {{ $advertise && $advertise->show_option("military_service_situation")=="does_not_matter"?"selected":"" }} value="does_not_matter">            فرقی ندارد</option>
    </select>
</div>
