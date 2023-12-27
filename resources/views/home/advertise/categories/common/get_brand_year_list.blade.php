<option  >سال تولید  را انتخاب کنید </option>
@foreach($brand->years as $year)
    <option value="{{$year->year>1900?$year->year:$year->year+621}}">{{$year->year}}</option>
@endforeach
