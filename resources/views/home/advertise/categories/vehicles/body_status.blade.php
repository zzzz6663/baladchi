<div class="select-label">
    <label for="body_status">
        وضعیت بدنه


    </label>
    <select name="body_status" id="body_status" class="nice-select" data-place="  انتخاب کنید">
            {{-- <option value="">یک مورد  را انتخاب کنید </option> --}}
            <option  {{ $advertise && $advertise->show_option("body_status")=="healthy"?"selected":"" }} value="healthy">
                سالم و بی‌خط و خش
            </option>
            <option  {{ $advertise && $advertise->show_option("body_status")=="minor_scratches"?"selected":"" }} value="minor_scratches">
                خط و خش جزئی
            </option>
            <option  {{ $advertise && $advertise->show_option("body_status")=="colorless_smoothing"?"selected":"" }} value="colorless_smoothing">
                صافکاری بی رنگ
            </option>
            <option  {{ $advertise && $advertise->show_option("body_status")=="discoloration"?"selected":"" }} value="discoloration">
                رنگ شدگی
            </option>
            <option  {{ $advertise && $advertise->show_option("body_status")=="round_color"?"selected":"" }} value="round_color">
                دور رنگ
            </option>
            <option  {{ $advertise && $advertise->show_option("body_status")=="full_color"?"selected":"" }} value="full_color">
                تمام نگ
            </option>
            <option  {{ $advertise && $advertise->show_option("body_status")=="by_accident"?"selected":"" }} value="by_accident">
                تصادفی
            </option>
            <option  {{ $advertise && $advertise->show_option("body_status")=="scrap"?"selected":"" }} value="scrap">
                اوراقی
            </option>
    </select>
</div>
