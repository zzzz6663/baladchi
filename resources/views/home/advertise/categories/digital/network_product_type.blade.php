<div class="select-label">
    <label for="network_product_type">
        نوع کالا شبکه
    </label>
    <select name="network_product_type" id="network_product_type" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option {{ $advertise && $advertise->show_option("network_product_type")=="modem_router"?"selected":"" }} value="modem_router">مودم و روتر</option>
        <option {{ $advertise && $advertise->show_option("network_product_type")=="network_cart"?"selected":"" }} value="network_cart">کارت شبکه و اتصالات</option>
        <option {{ $advertise && $advertise->show_option("network_product_type")=="switch"?"selected":"" }} value="switch">سوئیچ و هاب</option>
        <option {{ $advertise && $advertise->show_option("network_product_type")=="ups"?"selected":"" }} value="ups">باطری پشتیبان</option>
        <option {{ $advertise && $advertise->show_option("network_product_type")=="security_tools"?"selected":"" }} value="security_tools">تجهیزات امنیتی</option>
        <option {{ $advertise && $advertise->show_option("network_product_type")=="other"?"selected":"" }} value="other">سایر</option>
    </select>
</div>
