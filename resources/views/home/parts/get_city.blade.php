<option  >استان را انتخاب کنید </option>
@foreach($province->cities as $citei)
    <option data-lat="{{$citei->lat}}" data-lon="{{$citei->lon}}" value="{{$citei->id}}">{{$citei->name}}</option>
@endforeach
