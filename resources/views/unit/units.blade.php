@extends('layout.layout')

@section('content')
    <style>
        .green-qty{
            background-color: #00733e;
        }
        .red-qty{
            background-color: #FA5858;
        }
    </style>
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Inventario General</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Inventario General</h4>
                        <hr>
                        @if (Session::has('Sucesful'))
                            <div class="alert alert-success" role="alert">
                                <p> {{ Session::get('Sucesful')}}</p>
                            </div>
                        @endif
                        <p>
                        <a href="{{ route('unit.new') }}" type="button" class="btn btn-theme02"><i class="fa fa-plus"></i> Nuevo </a>
                        </p>
                        <hr>
                        <table  class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Grupo Sanguíneo</th>
                                <th>Cantidad Disponible</th>
                                <th>Nivel de Reserva</th>
                                <th>Listado de Emergencia</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($bloodtype as $blood)

                            <tr>
                                <td> {{ $blood['id'] }}</td>
                                <td> {{$blood['name'] }}</td>
                                <td>{{ $blood['unit']  }}</td>
                                @if($blood['unit'] <= $blood['reservation'])
                                    <td class="red-qty"> <span >{{  $blood['reservation']  }}</span></td>
                                    <td><a href="{{ route('example', $blood['id']) }}">Descargar</a> </td>
                                @else
                                    <td> <span class="">{{ $blood['reservation']  }}</span></td>
                                @endif

                            </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div><! --/content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

@endsection