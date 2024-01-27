<div class="select-label">
    <label for="total_floors">
        تعداد کل طبقات ساختمان
    </label>
    <select name="total_floors" id="total_floors" class="nice-select select2" data-place="  انتخاب کنید" >
        <option value="">  لطفا یک گزینه را انتخاب کنید  </option>
        @for ($i = 1; $i < 31; $i++)
        <option value="{{ $i }}"  {{ $advertise && $advertise->show_option("identity_confirmation")==$i?"selected":"" }}> {{ $i }}</option>
        @endfor
        <option value="more_30"> 30 و بالاتر</option>
    </select>
</div>
