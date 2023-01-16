<x-loading-indicatore />
@extends('layouts.app')

@section('title') Our team @endsection

@section('content')
@include('navLayout.navbar')
<div class="container marketing">
    <div>
        <div class="jumbotron mt-4 mb-5" style="max-width:400px; margin-right:auto; margin-left:auto;">
            <h3 class="fontStyleHint2" style=" font-family:Marlina; font-size:20px">OUR TEAM</h3>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6 mb-3">
            <img class="rounded-circle mb-2" src="{{ URL::asset('/team-image/alaa.jpeg') ?  URL::asset('/team-image/alaa.jpeg') : URL::asset('/logo/user.png')}}" alt="image" width="140" height="140">
            <h2>Ala'a Al-msandeh</h2>
            <p>Software Engineering</p>
        </div><!-- /.col-lg-6 -->

        <div class="col-lg-6 mb-3">
            <img class="rounded-circle" src="{{URL::asset('/team-image/massarh.jpeg') ?  URL::asset('/team-image/massarh.jpeg') :URL::asset('/logo/user.png')}}" alt="image" width="140" height="140">
            <h2>Massarh Al-hassan</h2>
            <p>Software Engineering</p>

        </div><!-- /.col-lg-6  -->

        <div class="col-lg-6 mb-3">
            <img class="rounded-circle" src="{{URL::asset('/team-image/amal.jpeg') ?  URL::asset('/team-image/amal.jpeg') : URL::asset('/logo/user.png')}}" alt="image" width="140" height="140">
            <h2>Amal Issam</h2>
            <p>Software Engineering</p>

        </div><!-- /.col-lg-6 -->

        <div class="col-lg-6 mb-3">
            <img class="rounded-circle" src="{{URL::asset('/team-image/hanouf.jpeg') ?  URL::asset('/team-image/hanouf.jpeg') : URL::asset('/logo/user.png')}}" alt="image" width="140" height="140">
            <h2>Alhanouf Salameh</h2>
            <p>Software Engineering</p>

        </div><!-- /.col-lg-6  -->

    </div><!-- /.row -->

</div><!-- /.container -->
@endsection