<div class="select-label">
    <label for="poduct_type">
        نوع کالا
    </label>
    <select name="poduct_type" id="poduct_type" class="nice-select select2" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("poduct_type")=="cover"?"selected":"" }} value="cover">قاب و گارد و کاور</option>
        <option  {{ $advertise && $advertise->show_option("poduct_type")=="handsfree"?"selected":"" }} value="handsfree">هندرزفری و هدفون </option>
        <option  {{ $advertise && $advertise->show_option("poduct_type")=="flash"?"selected":"" }} value="flash">کارت حافظه و فلش مموری</option>
        <option  {{ $advertise && $advertise->show_option("poduct_type")=="powerbank"?"selected":"" }} value="powerbank">پاوربانک</option>
        <option  {{ $advertise && $advertise->show_option("poduct_type")=="charger"?"selected":"" }} value="charger">شارژر و کابل و انواع مبدل</option>
        <option  {{ $advertise && $advertise->show_option("poduct_type")=="battery"?"selected":"" }} value="battery">باطری و سایر قطعات یدکی</option>
        <option  {{ $advertise && $advertise->show_option("poduct_type")=="other"?"selected":"" }} value="other">سایر</option>
    </select>
</div>
