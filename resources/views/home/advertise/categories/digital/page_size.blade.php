
<div class="select-label">
    <label for="page_size">
        اندازهٔ صفحه
    </label>
    <select name="page_size" id="page_size" class="nice-select" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
       <option value="less_7_in">
  7  اینچ و کوچکتر

    </option>
    <option  {{ $advertise && $advertise->show_option("page_size")=="8_10_in"?"selected":"" }} value="8_10_in">8 تا 10 اینچ </option>
    <option  {{ $advertise && $advertise->show_option("page_size")=="11_13_in"?"selected":"" }} value="11_13_in">11 تا 13 اینچ </option>
    <option  {{ $advertise && $advertise->show_option("page_size")=="more_13_in"?"selected":"" }} value="more_13_in">13 اینج و بزرگتر</option>
    </select>
</div>


