<div class="select-label">
    <label for="payment_method">
        شیوهٔ پرداخت
    </label>
    <select name="payment_method" id="payment_method" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option {{ $advertise && $advertise->show_option("payment_method")=="monthly"?"selected":"" }} value="monthly"> ماهانه</option>
        <option {{ $advertise && $advertise->show_option("payment_method")=="daily"?"selected":"" }} value="daily"> روزانه</option>
        <option {{ $advertise && $advertise->show_option("payment_method")=="horary"?"selected":"" }} value="horary"> ساعتی</option>
        <option {{ $advertise && $advertise->show_option("payment_method")=="commission"?"selected":"" }} value="commission"> پورسانتی/درصدی</option>
        <option {{ $advertise && $advertise->show_option("payment_method")=="agreement"?"selected":"" }} value="agreement"> توافقی</option>
        <option {{ $advertise && $advertise->show_option("payment_method")=="other"?"selected":"" }} value="other"> سایر</option>
    </select>
</div>
