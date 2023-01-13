@extends('admin.layouts.main')

@section('title') Profile @endsection

@section('content')

<div class=" d-flex justify-content-center" style="margin-bottom:-52px!important">
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
                    style="margin:5px; --bs-btn-padding-x: 40px; background-color:#282e40  ; color:#ffffff  ">
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
                    <p class="mb-0"><b>Name</b></p>
                    <p class="text-muted mx-2">{{ $user->name }} </p>
                </div>

                {{-- Address --}}
                <div style="display: flex; justify-content:center; margin-top: 10px">
                    <p class="mb-0"><b>Address</b></p>
                    <p class="text-muted mx-2">{{ $user->address ? $user->address : 'No Address Yet'}}</p>
                </div>


                {{-- phone --}}
                <div style="display: flex; justify-content:center; margin-top: 10px">
                    <p class="mb-0"><b>Phone Number</b></p>
                    <p class="text-muted mx-2">{{ $user->phone_number ? $user->phone_number : "No Phone Number Yet"}}
                    </p>
                </div>

                {{-- Email --}}
                <div style="display: flex; justify-content:center; margin-top: 10px">
                    <p class="mb-0"><b>E-mail</b></p>
                    <p class="text-muted mx-2">{{ $user->email}}</p>
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
                        <img id="img" src="{{$user->image ? Storage::url($user->image) : asset('/logo/user.png')}}"
                            style="width:6rem; height:7rem">
                    </div>

                    {{-- button --}}
                    <div class="mt-4  d-flex justify-content-center mr-5">
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
{{-- end pop up open when error appeare --}}

<script type="text/javascript">
    $("document").ready(function() {
        //uploade image 
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
            // prop from proparties
            $('.clear').prop('checked', false)
        
        });
        // end uploade image
        
        // clear button
        $('.clear').on('change', function() {
            if ($(this).is(":checked")) 
            {
                // attr from attributes
                $('#img').attr('src', 'logo/user.png');
                $('#img').attr('style', "width:6rem; height:7rem");
                // val fro value
                $('#customFile').val('');
            } else{
                var image=$('#main-image').attr('src');
                $('#img').attr('src', image);
                $('#img').attr('style', "width:6rem; height:7rem");
            } 
        });
        // end clear button
    });

</script>