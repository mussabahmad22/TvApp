<?php
$pagename = 'device';
?>
<style>
    .text-justify {
  text-align: justify;
}
</style>
@include('layouts.header')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 mt-lg-0 mt-4">
            <div class="card-header d-flex justify-content-between">
                <h5>CONNECTED SCREENS</h5>
                {{-- <button type="submit" class="btn text-white ml-6" data-bs-toggle="modal" data-bs-target="#modal-form"
                    style="background-color: #1f71cf;">+ Create Device</button> --}}

                <a href="{{ route('add_device_page') }}"><button type="submit" class="btn text-white ml-6"
                        style="background-color: #485169;">+ ADD A SCREEN</button></a>

            </div>
        </div>
        <br></br>

          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="margin-top: 15px;">
                            <p><strong>This page helps you change your settings for the Greet Screen app. If you haven’t done so yet, please download the ‘Greet-Screen’ app on your Smart TV, Android TV, or Amazon Fire TV device.</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
        <br></br>
        <br></br>
        <br></br>



        @foreach ($devices as $item)
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <a href="{{ route('device_details', ['id' => $item->id]) }}">

                        <div class="card-header p-3 pt-2">
                            {{-- <div
                                class="icon icon-lg icon-shape  shadow-success text-center border-radius-xl mt-n4 position-absolute" style="background-color: #485169 !important;"> --}}
                                <div class="icon icon-lg icon-shape shadow-success text-center border-radius-xl mt-n4 position-absolute" style="background-image: url('https://greet-screen.com/assets/logo.jpg');  background-size: cover;">
                                {{-- <i class="material-icons opacity-10">laptop</i> --}}
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"></p>
                                <h4 class="mb-0">{{ $item->device_name }}</h4>
                                <p class="text-sm mb-0 text-capitalize">{{ $item->device_code }}</p>

                            </div>

                        </div>
                        <hr class="dark horizontal my-0">
                        <a href="{{ route('device_details', ['id' => $item->id]) }}">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Click
                                        Here!</span> to
                                    view
                                    screen details</p>

                            </div>
                        </a>
                </div>
                <br></br>
            </div>
        @endforeach

    </div>

</div>
</main>

@include('layouts.footer')
