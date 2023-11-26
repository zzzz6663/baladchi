<div class="select-label">
    <label for="number_of_units_per_floor">
        تعداد واحد در طبقه


    </label>
    <select name="number_of_units_per_floor" id="number_of_units_per_floor" class="nice-select selec2" data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        @for ($i = 1; $i < 9; $i++)
        <option  {{ $advertise && $advertise->show_option("number_of_units_per_floor")== $i?"selected":"" }} value="{{ $i }}"> {{ $i }}</option>
        @endfor
        <option value="more_8"> بیشتر از 8  </option>
    </select>
</div>
