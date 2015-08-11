<div class="form-group">
    {!! Form::label('first_name', 'Nombre') !!}
    {!! Form::text('first_name',null,['class'=> 'form-control', 'placeholder' => 'Por favor introduzca su nombre']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Apellidos') !!}
    {!! Form::text('last_name',null,['class'=> 'form-control', 'placeholder' => 'Por favor introduzca sus apellidos']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Correo Electronico') !!}
    {!! Form::text('email',null,['class'=> 'form-control', 'placeholder' => 'Por favor introduzca su e-mail']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password',['class'=> 'form-control', 'placeholder' => 'Por favor introduzca su password']) !!}
</div>
{{--
<div class="form-group">
    {!! Form::label('type', 'Tipo de Usuarios') !!}
    {!! Form::select('type', config('options.types'), null, ['class' => 'form-control']) !!}
</div>
--}}
