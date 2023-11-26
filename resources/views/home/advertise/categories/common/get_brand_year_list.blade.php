<option  >سال تولید  را انتخاب کنید </option>
@foreach($brand->years as $year)
    <option value="{{$year->year}}">{{$year->year}}</option>
@endforeach
