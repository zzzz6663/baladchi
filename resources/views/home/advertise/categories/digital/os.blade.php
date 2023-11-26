
<div class="select-label">
    <label for="os">
        سیستم عامل
    </label>
    <select name="os" id="os" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("os")=="android"?"selected":"" }} value="android">اندروید   </option>
       <option  {{ $advertise && $advertise->show_option("os")=="ios"?"selected":"" }} value="ios">آی او اس  </option>
       <option  {{ $advertise && $advertise->show_option("os")=="windows"?"selected":"" }} value="windows">ویندوز  </option>
       <option  {{ $advertise && $advertise->show_option("os")=="other"?"selected":"" }} value="other">سایر  </option>
    </select>
</div>


