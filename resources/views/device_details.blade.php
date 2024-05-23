<?php
$pagename = 'device';
?>
@include('layouts.header')



<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-100 border-radius-xl mt-4">
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                {{-- <div class="avatar avatar-xl position-relative">
            <img src="{{ asset('storage/' . $device->device_logo) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div> --}}

                @if($device->device_logo)

                <div>
                    <img src="{{ asset('storage/' . $device->device_logo) }}" width="100" height="100">
                </div>
                @else 

                <div>
                    <img src="{{ asset('assets/premium.png') }}" width="100" height="100">
                </div>

                @endif
            </div>
            <div class="col-auto my-auto" style="display:flex;">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ $device->device_name }}
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        {{ $device->device_code }}
                    </p>
                </div>
                {{-- <div style="margin-left: 700px;">
                    <button type="button" value="{{ $device->id }}"
                        class="btn cancelbtn btn-block bg-gradient-dark mb-3" data-bs-toggle="modal"
                        data-bs-target="#modal-cancel">Cancel Subscription</button>
                </div> --}}

            </div>

        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Guest Name</h6>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">{{ $device->device_heading }}</p>
                            <br><br>
                            <h6 class="mb-0">Background Images</h6>
                            <br>
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner ">
                                    @foreach ($imgs as $slider)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <div class="slider-image text-center">
                                                <img src="{{ asset('storage/' . $slider->bg_img) }}"
                                                    class="d-inline-block border text-center rounded"
                                                    alt="{{ $slider->image }}"
                                                    style="width: 100%;
                                                height: 250px;">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Greeting Description</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                {{ $device->device_description }}
                            </p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Wifi
                                        Userame:</strong> &nbsp; {{ $device->device_wifi }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Wifi
                                        Password:</strong> &nbsp; {{ $device->device_password }}</li><br>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Subscription
                                        Type:</strong> &nbsp; <span class="badge badge-sm bg-gradient-success"><?php if($subs_price->subscription_price == 12){ ?>Premium <?php } else { ?> Standard <?php } ?></span></li>
                                <br><br>
                            </ul>

                            <td class="flex align-middle text-center">

                                <button type="button" value="{{ $device->id }}"
                                    class="btn deletebtn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#modal-notification">Delete</button>

                                <a href="{{ route('edit_device', ['id' => $device->id]) }}"> <button type="submit"
                                        class="btn text-white"
                                        style="background-color: #1f71cf !important ">Edit</button> </a>

                                <button type="button" value="{{ $device->id }}"
                                    class="btn cancelbtn btn-block bg-gradient-dark mb-3" data-bs-toggle="modal"
                                    data-bs-target="#modal-cancel">Cancel Subscription</button>

                            </td>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="mb-5 ps-3">
                        <h6 class="mb-1">Device Video</h6>
                        {{-- <p class="text-sm">Architects design houses</p> --}}
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="card-header p-0 mt-n4 mx-3">
                                    <video width="1000" height="350" controls>
                                        <source src="{{ asset('storage/' . $device->device_vedio) }}" type="video/mp4">
                                    </video>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">

    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
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
                    <form type="submit" action="{{ route('device_delete') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="py-3 text-center">
                            <i class="material-icons text-secondary" style="text-size: 100px; !important">
                                notifications_active
                            </i>
                            <h4 class="text-gradient text-danger mt-4">You should read this!
                            </h4>
                            <input type="hidden" name="delete_device_id" id="deleting_id"></input>
                            <p>Do you really want to delete these records? This process cannot
                                be
                                undo.</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block bg-gradient-primary mb-3">Delete</button>
                    <button type="button" class="btn btn-block bg-gradient-dark mb-3"
                        data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">

    <div class="modal fade" id="modal-cancel" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
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
                    <form type="submit" action="{{ route('cancel-subscription') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="py-3 text-center">
                            <i class="material-icons text-secondary" style="text-size: 100px; !important">
                                notifications_active
                            </i>
                            <h4 class="text-gradient text-danger mt-4">You should read this!
                            </h4>
                            <input type="hidden" name="device_id" id="cancel_id"></input>
                            <p>Do you really want to Cancel this Subscription? This process cannot
                                be
                                undo.</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block bg-gradient-primary mb-3">Cancel Subscription</button>
                    <button type="button" class="btn btn-block bg-gradient-dark mb-3"
                        data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- </div>
</main> --}}

<script>
    //===================Script For Delete category ====================================
    $(document).on('click', '.deletebtn', function() {
        var query_id = $(this).val();
        $('#deleteModal').modal('show');
        $('#deleting_id').val(query_id);
    });

    //===================Script For Delete category ====================================
    $(document).on('click', '.cancelbtn', function() {
        var query_id = $(this).val();
        $('#cancel_id').val(query_id);
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>


@include('layouts.footer')
