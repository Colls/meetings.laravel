@extends('layouts.simple_layout')
@section('css')
{!! Html::style('css/profile.css') !!}
{!! Html::style('css/messages.css') !!}
@stop
@section('content')
<div class="row">
    <div class="my_menu">
        {!! link_to_route('user.edit', 'Редактировать профиль', ['id' => Auth::id()]) !!}
<!--        {!! link_to_route('user.potential', 'Найти друга', ['id' => Auth::id()]) !!}-->
        {!! link_to_route('user.subscriptions', 'Заявки в друзья', ['id' => Auth::id()]) !!}
        {!! link_to_route('user.dialogs', 'Диалоги', ['id' => Auth::id()]) !!}
    </div>
    <div class="chat col-lg-8 col-lg-offset-2">
        @if($chat->count())
            @foreach($chat as $msg)
                <div>{{ $msg->first_name }}&nbsp;{{ $msg->last_name }}&nbsp;&nbsp;&nbsp;({{ $msg->time }})</div>
                <div class="comment">{{ $msg->message }}</div>
            @endforeach
        @endif
    </div>

    <div class="chat-form col-lg-8 col-lg-offset-2">
        {!! Form::open(['action' => ['MessageController@store', 'id' => Auth::id(), 'fid' => $fid], 'class' => 'form-horizontal']) !!}
        <div class="form-group">
            <div class="col-xs-8 col-xs-offset-2">
                {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-8">
                {!! Form::submit('Отправить', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
@section('js')

@stop