@extends('layout.layout')

@section('content')

    <section   id="main-content">
        {!! Form::open(['route' => 'unit.createS', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'id' => 'hola']) !!}
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Despachar</h3>
            <div   class="row">
                <div  class="col-md-6">
                    <div  id="content" class="content-panel  content">
                        <h4><i class="fa fa-angle-right"></i> Despachar Unidades</h4>
                        <hr/>
                        <div class="form-group">
                            {!! Form::label('lbltypeoutput', 'Seleccione Tipo de Salida', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('type_transc', ['Donacion' => 'Donacion', 'Venta' => 'Venta'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div  class="form-group">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-default addRow"><i class="fa fa-plus-circle"></i> Agregar fila</button>
                            </div>
                        </div>
                        <div class="inputsRow hide">
                            <div class="grupo">
                                <div class="form-group form-inline grupito">
                                        <div class="col-sm-10 from-group form-inline">
                                            {!! Form::number('quantity[]', null, ['class' => 'txt form-control', 'placeholder' => 'Cantidad Unidades', 'min' => '1'] ) !!}
                                            {!! Form::select('BloodType_id[]', $bloodtype, null, ['class' => 'form-control']) !!}
                                            {!! Form::select('freezer_id[]', $freezer, null, ['class' => 'form-control']) !!}
                                            {!! Form::label('TOTAL', null, ['class' => 'form-control', 'name' => 'total'] ) !!}
                                            <button type="button" class="btn btn-danger removeRow" ><i class="fa fa-times-circle"></i> Eliminar fila</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div><! --/content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->
            <div class="row">
                <div  class="col-md-6">
                    <div class="content-panel">
                        <div  class="form-group">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->
@endsection

@section('scripts')
    <script>
        $(function() {
            $(document).on('click', '.addRow', function() {
                var $this = $(this);
                var $parent = $this.parents('.content').find('.grupo');
                $parent.find('.txt').val('');
                $parent.find('select').val(1);
                $parent.find('label').html('');
                $('#content').append($parent.html());
                crearSuma();
                removerItems();
            });

            function removerItems(){
                jQuery('#content').find('.removeRow')
                        .unbind()
                        .on('click', function(){
                            var $parent = jQuery(this).parents('.grupito');
                            $parent.remove();
                        });
            }

            function crearSuma() {
                jQuery('#content').find('.txt')
                        .unbind()
                        .on('keyup', function() { sumar(this);})
                        .on('keydown', function() { sumar(this); })
                        .on('keypress', function() { sumar(this); });
            }

            var precio = 50;
            function sumar(thiss) {
                var cantidad = +jQuery(thiss).val();
                total = cantidad * precio;
                jQuery(thiss).parent().find('label').html('' + total);
            }
        });
    </script>
@endsection


