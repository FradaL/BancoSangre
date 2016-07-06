<div class="form-group">
    {!! Form::label('lblfirstname', 'Primer Nombre', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('first_name', null, ['class' => 'form-control'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lblsecondname', 'Segundo Nombre', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('second_name', null, ['class' => 'form-control'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lblfirstlastname', 'Primer Apellido', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('first_lastname', null, ['class' => 'form-control'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lblsecondlastname', 'Segundo Apellido', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('second_lastname', null, ['class' => 'form-control'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lbltel', 'Ingrese Móvil', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('phone', null, ['class' => 'form-control'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lblmail', 'Correo Electronico', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::email('email', null, ['class' => 'form-control'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lblstate', 'Estado Civil', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('Civil_Status', ['Soltero' => 'Soltero', 'Casado' => 'Casado', 'Divorciado' => 'Divorciado', 'Viudo' => 'Viudo'], null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lblgender', 'Género', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('gender', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lblage', 'Edad', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::number('age', null, ['class' => 'form-control', 'min' => '0'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lbldpi', 'Número de Identificación (DPI)', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::number('dpi', null, ['class' => 'form-control'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lbltype', 'Tipo de Sangre', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('BloodType_id', $BloodTypes, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('lblweight', 'Peso (Kg)', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('weight', null, ['class' => 'form-control'] ) !!}
        <span class="help-block">Ingrese La Cantidad del peso en Kilogramos</span>
    </div>
</div>
<div class="form-group">
    {!! Form::label('lbldisease', '¿Hepatitis? Después de 11 Años', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('disease', ['SI' => 'Si', 'NO' => 'No'], null, ['class' => 'form-control']) !!}
        <span class="help-block">Marcar "Sí" Solamente Si Padeció Hepatitis después de los 11 años</span>
    </div>
</div>
<div class="form-group">
    {!! Form::label('lbltattoo', '¿Tatuajes, Acupuntura o Pircing?', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('tattoo', ['SI' => 'Si', 'NO' => 'No'], null, ['class' => 'form-control']) !!}
    </div>
</div>
