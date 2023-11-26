<div class="select-label">
    <label for="color">
        رنگ
    </label>
    <select name="color" id="color" class="nice-select select2" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option   {{ $advertise && $advertise->show_option("color")=="blue"?"selected":"" }} value="blue">آبی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="cherry"?"selected":"" }} value="cherry">آلبالویی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="satin"?"selected":"" }} value="satin">اطلسی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="eggplant"?"selected":"" }} value="eggplant">بادمجانی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="bronze"?"selected":"" }} value="bronze">برنز</option>
        <option   {{ $advertise && $advertise->show_option("color")=="beige"?"selected":"" }} value="beige">بژ</option>
        <option   {{ $advertise && $advertise->show_option("color")=="violet"?"selected":"" }} value="violet">بنفش</option>
        <option   {{ $advertise && $advertise->show_option("color")=="onion_skin"?"selected":"" }} value="onion_skin">پوست پیازی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="titanium"?"selected":"" }} value="titanium">تیتانیوم</option>
        <option   {{ $advertise && $advertise->show_option("color")=="gray"?"selected":"" }} value="gray">خاکستری</option>
        <option   {{ $advertise && $advertise->show_option("color")=="dolphin"?"selected":"" }} value="dolphin">دلفینی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="charcoal"?"selected":"" }} value="charcoal">ذغالی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="yellow"?"selected":"" }} value="yellow">زرد</option>
        <option   {{ $advertise && $advertise->show_option("color")=="crimson"?"selected":"" }} value="crimson">زرشکی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="green"?"selected":"" }} value="green">سبز</option>
        <option   {{ $advertise && $advertise->show_option("color")=="lead"?"selected":"" }} value="lead">سربی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="purl"?"selected":"" }} value="purl">سرمه‌ای</option>
        <option   {{ $advertise && $advertise->show_option("color")=="white"?"selected":"" }} value="white">سفید</option>
        <option   {{ $advertise && $advertise->show_option("color")=="shelly"?"selected":"" }} value="shelly">سفید صدفی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="golden"?"selected":"" }} value="golden">طلایی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="tosi"?"selected":"" }} value="tosi">طوسی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="lens"?"selected":"" }} value="lens">عدسی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="Jujube"?"selected":"" }} value="Jujube">عنابی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="red"?"selected":"" }} value="red">قرمز</option>
        <option   {{ $advertise && $advertise->show_option("color")=="brown"?"selected":"" }} value="brown">قهوه‌ای</option>
        <option   {{ $advertise && $advertise->show_option("color")=="carbon_black"?"selected":"" }} value="carbon_black">کربن بلک</option>
        <option   {{ $advertise && $advertise->show_option("color")=="cream"?"selected":"" }} value="cream">کرم</option>
        <option   {{ $advertise && $advertise->show_option("color")=="cherry"?"selected":"" }} value="cherry">گیلاسی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="copper"?"selected":"" }} value="copper">مسی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="black"?"selected":"" }} value="black">مشکی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="mocha"?"selected":"" }} value="mocha">موکا</option>
        <option   {{ $advertise && $advertise->show_option("color")=="orange"?"selected":"" }} value="orange">نارنجی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="silver"?"selected":"" }} value="silver"> نقره </option>
        <option   {{ $advertise && $advertise->show_option("color")=="pencil_tip"?"selected":"" }} value="pencil_tip">نوک مدادی</option>
        <option   {{ $advertise && $advertise->show_option("color")=="jade"?"selected":"" }} value="jade">یشمی</option>
    </select>
</div>
