<div class="select-label">
    <label for="camera_product_type">
        نوع کالا
    </label>
    <select name="camera_product_type" id="camera_product_type" class="nice-select  " data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        <option  {{ $advertise && $advertise->show_option("camera_product_type")=="camera"?"selected":"" }} value="camera">دوربین عکاسی و فیلمبرداری</option>
        <option  {{ $advertise && $advertise->show_option("camera_product_type")=="camera_tools"?"selected":"" }} value="camera_tools">تجیهزات دوربین  عکاسی و فیلمبرداری</option>
    </select>
</div>
