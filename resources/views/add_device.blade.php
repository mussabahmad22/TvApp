<?php
$pagename = 'device';
?>
@include('layouts.header')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>


<style>
    .AClass {
        right: 0px;
        position: absolute;
    }
</style>
<style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
        height: 300%;
        margin-left: 20%;
        margin-right: 20%;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .custom-map-control-button {


        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 35px;
        margin-left: 320px;
        margin-top: 10px;
        padding: 8px;
        font: 400 20px Roboto, Arial, sans-serif;
        overflow: hidden;
        height: 40px;
        cursor: pointer;
    }

    .custom-map-control-button:hover {

        background: #ebebeb;
    }

    .form-control .hov:hover {
        background-color: #fff !important;
    }
</style>

{{-- <div class="loader">
    <div></div>
</div> --}}

<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <div class="col-lg-12 mt-lg-0 mt-4 d-flex justify-content-center align-items-center">
            <div class="card mt-4 custom-border" id="password" style="width: 1000px;">
                <div class="card-header" style="display: flex; justify-content: space-between;">
                    <h5 style="color: white !important;">{{ $title }}</h5>
                    @if (isset($device->device_status) && $device->device_status == 'connected')
                        <button type="button" value="{{ $device->id }}" class="btn status_dis btn-outline-info"
                            data-bs-toggle="modal" data-bs-target="#modal-notification">Disconnect</button>
                    @elseif(isset($device->device_status) && $device->device_status == 'disconnected')
                        <button type="button" value="{{ $device->id }}" class="btn status_con btn-outline-info"
                            data-bs-toggle="modal" data-bs-target="#modal-notification1">Connect</button>
                    @endif


                </div>

                <div class="card-body pt-0">
                    <form type="submit" action="{{ $url }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" class="form-control" value="{{ $user_id }}" name="user_id">

                        @if (isset($device->device_logo) and $device->device_logo != 'images/')
                            <div class="flex" style="display: flex;gap:2rem">
                                <div class="flex" style="position:relative;">

                                    {{-- <a href="{{ route('delete_img_logo', $device->id) }}">
                                        <button type="button" class="close AClass"
                                            style="color: rgb(243, 243, 243) ; background-color:rgb(230, 16, 16);">
                                            <span>&times;</span>
                                        </button>
                                    </a> --}}

                                    <img src="{{ asset('storage/' . $device->device_logo) }}" width="100"
                                        height="100">
                                </div>
                            </div>
                        @endif
                        <br>
                        {{-- <div>Upload Logo</div>
                        <div class="input-group input-group-outline my-3">
                            <input type="file" class="form-control hov custom-border" name="device_logo"
                                accept=".jpg, .jpeg, .png, .gif">
                        </div> --}}
                        <div class="input-group input-group-outline my-3">
                            <input type="file" class="form-control hov custom-border" name="device_logo"
                                accept=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ced4da; padding: 8px;"
                                onmouseover="this.style.backgroundColor='#ffffff'"
                                onmouseout="this.style.backgroundColor=''"
                                @if (isset($device->device_logo)) @else required @endif>
                        </div>
                        @if ($errors->has('device_logo'))
                            <div class="alert alert-danger">
                                <ul>
                                    {{-- @foreach ($errors->all() as $error) --}}
                                    <li>Device Logo is required</li>
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                        @endif

                        {{-- <div class="input-group input-group-outline my-3">
                            <input type="file" class="form-control hov custom-border" name="device_logo"
                                accept=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ced4da; padding: 8px;"
                                onmouseover="this.style.backgroundColor='#ffffff'"
                                onmouseout="this.style.backgroundColor=''">
                        </div> --}}

                        <div>Tv Name*</div>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" class="form-control custom-border" name="tv_name" maxlength="100"
                                value="{{ isset($device->tv_name) ? $device->tv_name : $tv_name }}"
                                style="color: white;" required>
                        </div>
                        @if ($errors->has('tv_name'))
                            <div class="alert alert-danger">
                                <ul>
                                    {{-- @foreach ($errors->all() as $error) --}}
                                    <li>Tv Name is required</li>
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                        @endif

                        <div>Guest Name*</div>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" class="form-control custom-border" name="guest_name" maxlength="100"
                                value="{{ isset($device->guest_name) ? $device->guest_name : old('guest_name') }}"
                                style="color: white;" required>
                        </div>
                        @if ($errors->has('guest_name'))
                            <div class="alert alert-danger">
                                <ul>
                                    {{-- @foreach ($errors->all() as $error) --}}
                                    <li>The Guest Name is required</li>
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                        @endif
                        {{-- <div class="input-group input-group-outline my-3">
                            <input type="hidden" class="form-control"
                                @if (!isset($device->tv_name)) value="TV {{ $count }}" @endif name="tv_name"
                                maxlength="100" value="{{ isset($device->tv_name) ? $device->tv_name : '' }}">
                        </div> --}}
                        <div class="input-group input-group-outline my-3">
                            <input type="hidden" class="form-control"
                                @if (!isset($device->count)) value="{{ $count }}" @endif name="count"
                                maxlength="100" value="{{ isset($device->count) ? $device->count : '' }}">
                        </div>
                        <input type="hidden" class="form-control" name="query_id"
                            value="{{ isset($device->id) ? $device->id : '' }}">
                        <div>Auto Generated Code</div>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" @if (!isset($device->device_code)) value="{{ $rand_num }}" @endif
                                name="device_code" class="flex form-control custom-border"
                                value="{{ isset($device->device_code) ? $device->device_code : '' }}" readonly>
                        </div>
                        <div>Guest Message*</div>
                        <div class="input-group input-group-outline my-3">
                            <textarea type="text" class="form-control custom-border" name="guest_message" maxlength="600" value="" required
                                rows="10" style="color: white;">{{ isset($device->guest_message) ? $device->guest_message : old('guest_message') }}</textarea>
                        </div>
                        @if ($errors->has('guest_message'))
                            <div class="alert alert-danger">
                                <ul>
                                    {{-- @foreach ($errors->all() as $error) --}}
                                    <li>The Guest message is required</li>
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                        @endif
                        <div>Upload Video/Image*</div>
                        @if ($errors->has('device_vedio'))
                            <div class="alert alert-danger">
                                <ul>
                                    {{-- @foreach ($errors->all() as $error) --}}
                                    <li>Please Select Atleast One Video/Image</li>
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                        @endif
                        <div class="input-group input-group-outline my-3" id="file-input">
                            <input type="file" class="form-control custom-border"
                                accept="video/mp4, video/webm, image/*" id="pickfiles"
                                style="border: 1px solid #ced4da; padding: 8px;"
                                onmouseover="this.style.backgroundColor='#ffffff'"
                                onmouseout="this.style.backgroundColor=''">
                            {{-- @if (isset($device->device_vedio)) @else required @endif> --}}

                            {{-- <div class="form-group" id="file-input">
                                <input class="form-control" type="file" name="video_file" id="pickfiles">
                                <div id="filelist"></div>
                            </div>
                            <!-- Progress bar -->
                            <div class="progress"></div> --}}

                        </div>
                        <div id="filelist"></div>
                        <!-- Progress bar -->
                        <div class="progress"></div>

                        <input type="hidden" name="device_vedio" id="video_path" readonly>
                        <br>
                        {{-- <div class="input-group input-group-outline my-3">
                            <input type="file" class="form-control custom-border" name="device_vedio"
                                accept="video/mp4, video/webm" style="border: 1px solid #ced4da; padding: 8px;"
                                onmouseover="this.style.backgroundColor='#ffffff'"
                                onmouseout="this.style.backgroundColor=''"> --}}
                </div>

                @if (isset($device->device_vedio))

                    @php

                        $path = $device->device_vedio;

                        $extension = Str::lower(pathinfo($path, PATHINFO_EXTENSION));

                        // Array of allowed image extensions
                        $allowedExtensions = ['png', 'jpg', 'gif', 'bmp'];

                    @endphp

                    @if (in_array($extension, $allowedExtensions))

                            <div class="flex" style="display: flex; gap: 2rem; margin-left: 30px;">
                                <div class="flex" style="position: relative;">
                                    <img src="{{ asset('storage/' . $device->device_vedio) }}" width="200"
                                        height="100">
                                </div>
                            </div>
                    @else
                            <br>
                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-blog card-plain">
                                        <div class="card-header p-0 mt-n4 mx-3">
                                            <div class="flex" style="display: flex;gap:2rem">
                                                <div class="flex" style="position:relative;">
                                                    {{-- <a href="{{ route('delete_vedio', $device->id) }}">
                                                    <button type="button" class="close "
                                                        style="color: rgb(243, 243, 243) ; background-color:rgb(230, 16, 16); margin-left: 285px !important;">
                                                        <span>&times;</span>
                                                    </button>
                                                </a> --}}
                                                    <video width="300" height="200" controls>
                                                        <source src="{{ asset('storage/' . $device->device_vedio) }}"
                                                            type="video/mp4">
                                                    </video>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    @endif

                @endif
                <br></br>


                <div class="intro-y col-span-12 sm:col-span-6 px-2">
                    <div class="mb-2">Add Tv Location with Map*</div>

                    @if ($errors->has('lat'))
                        <div class="alert alert-danger">
                            <ul>
                                {{-- @foreach ($errors->all() as $error) --}}
                                <li>Please Select Location</li>
                                {{-- @endforeach --}}
                            </ul>
                        </div>
                    @endif


                    <!------------------- Google Map through google Api Key ---------------------->

                    <input id="pac-input" class="input border flex-1" type="text"
                        placeholder="Search your location" style="width: 200px; height:40px; margin-top: 10px;" />
                    <div class="container">
                        <div class="row">

                            <td style="display: flex;">

                                {{-- <div>Latitude</div> --}}
                                <div class="input-group input-group-outline my-3">
                                    <input type="hidden" class="form-control" id="txtLat" name="lat"
                                        style="color:rgb(89, 60, 255)"
                                        value="{{ isset($device->lat) ? $device->lat : '' }}" readonly>
                                </div>

                                {{-- <div>Longitude</div> --}}
                                <div class="input-group input-group-outline my-3">
                                    <input type="hidden" class="form-control" id="txtLng" name="long"
                                        style="color:rgb(89, 60, 255)"
                                        value="{{ isset($device->longitude) ? $device->longitude : '' }}" readonly>
                                    <div id="map_canvas" style="width: auto; height: 10px;">
                                    </div>

                                    {{-- <label for="latitude">
                                            Latitude:
                                        </label>
                                        <input id="txtLat" name="lat" class="input-group input-group-outline my-3" size="14" type="text"
                                            style="color:rgb(89, 60, 255)"
                                            value="{{ isset($agent->lat)?$agent->lat:'' }}" />
                                        <label for="longitude" class="ml-6">
                                            Longitude:
                                        </label>
                                        <input id="txtLng" name="long" class="input-group input-group-outline my-3" size="15" type="text"
                                            style="color:rgb(89, 60, 255)"
                                            value="{{ isset($agent->longitude)?$agent->longitude:'' }}" />
                                        <div id="map_canvas" style="width: auto; height: 10px;">
                                        </div> --}}
                            </td>

                        </div>
                    </div>


                    <!-- ---------------------------------Google Map Div-------------------------------------- -->

                    {{-- <div id="map"></div> --}}
                    <div id="map"
                        style="width: 100%; height: 400px; background-color: #f0f0f0; margin-left:1px;">
                    </div>

                </div>
                <br></br>

                <div>Select Temprature C/F*</div>
                <div class="input-group input-group-outline my-3 custom-border">
                    <select class="form-control custom-border" name="temprature" required>
                        <option selected disabled>Please Select Temperature</option>
                        <option value="C" <?php if (isset($device->temprature) && $device->temprature === 'C') {
                            echo 'selected';
                        } ?>>Celsius</option>
                        <option value="F" <?php if (isset($device->temprature) && $device->temprature === 'F') {
                            echo 'selected';
                        } ?>>Fahrenheit</option>
                    </select>
                </div>
                @if ($errors->has('temprature'))
                    <div class="alert alert-danger">
                        <ul>
                            {{-- @foreach ($errors->all() as $error) --}}
                            <li>Please Select Temprature</li>
                            {{-- @endforeach --}}
                        </ul>
                    </div>
                @endif





                <div style="display: flex; justify-content: flex-end;">

                    <!-- Anchor Tag -->
                    <a href="{{ route('list_devices') }}" class="btn bg-transparent" style="margin-top: 6px;">
                        Cancel
                    </a>

                    <!-- Button -->
                    <button class="btn" style="background-color: #ffe44c;">
                        {{ $text }}
                    </button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="col-md-4">

    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog"
        aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-notification">
                        Your attention is required</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form type="submit" action="{{ route('change_status_disconnect') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="py-3 text-center">
                            <i class="material-icons text-secondary" style="text-size: 100px; !important">
                                notifications_active
                            </i>
                            <h4 class="text-gradient text-warning mt-4">You should read this!
                            </h4>
                            <input type="hidden" name="change_device_status" id="status_disconnect"></input>
                            <p>Do you really want to Disconnect this Screen?</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block bg-gradient-warning mb-3">Disconnect</button>
                    <button type="button" class="btn btn-block bg-gradient-dark mb-3"
                        data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">

    <div class="modal fade" id="modal-notification1" tabindex="-1" role="dialog"
        aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-notification">
                        Your attention is required</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form type="submit" action="{{ route('change_status_connect') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="py-3 text-center">
                            <i class="material-icons text-secondary" style="text-size: 100px; !important">
                                notifications_active
                            </i>
                            <h4 class="text-gradient text-success mt-4">You should read this!
                            </h4>
                            <input type="hidden" name="change_device_status" id="status_connected"></input>
                            <p>Do you really want to Connect this Screen?</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block bg-gradient-success mb-3">Connect</button>
                    <button type="button" class="btn btn-block bg-gradient-dark mb-3"
                        data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</main>



