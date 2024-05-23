<?php
$pagename = 'device';
?>
@include('layouts.header')


<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <div class="col-lg-12 mt-lg-0 mt-4 d-flex justify-content-center align-items-center">
            <div class="card mt-4 custom-border" id="password" style="width: 1000px;">
                <div class="card-header d-flex justify-content-between">
                    <h5 style="color: white !important; margin-bottom:-100px !important;">TV's</h5>

                    {{-- <button type="submit" class="btn text-white ml-6" data-bs-toggle="modal" data-bs-target="#modal-form"
                        style="background-color: #1f71cf;">+ Create Device</button> --}}

                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn text-white ml-6" type="submit"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons opacity-10">logout</i> Logout
                            </button>
                        </form>
{{-- 
                    <a href="{{ route('add_device_page') }}"><button type="submit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn text-black ml-6"
                            style="background-color: #ffe44c;">+ ADD TV</button></a>

                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li class="nav-item">
                                    <a class="nav-link text-white" href=""
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="material-icons opacity-10">logout</i>
                                        </div>
                                        <button class="transparent-button text-white" type="submit"><span
                                                class="nav-link-text ms-1">Logout</span></button>
                                    </a>
            
                                </li>
                            </form> --}}

                </div>

                <div class="card-body pt-0 ">
                    <div class="container-fluid py-4">
                        <div class="row">
                            <div class="col-12">
                                {{-- <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-capitalize ps-3">Manage Tv's</h6>
                                    </div>
                                </div> --}}
                                <div class="card-body  text-white px-0 pb-2 mx-3" style="border-color: rgb(73, 73, 73) !important;">
                                    <div class="table-responsive p-0">
                                        <table id="" class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    {{-- <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Sr.</th> --}}

                                                        {{-- <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Device Video</th>

                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Logo</th> --}}

                                                    {{-- <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Tv Name</th>    
                                
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Guest Name</th>

                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Tv Code</th>


                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Guest Message</th>

                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                @foreach ($devices as $value)
                                                    <?php $i++; ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="material-icons opacity-10">tv</i>
                                                                    <span class="ml-6" style="margin-left: 30px;">{{ $value->tv_name }}&nbsp; - &nbsp;</span> 
                                                                    {{ $value->device_code }} &nbsp; @if($value->device_status == 'connected') (Connected) @else {Disconnected}  @endif

                                                                </div>
                                                            </div>
                                                        </td>
                                                        {{-- <td>
                                                            <div>
                                                                <video width="200" height="100" controls>
                                                                    <source src="{{ asset('storage/' . $value->device_vedio) }}" type="video/mp4">
                                                                </video>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <img src="{{ asset('storage/' . $value->device_logo) }}"
                                                                    width="50" height="50">
                                                            </div>
                                                        </td> --}}

                                                      
                                                    
                                                        {{-- <td>
                                                            {{ $value->guest_name }}
                                                        </td> --}}
                                                        {{-- <td>
                                                            {{ $value->device_code }}
                                                        </td> --}}
                                                     
                                                        {{-- <td>
                                                            {{ Str::limit($value->guest_message, 50, '...') }}
                                                        </td> --}}

                                                        <td class="flex align-middle text-center">

                                                                <button type="button" value="{{ $value->id }}" class="btn deletebtn btn-block " data-bs-toggle="modal" data-bs-target="#modal-notification">
                                                                    <i class="material-icons opacity-10">delete</i>
                                                                </button>

                                                                <a href="{{ route('edit_device', ['id' => $value->id]) }}" style="text-decoration: none; color: inherit;">
                                                                    <i class="material-icons opacity-10" >edit</i>
                                                                </a>                                                                 
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('add_device_page') }}"><button type="submit" class="btn text-black ml-6"
                            style="background-color: #ffe44c;">+ ADD TV</button></a>
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

                </div>
            </div>
        </div>
    </div>
</div>
</div>

</main>

<script>
    new DataTable('#manageimgs');
</script>

<script>
    //===================Script For Delete category ====================================
    $(document).on('click', '.deletebtn', function() {
        var query_id = $(this).val();
        $('#deleteModal').modal('show');
        $('#deleting_id').val(query_id);
    });
</script>



@include('layouts.footer')
