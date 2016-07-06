@extends('layout.layout')
<style type="">
    .clase{
        display:inline-block;
    }
</style>
<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Dashboard</h3>
            <div class="row">
                <div class="col-md-12 main-chart">
                    <div class="row mtbox">
                            <div class="col-md-4 col-sm-4 col-md-offset-2 box0">
                                <div class="box1">
                                    <span class="li_user"></span>
                                    <h2>Donantes Activos</h2>
                                    <h3>{{$DonorsActive}}</h3>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 box0">
                                <div class="box1">
                                    <span class="li_eye"></span>
                                    <h2>Donantes Inactivos</h2>
                                    <h3>{{$DonorsInactive}}</h3>
                                </div>
                            </div>
                    </div>

                    <div class="row mtbox">
                        <div class="col-md-4 col-sm-4 col-md-offset-2 box0">
                            <div class="box1">
                                <span class="li_key"></span>
                                <h2>Donantes Aprobados</h2>
                                <h3>{{$DonorsApproved}}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 box0">
                            <div class="box1">
                                <span class="li_lock"></span>
                                <h2>Donantes No Aprobados</h2>
                                <h3>{{$DonorsUnApproved}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->
@endsection