@extends('layouts.app')

@section('title', 'تعديل بيانات عضو')

@section('subheader')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
   <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-1">
         <!--begin::Page Heading-->
         <div class="d-flex align-items-baseline flex-wrap mr-5">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold my-1 mr-5">
               إضافة عضو جديد	                	            
            </h5>
            <!--end::Page Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
               <li class="breadcrumb-item">
                  <a href="{{ url('/') }}" class="text-muted">
                    الرئيسية
                  </a>
               </li>
               <li class="breadcrumb-item">
                  <a href="{{ route('users.index') }}" class="text-muted">
                    الأعضاء
                  </a>
               </li>
               <li class="breadcrumb-item">
                  <a href="" class="text-muted">
                    تعديل بيانات عضو
                  </a>
               </li>
            </ul>
            <!--end::Breadcrumb-->
         </div>
         <!--end::Page Heading-->
      </div>
      <!--end::Info-->
      <!--begin::Toolbar-->
      <div class="d-flex align-items-center">
        <button type="button" class="btn btn-light-primary font-weight-bold btn-sm px-4 font-size-base ml-2" id="kt_btn"><i class="la la-save"></i>حفظ</button>
        <a href="{{ route('users.index') }}" class="btn btn-light-dark font-weight-bold btn-sm px-4 font-size-base ml-2">عودة</a>
      </div>
      <!--end::Toolbar-->
   </div>
</div>
<!--end::Subheader-->
@endsection

@section('content')
    @if ($user->is_admin == 1)
        @include('users.edit.admin')
    @elseif($user->is_vendor == 1)
        @include('users.edit.provider')
    @else
        @include('users.edit.user')
    @endif
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgIKx-8qqL3I3a-cVETwnf2UbgVzm1zus&libraries=places&language=ar&callback=initAutocomplete" async defer></script>
    <script>
        var avatar1 = new KTImageInput('kt_image_1');

        $('#kt_btn').on('click', function() {
            var $this = $(this);
            $this.attr("disabled", true).addClass('spinner spinner-white spinner-left');
            document.getElementById('kt_form').submit();
        });

        $(document).ready(function() {
            $('select[name="nation_id"]').on('change', function() {
                var nation_id = $(this).val();
                if(nation_id) {
                    $.ajax({
                        url: '/nations/'+nation_id+'/cities',
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="city_id"]').empty();
                }
            });
        });
    </script>

    <script>
        marker = null;
        map = null;
        initLat = {!! $user->lat !!};
        initLng = {!! $user->lng !!};
        function initAutocomplete() {
            map = new google.maps.Map(document.getElementById('googleMap'), {
                center: {lat: initLat, lng: initLng},
                zoom: 15,
                mapTypeId: 'roadmap'
            });
    
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    map.setCenter(initialLocation);
                });
            }
    
    
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
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
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
    
    
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
    
    
            google.maps.event.addListener(map, 'dblclick', function(event) {
                clickOnMap(event.latLng.lat(), event.latLng.lng())
    
            });
        }
    
        $(document).ready(function() {
            "use strict";
    
            $("#pac-input").keypress(function(e){
                if(e.which == 13) {
                    return false;
                }
            });
        });
        function clickOnMap(lat, lng) {
            var initialLocation = new google.maps.LatLng(lat,lng);
            if (marker==null) {
                marker = new google.maps.Marker({
                    position : initialLocation,
                    map: map
                });
            } else {
                marker.setPosition(initialLocation);
            }
    
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
    
            map.setCenter(initialLocation);
        }
    </script>
@endsection