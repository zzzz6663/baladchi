<div class="select-label">
    <label for="motor_status">
        وضعیت موتور


    </label>
    <select name="motor_status" id="motor_status" class="nice-select" data-place="  انتخاب کنید">

            <option  {{ $advertise && $advertise->show_option("motor_status")=="need_repair"?"selected":"" }} value="need_repair">نیاز به تعمیر</option>
            <option  {{ $advertise && $advertise->show_option("motor_status")=="replaced"?"selected":"" }} value="replaced">تعویض شده</option>
            <option  {{ $advertise && $advertise->show_option("motor_status")=="safe"?"selected":"" }} value="safe">  سالم</option>
    </select>
</div>
