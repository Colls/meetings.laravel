@extends('layouts.simple_layout')
@section('content')
<div class="registration container">
    <h2 class="text-center">Вход на сайт</h2>
    {!! Form::open(['action' => 'UserController@login', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::label('email', 'Email', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Example@com']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Пароль', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ваш пароль...']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('remember', 'Оставаться в системе', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::checkbox('remember', 1) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-8">
            {!! Form::submit('Войти', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop