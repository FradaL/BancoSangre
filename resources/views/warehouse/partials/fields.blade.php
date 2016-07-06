<div class="form-group">
    {!! Form::label('lblname', 'Ingrese Nombre:', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lbladdress', 'Ingrese Ubicación del Almacen:', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Ubicación']) !!}
    </div>
</div>