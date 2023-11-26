<div class="select-label">
    <label for="wc">
        سرویس بهداشتی
    </label>
    <select name="wc" id="wc" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option   {{ $advertise && $advertise->show_option("wc")=="irani"?"selected":"" }} value="irani">ایرانی</option>
       <option   {{ $advertise && $advertise->show_option("wc")=="farangi"?"selected":"" }} value="farangi">فرنگی</option>
       <option   {{ $advertise && $advertise->show_option("wc")=="irani_farangi"?"selected":"" }} value="irani_farangi">فرنگی ایرانی</option>
    </select>
</div>
