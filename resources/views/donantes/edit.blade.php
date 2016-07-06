@extends('layout.layout')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Donantes</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Lista de Donantes Inscritos</h4>
                        {!! Form::model($donor, ['route' => ['update.donor', $donor->id], 'method' => 'PUT', 'class' => 'form-horizontal style-form']) !!}
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
                                    {!! Form::select('Civil_Status', ['Soltero' => 'Soltero', 'Casado' => 'Casado', 'Divorciado' => 'Divorciado', 'Viudo' => 'Viudo'], $donor->civil_status, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('lblgender', 'Género', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('gender', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $donor->gender, ['class' => 'form-control']) !!}
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
                                    {!! Form::select('BloodType_id', $BloodTypes, $donor->bloodtype_id, ['class' => 'form-control']) !!}
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
                                    {!! Form::select('disease', ['SI' => 'Si', 'NO' => 'No'], $donor->disease, ['class' => 'form-control']) !!}
                                    <span class="help-block">Marcar "Sí" Solamente Si Padeció Hepatitis después de los 11 años</span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('lbltattoo', '¿Tatuajes, Acupuntura o Pircing?', ['class' => 'col-sm-2 col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('tattoo', ['SI' => 'Si', 'NO' => 'No'], $donor->tattoo, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                        <div align="right">
                            <button  type="submit" class="btn btn-theme"><i class="fa fa-cog"></i> Actualizar Donante</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->
        </section> <! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

@endsection