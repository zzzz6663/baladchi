<option  value="">منطقه خود را انتخاب کنید </option>
@foreach($city->regions as $region)
    <option  value="{{$region->id}}">{{$region->name}}</option>
@endforeach
