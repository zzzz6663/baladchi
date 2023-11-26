<div class="input-toggle text red">
    <input type="text" id="sh_map" name="map" hidden value="{{ $advertise->id && $advertise->show_option("latitude") ?  $advertise->show_option("latitude"):""}}">
    <input type="text" id="latitude" name="latitude" hidden value="{{ $advertise->id && $advertise->show_option("latitude") ?  $advertise->show_option("latitude"):""}}">
    <input type="text" id="longitude" name="longitude" hidden value="{{ $advertise->id && $advertise->show_option("latitude") ?  $advertise->show_option("longitude"):""}}">
    {{--  <input type="checkbox" id="show-map" name="show-map" checked="">  --}}
        <div class="right-sec" style="text-align:right">
            <h4>آدرس روی نقشه</h4>
            <p>برای انتخاب موقعیت مورد نظر بر روی آن قسمت کلیک کنید.</p>
        </div>
        <div class="togg">
            <span></span>
        </div>
</div>
{{-- <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
<script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script> --}}
@php
$lat=35.49326765635331;
$lon=35.49326765635331;
if($advertise->id && $advertise->show_option("latitude") ){
    $lat=$advertise->show_option("latitude");
    $lon=$advertise->show_option("longitude");
}
$user=auth()->user();
    if($user->city && $user->city->lat){
        $lat=$user->city->lat;
        $lon=$user->city->lon;
    }
@endphp
<div id="map"></div>

<script type="text/javascript">
    let ch =  [{{ $lat }},{{$lon}}]
    var myMap = new L.Map('map', {
        key: 'web.RGcOLl7H7iw24EcC3dFhkr3QkcbvP0eA6JwqI3SD'
        , maptype: 'dreamy'
        , poi: true
        , traffic: false
        , center: ch
        , zoom: 13
    , });
    // L.marker([35.7340453, 51.5374258]).addTo(myMap);

    var marker;
    var array = []
    @if($advertise->id && $advertise->show_option("latitude"))


    var old = new L.marker(ch).addTo(myMap);
    array.push(old);
    @endif
    myMap.on('click', function(e) {
        for (i = 0; i < array.length; i++) {
            myMap.removeLayer(array[i]);
        }
        if (marker) {
            myMap.removeLayer(marker)
        }
        // myMap._panes.markerPane.remove();

        // alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        // L.marker([e.latlng.lat, e.latlng.lat],{   title:''}).addTo(myMap);




        var newMarker = new L.marker(e.latlng).addTo(myMap);
        array.push(newMarker);

        var sh_map = document.getElementById("sh_map");
        var form = document.getElementById("form");
        var latitude = document.getElementById("latitude");
        var longitude = document.getElementById("longitude");
        latitude.setAttribute('value', e.latlng.lat);;
        longitude.setAttribute('value', e.latlng.lng);;
        sh_map.setAttribute('value', e.latlng.lat);;


    //     $.ajax({ url:'http://maps.googleapis.com/maps/api/geocode/json?latlng='+e.latlng.lat+','+e.latlng.lng+'&sensor=true',
    //          success: function(data){
    //             console.log(data);
    //              var state = data.results[0].address_components[5].long_name;
    //              var country = data.results[0].address_components[6].long_name;
    //              var zip = data.results[0].address_components[7].long_name;

    //              console.log(data.results[0]);
    //              console.log(state+' '+country+' '+zip);
    //          }
    // });
        $.ajax({ url:'https://api.neshan.org/v4/geocoding?address=تهران',
            headers: {

            'Api-Key': 'service.f2c6b57d72324b108734ebc6ae0d4997'
            //    'Api-Key': 'web.0e040d0f6b444b019382ac99616cd064'
                        // 'Content-Type':'application/json,charset=utf-8'
                    },
                success: function(data){
                    console.log(data);

                },
                error: function (request, status, error) {
                        console.log(request);
                    }
        });
    });
    $(document).on('change', '#city_id', function (event) {
                let el = $(this)
                    let city_id=el.val()
                let lat= el.find(':selected').data('lat')
                let lon= el.find(':selected').data('lon')
                    if (lon) {
                        myMap.panTo(new L.LatLng(lat, lon));
                                }
        })


</script>
