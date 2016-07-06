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
                                    <th><i class="fa fa-bullhorn"></i> No.</th>
                                    <th><i class="fa fa-users"></i> Nombre del Donante</th>
                                    <th> <i class=" fa fa-heart"></i> Móvil</th>
                                    <th> <i class=" fa fa-heart"></i> Email</th>
                                    <th class="hidden-phone"><i class="fa fa-gavel"></i> Estado Civil</th>
                                    <th> <i class=" fa fa-heart"></i> Edad</th>
                                    <th> <i class=" fa fa-heart"></i> Género</th>
                                    <th><i class=""></i> Grupo Sanguíneo</th>
                                    <th><i class=" fa fa-credit-card"></i> Número de Identificación</th>
                                    <th><i class=" fa fa-thumb-tack"></i> Peso </th>
                                    <th><i class=" fa fa-asterisk"></i>  ¿Hepatitis? </th>
                                    <th><i class=" fa fa-drupal"></i>  ¿Tatuajes u otros? </th>
                                    <th><i class=" fa fa-wrench"></i>  Aprobación </th>
                                    <th><i class=" fa fa-wrench"></i>  Estado </th>
                                    <th><i class=" fa fa-cogs"></i>  Opciones </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lists as $dato)
                                <tr>
                                    <td data-title="No."> {{ $dato->id }} </td>
                                    <td data-title="Nombre">{{ $dato->name }}</td>
                                    <td data-title="Móvil">{{ $dato->phone }}</td>
                                    <td data-title="Email">{{ $dato->email }}</td>
                                    <td class="hidden-phone" data-title="Estado Civil"> {{ $dato->civil_status }}</td>
                                    <td data-title="Edad">{{ $dato->age }}</td>
                                    <td data-title="Edad">{{ $dato->gender }}</td>
                                    <td data-title="Grupo Sanguíneo">{{ $dato->bloodtypes->name }}</td>
                                    <td data-title="DPI">{{ $dato->dpi }}</td>
                                    <td data-title="Peso">{{ $dato->weight }}</td>
                                    <td data-title="Hepatitis"> {{ $dato->disease }} </td>
                                    <td data-title="Tatuajes u Otros"> {{ $dato->tattoo }} </td>
                                    <td data-title="Aprobación">
                                        @if($dato->status_check == "Aprobado")
                                        <span class="label label-primary label-mini"> {{ $dato->status_check }} </span>
                                        @else
                                            <span class="label label-danger label-mini"> {{ $dato->status_check }} </span>
                                        @endif

                                    </td>
                                    <td data-title="Estado">
                                        @if($dato->status_delete == "Activo")
                                            <span class="label label-success label-mini"> {{ $dato->status_delete }} </span>
                                        @else
                                            <span class="label label-danger label-mini"> {{ $dato->status_delete }} </span>
                                        @endif
                                    </td>
                                    <td data-title="Opciones">
                                        @if($dato->status_delete == 'Activo')
                                            <a href="{{ route('edit.donor', $dato->id)  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> </a>
                                            {!!Form::open(['route' => ['delete.donor', $dato], 'method' => 'PUT', 'class' => 'clase'])  !!}
                                                <button type="submit" onclick="return confirm('Desea Eliminar el Registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            {!! Form::close() !!}
                                        @else
                                            {!!Form::open(['route' => ['activate.donor', $dato], 'method' => 'PUT', 'class' => 'clase'])  !!}
                                                <button  type="submit" onclick="return confirm('Desea Activar el Registro?')" class="btn btn-primary btn-xs"><i class="fa fa-check "></i> Activar</button>
                                            {!! Form::close() !!}
                                        @endif

                                    </td>
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