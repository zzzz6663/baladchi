<div class="select-label">
    <label for="floor_material">
        جنس کف
    </label>
    <select name="floor_material" id="floor_material" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("floor_material")=="ceramic"?"selected":"" }} value="ceramic">سرامیک</option>
       <option  {{ $advertise && $advertise->show_option("floor_material")=="parquet"?"selected":"" }} value="parquet">پارکت</option>
       <option  {{ $advertise && $advertise->show_option("floor_material")=="stone"?"selected":"" }} value="stone">سنگ</option>
       <option  {{ $advertise && $advertise->show_option("floor_material")=="pvc"?"selected":"" }} value="pvc">کف پوش pvc</option>
       <option  {{ $advertise && $advertise->show_option("floor_material")=="mosaic"?"selected":"" }} value="mosaic">موزاییک</option>
    </select>
</div>
