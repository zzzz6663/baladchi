
<div class="select-label">
    <label for="advertiser">
        آگهی‌دهنده
    </label>
    <select name="advertiser" id="advertiser" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option {{ $advertise && $advertise->show_option("advertiser")=="estate"?"selected":"" }} value="estate"> مشاور املاک</option>
       <option {{ $advertise && $advertise->show_option("advertiser")=="person"?"selected":"" }} value="person">شخصی</option>
    </select>
</div>

