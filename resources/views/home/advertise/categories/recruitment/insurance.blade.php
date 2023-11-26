<div class="select-label">
    <label for="insurance">
    بیمه
    </label>
    <select name="insurance" id="insurance" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("insurance")=="has"?"selected":"" }} value="has"> دارد</option>
        <option  {{ $advertise && $advertise->show_option("insurance")=="has_not"?"selected":"" }} value="has_not"> ندارد</option>
    </select>
</div>
