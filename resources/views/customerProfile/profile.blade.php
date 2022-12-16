<x-loading-indicatore />
@include('navLayout.navbar')

@extends('layouts.app')
@section('title')
@lang('Profile')
@endsection

@section('content')


<section class="vh-100" style="background-color: rgb(255, 255, 255);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-4">

                <div class="card" style="border-radius: 15px; border: solid 0px #ffffff;">
                    <div class="card-body text-center" style="border-radius: 15px; border: solid 0px #ffffff;">
                        <div class="mt-3 mb-4">
                            <img src="{{ $user->image ? Storage::url($user->image) : URL::asset('/logo/man.png') }}"
                                alt="" class="rounded-circle img-fluid" style="width: 150px;" />
                        </div>
                        <h4 class="mb-2">{{ $user->name }}</h4>
                        <p class="text-muted mb-4">{{ $user->user_role }}


                            {{-- Edit profile --}}
                            <a href="" data-bs-toggle="modal" data-bs-target=".update-profile"
                                style="color: #1A1A1A ;text-decoration: none;">
                                <p class="text-muted mb-4"> Edit profile <i class='far fa-edit'></i> </p>
                            </a>




                        <div class="mb-4 pb-2">
                            <a type="button" href="{{route('order')}}" class="btn btn-rounded btn-lg"
                                style="margin:5px; --bs-btn-padding-x: 59px; background-color:#1A1A1A ; color:#ffffff  ">
                                My orders
                            </a>
                        </div>


                        <div class="flex-container" style=" display: flex;
            justify-content: space-between; ">
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
                        <div class="flex-container" style="">

                            <hr>
                            {{-- name --}}
                            <div class="row " style="margin-top: 30px ; margin-left:auto;margin-right:auto">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Name :</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->name }} </p>
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="row " style=" margin-top: 10px">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Address :</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->address}}</p>
                                </div>
                            </div>

                            {{-- phone --}}
                            <div class="row " style=" margin-top: 10px">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>phone :</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->phone_number}}</p>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="row " style=" margin-top: 10px">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>E-mail</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
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
                            class="form-control @error('phone') is-invalid @enderror" value="{{ $user->address }}"
                            autofocus autocomplete="new-address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image">Profile Picture</label>
                        <div class="input-group">
                            <input type="file" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror" autofocus>
                            <label class="input-group-text" for="image">Upload</label>
                        </div>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <button class="btn" type="submit"
                            style="background-color: #1a1a1a; color:#ffffff; border-radius: 4px; --bs-btn-padding-x: 50;">Update</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection