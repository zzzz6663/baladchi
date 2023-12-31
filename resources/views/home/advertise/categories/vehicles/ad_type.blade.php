<div class="select-label">
    <label for="ad_type">
        نوع آگهی


    </label>
    <select name="ad_type" id="ad_type" class="nice-select" data-place="  انتخاب کنید">
            {{-- <option value="">یک مورد  را انتخاب کنید </option> --}}
            <option  {{ $advertise && $advertise->show_option("ad_type")=="offer"?"selected":"" }} value="offer">
                ارائه
                </option>
                <option  {{ $advertise && $advertise->show_option("ad_type")=="requested"?"selected":"" }} value="requested">درخواستی</option>

    </select>
</div>



