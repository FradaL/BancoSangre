
<div class="form-group">
    {!! Form::label('lbltypeoutput', 'Seleccione Tipo de Salida', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('type_output', ['donacion' => 'Donacion', 'venta' => 'Venta'], null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    div.col-sm-
    <button type="button" class="btn btn-default addRow"><i class="fa fa-plus-circle"></i> Agregar fila</button>
</div>


<div class="classdef">
    <div class="form-group form-inline">
        <div class="col-sm-8">

        {!! Form::select('type_output[]', ['donacion' => 'Donacion', 'venta' => 'Venta'], null, ['class' => 'form-control']) !!}
        {!! Form::text('total[]', null, ['class' => 'form-control'] ) !!}
            {!! Form::number('quantity[]', null, ['class' => 'quant form-control', 'placeholder' => 'Cantidad de Unidades'] ) !!}
        </div>
        <button type="button" class="btn btn-danger removeRow" ><i class="fa fa-times-circle"></i> Eliminar fila</button>
    </div>
</div>



