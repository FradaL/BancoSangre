@extends('layout.layout')

@section('content')

    <section   id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Configuración</h3>
            <div   class="row">
                <div  class="col-md-6">
                    <div  id="content" class="content-panel  content">
                        <h4><i class="fa fa-angle-right"></i> Almacenes</h4>
                        <hr/>

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
                        {!! Form::open(['route' => 'warehouse.create', 'method' => 'POST', 'class' => 'form-horizontal style-form']) !!}
                            @include('warehouse.partials.fields')
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Crear</button>
                        {!! Form::close() !!}
                    </div> <!-- content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->
        </section><!--wrapper -->
    </section><!-- /MAIN CONTENT -->
@endsection

@section('scripts')

@endsection


