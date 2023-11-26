<div class="select-label">
    <label for="term_of_third_party_insurance">
        مهلت بیمهٔ شخص ثالث


    </label>
    <select name="term_of_third_party_insurance" id="term_of_third_party_insurance" class="nice-select" data-place="  انتخاب کنید">
            {{-- <option value="">یک مورد  را انتخاب کنید </option> --}}
           @for ($i=1;$i<=12;$i++)
           <option  {{ $advertise && $advertise->show_option("identity_confirmation")==$i ?"selected":"" }} value="{{ $i }}">
            {{ $i }}
            ماه
           </option>
           @endfor
    </select>
</div>
