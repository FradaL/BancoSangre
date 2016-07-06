@extends('layout.layout')
<style type="">
    .clase{
        display:inline-block;
    }
</style>
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Buscar Emparejamiento</h3>
            <div class="row mt">
                <div class="col-lg-12 col-xs-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Ingrese su Búsqueda</h4>
                        @if (Session::has('Sucesful'))
                            <div class="alert alert-success" role="alert">
                                <p> {{ Session::get('Sucesful')}}</p>
                            </div>
                        @endif
                        <section id="no-more-tables">
                            <div class="form-group">
                                {!! Form::open(['route' => 'search', 'method' => 'get', 'class' => 'navbar-form navbar-left pull-right'])  !!}

                                {!! Form::select ('bloodtype_id', $blood, null, ['class' => 'form-control', 'placeholder' => ' Seleccione un Grupo Sanguíneo']) !!}

                                <button type="submit" class="btn btn-theme04">Buscar</button>
                                {!! Form::close() !!}
                            </div>

                            <br/>
                            <br/>


                            <table class="table table-bordered table-striped table-condensed cf">
                                <thead class="cf">
                                <tr>
                                    <th><i ></i> Grupo Sanguineo</th>
                                    <th><i ></i>O-</th>
                                    <th><i></i>O+</th>
                                    <th> <i></i>B-</th>
                                    <th><i></i>B+</th>
                                    <th><i></i>A-</th>
                                    <th><i></i>A+ </th>
                                    <th><i></i>AB-</th>
                                    <th><i></i>AB+</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>

                                       @if(!Empty($group))

                                                <td> {!! $group['name'] !!}</td>
                                            @if($group['O-'] == 'Compatible')
                                                <td><strong><font color="green">{{ ($group['O-']) }} </font></strong></td>
                                            @else
                                                <td><font color="red">{{ ($group['O-']) }} </font></td>
                                            @endif
                                            @if($group['O+'] == 'Compatible')
                                                <td><strong><font color="green">{{ ($group['O+']) }} </font></strong></td>
                                            @else
                                                <td><font color="red">{{ ($group['O+']) }} </font></td>
                                            @endif
                                            @if($group['B-'] == 'Compatible')
                                                <td><strong><font color="green">{{ ($group['B-']) }} </font></strong></td>
                                            @else
                                                <td><font color="red">{{ ($group['B-']) }} </font></td>
                                            @endif
                                            @if($group['B+'] == 'Compatible')
                                                <td><strong><font color="green"> {{ ($group['B+']) }} </font></strong></td>
                                            @else
                                                <td><font color="red"> {{ ($group['B+']) }} </font></td>
                                            @endif
                                            @if($group['A-'] == 'Compatible')
                                                <td><strong><font color="green"> {{ ($group['A-']) }} </font></strong></td>
                                            @else
                                                <td><font color="red"> {{ ($group['A-']) }} </font></td>
                                            @endif
                                            @if($group['A+'] == 'Compatible')
                                                <td><strong><font color="green">  {{ ($group['A+']) }} </font></strong></td>
                                            @else
                                                <td><font color="red">  {{ ($group['A+']) }} </font></td>
                                            @endif
                                            @if($group['AB-'] == 'Compatible')
                                                <td><strong><font color="green">  {{ ($group['AB-']) }} </font></strong></td>
                                            @else
                                                <td><font color="red">  {{ ($group['AB-']) }} </font></td>
                                            @endif
                                            @if($group['AB+'] == 'Compatible')
                                                <td><strong><font color="green">{{ ($group['AB+']) }} </font></strong></td>
                                            @else
                                                <td><font color="red">{{ ($group['AB+']) }} </font></td>
                                            @endif

                                        @endif

                                    </tr>

                                </tbody>
                            </table>
                        </section>
                    </div><!-- /content-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->
        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->
@endsection