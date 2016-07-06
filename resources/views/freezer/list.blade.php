@extends('layout.layout')
<style type="">
    .clase{
        display:inline-block;
    }
</style>
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Configuración</h3>
            <div class="row mt">
                <div class="col-lg-12 col-xs-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i>Listado de Congeladores</h4>
                        @if (Session::has('Sucesful'))
                            <div class="alert alert-success" role="alert">
                                <p> {{ Session::get('Sucesful')}}</p>
                            </div>
                        @endif
                        <section id="no-more-tables">
                            <div>
                                <br/>
                                <p>
                                    &nbsp;&nbsp; <a href="{{ route('freezer.new') }}" type="button" class="btn btn-theme02"><i class="fa fa-plus"></i> Nuevo Congelador </a>
                                </p>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <table class="table table-bordered table-striped table-condensed cf">
                                <thead class="cf">
                                <tr>
                                    <th><i class="fa fa-bullhorn"></i> Código</th>
                                    <th><i class="fa fa-users"></i> Nombre </th>
                                    <th> <i class=" fa fa-heart"></i> Ubicación</th>
                                    <th> <i class=" fa fa-heart"></i> Almacen</th>
                                    <th> <i class=" fa fa-heart"></i> Estado</th>
                                    <th> <i class=" fa fa-heart"></i> Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($freezer as $dato)
                                    <tr>
                                        <td data-title="No."> {{ $dato->id }} </td>
                                        <td data-title="Nombre">{{ $dato->name }}</td>
                                        <td data-title="Móvil">{{ $dato->address }}</td>
                                        <td data-title="Móvil">{{ $dato->warehouses->name }}</td>
                                        <td data-title="Estado">
                                            @if($dato->status_delete == "Activo")
                                                <span class="label label-success label-mini"> {{ $dato->status_delete }} </span>
                                            @else
                                                <span class="label label-danger label-mini"> {{ $dato->status_delete }} </span>
                                            @endif
                                        </td>
                                        <td data-title="Opciones">
                                            @if($dato->status_delete == 'Activo')
                                                <a href="{{ route('freezer.edit', $dato->id)  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> </a>
                                                {!!Form::open(['route' => ['freezer.delete', $dato], 'method' => 'DELETE', 'class' => 'clase'])  !!}
                                                <button type="submit" onclick="return confirm('Desea Eliminar el Registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                {!! Form::close() !!}
                                            @else
                                                {!!Form::open(['route' => ['freezer.activate', $dato], 'method' => 'DELETE', 'class' => 'clase'])  !!}
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