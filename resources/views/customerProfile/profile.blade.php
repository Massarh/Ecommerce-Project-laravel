<x-loading-indicatore />
@include('navLayout.navbar')
@extends('layouts.app')
@section('title') Profile @endsection

<style>
    .custom-file-input {
        position: relative;
        z-index: 2;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        margin: 0;
        opacity: 0;
    }

    .custom-file-label {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6e707e;
        background-color: #fff;
        border: 1px solid #d1d3e2;
        border-radius: 0.25rem;
        -webkit-box-shadow: 0 0.125rem 0.25rem 0 rgb(58 59 69 / 20%) !important;
        box-shadow: 0 0.125rem 0.25rem 0 rgb(58 59 69 / 20%) !important;
    }

    .custom-file-label::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        display: block;
        height: calc(1.5em + 0.75rem);
        padding: 0.375rem 0.75rem;
        line-height: 1.5;
        color: #6e707e;
        content: "Browse";
        background-color: #eaecf4;
        border-left: inherit;
        border-radius: 0 0.35rem 0.35rem 0;
    }
</style>

@section('content')

<div class=" d-flex justify-content-center" style="margin-top:55px!important">
    <div class="col-12">
        <div>
            <div class="mb-2" style="display: flex; justify-content: center">
                <img id="main-image" src="{{ $user->image ?  Storage::url($user->image)  : asset('/logo/user.png')  }}"
                    alt="" class="rounded-circle img-fluid" style="width: 150px;" />
            </div>
            <div class="text-center">
                <h4 class="mb-2">{{ $user->name }}</h4>
                <p class="text-muted mb-4">{{ $user->user_role }} </p>

                {{-- Edit profile --}}
                <a href="" data-bs-toggle="modal" data-bs-target=".update-profile"
                    style="color: #1A1A1A ;text-decoration: none;">
                    <p class="text-muted mb-4"> Edit profile <i class='far fa-edit'></i> </p>
                </a>
            </div>
            {{-- My orders --}}
            <div class="mb-4 text-center">
                <a type="button" href="{{route('order')}}" class="btn btn-rounded btn-lg"
                    style="margin:5px; --bs-btn-padding-x: 40px; background-color:#1A1A1A ; color:#ffffff  ">
                    My orders
                </a>
            </div>


            <div class="" style=" display: flex; justify-content: space-around; ">
                <div>
                    <p class="mb-2 h5">{{ $user->created_at->toDateString()}}</p>
                    <p class="text-muted mb-0">joined at</p>
                </div>

                <div class="px-3">
                    <p class="mb-2 h5">{{isset($user->orders) ? $user->orders->count() : '0'}}</p>
                    <p class="text-muted mb-0">Order count</p>
                </div>
            </div>


            {{-- user info --}}
            <div style="margin-top:30px; ">
                {{-- name --}}
                <div style="display: flex; justify-content: center;margin-top: 10px">
                    <p class="mb-0" style=""><b>Name</b></p>
                    <p class="text-muted mx-2">{{ $user->name }} </p>
                </div>

                {{-- Address --}}
                <div style="display: flex; justify-content:center; margin-top: 10px">
                    <p class="mb-0" style=""><b>Address</b></p>
                    <p class="text-muted mx-2">{{ $user->address ? $user->address : 'No Address Yet'}}</p>
                </div>


                {{-- phone --}}
                <div style="display: flex; justify-content:center; margin-top: 10px">
                    <p class="mb-0" style=""><b>Phone Number</b></p>
                    <p class="text-muted mx-2">{{ $user->phone_number ? $user->phone_number : "No Phone Number Yet"}}
                    </p>
                </div>

                {{-- Email --}}
                <div style="display: flex; justify-content:center; margin-top: 10px">
                    <p class="mb-0" style=""><b>E-mail</b></p>
                    <p class="text-muted mx-2" style="">{{ $user->email}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

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
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {!! Toastr::message() !!}

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input id="name" name="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" autofocus
                            placeholder="Enter name" autocomplete="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input id="phone_number" name="phone_number" type="text"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            value="{{ $user->phone_number }}" autofocus placeholder="07****"
                            autocomplete="new-phone_number">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input id="address" name="address" type="text"
                            class="form-control @error('address') is-invalid @enderror" value="{{ $user->address }}"
                            autofocus autocomplete="new-address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- image --}}
                    <div class="mb-3">
                        <label class="form-label">Choose Image</label>
                        <div class="row mx-1">
                            <div class="custom-file col-10">
                                <label for="customFile" class="custom-file-label bg-color-transparent">Choose
                                    Image</label>
                                <input id="customFile" name="image" type="file"
                                    class="custom-file-input @error('image') is-invalid @enderror  bg-color-transparent">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-2 d-flex align-items-center">
                                <input class="clear" type="checkbox" id="clear" name="clear"
                                    class=" @error('clear') is-invalid @enderror">
                                <label class="mx-1 mt-2">Clear</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 mb-1 offset-sm-4">
                        <img id="img" src="{{$user->image ?  Storage::url($user->image)  : asset('/logo/user.png')}}"
                            style="width:6rem; height:7rem">
                    </div>

                    {{-- button --}}
                    <div class="mt-4  d-flex justify-content-center" style="margin-right: 50px;">
                        <button class="btn" type="submit"
                            style="background-color: #1a1a1a; color:#ffffff; border-radius: 4px;">Update</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

{{-- pop up open when error appeare --}}
@if (count($errors) > 0)
<script type="text/javascript">
    $("document").ready(function() {
        $('.modal').modal('show');
    });
</script>
@endif

<script type="text/javascript">
    $("document").ready(function() {
        $('.custom-file-input').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) 
            {
                //  The FileReader function returns the file’s contents
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                }
                // The readAsDataURL method is used to read the contents of the specified File.
                reader.readAsDataURL(input.files[0]);
            }
            $('.clear').prop('checked', false)
        
        });

        $('.clear').on('change', function() {
            if ($(this).is(":checked")) 
                {
                    $('#img').attr('src', 'logo/user.png');
                    $('#img').attr('style', "width:6rem; height:7rem");
                    $('#customFile').val('');

                } else{
                var image=$('#main-image').attr('src');
                $('#img').attr('src', image);
                $('#img').attr('style', "width:6rem; height:7rem");
            } 
        });
    });
</script>