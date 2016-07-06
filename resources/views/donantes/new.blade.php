@extends('layout.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Donantes</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Lista de Donantes Inscritos</h4>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <p>Se presentaron los siguientes Errores:</p>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error  }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif


                        {!! Form::open(['route' => 'create.donor', 'method' => 'POST', 'class' => 'form-horizontal style-form']) !!}
                            @include('donantes.partials.fields')
                        <div align="right">
                            <button  type="submit" class="btn btn-theme"><i class="fa fa-cog"></i> Registrar Donante</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->
        </section> <! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

@endsection