



@foreach ($filters as $filter )

@if (Illuminate\Support\Facades\View::exists('home.filters.' . $filter->en))
        @includeIf('home.filters.' . $filter->en)
@endif

@endforeach






@if(sizeof($cities_all)==1)
@php
    $city=App\Models\City::find($cities_all[0]);
    $regions=  $city->regions
@endphp
@if($regions->count())
<div class="accord-box">
    <div class="top nob">
        <h4>
              منطقه

            </h4>
        <span class="toggle">
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.94888 5.99999C5.08612 6.00001 5.22202 5.973 5.34882 5.92049C5.47561 5.86799 5.59084 5.79102 5.6879 5.69399L9.58789 1.794C9.78375 1.59813 9.8938 1.33249 9.8938 1.0555C9.8938 0.77851 9.78375 0.512869 9.58789 0.317007C9.39203 0.121144 9.12639 0.0110984 8.8494 0.0110984C8.5724 0.0110984 8.30676 0.121144 8.1109 0.317007L4.9469 2.717L1.7829 0.317007C1.58704 0.121144 1.32139 0.0110984 1.0444 0.0110984C0.767412 0.0110984 0.50174 0.121144 0.305878 0.317007C0.110015 0.512869 2.14471e-08 0.77851 0 1.0555C-2.1447e-08 1.33249 0.110015 1.59813 0.305878 1.794L4.2059 5.69399C4.3034 5.79155 4.41925 5.86882 4.54678 5.92135C4.67431 5.97387 4.81096 6.00059 4.94888 5.99999Z" fill="currentColor"/>
            </svg>
        </span>

    </div>
    <div class="accord-content">
        <div>
            <select name="region_id" id="region_id" class="nice-select filter_class" data-place="  انتخاب کنید">
                <option value="">   انتخاب کنید  </option>
                @foreach ($regions as $region )
                <option value="{{ $region ->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@endif


@endif
