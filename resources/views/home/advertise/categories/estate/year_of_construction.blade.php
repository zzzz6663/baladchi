<div class="select-label">
    <label for="year_of_construction">
          سال ساخت
    </label>
    <select name="year_of_construction" id="year_of_construction" class=" select2" data-place="  انتخاب کنید">
        <option value="">  لطفا یک گزینه را انتخاب کنید  </option>
        @for ($i = 1402; $i >1370 ; $i--)
        <option {{ $i==1402 ?"selected":"" }}  {{ $advertise && $advertise->show_option("year_of_construction")==$i?"selected":"" }} value="{{ $i }}"> {{ $i }}</option>
        @endfor
    </select>
</div>