<script>
    //===================Script For change status ====================================
    $(document).on('click', '.status_dis', function() {
        var query_id = $(this).val();
        $('#status_disconnect').val(query_id);
    });

    $(document).on('click', '.status_con', function() {
        var query_id = $(this).val();
        $('#status_connected').val(query_id);
    });
</script>


<!-- ------------------------Google API key.---------------------------------------------- -->
{{-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHV-XgmBdUHICr4CzBrgDNNET1-qhjIPQ&callback=initMap&libraries=places">
</script> --}}

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhAq5JksRnXEQwwxCXGNtJpZ_HAPC-XsM&callback=initMap&libraries=places">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var alphabeticInput = document.getElementById('alphabetic_input');

        alphabeticInput.addEventListener('input', function() {
            var regex = /[^a-zA-Z]/g;
            if (this.value.match(regex)) {
                this.value = this.value.replace(regex, '');
            }
        });
    });
</script>



<!-------------------------- /Google Map through google Api Key ----------------------------->
<script type="text/javascript">
    var map;

    function initMap() {
        var myLatlng = new google.maps.LatLng(29.498684, 71.730617);
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: myLatlng,
            mapTypeId: map,
        });
        //---------------------------------Marker--------------------------------------------
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true,
            title: "Marker"
        });

        //-------------------------------Find Current Location--------------------------------
        let infoWindow;
        infoWindow = new google.maps.InfoWindow();
        const locationButton = document.createElement("span");
        locationButton.textContent = "(+)";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        infoWindow.open(map);
                        map.setCenter(pos);
                        marker.setPosition(pos);
                        $("#txtLat").val(marker.getPosition().lat().toFixed(6));
                        $("#txtLng").val(marker.getPosition().lng().toFixed(6));
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );

            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        });
        //------------------Get Lat and Long by dragable marker ----------------------------------------
        marker.addListener("dragend", () => {
            map.setZoom(18);
            map.setCenter(marker.getPosition());
            //-----------------------Move Marker And Get Lat Long --------------------------------------
            $("#txtLat").val(marker.getPosition().lat().toFixed(6));
            $("#txtLng").val(marker.getPosition().lng().toFixed(6));
        });
        //----------------------Set user Current Location By Default-------------------------------------
        if (navigator.geolocation) {
            /*
             * getCurrentPosition() takes a function as a callback argument
             * The callback takes the position object returned as an argument
             */
            navigator.geolocation.getCurrentPosition(function(position) {
                /**
                 * pos will contain the latlng object
                 * This must be passed into the setCenter instead of two float values
                 */
                var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.setCenter(pos); //center the map based on users location
                marker.setPosition(pos);
            }, function() {
                //client supports navigator object, but does not share their geolocation
            });
        } else {
            //client doesn't support the navigator object
        }
        //---------------------------------search Box----------------------------------------------------
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });
        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach((marker) => {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();
            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                // Create a marker for each place.
                marker.setPosition(place.geometry.location);
                $("#txtLat").val(marker.getPosition().lat().toFixed(6));
                $("#txtLng").val(marker.getPosition().lng().toFixed(6));
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
</script>

<script>
    function limitFileSelection(input, maxFiles) {
        if (input.files.length > maxFiles) {
            alert(`You can only select up to ${maxFiles} images.`);
            input.value = '';
        }
    }
</script>

<script src="{{ asset('/plupload/js/plupload.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var path = "{{ asset('/plupload/js/') }}";

        var uploader = new plupload.Uploader({
            browse_button: 'pickfiles',
            container: document.getElementById('file-input'),
            url: '{{ route('chunk.store') }}',
            chunk_size: '10Mb', // 1 MBcodcode
            max_retries: 2,
            filters: {
                max_file_size: '100000mb',
                mime_types: [{
                    title: "Video files",
                    extensions: "mp4,avi,mpeg,mpg,mov,wmv"
                }, {
                    title: "Image files",
                    extensions: "jpg,jpeg,png,gif,bmp"
                }]
            },
            multipart_params: {
                // Extra Parameter
                "_token": "{{ csrf_token() }}"
            },

            init: {
                PostInit: function() {
                    document.getElementById('filelist').innerHTML = '';
                },
                FilesAdded: function(up, files) {
                    plupload.each(files, function(file) {
                        console.log('FilesAdded');
                        console.log(file);
                        document.getElementById('filelist').innerHTML =
                            '<div class="text-primary" id="' + file.id + '">' + file.name +
                            ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                    });
                    uploader.start();
                },
                UploadProgress: function(up, file) {
                    console.log('UploadProgress');
                    console.log(file);
                    document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML =
                        '<span>' + file.percent + "%</span>";
                    document.querySelector(".progress").innerHTML =
                        '<div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width: ' +
                        file.percent + '%; height: 15px;">' + file.percent + '%</div>';
                },
                FileUploaded: function(up, file, result) {

                    console.log('FileUploaded');
                    console.log(file);
                    console.log(JSON.parse(result.response));
                    responseResult = JSON.parse(result.response);

                    $('#video_path').val(responseResult.file);
                    $('.videosrc').attr('src',
                        'http://127.0.0.1:8000/storage/files/' +
                        responseResult.file);
                    $('#video_load')[0].load();
                    $('#videoid').removeClass('d-none');
                    $('#btn').removeAttr('disabled');


                    if (responseResult.ok == 0) {
                        toastr.error(responseResult.info, 'Error Alert', {
                            timeOut: 5000
                        });
                    }
                    if (result.status != 200) {
                        toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {
                            timeOut: 5000
                        });
                    }
                    if (responseResult.ok == 1 && result.status == 200) {
                        toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {
                            timeOut: 5000
                        });
                    }
                },
                UploadComplete: function(up, file) {
                    toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {
                        timeOut: 5000
                    });

                },
                Error: function(up, err) {
                    // DO YOUR ERROR HANDLING!
                    toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {
                        timeOut: 5000
                    });
                    console.log(err);
                }
            }
        });
        uploader.init();
    });
</script>


@include('layouts.footer')
