
<div class="select-label">
    <label for="condition">
        وضعیت
    </label>
    <select name="condition" id="condition" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option value="new">نو</option>
       <option {{ $advertise && $advertise->show_option("condition")=="like_new"?"selected":"" }} value="like_new">درحد نو</option>
       <option {{ $advertise && $advertise->show_option("condition")=="worked"?"selected":"" }} value="worked">کارکرده</option>
       <option {{ $advertise && $advertise->show_option("condition")=="need_repair"?"selected":"" }} value="need_repair">نیاز به تعمیر</option>
    </select>
</div>


