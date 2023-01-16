<x-loading-indicatore />
@extends('layouts.app')

@section('title') Our team @endsection
<style>
    @media (min-width: 992px) {
        .alaa-h2 {
            margin-left: 12px;
        }

        .alaa-p {
            margin-left: 16px;
        }

        .alaa-span {
            margin-left: 30px;
        }

        .massarh-h2 {
            margin-left: 12px;
        }

        .amal-p {
            margin-left: 5px;
        }

        .alhanouf-h2 {
            margin-left: 12px;
        }
    }
    @media (min-width: 576px) and (max-width: 992px) {
        .alaa-h2 {
            margin-left: -52px;
           
        }

        .alaa-p {
            margin-left: 16px;
        }

        .alaa-span {
            margin-left: 30px;
        }

        .massarh-h2 {
            margin-left: -29px;
        }

        .amal-p {
            margin-left: 5px;
        }

        .alhanouf-h2 {
            margin-left: -33px;
        }
    }

    @media (max-width: 576px) {
        .alaa-d {
            max-width: 317px !important;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .massarh-div {
            max-width: 317px !important;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .amal-div {
            width: 317px !important;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .alhanouf-div {
            width: 317px !important;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;

        }
    }
</style>
@section('content')
@include('navLayout.navbar')
<div class="container marketing" style="margin-top: 70px!important;">
    <div>
        <div class="jumbotron mt-4 mb-5" style="max-width:400px; margin-right:auto; margin-left:auto;">
            <h3 class="fontStyleHint2" style=" font-family:Marlina; font-size:20px">OUR TEAM</h3>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-6 col-lg-3 mb-3 alaa-d">
            <img class="rounded-circle mb-3"
                src="{{ URL::asset('/team-image/alaa.jpeg') ?  URL::asset('/team-image/alaa.jpeg') : URL::asset('/logo/user.png')}}"
                alt="image" width="140" height="140">
            <h2 class="alaa-h2"><span class="alaa-span">Ala'a </span>Almsandeh</h2>
            <p class="alaa-p">Software Engineering</p>
        </div><!-- /.col-lg-6 -->



        <div class="col-sm-6 col-lg-3 mb-3 massarh-div">
            <img class="rounded-circle mb-3"
                src="{{URL::asset('/team-image/massarh.jpeg') ?  URL::asset('/team-image/massarh.jpeg') :URL::asset('/logo/user.png')}}"
                alt="image" width="140" height="140">
            <h2 class="massarh-h2">Massarh Alhassan</h2>
            <p>Software Engineering</p>

        </div><!-- /.col-lg-6  -->

        <div class="col-sm-6 col-lg-3 mb-3 amal-div">
            <img class="rounded-circle mb-3"
                src="{{URL::asset('/team-image/amal.jpeg') ?  URL::asset('/team-image/amal.jpeg') : URL::asset('/logo/user.png')}}"
                alt="image" width="140" height="140">
            <h2>Amal Issam</h2>
            <p class="amal-p">Software Engineering</p>

        </div><!-- /.col-lg-6 -->

        <div class="col-sm-6 col-lg-3 mb-3 alhanouf-div">
            <img class="rounded-circle mb-3"
                src="{{URL::asset('/team-image/hanouf.jpeg') ?  URL::asset('/team-image/hanouf.jpeg') : URL::asset('/logo/user.png')}}"
                alt="image" width="140" height="140">
            <h2 class="alhanouf-h2">Alhanouf Salameh</h2>
            <p>Software Engineering</p>

        </div><!-- /.col-lg-6  -->

    </div><!-- /.row -->

</div><!-- /.container -->
@endsection