<div class="select-label">
    <label for="chassis_status">
        وضعیت شاسی ها


    </label>
    <select name="chassis_status" id="chassis_status" class="nice-select" data-place="  انتخاب کنید">
            {{-- <option value="">یک مورد  را انتخاب کنید </option> --}}
             <option   {{ $advertise && $advertise->show_option("chassis_status")=="both_healthy"?"selected":"" }} value="both_healthy">هردو سالم و پلمپ</option>
             <option   {{ $advertise && $advertise->show_option("chassis_status")=="hit_back"?"selected":"" }} value="hit_back">
                عقب ضربه خورده
             </option>
             <option   {{ $advertise && $advertise->show_option("chassis_status")=="painted_back"?"selected":"" }} value="painted_back">
                عقب رنگ شده
             </option>
             <option   {{ $advertise && $advertise->show_option("chassis_status")=="hit_front"?"selected":"" }} value="hit_front">
                جلو ضربه خورده
             </option>
             <option   {{ $advertise && $advertise->show_option("chassis_status")=="painted_front"?"selected":"" }} value="painted_front">
                جلو رنگ شده
             </option>
             <option   {{ $advertise && $advertise->show_option("chassis_status")=="hit_back_painted_front"?"selected":"" }} value="hit_back_painted_front">
               ،  عقب ضربه خورده
               جلو رنگ شده

             </option>
             <option   {{ $advertise && $advertise->show_option("chassis_status")=="hit_front_painted_back"?"selected":"" }} value="hit_front_painted_back">
                عقب رنگ شده ،
                جلو ضربه خورده
             </option>

             <option   {{ $advertise && $advertise->show_option("chassis_status")=="hit_both"?"selected":"" }} value="hit_both">
                هر دو ضربه خورده
             </option>
             <option   {{ $advertise && $advertise->show_option("chassis_status")=="painted_both"?"selected":"" }} value="painted_both">
                هر دورنگ شده
             </option>
    </select>
</div>
