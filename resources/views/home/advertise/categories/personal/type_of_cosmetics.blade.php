<div class="select-label">
    <label for="type_of_cosmetics">
    نوع کالا آرایشی
    </label>
    <select name="type_of_cosmetics" id="type_of_cosmetics" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("type_of_cosmetics")=="cosmetics_and_beauty_products"?"selected":"" }} value="cosmetics_and_beauty_products"> لوازم آرایشی و زیبایی</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cosmetics")=="medical_and_therapeutic_supplies"?"selected":"" }} value="medical_and_therapeutic_supplies"> لوازم طبی و درمانی</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cosmetics")=="personal_electrical_appliances"?"selected":"" }} value="personal_electrical_appliances"> لوازم برقی شخصی</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cosmetics")=="skin_and_hair_care"?"selected":"" }} value="skin_and_hair_care"> مراقبتی پوست و مو</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cosmetics")=="perfume_and_cologne"?"selected":"" }} value="perfume_and_cologne"> عطر و ادکلن</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cosmetics")=="tablets_and_herbal_compounds"?"selected":"" }} value="tablets_and_herbal_compounds"> قرص و ترکیبات گیاهی</option>
        <option  {{ $advertise && $advertise->show_option("type_of_cosmetics")=="other"?"selected":"" }} value="other"> سایر</option>

    </select>
</div>
