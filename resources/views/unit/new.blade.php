@extends('layout.layout')

@section('content')

    <section   id="main-content">
        {!! Form::open(['route' => 'unit.create', 'method' => 'POST', 'class' => 'form-horizontal style-form', 'id' => 'hola']) !!}
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Unidades</h3>
            <div   class="row">
                <div  class="col-md-8">
                    <div  id="content" class="content-panel  content">
                        <h4><i class="fa fa-angle-right"></i> Ingresar Unidades</h4>
                        <hr/>

                        <div  class="form-group">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-default addRow"><i class="fa fa-plus-circle"></i> Agregar fila</button>
                            </div>
                        </div>
                        <div class="inputsRow hide">
                            <div class="grupo">
                                <div class="form-group form-inline grupito">
                                    <div class="col-sm-12 from-group form-inline hola">
                                        {!! Form::number('quantity[]', null, ['class' => 'txt form-control', 'placeholder' => 'Cantidad Unidades', 'min' => '1'] ) !!}
                                        {!! Form::text('donor_id[]', null, ['class' => 'form-control', 'placeholder' => 'Código Donante' ]) !!}
                                        {!! Form::select('warehouse_id[]', $warehouse, null, ['class' => 'form-control war', 'placeholder' => 'Seleccione Almacen']) !!}
                                        {!! Form::select('freezer_id[]', array(), null, ['class' => 'form-control wer', 'placeholder' => 'Seleccione Congelador']) !!}
                                        <button type="button" class="btn btn-danger removeRow" ><i class="fa fa-times-circle"></i> Eliminar fila</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><! --/content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->
            <div class="row">
                <div  class="col-md-8">
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
            $(document).on('click', '.addRow', function () {
                var $this = $(this);
                var $parent = $this.parents('.content').find('.grupo');
                $parent.find('.txt').val('');
                $parent.find('select').val(1);
                $parent.find('label').html('');
                $('#content').append($parent.html());
                crearSuma();
                removerItems();
                warSelect();
            });

            function removerItems() {
                jQuery('#content').find('.removeRow')
                        .unbind()
                        .on('click', function () {
                            var $parent = jQuery(this).parents('.grupito');
                            $parent.remove();
                        });
            }

            function crearSuma() {
                jQuery('#content').find('.txt')
                        .unbind()
                        .on('keyup', function () {
                            sumar(this);
                        })
                        .on('keydown', function () {
                            sumar(this);
                        })
                        .on('keypress', function () {
                            sumar(this);
                        });
            }

            function warSelect(){
                $('.war').unbind().change(function(){
                    var thiss = this;
                    ajax({
                                url: "{!! url('warehouse') !!}",
                                data: { option: $(this).val() },
                                type: 'GET',
                                async: true
                            },
                            function(data){
                                var $wer = $(thiss).parent().find('.wer');
                                var html = '';
                                $.each(data, function(key, element) {
                                    //ten cuidado con el each, ya que el key es el orden desde 0 del array data.
                                    html += '<option value=' + key + '>' + element + '</option>';
                                });
                                $wer.html(html);
                            }
                    );
                });
            }


            function ajax(opciones, callback) {
                opciones.url = opciones.url || '';
                opciones.async = opciones.async || false;
                opciones.type = opciones.type || 'POST';
                opciones.dataType = opciones.dataType || 'json';
                jQuery.ajax({
                    type: opciones.type,
                    dataType: opciones.dataType,
                    url: opciones.url,
                    data: opciones.data,
                    async: opciones.async,
                    success: function (data) {
                        callback(data);
                    }
                });
            }
        });
    </script>


@endsection


