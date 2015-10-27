@extends('layouts.simple_layout')
@section('content')
<div class="chat">
    @if($chat->count())
        @foreach($chat as $msg)
            <div>
                {{ $msg->first_name }}&nbsp;{{ $msg->last_name }}&nbsp;&nbsp;&nbsp;({{ $msg->time }})
                <div class="comment">{{ $msg->message }}</div>
            </div>
        @endforeach
    @endif
</div>
<div class="chat-form">
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
@stop