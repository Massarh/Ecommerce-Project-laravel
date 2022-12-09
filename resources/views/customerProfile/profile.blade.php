<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fbc2eb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1))
    }
</style>
@include('navLayout.navbar')
@extends('layouts.app')

@section('content')

<div class="bg-overlay profile-bg" style="background-color: #1A1A1A !important;"></div>
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card border p-4" style="width: 400px; height: 500px; background: #ffffff96; border: 0px !important; border-radius: 10px;">
        <div class=" image d-flex flex-column justify-content-center align-items-center pt-4"> 
            <div style="display:flex; justify-content:center">
                <img src="{{ Storage::url($user->image) }}"
                    alt="avatar" class="rounded-circle img-fluid" style="height: 140px; ">
            </div> 
            <span class="name mt-3">{{$user->name}}</span> 
            <span class="idd mt-1">{{$user->email}}</span>

            <div class="d-flex flex-row justify-content-center align-items-center gap-2 mt-1"> 
                <span class="idd1">{{$user->phone_number}}</span> 
                <span><i class="fa fa-copy"></i></span> 
            </div>
            
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                <span class="number">{{$user->address}}</span>
            </div>
            <div class=" d-flex mt-2"> 
                <a href="{{route('profile.edit')}}">
                    <button type="button" class="btn ms-1" style="background-color:#1A1A1A; color:white;">Edit</button>
                </a>
            </div>
            @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee' || auth()->user()->user_role=='superadmin')
            <div class="text mt-3"> 
                <span>Eleanor Pena is a {{auth()->user()->user_role}} 
                    <br><br>  
                </span> 
            </div>
            @endif
            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
                <span><i class="fa fa-twitter"></i></span> 
                <span><i class="fa fa-facebook-f"></i></span> 
                <span><i class="fa fa-instagram"></i></span> 
                <span><i class="fa fa-linkedin"></i></span> 
            </div>
            <div class=" px-2 rounded mt-4 date "> <span class="join">Joined <script>
                document.write(new Date().getFullYear())
            </script> </span> </div>
        </div>
    </div>
</div>
@endsection