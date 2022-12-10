@include('navLayout.navbar')
@extends('layouts.app')

@section('title') @lang('Profile') @endsection

@section('css')
<link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
    type="text/css">
@endsection

@section('content')
{{--
@component('components.breadcrumb')
@slot('li_1') Contacts @endslot
@slot('title') Profile @endslot
@endcomponent --}}

<div class="row justify-content-center">
    <div class="col-10">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row" style="background-color: #1a1a1a">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 style="color: #ffffff">Happy to see you <i class="mdi mdi-heart text-danger"></i></h5>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ URL::asset('/logo/shopping.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row ">
                    <div class="col-sm-4"> {{-- NOTE --}}
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="{{ Storage::url($user->image) ? Storage::url($user->image) : URL::asset('/logo/man.png') }}"
                                alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate">{{ $user->name }}</h5>

                    </div>

                    <div class="col-sm-8">
                        <div class="pt-4">

                            <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15">125</h5>
                                    <p class="text-muted mb-0">Projects</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-15">$1245</h5>
                                    <p class="text-muted mb-0">Revenue</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="" class="btn waves-effect waves-light btn-sm" style="background-color: #1a1a1a; color:#ffffff;
                                border-radius: 4px; --bs-btn-padding-x: 50;" data-bs-toggle="modal"
                                    data-bs-target=".update-profile">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Personal Information</h4>

                <p class="text-muted mb-4">Hi I'm Cynthia Price,has been the industry's standard dummy text To an
                    English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Name :</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone :</th>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail :</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Location :</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end card -->

    </div>

    <div class="col-xl-8">

        <!--  Update Profile example -->
        <div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                            @csrf
                            <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="useremail" value="{{ Auth::user()->email }}" name="email"
                                    placeholder="Enter email" autofocus>
                                <div class="text-danger" id="emailError" data-ajax-feedback="email"></div>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ Auth::user()->name }}" id="username" name="name" autofocus
                                    placeholder="Enter username">
                                <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                            </div>

                            <div class="mb-3">
                                <label for="userdob">Date of Birth</label>
                                <div class="input-group" id="datepicker1">
                                    <input type="text" class="form-control @error('dob') is-invalid @enderror"
                                        placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy"
                                        data-date-container='#datepicker1' data-date-end-date="0d"
                                        value="{{ date('d-m-Y', strtotime(Auth::user()->dob)) }}"
                                        data-provide="datepicker" name="dob" autofocus id="dob">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                                <div class="text-danger" id="dobError" data-ajax-feedback="dob"></div>
                            </div>

                            <div class="mb-3">
                                <label for="avatar">Profile Picture</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                        id="avatar" name="avatar" autofocus>
                                    <label class="input-group-text" for="avatar">Upload</label>
                                </div>
                                <div class="text-start mt-2">
                                    <img src="{{ asset(Auth::user()->avatar) }}" alt=""
                                        class="rounded-circle avatar-lg">
                                </div>
                                <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar">
                                </div>
                            </div>

                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light UpdateProfile"
                                    data-id="{{ Auth::user()->id }}" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        @endsection
        @section('script')
        <!-- apexcharts -->
        <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

        <!-- profile init -->
        <script src="{{ URL::asset('/assets/js/pages/profile.init.js') }}"></script>

        <script>
            $('#update-profile').on('submit', function(event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        let formData = new FormData(this);
        $('#emailError').text('');
        $('#nameError').text('');
        $('#dobError').text('');
        $('#avatarError').text('');
        $.ajax({
            url: "{{ url('update-profile') }}" + "/" + Id,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#emailError').text('');
                $('#nameError').text('');
                $('#dobError').text('');
                $('#avatarError').text('');
                if (response.isSuccess == false) {
                    alert(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function(response) {
                $('#emailError').text(response.responseJSON.errors.email);
                $('#nameError').text(response.responseJSON.errors.name);
                $('#dobError').text(response.responseJSON.errors.dob);
                $('#avatarError').text(response.responseJSON.errors.avatar);
            }
        });
    });
        </script>

        @endsection