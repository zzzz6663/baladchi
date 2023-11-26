<div class="select-label">
    <label for="floor">
          طبقه
    </label>
    <select name="floor" id="floor" class="nice-select select2"  data-place="  انتخاب کنید">
        {{-- <option value="">  لطفا یک گزینه را انتخاب کنید  </option> --}}
        @for ($i = 1; $i < 31; $i++)
        <option  {{ $advertise && $advertise->show_option("identity_confirmation")==$i?"selected":"" }} value="{{ $i }}"> {{ $i }}</option>
        @endfor
        <option value="more_30"> 30 و بالاتر</option>
    </select>
</div>
