<div class="select-label">
    <label for="tank_volume">
        حجم مخزن
    </label>
    <select name="tank_volume" id="tank_volume" class="nice-select  " data-place="  انتخاب کنید">
        <option value="">  لطفا یک گزینه را انتخاب کنید  </option>
        <option  {{ $advertise && $advertise->show_option("tank_volume")=="5"?"selected":"" }} value="5"> 5 کیلو</option>
        <option  {{ $advertise && $advertise->show_option("tank_volume")=="6"?"selected":"" }} value="6"> 6 کیلو</option>
        <option  {{ $advertise && $advertise->show_option("tank_volume")=="7"?"selected":"" }} value="7"> 7 کیلو</option>
        <option  {{ $advertise && $advertise->show_option("tank_volume")=="8"?"selected":"" }} value="8"> 8 کیلو</option>
        <option  {{ $advertise && $advertise->show_option("tank_volume")=="9"?"selected":"" }} value="9"> 9 کیلو</option>
        <option  {{ $advertise && $advertise->show_option("tank_volume")=="10"?"selected":"" }} value="10"> 10 کیلو</option>
        <option  {{ $advertise && $advertise->show_option("tank_volume")=="10.5"?"selected":"" }} value="10.5"> 10.5 کیلو</option>
    </select>
</div>
