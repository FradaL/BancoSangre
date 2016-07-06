@extends('layout.layout')
<style type="">
    .clase{
        display:inline-block;
    }
</style>
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Lista Donantes Inscritos</h3>
            <div class="row mt">
                <div class="col-lg-12 col-xs-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Donantes Registrados</h4>
                        @if (Session::has('Sucesful'))
                            <div class="alert alert-success" role="alert">
                                <p> {{ Session::get('Sucesful')}}</p>
                            </div>
                        @endif
                        <section id="no-more-tables">
                            <div>
                                <p>
                                    &nbsp;&nbsp; <a href="{{ route('new.donor') }}" type="button" class="btn btn-theme02"><i class="fa fa-plus"></i> Donante </a>
                                </p>
                            </div>
                            <div class="form-group">
                                {!! Form::open(['route' => 'list.donor', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right'])  !!}
                                {!! Form::checkbox('check', 'value', false) !!}
                                {!! Form::label('lbl', 'Agrupar por Edad', null, ['class' => 'form-control']) !!}
                                {!! Form::text ('dpi', null, ['class' => 'form-control', 'placeholder' => ' DPI']) !!}
                                {!! Form::select ('bloodtype_id', $blood, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Grupo']) !!}
                                <button type="submit" class="btn btn-theme04">Buscar</button>
                                {!! Form::close() !!}
                            </div>
                            <!-- Select para Agrupar por Grupo Sanguineo -->
                            <br/>
                            <br/>
                            <br/>


                            <table class="table table-bordered table-striped table-condensed cf">
                                <thead class="cf">
                                <tr>
                                    <th><i class="fa fa-bullhorn"></i> Genero</th>
                                    <th><i class="fa fa-bullhorn"></i> Edad</th>
                                    <th><i class="fa fa-users"></i> Total </th>
                                    <th class="hidden-phone"><i class="fa fa-gavel"></i> Grupo Sanguíneo</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lists as $dato)
                                    <tr>
                                        <td data-title="No."> {{ $dato->gender }} </td>
                                        <td data-title="No."> {{ $dato->age }} </td>
                                        <td data-title="Nombre">{{ $dato->total }}</td>
                                        <td data-title="Grupo Sanguíneo"> {{ $dato->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </section>
                    </div><!-- /content-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->
        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->
@endsection