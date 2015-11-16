@extends('layouts.simple_layout')

@section('css')
{!! Html::style('css/jquery-ui.css') !!}
{!! Html::style('css/jquery-ui.structure.css') !!}
{!! Html::style('css/jquery-ui.theme.css') !!}
{!! Html::style('css/formFix.css') !!}
{!! Html::style('css/profile.css') !!}
@stop
@section('content')
<div class="my_menu">
    {!! link_to_route('user.edit', 'Редактировать профиль', ['id' => $user->id]) !!}
<!--    {!! link_to_route('user.potential', 'Найти друга', ['id' => Auth::id()]) !!}-->
    {!! link_to_route('user.subscriptions', 'Заявки в друзья', ['id' => $user->id]) !!}
    {!! link_to_route('user.dialogs', 'Диалоги', ['id' => $user->id]) !!}
</div>
<div class="form update col-lg-10 col-lg-offset-1">
    <h3>Редактирование профиля</h3>
    {!! Form::open(['action' => ['UserController@update', $user->id], 'class' => 'form-horizontal']) !!}
    {!! Form::hidden('old_password', $user->password) !!}
    <div class="form-group">
        {!! Form::label('fname', 'Имя', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::text('fname', $user->first_name, ['class' => 'form-control', 'placeholder' => 'Ваше имя...']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('lname', 'Фамилия', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::text('lname', $user->last_name, ['class' => 'form-control', 'placeholder' => 'Ваша фамилия...']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Example@com']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('gender', 'Пол', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::select('gender', array('m' => 'Мужской', 'f' => 'Женский'), $user->gender, ['placeholder' => 'Ваш пол...', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('married', 'В браке', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::select('married', array('1' => 'Да', '0' => 'Нет'), $user->married, ['placeholder' => 'Ваш семейный статус...', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('birth_date', 'Дата рождения', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::text('birth_date', $user->birth_date, ['class' => 'form-control', 'placeholder' => 'Ваша дата рождения...']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Пароль', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ваш пароль...']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Подтвердите пароль', ['class' => 'control-label col-xs-2']) !!}
        <div class="col-xs-8">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Повторите пароль']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-8">
            {!! Form::submit('Обновить', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop
@section('js')
{!! Html::script('js/jquery-ui.min.js') !!}
{!! Html::script('js/datepicker-ru.js') !!}
{!! Html::script('js/datepickerFormat.js') !!}
@stop