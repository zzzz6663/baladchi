
<div class="select-label">
    <label for="type_of_watch">
        نوع ساعت
    </label>
    <select name="type_of_watch" id="type_of_watch" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option  {{ $advertise && $advertise->show_option("type_of_watch")=="analog"?"selected":"" }} value="analog"> آنالوگ</option>
       <option  {{ $advertise && $advertise->show_option("type_of_watch")=="digital"?"selected":"" }} value="digital"> دیجیتال</option>
       <option  {{ $advertise && $advertise->show_option("type_of_watch")=="smart"?"selected":"" }} value="smart"> هوشمند</option>
       <option  {{ $advertise && $advertise->show_option("type_of_watch")=="other"?"selected":"" }} value="other"> سایر</option>
    </select>
</div>


