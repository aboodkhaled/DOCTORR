@extends('layouts.hosbital')

@section('content')






    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('hosbital.siks')}}">ألمرضئ </a>
                                </li>
                                <li class="breadcrumb-item active">تعديل ألمريض
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> تعديل ألمريض </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('hosbital.alert.success')
                                @include('hosbital.alert.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form col-md-12 " action="{{route('hosbital.siks.update' ,$sik -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$sik -> id}}">
                                            <div class="form-group">
                                                <div class="text-center">
                                                   
                                                    <img
                                                        src="  {{$sik -> photo}} "
                                                        class="rounded-circle  height-150" >
                                                       
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> صورة ألطبيب </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات ألطبيب </h4>

                                                <div class="row col-12 ">
                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أسم  </label>
                                                            <input type="text" value="{{$sik->name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>
                                                        
                                                        

                                                        <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألائميل  </label>
                                                            <input type="email" value="{{$sik->email}}" id="email"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="email">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>
                                                        <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألؤقم  </label>
                                                            <input type="number" value="{{$sik->mobile}}" id="mobile"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="mobile">
                                                            @error("mobile")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('phar_trans.Password')}}
                                                            </label>
                                                            <input type="password" id="password"
                                                                   class="form-control"
                                                                   value="{{$sik->password}}"
                                                                   placeholder="  "
                                                                   name="password">
                                                            @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('phar_trans.Password confirmation')}}
                                                            </label>
                                                            <input type="password" id=""
                                                            value="{{$sik->password}}"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password_confirmation" >
                                                        </div>
                                                    </div>
                                               

                                                      

                                                      <div class="col-6 col-sm-6 py-2">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> ألجنس </label>
                                                            <select name="sex" class="select2 form-control">
                                                                <optgroup label="أختر الجنس من فضلك ">
                                                                    <option value="male" @if($sik ->sex == 'male' ) selected @endif>ذكر</option>
                                                                    <option value="female"@if($sik ->sex == 'female' ) selected @endif>أنثئ</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('sex')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-6 py-2">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> نوع ألتسجيل </label>
                                                            <select name="sik_typ" class="select2 form-control">
                                                                <optgroup label="أختر نوع ألتسجيل من فضلك ">
                                                                    <option value="internal" @if($sik ->sik_typ == 'internal' ) selected @endif>داخل ألمستشفئ</option>
                                                                    <option value="external" @if($sik ->sik_typ == 'external' ) selected @endif>خارجي</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('sik_typ')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  ألعمر </label>
                                                            <input type="text" value="{{$sik -> age}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="age">
                                                            @error("age")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        </div>


                                                        <div class="col-6 col-sm-6 py-2">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  ألحالة ألاجتماعية </label>
                                                            <select name="socia" class="select2 form-control">
                                                                <optgroup label="أختر ألحالة ألاجتماعية من فضلك ">
                                                                    <option value="marride" @if($sik ->socia == 'marride' ) selected @endif>متزوج</option>
                                                                    <option value="single" @if($sik ->socia == 'single' ) selected @endif>عازب</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('socia')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                   

                                                       

                                                       

                                                   
                                                

                                                <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  فصيلة ألدم </label>
                                                            <select name="blood_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($bloods && $bloods -> count() > 0)
                                                                        @foreach($bloods as $blood)
                                                                            <option
                                                                            value="{{$blood -> id }}"
                                                                                @if($sik -> blood_id == $blood -> id) selected @endif>{{$blood -> blood_typ}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('blood_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  فصيلة ألدم </label>
                                                            <select name="cuontry_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($cuontrys && $cuontrys -> count() > 0)
                                                                        @foreach($cuontrys as $cuontry)
                                                                            <option
                                                                            value="{{$cuontry -> id }}"
                                                                                @if($sik -> cuontry_id == $cuontry -> id) selected @endif>{{$cuontry -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('cuontry_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput2">  فصيلة ألدم </label>
                                                            <select name="city_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($citys && $citys -> count() > 0)
                                                                        @foreach($citys as $city)
                                                                            <option
                                                                            value="{{$city -> id }}"
                                                                                @if($sik -> city_id == $city -> id) selected @endif>{{$city -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('city_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    

                                                    <div class="col-6 col-sm-6 py-2 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألعنوان </label>
                                                            <input type="text" value="{{$sik -> address}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="address">
                                                            @error("address")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                 </div>
                                                 </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection


@section('script')

    <script>



        $("#pac-input").focusin(function() {
            $(this).val('');
        });

        $('#latitude').val('');
        $('#longitude').val('');


        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.740691, lng: 46.6528521 },
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function() {
                        geocodeLatLng(geocoder, map, infoWindow,marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                console.log('dsdsdsdsddsd');
                handleLocationError(false, infoWindow, map.getCenter());
            }

            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log( results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });
            function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());

                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);

                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
            }
            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));


                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function splitLatLng(latLng){
            var newString = latLng.substring(0, latLng.length-1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng  = trainindIdArray[1];

            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
         async defer"></script>
    @stop

