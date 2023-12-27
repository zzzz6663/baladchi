<div class="select-label">
    <label for="production_year">
        مدل (سال تولید)
    </label>
    <select name="production_year" id="production_year" class="select_normal" data-place="  انتخاب کنید">
        <option value="">انتخاب کنید</option>
        @if ($advertise->id && $advertise->telic->show_brand($advertise->show_option("brand")) )
            @foreach ( $advertise->telic->show_brand($advertise->show_option("brand"))->years as $year)
                <option  value="{{ $year->year }}" {{ $advertise->show_option("production_year")==$year->year?"selected":"" }}>{{ $year->year }}</option>
            @endforeach
        @endif
    </select>
</div>
{{--    --}}
