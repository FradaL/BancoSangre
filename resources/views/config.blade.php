@extends('layout.layout')

@section('content')

    <section   id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Configuración</h3>
            <div   class="row">
                <div  class="col-md-6">
                    <div  id="content" class="content-panel  content">
                        <h4><i class="fa fa-angle-right"></i> General</h4>
                        <hr/>
                        @if (Session::has('Sucesful'))
                            <div class="alert alert-success" role="alert">
                                <p> {{ Session::get('Sucesful')}}</p>
                            </div>
                        @endif
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
                        {!! Form::model($config, ['route' => 'config.update', 'method' => 'PUT', 'class' => 'form-horizontal style-form']) !!}
                            <div class="form-group">
                                {!! Form::label('lblname', 'Ingrese Precio de Unidades:', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0']) !!}
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Guardar</button>
                        {!! Form::close() !!}
                    </div> <!-- content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->
        </section><!--wrapper -->
    </section><!-- /MAIN CONTENT -->
@endsection

@section('scripts')

@endsection


